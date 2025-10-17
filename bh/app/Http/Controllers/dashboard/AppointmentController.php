<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Mail\AskForAppointmentMailable;
use App\Mail\ConfirmOneAppointmentMailable;
use App\Mail\SetFiveAppointmentsMailable;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\CustomerModel;
use App\Models\Doctor;
use App\Models\Notification;

use App\Models\Patient;
use App\Models\Payment;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;



class AppointmentController extends Controller
{

    public function ask_for_appointment_by_patient(Request $request) {
        $consultation= Consultation::
              where('patient_id',Auth::guard("patient")->user()->id )
            ->where('doctor_id',session("the_doctor_id"))
            ->where('status',"open")
            ->first();
       $created= Appointment :: updateOrCreate([
           'consultation_id' => $consultation->id ,
       ],
           [
               'status' => "pending_doctor" ,
           ]
       );
       if($created){

          //"تم طلب موعد من قبل المريض"
         // $b=__('site.the_patient_has_asked_for_appointment') . Auth::guard("patient")->user()->name;
//          $b= " p_1_ask " . Auth::guard("patient")->user()->name;

         $b= " the_patient " . Auth::guard("patient")->user()->name. " has_asked_for_an_appointment ";
          Notification :: create([
               'fromm'=>'patient',
               'to'=>'doctor',
               'doctor_id'     => session("the_doctor_id") ,
               'patient_id'     => Auth::guard("patient")->user()->id ,
               'notification'     => "$b",
               'read'     =>'no' ,
               'link'     => url(app()->getLocale()."/doctors/consultations/open") ,
           ]);
//           $note = [
//               'fromm'=>'patient',
//               'to'=>'doctor',
//               'doctor_id'     => session("the_doctor_id") ,
//               'patient_id'     => Auth::guard("patient")->user()->id ,
//               'notification'     => "$b",
//               'read'     =>'no' ,
//               'link'     => url(app()->getLocale()."/doctors/consultations/open") ,
//           ];
           $doctor= Doctor::where('id',session("the_doctor_id")) ->first();
//           Mail::to("$doctor->email")
//           ->bcc("bahaa101@gmail.com")
//           ->bcc(Auth::guard("patient")->user()->email)
////               ->bcc("info@askourdoctor.com")
//           ->send(new AskForAppointmentMailable($note));
//

           $action_link = url(app()->getLocale()."/doctors/consultations/open");
           $body = "A patient <b>".Auth::guard('patient')->user()->name."</b> has asked for an appointment on site  <b>Askourdoctor.com</b>
                    The doctor <b> $doctor->name</b> will determine 3 appointments at least  to choose one.";
           Mail::send('site.emails.ask_for_appointment_to_doctor',['action_link'=>$action_link,'body'=>$body], function($message) use ($request,$doctor){
               $message->from('info@askourdoctor.com', 'Askourdoctor.com')
                   ->to("$doctor->email", $doctor->name)
                   ->bcc("bahaa101@gmail.com")
                   ->subject('Ask For Appointment');
           });

           $action_link = url(app()->getLocale()."/patients/consultations/open");
           $body = "You received this email because  you have asked for an appointment on site  <b>Askourdoctor.com</b>
                  from The doctor <b> $doctor->name</b> .the doctor will  determine 3 appointments  at least to choose one as soon as possible .";
           Mail::send('site.emails.ask_for_appointment_to_patient',['action_link'=>$action_link,'body'=>$body], function($message) use ($request,$doctor){
               $message->from('info@askourdoctor.com', 'Askourdoctor.com')
                   ->to(Auth::guard('patient')->user()->email, Auth::guard('patient')->user()->name)
                   ->bcc("bahaa101@gmail.com")
                   ->subject('Ask For Appointment');
           });








           return response()->json([
               'status' => 'true' ,
               'msg' => 'store success' ,
           ]);
       }else{
           return response()->json([
               'status' => 'false' ,
           ]);
       }
    }
    public function ask_for_appointment_by_patient2(Request $request) {
        $consultation= Consultation::where('id',$request->consultation_id)->first();
        $created= Appointment :: updateOrCreate([
            'consultation_id' => $consultation->id ,
        ],
            [
                'status' => "pending_doctor" ,
            ]
        );
        if($created){
            return response()->json([
                'status' => 'true' ,
                'msg' => 'store success' ,
            ]);
        }else{
            return response()->json([
                'status' => 'false' ,
            ]);
        }
    }
    public function choose_five_dates_by_doctor()
    {
        $consultations = Consultation::whereHas('appointment',function($q){
                $q->where('appointment1',NUll)
                    ->where('status',"pending_doctor");
    })
            ->with('appointment','patient')
            ->where('doctor_id',Auth::guard('doctor')->user()->id)
            ->where('status',"open")
            ->get();
        return view("site.appointments.choose_five_dates",compact('consultations'));
    }
    public function create_five_appointments(Request $request)
    {
        $consultation = Consultation::whereHas('appointment',function($q){
            $q->where('appointment1',NUll)
                ->where('status',"pending_doctor");
        })
            ->with('appointment','patient')
            ->where('doctor_id',Auth::guard('doctor')->user()->id)
            ->where('id',$request->consultation_id)
            ->where('status',"open")
            ->first();

        //dd($consultation);
        return view("site.doctors.appointments.create_five_appointments",compact('consultation'));
    }
    public function create_choose_one_appointment(Request $request)
    {
        $consultation = Consultation::
            with('appointment','patient')
            ->where('patient_id',Auth::guard('patient')->user()->id)
            ->where('id',$request->consultation_id)
            ->where('status',"open")
            ->first();

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



        return view("site.patients.appointments.create_choose_one_appointment",compact('consultation'));
    }
    public function store_five_appointments(Request $request) {
      //  dd($request->appointment_id);

        $appointment = Appointment:: find($request->appointment_id);


        $appointment1 = new DateTime( $request -> appointment1, new DateTimeZone( Auth::guard('doctor')->user()->timezone->name_en ) );
        $appointment1->setTimeZone(new DateTimeZone( 'UTC' ));

        $appointment2 = new DateTime( $request -> appointment2, new DateTimeZone( Auth::guard('doctor')->user()->timezone->name_en ) );
        $appointment2->setTimeZone(new DateTimeZone( 'UTC' ));

        $appointment3 = new DateTime( $request -> appointment3, new DateTimeZone( Auth::guard('doctor')->user()->timezone->name_en ) );
        $appointment3->setTimeZone(new DateTimeZone( 'UTC' ));

        $appointment4 = new DateTime( $request -> appointment4, new DateTimeZone( Auth::guard('doctor')->user()->timezone->name_en ) );
        $appointment4->setTimeZone(new DateTimeZone( 'UTC' ));

        $appointment5 = new DateTime( $request -> appointment5, new DateTimeZone( Auth::guard('doctor')->user()->timezone->name_en ) );
        $appointment5->setTimeZone(new DateTimeZone( 'UTC' ));
       // dump("USER timezone :".$appointment1->format( 'Y-m-d H:i:s' ));


       // $utcTimezone = new DateTimeZone( 'UTC' );

    //    dd("UTC:".  $appointment1->format( 'Y-m-d H:i:s' ));

        $updated= $appointment->update([
            'appointment1' => ($request -> appointment1)?$appointment1->format( 'Y-m-d H:i:s' ):NULL ,
            'appointment2' => ($request -> appointment2)?$appointment2->format( 'Y-m-d H:i:s' ):NULL ,
            'appointment3' => ($request -> appointment3)?$appointment3->format( 'Y-m-d H:i:s' ):NULL ,
            'appointment4' => ($request -> appointment4)?$appointment4->format( 'Y-m-d H:i:s' ):NULL ,
            'appointment5' => ($request -> appointment5)?$appointment5->format( 'Y-m-d H:i:s' ):NULL,
            'status' => "pending_patient" ,
        ]);
        if($updated)
        {
//"تم تحديد موعد من قبل الطبيب"
           // $b2= __('site.the_doctor_has_determine_appointments_to_choose_one'). Auth::guard("doctor")->user()->name;
          //  $b2= " d_2_3app ". Auth::guard("doctor")->user()->name;


            $b2= " the_doctor ". Auth::guard("doctor")->user()->name . " has_determine_appointments_to_choose_one ";
            Notification :: create([
                'fromm'=>' doctor',
                'to'=>'patient',
                'doctor_id'     =>Auth::guard("doctor")->user()->id  ,
                'patient_id'     => $request->patient_id ,
                'notification'     => $b2 ,
                'read'     =>'no' ,
                'link'     => url(app()->getLocale()."/patients/consultations/open") ,
            ]);



//
//            $note = [
//                'fromm'=>' doctor',
//                'to'=>'patient',
//                'doctor_id'     =>Auth::guard("doctor")->user()->id  ,
//                'patient_id'     => $request->patient_id ,
//                'notification'     => $b2 ,
//                'read'     =>'no' ,
//                'link'     => url(app()->getLocale()."/patients/consultations/open") ,
//            ];

            $patient= Patient::where('id',$request->patient_id) ->first();
//            Mail::to("$patient->email")
//                ->bcc("bahaa101@gmail.com")
//              //  ->bcc(Auth::guard("patient")->user()->email)
////               ->bcc("info@askourdoctor.com")
//                ->send(new SetFiveAppointmentsMailable($note));

            $action_link = url(app()->getLocale()."/patients/consultations/open");
            $body = "The doctor <b>".Auth::guard('doctor')->user()->name."</b>  has determined appointments to you on site  <b>Askourdoctor.com</b>
                 .You should choose one of them  as soon as possible .";
            Mail::send('site.emails.set_five_appointments_to_patient',['action_link'=>$action_link,'body'=>$body], function($message) use ($request,$patient){
                $message->from('info@askourdoctor.com', 'Askourdoctor.com')
                    ->to("$patient->email", $patient->name)
                    ->bcc("bahaa101@gmail.com")
                    ->subject('Choose one appointment');
            });









            return redirect(app()->getLocale().'/doctors/consultations/open');
        }else{
            return response()->json([
                'status' => 'false' ,
                'msg' => 'store faild' ,
            ]);
        }
    }

    public function store_choose_one_appointment(Request $request) {
//        return "aaaaaaaaaaa";
//dd($request);
       $appointment = Appointment:: find($request->appointment_id);
        $updated= $appointment->update([
            'appointment1_confirm' => ($request -> confirm=="1")?"yes":NULL ,
            'appointment2_confirm' => ($request -> confirm=="2")?"yes":NULL ,
            'appointment3_confirm' => ($request -> confirm=="3")?"yes":NULL ,
            'appointment4_confirm' => ($request -> confirm=="4")?"yes":NULL ,
            'appointment5_confirm' => ($request -> confirm=="5")?"yes":NULL ,
            //'status' => "pending_doctor" ,
        ]);


       // $b3= __('site.confirm_final_appointment') . Auth::guard("patient")->user()->name;
        //$b3= " p_3_1app " . Auth::guard("patient")->user()->name;

        $b3= " the_patient " . Auth::guard("patient")->user()->name. " has_confirmed_final_appointment ";
        Notification :: create([
            'from'=>' patient',
            'to'=>'doctor',
            'doctor_id'     =>  session("the_doctor_id"),
            'patient_id'     => Auth::guard("patient")->user()->id ,
            'notification'     => $b3 ,
            'read'     =>'no' ,
            'link'     => url(app()->getLocale()."/doctors/consultations/open") ,
        ]);



//        $note3 = [
//            'fromm'=>'patient',
//            'to'=>'doctor',
//            'doctor_id'     => session("the_doctor_id") ,
//            'patient_id'     => Auth::guard("patient")->user()->id ,
//            'notification'     => $b3,
//            'read'     =>'no' ,
//            'link'     => url(app()->getLocale()."/doctors/consultations/open") ,
//        ];
        $doctor= Doctor::with('timezone')->where('id',session("the_doctor_id")) ->first();
       $zz= $doctor->timezone->name_en;

//        return $doctor;
//        Mail::to($doctor->email)
//            ->bcc("bahaa101@gmail.com")
//            ->bcc(Auth::guard("patient")->user()->email)
////               ->bcc("info@askourdoctor.com")
//            ->send(new ConfirmOneAppointmentMailable($note3));
//


        $appointment = Appointment:: find($request->appointment_id);

        if ($appointment->appointment1_confirm == "yes") {
            $final_appointment = $appointment->appointment1;
        } elseif ($appointment->appointment2_confirm == "yes") {
            $final_appointment = $appointment->appointment2;
        } elseif ($appointment->appointment3_confirm == "yes") {
            $final_appointment = $appointment->appointment3;
        } elseif ($appointment->appointment4_confirm == "yes") {
            $final_appointment = $appointment->appointment4;
        } elseif ($appointment->appointment5_confirm == "yes") {
            $final_appointment = $appointment->appointment5;
        }

        $final_appointment_doctor_timezone=   Carbon::createFromFormat('Y-m-d H:i:s',$final_appointment, "UTC")  ->setTimezone($zz);
        $final_appointment_patient_timezone=   Carbon::createFromFormat('Y-m-d H:i:s',$final_appointment, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en);


        //$final_appointment_patient_timezone = Date(Carbon::createFromFormat('Y-m-d H:i:s',$final_appointment, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en));
       // $final_appointment_doctor_timezone=   Carbon::createFromFormat('Y-m-d H:i:s',$final_appointment, "UTC")  ->setTimezone($zz);
       // =   Carbon::createFromFormat('Y-m-d H:i:s',$final_appointment, "UTC")  ->setTimezone(Auth::guard('patient')->user()->timezone->name_en);


        $action_link = url(app()->getLocale()."/doctors/consultations/open");
        $body = "The patient <b>".Auth::guard('patient')->user()->name."</b>  has choose final appointment  on site  <b>Askourdoctor.com</b>
                 .the final appointment is on :<h1 style='color: red;text-align: center'> $final_appointment_doctor_timezone </h1>
                 <h2 style='text-align: center;color: red'>[ timezone : $zz]</h2>";
        Mail::send('site.emails.final_appointment_to_doctor',['action_link'=>$action_link,'body'=>$body], function($message) use ($request,$doctor){
            $message->from('info@askourdoctor.com', 'Askourdoctor.com')
                ->to("$doctor->email", $doctor->name)
                ->bcc("bahaa101@gmail.com")
//                ->bcc(Auth::guard("patient")->user()->email)
                ->subject('final  appointment');
        });




        $action_link = url(app()->getLocale()."/patients/consultations/open");
        $body = "The final appointment for patient <b>".Auth::guard('patient')->user()->name."</b> with the doctor  <b>$doctor->name</b>   on site  <b>Askourdoctor.com</b>
                 is :<h1 style='color: red;text-align: center'> $final_appointment_patient_timezone </h1>
                 <h2 style='text-align: center;color: red'>[ timezone : ".Auth::guard('patient')->user()->timezone->name_en." ]</h2>";
        Mail::send('site.emails.final_appointment_to_doctor',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
            $message->from('info@askourdoctor.com', 'Askourdoctor.com')
                ->to(Auth::guard("patient")->user()->email, Auth::guard("patient")->user()->name)
                ->bcc("bahaa101@gmail.com")
                ->subject(' final  appointment');
        });


        if($updated)
        {
            //   return redirect(app()->getLocale().'/appointments/choose_dates')->with('success', 'Logout successfully');
                return response()->json([
                    'status' => 'true' ,
                    'msg' => 'store success' ,
                ]);
        }else{
            return response()->json([
                'status' => 'false' ,
                'msg' => 'store faild' ,
            ]);

        }
    }
    public function destroy(Request $request) {
        $customer= CustomerModel::find($request -> id);

        $user_img = Config::get('app.upload_image_folder').$customer ->	pic;
        if(File::exists($user_img)) {
            File::delete($user_img);
        }
       $deleted= $customer->delete();
        if($deleted){
            return response()->json([
                'status' => 'true' ,
                'msg' => 'store success' ,
            ]);

        }else{
            return response()->json([
                'status' => 'false' ,
            ]);
        }

    }


}
