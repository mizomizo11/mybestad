<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\Consultation;
use App\Models\Doctor;

use App\Models\PrivacyPolicy;
use App\Models\RefundPolicy;
use App\Models\Specialty;
use App\Models\TermsConditions;
use App\Models\Video;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        $video = Video::first();
        $carousels = Carousel::orderBy('record_order', 'asc')->get();




        return view("site.index",compact('video','carousels'));
    }

    public function whous()
    {
        return view("site.whous");
    }

    public function privacy_policy()
    {
        $privacy_policy = PrivacyPolicy::first();
        return view("site.privacy_policy", compact('privacy_policy'));
    }
    public function refund_policy()
    {
        $refund_policy = RefundPolicy::first();
        return view("site.refund_policy", compact('refund_policy'));
    }
    public function terms_conditions()
    {
        $terms_conditions = TermsConditions::first();
        return view("site.terms_conditions", compact('terms_conditions'));
    }

    public function how_we_work()
    {
        $howwework = Video::first();
        return view("site.how_we_work", compact('howwework'));
    }

    public function contacts()
    {
        return view("site.contacts");
    }

    public function show_all_specialties(Request $request)
    {
        $doctors = Doctor::with("specialty")
            ->where('locked','no')
            ->where('stopped','no')


            ->get();
        $doctors->map(function ($doctor) {
            $doctor->specialty_name = @$doctor->specialty->name_ar;
        });
        return view("site.doctors_in_all_specialties", compact('doctors'));
    }

    public function show_doctors_in_specialty(Request $request)
    {
        $specialty_name = Specialty::where('id', $request->id)->first();
        $doctors = Doctor::with("specialty")
            ->where('locked','no')
            ->where('stopped','no')
            ->where('specialty_id', $request->id)->get();
        return view("site.doctors_in_specialty", compact('doctors', 'specialty_name'));
    }

    public function show_steps(Request $request)
    {
        $doctor = Doctor::with("specialty")->where('id', $request->doctor_id)->first();
        if ($doctor) {
            session()->put('the_doctor_id', $doctor->id);
            session()->put('the_doctor_name', $doctor->name);
            session()->put('the_specialty_price', $doctor->specialty->price  );
            session()->put('the_specialty_name', $doctor->specialty->{"name_".app()->getLocale()}  );
            session()->put('doctor', $doctor);
        }
        $consultation = Consultation::with('appointment', 'patient','doctor')
            ->where('doctor_id', session("the_doctor_id"))
            ->where('patient_id', Auth::guard('patient')->user()->id)
            ->where('status', "open")
            ->first();
        if ($consultation) {
            session()->put('the_consultation_id', $consultation->id);
            session()->put('the_consultation', $consultation);
        }
        else{
            session()->forget('the_consultation_id');
            session()->forget('the_consultation');
        }
        return view("site.steps");
    }

    public function show_step1_payment(Request $request)
    {
        return view("site.step1");
    }

    public function show_step2_ask_for_appointment(Request $request)
    {
        $consultation = Consultation::whereHas('appointment', function ($q) {
            $con = DB::table('consultations')
                ->where('patient_id', Auth::guard("patient")->user()->id)
                ->where('doctor_id', session("the_doctor_id"))
                ->where('status', "open")
                ->first();
            $q->where('consultation_id', '=',$con->id);
            // ->where('status',"pending_doctor");
        })
            ->with('appointment', 'patient')
//            ->where('id', '=', session("the_consultation_id"))
            ->where('doctor_id', session("the_doctor_id"))
            ->where('patient_id', Auth::guard('patient')->user()->id)
            ->where('status', "open")
            ->first();

        //dd($consultation);

//dd (session("the_consultation_id"));

        return view("site.step2", compact("consultation"));
    }

    public function show_step3_choose_one_appointment(Request $request)
    {
        $consultation = Consultation::whereHas('appointment', function ($q) {
            $con = DB::table('consultations')
                ->where('patient_id', Auth::guard("patient")->user()->id)
                ->where('doctor_id', session("the_doctor_id"))
                ->where('status', "open")
                ->first();
            $q->where('consultation_id', '=', $con->id);
            // ->where('status',"pending_doctor");
        })
            ->with('appointment', 'patient')
            ->where('doctor_id', session("the_doctor_id"))
            ->where('patient_id', Auth::guard('patient')->user()->id)
            ->where('status', "open")
            ->first();


        $consultation->appointment_request_by_patient = @$consultation->appointment ? "yes" : "no";
        $consultation->appointment_reply_by_doctor = @$consultation->appointment->appointment1 ? "yes" : "no";
        if (@$consultation->appointment->appointment1_confirm
            or @$consultation->appointment->appointment2_confirm
            or @$consultation->appointment->appointment3_confirm
            or @$consultation->appointment->appointment4_confirm
            or @$consultation->appointment->appointment5_confirm) {
            $consultation->appointment_confirm_by_patient = "yes";
        } else {
            $consultation->appointment_confirm_by_patient = "no";
        }


        $app1 = new DateTime(   @$consultation -> appointment ->appointment1,new DateTimeZone( 'UTC' )    );
        $app1->setTimeZone(new DateTimeZone( Auth::guard('patient')->user()->timezone->name_en  ));
        $consultation->app1 = $app1->format( 'Y-m-d H:i:s' );
        $app2 = new DateTime(   @$consultation -> appointment ->appointment2,new DateTimeZone( 'UTC' )    );
        $app2->setTimeZone(new DateTimeZone( Auth::guard('patient')->user()->timezone->name_en  ));
        $consultation->app2 = $app2->format( 'Y-m-d H:i:s' );
        $app3 = new DateTime(   @$consultation -> appointment ->appointment3,new DateTimeZone( 'UTC' )    );
        $app3->setTimeZone(new DateTimeZone( Auth::guard('patient')->user()->timezone->name_en  ));
        $consultation->app3 = $app3->format( 'Y-m-d H:i:s' );
        $app4 = new DateTime(   @$consultation -> appointment ->appointment4,new DateTimeZone( 'UTC' )    );
        $app4->setTimeZone(new DateTimeZone( Auth::guard('patient')->user()->timezone->name_en  ));
        $consultation->app4 = $app4->format( 'Y-m-d H:i:s' );
        $app5 = new DateTime(   @$consultation -> appointment ->appointment5,new DateTimeZone( 'UTC' )    );
        $app5->setTimeZone(new DateTimeZone( Auth::guard('patient')->user()->timezone->name_en  ));
        $consultation->app5 = $app5->format( 'Y-m-d H:i:s' );





        if (@$consultation->appointment->appointment1_confirm == "yes") {


            $app1 = new DateTime(   @$consultation -> appointment ->appointment1,new DateTimeZone( 'UTC' )    );
            $app1->setTimeZone(new DateTimeZone( Auth::guard('patient')->user()->timezone->name_en  ));
            $consultation->appointment->appointment1 = $app1->format( 'Y-m-d H:i:s' );

            $consultation->final_appointment = $app1->format( 'Y-m-d H:i:s' );
        } elseif (@$consultation->appointment->appointment2_confirm == "yes") {

            $app2 = new DateTime(   @$consultation -> appointment ->appointment2,new DateTimeZone( 'UTC' )    );
            $app2->setTimeZone(new DateTimeZone( Auth::guard('patient')->user()->timezone->name_en  ));
            $consultation->appointment->appointment2 = $app2->format( 'Y-m-d H:i:s' );


            $consultation->final_appointment = $app2->format( 'Y-m-d H:i:s' );
        } elseif (@$consultation->appointment->appointment3_confirm == "yes") {

           $app3 = new DateTime(   @$consultation -> appointment ->appointment3,new DateTimeZone( 'UTC' )    );
           $app3->setTimeZone(new DateTimeZone( Auth::guard('patient')->user()->timezone->name_en  ));
           $consultation->appointment->appointment3 = $app3->format( 'Y-m-d H:i:s' );

            $consultation->final_appointment = $app3->format( 'Y-m-d H:i:s' );
        } elseif (@$consultation->appointment->appointment4_confirm == "yes") {

          $app4 = new DateTime(   @$consultation -> appointment ->appointment4,new DateTimeZone( 'UTC' )    );
          $app4->setTimeZone(new DateTimeZone( Auth::guard('patient')->user()->timezone->name_en  ));
          $consultation->appointment->appointment4 = $app4->format( 'Y-m-d H:i:s' );

            $consultation->final_appointment = $app4->format( 'Y-m-d H:i:s' );
        } elseif (@$consultation->appointment->appointment5_confirm == "yes") {

       $app5 = new DateTime(   @$consultation -> appointment ->appointment5,new DateTimeZone( 'UTC' )    );
        $app5->setTimeZone(new DateTimeZone( Auth::guard('patient')->user()->timezone->name_en  ));
        $consultation->appointment->appointment5 = $app5->format( 'Y-m-d H:i:s' );

            $consultation->final_appointment =$app5->format( 'Y-m-d H:i:s' );
        } else {
            $consultation->final_appointment = "";
        }


     // $consultation->d1 = "aaaaaaaaaaa";
      //  if($consultation->final_appointment)
       // $consultation->final_appointment =  Carbon::createFromFormat('Y-m-d H:i:s',"$consultation->final_appointment", "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en);


        return view("site.step3", compact("consultation"));
    }

    public function show_step4(Request $request)
    {
        $consultation = DB::table('consultations')
            ->where('patient_id', Auth::guard("patient")->user()->id)
            ->where('doctor_id', session("the_doctor_id"))
            ->where('status', "open")
            ->first();

        //$consultation_files =  ConsultationFile ::where get();
        $consultation_files = DB::table('consultations_files')
            //  ->where('patient_id', session("patient_id"))
            //->where('doctor_id',  session("the_doctor_id"))
            ->where('consultation_id', $consultation->id)
            ->get();





//         define uploads path
        $uploadDir = url(Config::get('app.upload')) . "/";
        // create an empty array
        // we will add to this array the files from directory below
        // here you can also add files from MySQL database
        $preloadedFiles = array();
        // add files to our array with
        // made to use the correct structure of a file
        foreach ($consultation_files as $file) {
           $file2 = $file->file;
            $preloadedFiles[] = array(
                "name" => $file2,
                "idd" => $file->id,
                //  "type" => FileUploader::mime_content_type($uploadDir . $file),
                "type" => FileUploaderController::mime_content_type($uploadDir . $file2),
                "size" => @filesize(Config::get('app.upload') . $file2),
                "file" => $uploadDir . $file2,
                "local" => $uploadDir . $file2, // same as in form_upload.php
                "data" => array(
                    //  "url" => '/fileuploader/examples/preloaded-files/uploads/' . $file, // (optional)
                    //   "thumbnail" => file_exists($uploadDir . 'thumbs/' . $file) ? $uploadDir . 'thumbs/' . $file : null, // (optional)
                    "readerForce" => true, // (optional) prevent browser cache
                    "idd" => $file->id
                    // "idd" => $file2->id // (optional) prevent browser cache
                ),
            );
            //return $file;
        }
        // convert our array into json string
        $preloadedFiles = json_encode($preloadedFiles);


//return $preloadedFiles;


//        // define uploads path
//        $uploadDir = url(Config::get('app.upload')) . "/";
//        // create an empty array
//        // we will add to this array the files from directory below
//        // here you can also add files from MySQL database
//        $preloadedFiles = array();
//        // add files to our array with
//        // made to use the correct structure of a file
//        foreach ($consultation_files as $file) {
//            $file = $file->file;
//            $preloadedFiles[] = array(
//                "name" => $file,
//                //  "type" => FileUploader::mime_content_type($uploadDir . $file),
//                "type" => FileUploaderController::mime_content_type($uploadDir . $file),
//                "size" => @filesize(Config::get('app.upload') . $file),
//                "file" => $uploadDir . $file,
//                "local" => $uploadDir . $file, // same as in form_upload.php
//                "data" => array(
//                    //  "url" => '/fileuploader/examples/preloaded-files/uploads/' . $file, // (optional)
//                    //   "thumbnail" => file_exists($uploadDir . 'thumbs/' . $file) ? $uploadDir . 'thumbs/' . $file : null, // (optional)
//                    "readerForce" => true // (optional) prevent browser cache
//                ),
//            );
//        }
//        // convert our array into json string
//        $preloadedFiles = json_encode($preloadedFiles);





        $appointments = DB::table('appointments')->get();
        return view("site.step4", compact('appointments', 'preloadedFiles','consultation'));
    }

    public function show_step5(Request $request)
    {
        $appointments = DB::table('appointments')->get();
        return view("site.step5", compact('appointments'));
    }

    public function show_step6(Request $request)
    {

        return view("site.step6");
    }

    public function show_video(Request $request)
    {
       // dd($request->id);
      $consultation_video_id=  $request->id;

        return view("site.show_video",compact('consultation_video_id'));
    }
//    public function show_search(Request $request)
//    {
//        $last_books = DB::table('products')->limit(8)->orderBy('id', 'desc')->get();
//
//        $specialties = Specialty::orderBy('record_order', 'asc')->get();
//        $contacts = ContactsModel::first();
//
//
//
//        $products = DB::table('products')
//            ->leftJoin("specialties","products.specialties_id",'specialties.id')
//            ->where('products.name', 'like', "%$request->search%")
//            ->select("products.*","specialties.name AS category_name" )
//            ->get();
//
//        return view("site.search",compact('contacts','specialties','last_books','products'));
//    }

}
