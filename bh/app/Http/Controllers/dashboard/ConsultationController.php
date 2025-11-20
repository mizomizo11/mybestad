<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Controllers\Controller;
use App\Mail\ConfirmOneAppointmentMailable;
use App\Mail\ConsultationMailable;
use App\Mail\ReportMailable;
use App\Models\Consultation;
use App\Models\CustomerModel;
use App\Models\Doctor;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;


class ConsultationController extends Controller
{
    public function index()
    {
        return view("admins.consultations.index");
    }
    public function get_consultations_in_json()
    {
//        $consultations = Consultation::with('doctor', 'patient')->orderBy('id', 'DESC')->get();
//        $consultations->map(function ($consultation) {
//            $consultation->doctor_name = $consultation->doctor->name;
//            $consultation->patient_name = $consultation->patient->name;
//        });



        $consultations = Consultation::with('doctor', 'patient', 'appointment')
            //->where('doctor_id', Auth::guard('doctor')->user()->id)
           // ->where('status', 'open')
            ->orderBy('id', 'DESC')
            ->get();
        $consultations->map(function ($consultation) {
            $consultation->doctor_name = $consultation->doctor->name;
            $consultation->patient_name = $consultation->patient->name;
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
            if (@$consultation->appointment->appointment1_confirm == "yes") {
                $consultation->appointment_selected_by_patient = $consultation->appointment->appointment1;
            } elseif (@$consultation->appointment->appointment2_confirm == "yes") {
                $consultation->appointment_selected_by_patient = $consultation->appointment->appointment2;
            } elseif (@$consultation->appointment->appointment3_confirm == "yes") {
                $consultation->appointment_selected_by_patient = $consultation->appointment->appointment3;
            } elseif (@$consultation->appointment->appointment4_confirm == "yes") {
                $consultation->appointment_selected_by_patient = $consultation->appointment->appointment4;
            } elseif (@$consultation->appointment->appointment5_confirm == "yes") {
                $consultation->appointment_selected_by_patient = $consultation->appointment->appointment5;
            } else {
                $consultation->appointment_selected_by_patient = "";
            }

        });

        $response = array(
            "data" => $consultations
        );
        return response()->json($response);
    }
    public function update(Request $request)
    {

        $affected = DB::table('consultations')
            // 'consultation_id' => session("the_consultation_id") ,
            ->where('id', session("the_consultation_id"))
            // ->where('doctor_id', $request->doctor_id)
            //   ->where('status', "=","open")
            ->update([
                'symptoms' => $request->symptoms,
                'diagnosis' => $request->diagnosis,
                'recommendations' => $request->recommendations,
                'additional_instructions' => $request->additional_instructions,
                'referrals' => $request->referrals,
                'following_plan' => $request->following_plan,
                'notes' => $request->notes,
            ]);


        if ($affected) {
            //  return redirect(app()->getLocale().'/appointments/choose_dates')->with('success', 'Logout successfully');
            return response()->json([
                'status' => 'true',
                'msg' => 'store success',

            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'msg' => 'store faild',

            ]);

        }

    }

    public function create_report(Request $request)
    {
        $consultation = Consultation::
        with('appointment', 'patient')
            ->where('id', $request->consultation_id)
           // ->where('status', "open")
            ->first();


        $specialty =Specialty::where('id', Auth::guard("doctor")->user()->specialty_id) ->first();


        return view("site.doctors.consultations.create_report", compact('consultation','specialty'));
    }

    public function update_report(Request $request)
    {
        $affected = Consultation::
        where('id', $request->consultation_id)
            ->update([
                'symptoms' => $request->symptoms,
                'diagnosis' => $request->diagnosis,
                'recommendations' => $request->recommendations,
                'additional_instructions' => $request->additional_instructions,
                'referrals' => $request->referrals,
                'following_plan' => $request->following_plan,
                'notes' => $request->notes,
                'status' => 'closed',
            ]);

        $consultation = Consultation::
        where('id', $request->consultation_id)->first();


        if ($affected) {




           // $b3=  __('site.the_doctor_has_write_report'). Auth::guard("doctor")->user()->name;
            $b3=  " the_doctor ". Auth::guard("doctor")->user()->name ." has_released_report ";



            Notification :: create([
                'fromm'=>' doctor',
                'to'=>'patient',
                'doctor_id'     =>  Auth::guard("doctor")->user()->id,
                'patient_id'     => $consultation->patient_id,
                'notification'     => $b3 ,
                'read'     =>'no' ,
                'link'     => url(app()->getLocale()."/patients/consultations/closed") ,
            ]);

//
//
//            $note4 = [
//                'fromm'=>' doctor',
//                'to'=>'patient',
//                'doctor_id'     =>  Auth::guard("doctor")->user()->id,
//                'patient_id'     => $consultation->patient_id,
//                'notification'     => $b3 ,
//                'read'     =>'no' ,
//                'link'     => url(app()->getLocale()."/patients/consultations/closed") ,
//            ];
            $patient= Patient::where('id', $consultation->patient_id) ->first();


            $action_link = url(app()->getLocale()."/patients/consultations/open");
            $body = "The Doctor <b>".Auth::guard('doctor')->user()->name."</b>  has released final report on site  <b>Askourdoctor.com</b> for you.  ";
            Mail::send('site.emails.final_report_to_doctor',['action_link'=>$action_link,'body'=>$body], function($message) use ($request,$patient){
                $message->from('info@askourdoctor.com', 'Askourdoctor.com')
                    ->to("$patient->email", $patient->name)
                    ->bcc("bahaa101@gmail.com")
//                ->bcc(Auth::guard("patient")->user()->email)
                    ->subject('Report is released');
            });




            return response()->json([
                'status' => 'true',
                'msg' => 'store success',

            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'msg' => 'store faild',

            ]);

        }

    }
    public function show_report_for_patient(Request $request)
    {
        $consultation = Consultation::
        with('appointment', 'patient')
            ->where('id', $request->consultation_id)
            ->first();



        $doctor =Doctor::where('id',$consultation->doctor_id ) ->first();
        $specialty =Specialty::where('id', $doctor->specialty_id) ->first();




        return view("site.patients.consultations.show_report", compact('consultation','specialty'));
    }
    public function upload_files(Request $request)
    {

        $consultation = Consultation::
        with('appointment', 'patient')
            ->where('id', $request->consultation_id)
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
                //  "type" => FileUploader::mime_content_type($uploadDir . $file),
                "type" => FileUploaderController::mime_content_type($uploadDir . $file2),
                "size" => @filesize(Config::get('app.upload') . $file2),
                "file" => $uploadDir . $file2,
                "local" => $uploadDir . $file2, // same as in form_upload.php
                "data" => array(
                    //  "url" => '/fileuploader/examples/preloaded-files/uploads/' . $file, // (optional)
                    //   "thumbnail" => file_exists($uploadDir . 'thumbs/' . $file) ? $uploadDir . 'thumbs/' . $file : null, // (optional)
                    "readerForce" => true, // (optional) prevent browser cache
                     "idd" => $file->id // (optional) prevent browser cache
                ),
            );
        }
        // convert our array into json string
        $preloadedFiles = json_encode($preloadedFiles);






        return view("site.patients.consultations.upload_files", compact('consultation','consultation_files','preloadedFiles'));
    }

    public function show_uploaded_files(Request $request)
    {
        $consultation = Consultation::with('appointment', 'patient')
            ->where('id', $request->consultation_id)
            ->first();

        $consultation_files = DB::table('consultations_files')
           // ->where('consultation_id', $consultation->id)
            ->get();


       // ?/dd($consultation_files);



//         define uploads path
        $uploadDir = url(Config::get('app.upload')) . "/";
        // create an empty array
        // we will add to this array the files from directory below
        // here you can also add files from MySQL database
        $preloadedFiles = array();
        // add files to our array with
        // made to use the correct structure of a file
        foreach ($consultation_files as $file) {
            $file = $file->file;
            $preloadedFiles[] = array(
                "name" => $file,
                //  "type" => FileUploader::mime_content_type($uploadDir . $file),
                "type" => FileUploaderController::mime_content_type($uploadDir . $file),
                "size" => @filesize(Config::get('app.upload') . $file),
                "file" => $uploadDir . $file,
                "local" => $uploadDir . $file, // same as in form_upload.php
                "data" => array(
                    //  "url" => '/fileuploader/examples/preloaded-files/uploads/' . $file, // (optional)
                    //   "thumbnail" => file_exists($uploadDir . 'thumbs/' . $file) ? $uploadDir . 'thumbs/' . $file : null, // (optional)
                    "readerForce" => true, // (optional) prevent browser cache
                     "idd" => $file->id // (optional) prevent browser cache
                ),
            );
        }
        // convert our array into json string
        $preloadedFiles = json_encode($preloadedFiles);












        return view("site.patients.consultations.show_uploaded_files", compact('consultation','consultation_files','preloadedFiles'));
    }
    public function show_uploaded_files_for_doctor(Request $request)
    {
        $consultation = Consultation::with('appointment', 'patient')
            ->where('id', $request->consultation_id)
            ->first();

        $consultation_files = DB::table('consultations_files')
            ->where('consultation_id', $consultation->id)
            ->get();
       // return $consultation_files;



//         define uploads path
        $uploadDir = url(Config::get('app.upload')) . "/";

        // create an empty array
        // we will add to this array the files from directory below
        // here you can also add files from MySQL database
        $preloadedFiles = array();
        // add files to our array with
        // made to use the correct structure of a file
        foreach ($consultation_files as $file) {
            $file = $file->file;
            $preloadedFiles[] = array(
                "name" => $file,
                //  "type" => FileUploader::mime_content_type($uploadDir . $file),
                "type" => FileUploaderController::mime_content_type($uploadDir . $file),
                "size" => @filesize(Config::get('app.upload') . $file),
                "file" => $uploadDir . $file,
                "local" => $uploadDir . $file, // same as in form_upload.php
                "data" => array(
                    //  "url" => '/fileuploader/examples/preloaded-files/uploads/' . $file, // (optional)
                    //   "thumbnail" => file_exists($uploadDir . 'thumbs/' . $file) ? $uploadDir . 'thumbs/' . $file : null, // (optional)
                    "readerForce" => true // (optional) prevent browser cache
                ),
            );
        }
        // convert our array into json string
        $preloadedFiles = json_encode($preloadedFiles);






        return view("site.doctors.consultations.show_uploaded_files", compact('consultation','consultation_files','preloadedFiles'));
    }

    public function show_report_for_admin(Request $request)
    {
        $consultation = Consultation::
        with('appointment', 'patient')
            ->where('id', $request->consultation_id)
            ->first();
        return view("admins.consultations.show_report", compact('consultation'));
    }
    public function show_admin_consultations_files(Request $request)
    {
        $consultation = Consultation::
        with('files')
            ->where('id', $request->consultation_id)
            ->first();




      //  return $consultation;
        return view("admins.consultations.show_files", compact('consultation'));
    }

    public function update_by_doctor(Request $request)
    {
        $affected = Consultation::
        where('id', $request->id)
            ->update([
                'symptoms' => $request->symptoms,
                'diagnosis' => $request->diagnosis,
                'recommendations' => $request->recommendations,
                'additional_instructions' => $request->additional_instructions,
                'referrals' => $request->referrals,
                'following_plan' => $request->following_plan,
                'notes' => $request->notes,
            ]);


        if ($affected) {
            //  return redirect(app()->getLocale().'/appointments/choose_dates')->with('success', 'Logout successfully');
            return response()->json([
                'status' => 'true',
                'msg' => 'store success',

            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'msg' => 'store faild',

            ]);

        }

    }

    public function update_agreement(Request $request)
    {
        $affected = DB::table('consultations')
            ->where('patient_id', session("patient_id"))
            ->where('doctor_id', session("the_doctor_id"))
            ->where('status', "=", "open")
            ->update([
                'agreement' => "yes",
            ]);
        if ($affected) {
            return response()->json([
                'status' => 'true',
                'msg' => 'store success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'msg' => 'store faild',
            ]);
        }
    }

    public function update_payment(Request $request)
    {
        $affected = DB::table('consultations')
            ->where('patient_id', session("patient_id"))
            ->where('doctor_id', session("the_doctor_id"))
            ->where('status', "=", "open")
            ->update([
                'payment_id' => "111",
            ]);
        if ($affected) {
            return response()->json([
                'status' => 'true',
                'msg' => 'store success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'msg' => 'store faild',
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $consultation = Consultation::find($request->id);

//        $user_img = Config::get('app.upload') . $customer->pic;
//        if (File::exists($user_img)) {
//            File::delete($user_img);
//        }
        $deleted = $consultation->delete();
          return redirect(app()->getLocale().'/admins/consultations/')->with('success', 'delete successfully');
//        if ($deleted) {
//            return response()->json([
//                'status' => 'true',
//                'msg' => 'store success',
//
//            ]);
//
//        } else {
//            return response()->json([
//                'status' => 'false',
//            ]);
//
//        }

    }

    public function show_doctor_consultations_open()
    {
        return view("site.doctors.consultations.open");
    }

    public function get_doctor_consultations_open_in_json()
    {
        $consultations = Consultation::with('doctor', 'patient', 'appointment')
            ->where('doctor_id', Auth::guard('doctor')->user()->id)
            ->where('status', 'open')
            ->orderBy('id', 'DESC')
            ->get();
        $consultations->map(function ($consultation) {
            $consultation->doctor_name = $consultation->doctor->name;
            $consultation->patient_name = $consultation->patient->name;
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
            if (@$consultation->appointment->appointment1_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment1, "UTC")  ->setTimezone(Auth::guard('doctor')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment2_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment2, "UTC")  ->setTimezone(Auth::guard('doctor')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment3_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment3, "UTC")  ->setTimezone(Auth::guard('doctor')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment4_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment4, "UTC")  ->setTimezone(Auth::guard('doctor')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment5_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment5, "UTC")  ->setTimezone(Auth::guard('doctor')->user()->timezone->name_en)) ;
            } else {
                $consultation->appointment_selected_by_patient = "";
            }

        });
        $response = array(
            "data" => $consultations
        );
        return response()->json($response);
    }

    public function show_doctor_consultations_closed()
    {
        return view("site.doctors.consultations.closed");
    }

    public function get_doctor_consultations_closed_in_json()
    {

        $consultations = Consultation::with('doctor', 'patient', 'appointment')
            ->where('doctor_id', Auth::guard('doctor')->user()->id)
            ->where('status', 'closed')
            ->orderBy('id', 'DESC')
            ->get();
        $consultations->map(function ($consultation) {
            $consultation->doctor_name = $consultation->doctor->name;
            $consultation->patient_name = $consultation->patient->name;
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
            if (@$consultation->appointment->appointment1_confirm == "yes") {
                $consultation->appointment_selected_by_patient =Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment1, "UTC")  ->setTimezone(Auth::guard('doctor')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment2_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment2, "UTC")  ->setTimezone(Auth::guard('doctor')->user()->timezone->name_en));
            } elseif (@$consultation->appointment->appointment3_confirm == "yes") {
                $consultation->appointment_selected_by_patient =Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment3, "UTC")  ->setTimezone(Auth::guard('doctor')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment4_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment4, "UTC")  ->setTimezone(Auth::guard('doctor')->user()->timezone->name_en));
            } elseif (@$consultation->appointment->appointment5_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment5, "UTC")  ->setTimezone(Auth::guard('doctor')->user()->timezone->name_en));
            } else {
                $consultation->appointment_selected_by_patient = "";
            }

        });
        $response = array(
            "data" => $consultations
        );
        return response()->json($response);
    }


    public function show_patient_consultations_open()
    {
        $consultation = Consultation::
        with('appointment', 'patient')
//            ->where('id', $request->consultation_id)
            ->first();
        $consultation_files = DB::table('consultations_files')
            //  ->where('patient_id', session("patient_id"))
            //->where('doctor_id',  session("the_doctor_id"))
            ->where('consultation_id', @$consultation->id)
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
            $file = $file->file;
            $preloadedFiles[] = array(
                "name" => $file,
                //  "type" => FileUploader::mime_content_type($uploadDir . $file),
                "type" => FileUploaderController::mime_content_type($uploadDir . $file),
                "size" => @filesize(Config::get('app.upload') . $file),
                "file" => $uploadDir . $file,
                "local" => $uploadDir . $file, // same as in form_upload.php
                "data" => array(
                    //  "url" => '/fileuploader/examples/preloaded-files/uploads/' . $file, // (optional)
                    //   "thumbnail" => file_exists($uploadDir . 'thumbs/' . $file) ? $uploadDir . 'thumbs/' . $file : null, // (optional)
                    "readerForce" => true // (optional) prevent browser cache
                ),
            );
        }
        // convert our array into json string
        $preloadedFiles = json_encode($preloadedFiles);




        return view("site.patients.consultations.open",compact('preloadedFiles'));
    }

    public function get_patient_consultations_open_in_json()
    {
        $consultations = Consultation::with('doctor', 'patient')
            ->where('patient_id', Auth::guard('patient')->user()->id)
            ->where('status', 'open')
            ->orderBy('id', 'DESC')
            ->get();
        $consultations->map(function ($consultation) {
            $consultation->doctor_name = $consultation->doctor->name;
            $consultation->patient_name = $consultation->patient->name;
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
            if (@$consultation->appointment->appointment1_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment1, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment2_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment2, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment3_confirm == "yes") {
                $consultation->appointment_selected_by_patient =Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment3, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en));
            } elseif (@$consultation->appointment->appointment4_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment4, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment5_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment5, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en)) ;
            } else {
                $consultation->appointment_selected_by_patient = "";
            }

        });
        $response = array(
            "data" => $consultations
        );
        return response()->json($response);
    }

    public function show_patient_consultations_closed()
    {
        return view("site.patients.consultations.closed");
    }

    public function get_patient_consultations_closed_in_json()
    {
        $consultations = Consultation::with('doctor', 'patient')
            ->where('patient_id', Auth::guard('patient')->user()->id)
            ->where('status', 'closed')
            ->orderBy('id', 'DESC')
            ->get();
        $consultations->map(function ($consultation) {
            $consultation->doctor_name = $consultation->doctor->name;
            $consultation->patient_name = $consultation->patient->name;
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
            if (@$consultation->appointment->appointment1_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment1, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment2_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment2, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment3_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment3, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment4_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment4, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en)) ;
            } elseif (@$consultation->appointment->appointment5_confirm == "yes") {
                $consultation->appointment_selected_by_patient = Date(Carbon::createFromFormat('Y-m-d H:i:s',$consultation->appointment->appointment5, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en)) ;
            } else {
                $consultation->appointment_selected_by_patient = "";
            }

        });
        $response = array(
            "data" => $consultations
        );
        return response()->json($response);
    }


}
