<?php

namespace App\Http\Controllers\dashboard;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DoctorController extends Controller
{

    function __construct(){

    }
    public function index()
    {
       // $doctors = Doctor::with('timezone')->orderBy('id','desc')->get();
       // return $doctors;



        return view("admins.doctors.index");
    }

    public function show(Request $request)
    {
        // $doctors = Doctor::with('timezone')->orderBy('id','desc')->get();
        // return $doctors;

        $doctor=  Doctor::with("specialty")->where('id', $request->id)->first();

        return view("site.doctors.show",compact("doctor"));
    }
    public function doctors_in_json()
    {
        $doctors = Doctor::with('timezone')->get();

        $doctors ->map(function ($doctor) {
            $doctor->country_name = @$doctor->country->name_ar;
            $doctor->specialty_name = @$doctor->specialty->name_ar;
            $doctor->timezone_name = @$doctor->timezone->name_ar;
        });



        $response = array(
            "data" => $doctors
        );
        return response()->json($response);
    }
    public function create_by_admin()
    {
        $countries = Country::get();
        $timezones = DB::table('timezones')->get();
        return view("admins.doctors.create",compact('countries','timezones'));
    }
    public function store_by_admin(Request $request) {

        if($request -> personal_image) {
            $image =  Helper::saveImage($request -> personal_image,"personal_image_");
        }else
            $image ="";
        if($request -> certificate_image) {
            $image2 =  Helper::saveImage($request -> certificate_image,"certificate_image_");
        }else
            $image2 ="";
        $inserted= Doctor :: create([
            'name' => $request -> name ,
            'age' => $request -> age ,
            'mobile' => $request -> mobile ,
            'email'  => $request -> email ,
            'password'=> $request -> password ,
            'country_id' => $request -> country_id ,
            'specialty_id' => $request -> specialties_id ,
            'years_of_experience' => $request -> years_of_experience ,
            'place_of_work' => $request -> place_of_work ,
            'certificate_issuer' => $request -> certificate_issuer ,
            'personal_image' => $image ,
            'certificate_image' => $image2 ,
            'locked' => "no" ,
            'stopped' => "yes" ,
            'details_ar' => $request -> details_ar ,
            'details_en' => $request -> details_en ,


            'timezone_id' => $request -> timezone_id ,
        ]);
        return redirect(app()->getLocale().'/admins/doctors/');
    }
    public function edit_by_admin(Request $request) {
        $countries = DB::table('countries')->get();
        $categories = Specialty::orderBy('record_order', 'asc')->get();
        $doctor= DB::table('doctors')->where('id', $request->id)->first();
        $specialties = Specialty::orderBy('record_order', 'asc')->get();
        $timezones = DB::table('timezones')->get();
        //toast('Info Toast','info');
        // Alert::alert('Title', 'Message', 'Type');
        return view("admins.doctors.edit",compact('categories','doctor','countries','specialties','timezones'));
    }
    public function update_by_admin(Request $request) {
        $doctor = Doctor:: find($request->id);
        if($request -> personal_image) {
            $old_image = Config::get('app.upload').$doctor->personal_image;
            if(File::exists($old_image)) {
                File::delete($old_image);
            }
            $image =  Helper::saveImage($request -> personal_image,"personal_image");
            $doctor -> update([
                'personal_image'     => $image,
            ]);
        }
        if($request -> certificate_image) {
            $old_image2 = Config::get('app.upload').$doctor->certificate_image;
            if(File::exists($old_image2)) {
                File::delete($old_image2);
            }
            $image2 =  Helper::saveImage($request -> certificate_image,"certificate_image");
            $doctor -> update([
                'certificate_image'     => $image2,
            ]);
        }
        $updated= $doctor->update([
            'name' => $request -> name ,
            'age' => $request -> age ,
            'mobile' => $request -> mobile ,
            'email'  => $request -> email ,
            'password'=> $request -> password ,
            'country_id' => $request -> country_id ,
            'specialty_id' => $request -> specialty_id ,
            'years_of_experience' => $request -> years_of_experience ,
            'place_of_work' => $request -> place_of_work ,
            'certificate_issuer' => $request -> certificate_issuer ,
            'timezone_id' => $request -> timezone_id ,
            'stopped' => $request -> stopped ,
            'locked' => $request -> locked ,
            'details_ar' => $request -> details_ar ,
            'details_en' => $request -> details_en ,

        ]);
        if($updated)
        {
            request()->session()->flash('swal', [
               // 'title' => " تم التحديث بنجاح ",
                //'message' => "تم التحديث بنجاح",
                'title' =>__('site.update'),
                'message' => __('site.the_process_was_succeeded'),
                'icon' => "success",
                //'position' => "bottom-end",
                'showConfirmButton' => false,
            ]);

            return redirect(app()->getLocale().'/admins/doctors');
        }
    }


    public function LoginForm(){

        $countries =Country::first();
        return view('site.doctors.login',compact('countries'));
    }
    public function Login(Request $request){


//        $check=$request->all();
//        if(Auth::guard('doctor')  ->attempt(
//            [
//                'email'=>$check['email'],
//                'password'=>$check['password']
//            ]
//        )
//        ){
//            return redirect()->route('admin_dashboard')
//                ->with('error','successs');
//
//        }else{
//            return back()->with('error','invalid email or pass');
//        }


        ///with encrypt password with attempt method
        //$check=$request->all();
        //        if(Auth::guard('admin')->attempt(
        //                [
        //                    'email'=>$check['email'],
        //                    'password'=>$check['password']
        //                ]
        //            )
        //        ){
        //            return redirect()->route('admin_dashboard', ['locale' => app()->getLocale()])->with('error','ssssssssssssss') ;
        //
        //        }else{
        //            return back()->with('error','invalid email or pass');
        //        }

        ///without encrypt password ..use manual login
        $user = Doctor::with("country",'timezone')->where([
            'email' => $request->email,
            'password' => $request->password
        ])->first();



        if($user)
        {

            if($user->locked=="no")
            {
                Auth::guard('doctor')->login($user);
             //  dd (Auth::guard('doctor')->user()->country);
                request()->session()->flash('swal', [
                   // 'title' => "  تسجيل الدخول  ",
                   // 'message' => "تم تسجيل الدخول بنجاح",
                    'title' =>__('site.logged_in'),
                    'message' =>  __('site.successfully') ,
//                    'title' =>__('site.login'),
//                    'message' => __('site.the_process_was_succeeded'),
                    'icon' => "success",
                    'position' => "bottom-end",
                    'showConfirmButton' => false,
                ]);
                return redirect()->route('/', ['locale' => app()->getLocale()]) ;

            }else{
                request()->session()->flash('swal', [
                    //'title' => "  تسجيل الدخول  ",
                   // 'message' => "هذا الحساب مقفل الرجاء الاتصال بمدير النظام",
                    'title' =>__('site.login'),
                    'message' => __('site.account_is_locked_please_connect_admin'),
                    'icon' => "error",
                    'position' => "bottom-end",
                    'showConfirmButton' => true,
                ]);
                return redirect()->back()->with('message', __('site.account_is_locked_please_connect_admin'));

            }

        }
        else{

            request()->session()->flash('swal', [
              //  'title' => "  تسجيل الدخول  ",
             //   'message' => "اسم مستخدم او كلمة مرور خاطئة الرجاء المحاولة مرة اخرى",
                'title' =>__('site.not_logged_in'),
                'message' => __('site.username_or_password_is_wrong'),
                'icon' => "error",
                'position' => "bottom-end",
                'showConfirmButton' => false,
            ]);


            return redirect()->back()->with('message', __('site.username_or_password_is_wrong'));

        }


        //  return view('admins.auth.login');
    }


    public function create_in_site()
    {
        $timezones = DB::table('timezones')->get();
        $countries = Country::orderBy('id', 'asc')->get();
        return view("site.doctors.create",compact('countries','timezones'));
    }
    public function store_in_site(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:doctors',   // required and email format validation
            'mobile' => 'required|unique:doctors',   // required and email format validation
            'password' => 'required', // required and number field validation

        ]);

        if ($validator->fails())
        {

            return back()->withInput()->withErrors($validator);


        }else{

            if($request -> personal_image) {
                $image =  Helper::saveImage($request -> personal_image,"personal_image_");
            }else
                $image ="";
            if($request -> certificate_image) {
                $image2 =  Helper::saveImage($request -> certificate_image,"certificate_image_");
            }else
                $image2 ="";
            $inserted= Doctor :: create([
                'name' => $request -> name ,
                'age' => $request -> age ,
                'mobile' => $request -> mobile ,
                'email'  => $request -> email ,
                'password'=> $request -> password ,
                'country_id' => $request -> countries_id ,
                'specialty_id' => $request -> specialties_id ,
                'years_of_experience' => $request -> years_of_experience ,
                'place_of_work' => $request -> place_of_work ,
                'certificate_issuer' => $request -> certificate_issuer ,
                'personal_image' => $image ,
                'certificate_image' => $image2 ,
                'locked' => "yes" ,
                'stopped' => "no" ,
                'timezone_id' => $request -> timezone_id  ,
            ]);

            request()->session()->flash('swal', [
                // 'title' => " اضافة طبيب ",
                // 'message' => "تمت الاضافة بنجاح زالرجاء الانتظار حتى يتم تفعيل الحساب من قبل مدير النظام",
                'title' =>__('site.the_process_was_succeeded'),
                'message' =>  __('site.please_wait_until_admin_activate_the_account') ,
                'icon' => "success",
                'position' => "bottom-end",
                'showConfirmButton' => true,
                //'time'=> 5000
            ]);
            return redirect(app()->getLocale().'/');


        }



    }
    public function edit_in_site(Request $request) {
        $countries = DB::table('countries')->get();
        $specialties = Specialty::orderBy('record_order', 'asc')->get();
        $contacts = DB::table('contacts')->orderBy('id', 'desc')->first();
        $services = DB::table('services')->orderBy('record_order', 'asc')->get();
        $doctor= DB::table('doctors')->where('id', Auth::guard('doctor')->user()->id)->first();
        $timezones = DB::table('timezones')->get();
        return view("site.doctors.edit",compact('doctor','countries','specialties','contacts','services','timezones'));
    }
    public function update_in_site(Request $request) {
        $doctor = Doctor:: find($request->id);
        if($request -> personal_image) {
            $old_image = Config::get('app.upload').$doctor->personal_image;
            if(File::exists($old_image)) {
                File::delete($old_image);
            }
            $image =  Helper::saveImage($request -> personal_image,"personal_image");
            $doctor -> update([
                'personal_image'     => $image,
            ]);
        }
        if($request -> certificate_image) {
            $old_image2 = Config::get('app.upload').$doctor->certificate_image;
            if(File::exists($old_image2)) {
                File::delete($old_image2);
            }
            $image2 =  Helper::saveImage($request -> certificate_image,"certificate_image");
            $doctor -> update([
                'certificate_image'     => $image2,
            ]);
        }
        $updated= $doctor->update([
            'name' => $request -> name ,
            'age' => $request -> age ,
            'mobile' => $request -> mobile ,
            'email'  => $request -> email ,
            'password'=> $request -> password ,
            'country_id' => $request -> country_id ,
            'specialty_id' => $request -> specialty_id ,
            'years_of_experience' => $request -> years_of_experience ,
            'place_of_work' => $request -> place_of_work ,
            'certificate_issuer' => $request -> certificate_issuer ,
            'stopped' => $request -> stopped ,

            'timezone_id' => $request -> timezone_id ,
        ]);
        if($updated)
        {
            return redirect()->back()->with('success', __('site.the_process_was_succeeded'));
        }
        else{
           // return back()->withInput()->withErrors();
            return redirect()->back()->with('error', __('site.the_process_was_failed'));
        }
    }

    public function destroy(Request $request) {
        $doctor= Doctor::find($request -> id);
        $img1= Config::get('app.upload').$doctor ->personal_image;
        if(File::exists($img1)) {
            File::delete($img1);
        }
        $img2= Config::get('app.upload').$doctor ->certificate_image;
        if(File::exists($img2)) {
            File::delete($img2);

        }

       $deleted= $doctor->delete();
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

//        return redirect(app()->getLocale().'/admins/doctors/');
    }
    public function delete_image(Request $request) {

        $doctor= Doctor::find($request -> id);
        $column_name=$request -> col_name;
        $doctor -> update([
            "$column_name"    => "",
        ]);

        $img1= Config::get('app.upload').$doctor -> $column_name;
        if(File::exists($img1)) {


             File::delete($img1);
            return response()->json([
                'status' => 'true' ,
                'msg' => 'store success' ,
            ]);
        }
//        return response()->json([
//            'status' => 'false' ,
//        ]);
//        if($aff){
//            return response()->json([
//                'status' => 'true' ,
//                'msg' => 'store success' ,
//            ]);
//        }else{
//
//        }

    }
//    public function delete_image1(Request $request) {
//        $doctor= Doctor::find($request -> id);
//        $img1= Config::get('app.upload').$doctor ->personal_image;
//        if(File::exists($img1)) {
//         $aff=   File::delete($img1);
//        }
//
//        if($aff){
//            return response()->json([
//                'status' => 'true' ,
//                'msg' => 'store success' ,
//            ]);
//        }else{
//            return response()->json([
//                'status' => 'false' ,
//            ]);
//        }
//
////        return redirect(app()->getLocale().'/admins/doctors/');
//    }
//    public function delete_image2(Request $request) {
//        $doctor= Doctor::find($request -> id);
//
//        $img2= Config::get('app.upload').$doctor ->certificate_image;
//        if(File::exists($img2)) {
//            $aff=   File::delete($img2);
//
//        }
//        if($aff){
//            return response()->json([
//                'status' => 'true' ,
//                'msg' => 'store success' ,
//            ]);
//        }else{
//            return response()->json([
//                'status' => 'false' ,
//            ]);
//        }
//
//    }
    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();
        request()->session()->flash('swal', [

            'title' =>__('site.logged_out'),
            'message' =>  __('site.successfully') ,
            'icon' => "success",
            'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);

     //   $request->session()->invalidate();
      //  $request->session()->regenerateToken();
        return redirect(app()->getLocale().'/');
    }
















    public function showForgotForm(){
        return view('site.doctors.forgot');
    }

    public function sendResetLink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:doctors,email'
        ]);

        $token = \Str::random(64);
//        \DB::table('password_reset_tokens')->insert([
//            'email'=>$request->email,
//            'token'=>$token,
//            'created_at'=>Carbon::now(),
//        ]);
        \DB::table('password_reset_tokens')->updateOrInsert([
            'email'=>$request->email,
        ],
            [
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]
        );
//        ,['locale'=>App()->getLocale()]
          $action_link =  route('doctor.reset.password.form',['token'=>$token,'locale'=>App()->getLocale(),'email'=>$request->email]);
      //  $action_link = url(app()->getLocale()."/doctors/password/reset/$token/$request->email");
        $body = "We have received a request to reset the password for <b>Askourdoctor</b> account associated with ".$request->email.". You can reset your password by clicking the link below.";

        Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
            $message->from('info@askourdoctor.com', 'Askourdoctor');
            $message->to($request->email, 'Doctor Name')  ->subject('Reset Password');
        });

        return back()->with('success', 'We have e-mailed your password reset link');
    }

    public function showResetForm(Request $request, $token = null){
        // dd($token);
        $token = $request->token;
        $email = $request->email;
        //  return view('site.doctors.reset';compact(''))->with(['token'=>$request->token,'email'=>$request->email]);
        return view('site.doctors.reset',compact('token','email'));
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:doctors,email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
        ]);

       // dd($request->email);

        $check_token = \DB::table('password_reset_tokens')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{
            Doctor::where('email', $request->email)->update([
                //'password'=>\Hash::make($request->password)
                  'password'=>$request->password
            ]);

            \DB::table('password_reset_tokens')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('doctor_login',['locale'=>App()->getLocale()])->with('info', 'Your password has been changed! You can login with new password')->with('verifiedEmail', $request->email);
        }
    }

}
