<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class PatientController extends Controller
{

    function __construct(){
        //$this->middleware('patient', ['except' => ['create', 'login', 'register']]);
    }
    public function index()
    {

//        $patients = Patient::with('timezone')->orderBy('id', 'DESC')->get();
//        $patients ->map(function ($patient) {
//            $patient->country_name = @$patient->country->name_ar;
//            $patient->timezone_name = @$patient->timezone->name_ar;
//        });
//
//        return $patients;


        return view("admins.patients.index");
    }
    public function patients_in_json()
    {
        $patients = Patient::with('timezone')->orderBy('id', 'DESC')->get();
        $patients ->map(function ($patient) {
            $patient->country_name = @$patient->country->name_ar;
            $patient->timezone_name = @$patient->timezone->name_ar;
        });
        $response = array(
            "data" => $patients
        );
        return response()->json($response);
    }
    public function create()
    {
        $countries = Country::get();
        $timezones = DB::table('timezones')->get();
        return view("site.patients.create",compact('countries','timezones'));
    }
    public function edit() {
        $countries = DB::table('countries')->get();
        $timezones = DB::table('timezones')->get();
        $patient= Patient::where('id', Auth::guard('patient')->user()->id)->first();
        return view("site.patients.edit",compact('countries','patient','timezones'));
    }
    public function edit_in_dashboard(Request $request) {
        $specialties = Specialty::orderBy('record_order', 'asc')->get();
        $countries = DB::table('countries')->orderBy('id', 'desc')->get();
        $patient= DB::table('patients')->where('id', $request->id)->first();
        $timezones = DB::table('timezones')->get();
        return view("admins.patients.edit",compact('countries','patient','specialties','timezones'));
    }
    public function update(Request $request) {
        $patient = Patient:: find(Auth::guard('patient')->user()->id);
        if ($request->imagefile) {
            $image_old = Config::get('app.upload') . $patient->imagefile;
            if (File::exists($image_old)) {
                File::delete($image_old);
            }
            $image_file = Helper::saveImage($request->imagefile, "patient_");
            $patient->update([
                'image' => $image_file,
            ]);
        }
      $updated= $patient->update([
           'name' => $request -> name ,
           'mobile' => $request -> mobile ,
           'email'  => $request -> email ,
           'password'=> $request -> password ,
           'country_id' => $request -> country_id ,
           'timezone_id' => $request -> timezone_id ,
        ]);
        if($updated){


            Auth::guard('patient')->login($patient);
            request()->session()->flash('swal', [
                'title' =>__('site.update'),
                'message' =>  __('site.the_process_was_succeeded') ,
                'icon' => "success",
                //'position' => "bottom-end",
                'showConfirmButton' => false,
            ]);
            return redirect()->back()->with('success', 'تم التحديث بنجاح ');
        }else{
            return redirect()->back()->with('success', 'فشل التحديث ');
        }

      //  return redirect(app()->getLocale().'/');

    }
    public function update_in_dashboard(Request $request) {
        $patient = Patient:: find($request->id);
        if ($request->imagefile) {
            $image_old = Config::get('app.upload') . $patient->imagefile;
            if (File::exists($image_old)) {
                File::delete($image_old);
            }

            $image_file = Helper::saveImage($request->imagefile, "patient_");
            $patient->update([
                'image' => $image_file,
            ]);
        }
        $updated= $patient->update([
            'name' => $request -> name ,
            'mobile' => $request -> mobile ,
            'email'  => $request -> email ,
            'password'=> $request -> password ,
            'country_id' => $request -> country_id ,
            'free_payment' => $request -> free_payment ,
            'timezone_id' => $request -> timezone_id ,
            'locked' => $request -> locked ,
        ]);
        if($updated)
        {
            request()->session()->flash('swal', [
                'title' =>__('site.update'),
               // 'message' => "تم التحديث بنجاح",
              //  'title' => __('site.the_process_was_failed') ,
                'message' =>  __('site.the_process_was_succeeded') ,
                'icon' => "success",
                //'position' => "bottom-end",
                'showConfirmButton' => false,
            ]);
            return redirect(app()->getLocale().'/admins/patients/');
        }

    }





//    public function create_dashboard()
//    {
//        $countries = Country::orderBy('id', 'desc')->get();
//        return view("site.patients.create",compact('countries'));
//    }
//    public function store_dashboard(Request $request) {
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|email|unique:patients',   // required and email format validation
//            'mobile' => 'required|unique:patients',   // required and email format validation
//            'password' => 'required', // required and number field validation
//        ]);
//        if ($validator->fails())
//        {
//            return back()->withInput()->withErrors($validator);
//        }else{
//            if($request -> image_file) {
//                $image =  Helper::saveImage($request -> image_file,"patient_");
//            }else
//                $image ="";
//            $patient=  Patient :: create([
//                'name' => $request -> name ,
//                'mobile' => $request -> mobile ,
//                'email' => $request -> email ,
//                'password' => $request -> password ,
//                'country_id' => $request -> countries_id ,
//                'image' => $image ,
//                'clocked' => "no" ,
//            ]);
//            Auth::guard('patient')->login($patient);
//
//            request()->session()->flash('swal', [
//                'title' => " الاشتراك   ",
//                'message' => "تمت عماية الاشتراك بنجاح",
//                'icon' => "success",
//                'position' => "bottom-end",
//                'showConfirmButton' => false,
//            ]);
//            return redirect(app()->getLocale().'/');
//        }
//    }
    public function destroy(Request $request) {
        $patient= Patient::find($request -> id);
        $user_img = Config::get('app.upload').$patient ->	image;
        if(File::exists($user_img)) {
            File::delete($user_img);
        }
       $deleted= $patient->delete();
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

    public function delete_image(Request $request) {

        $patient= Patient::find($request -> id);
        $column_name=$request -> col_name;
        $patient -> update([
            "$column_name"    => "",
        ]);
        $img1= Config::get('app.upload').$patient -> $column_name;
        if(File::exists($img1)) {

             File::delete($img1);
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






    public function login(Request $request)
    {
        $patient = Patient::with("country",'timezone')->where([
            'email' => $request->login_email,
            'password' => $request->login_password
        ])->first();

        if($patient)
        {
            Auth::guard('patient')->login($patient);
            request()->session()->flash('swal', [
              //  'title' => " تم تسجيل الدخول بنجاح  ",
               // 'title' => __('site.the_process_was_succeeded') ,
                //'message' => "تم التحديث بنجاح",

                'title' =>__('site.logged_in'),
                'message' =>  __('site.successfully') ,
                'icon' => "success",
                'position' => "bottom-end",
                'showConfirmButton' => false,
            ]);
            //->with('error','ssssssssssssss')
            return redirect()->route('/', ['locale' => app()->getLocale()]);
        }
        else{
            request()->session()->flash('swal', [
                //'title' => " فشلت العملية  ",
               // 'message' => "اسم مستخدم او كلمة مرور خاطئة الرجاء المحاولة مرة اخرى",
               // 'title' => __('site.the_process_was_failed') ,
                'title' =>__('site.not_logged_in'),
                'message' =>  __('site.username_or_password_is_wrong') ,

              //  'title' =>__('site.not_logged_in'),
               // 'message' =>  __('site.successfully') ,
                'icon' => "error",
                'position' => "bottom-end",
                'showConfirmButton' => false,
            ]);
            return redirect()->back()->with('message', __('site.username_or_password_is_wrong'));
        }

    }
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:patients',   // required and email format validation
            'mobile' => 'required|unique:patients',   // required and email format validation
            'password' => 'required', // required and number field validation
        ]);
        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }else{
            if($request -> image_file) {
                $image =  Helper::saveImage($request -> image_file,"patient_");
            }else
                $image ="";
            $patient=  Patient :: create([
                'name' => $request -> name ,
                'mobile' => $request -> mobile ,
                'email' => $request -> email ,
                'password' => $request -> password ,
                'country_id' => $request -> countries_id ,
                'image' => $image ,
                'timezone_id' => $request ->timezone_id ,
                'locked' => "no" ,
            ]);


            //with("country",'timezone')


            Auth::guard('patient')->login($patient);

            request()->session()->flash('swal', [
                'title' => __('site.register') ,
                'message' =>  __('site.the_process_was_succeeded') ,
                'icon' => "success",
                'position' => "bottom-end",
                'showConfirmButton' => false,
            ]);
            return redirect(app()->getLocale().'/');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('patient')->logout();
       // $request->session()->invalidate();
       // $request->session()->regenerateToken();
        request()->session()->flash('swal', [
           // 'title' => __('site.logout') ,
           // 'message' =>  __('site.the_process_was_succeeded') ,
            'title' =>__('site.logged_out'),
            'message' =>  __('site.successfully') ,
            'icon' => "success",
            'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale().'/');
    }







    public function showForgotForm(){
        return view('site.patients.forgot');
    }

    public function sendResetLink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:patients,email'
        ]);

        $token = \Str::random(64);
        \DB::table('password_reset_tokens')->updateOrInsert([
            'email'=>$request->email,
        ],
            [
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]
        );

        $action_link =  route('patient.reset.password.form',['token'=>$token,'locale'=>App()->getLocale(),'email'=>$request->email]);
        $body = "We have received a request to reset the password for <b>Askourdoctor</b> account associated with ".$request->email.". You can reset your password by clicking the link below.";

        Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
            $message->from('info@askourdoctor.com', 'Askourdoctor');
            $message->to($request->email, 'patient Name')
                ->subject('Reset Password');
        });

        return back()->with('success', 'We have e-mailed your password reset link');
    }

    public function showResetForm(Request $request, $token = null){
        // dd($token);
        $token = $request->token;
        $email = $request->email;
        //  return view('site.doctors.reset';compact(''))->with(['token'=>$request->token,'email'=>$request->email]);
        return view('site.patients.reset',compact('token','email'));
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:patients,email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
        ]);



        $check_token = \DB::table('password_reset_tokens')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();
      //  dd($request->token);
        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{
            Patient::where('email', $request->email)->update([
                //'password'=>\Hash::make($request->password)
                'password'=>$request->password
            ]);

            \DB::table('password_reset_tokens')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('patient.create',['locale'=>App()->getLocale()])->with('info', 'Your password has been changed! You can login with new password')->with('verifiedEmail', $request->email);
        }
    }










}
