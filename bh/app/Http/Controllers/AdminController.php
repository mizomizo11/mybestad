<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Admin;
use App\Models\ContactsModel;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index()
    {
        $users = Admin::orderBy('id', 'DESC')->get();
        return view("admins.admins.index", compact('users'));
    }
    public function dashboard(){
        return view('admins.dashboard');
    }
    public function LoginForm(){

        //$services = DB::table('services')->orderBy('record_order', 'asc')->get();
        //$specialties = Specialty::orderBy('record_order', 'asc')->get();
        //$contacts = ContactsModel::first();


              return view('admins.auth.login');
    }
    public function Login(Request $request){

        $user = Admin::where([
            'email' => $request->email,
            'password' => $request->password
        ])->first();

        if($user)
        {
            Auth::guard('admin')->login($user);
            return redirect()->route('admin_dashboard', ['locale' => app()->getLocale()]) ;
        }
        else{
            return back()->with('error','invalid email or pass');
        }


//        $check=$request->all();
//        if(Auth::guard('admin')  ->attempt(
//                [ 'email'=>$check['email'],
//                  'password'=>$check['password']  ]
//            )
//        ){
//            dd("1111");
//            return redirect()->route('admin_dashboard')
//                ->with('error','successs');
//
//        }else{
//            //dd("22222");
//            return back()->with('error','invalid email or pass');
//        }


      //  return view('admins.auth.login');
    }
    public function RegisterForm(){

        return view('admins.auth.register');
    }
    public function Register(Request $request){
        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            //'password' => Hash::make($request->password),
            'password' => $request->password,
        ]);
        Auth::guard('admin')->login($user);
        return   redirect(app()->getLocale()."/admins/dashboard")->with('error','successs');
//        return redirect()->route('admin_login')
//            ->with('error','successs');


        //  return view('admins.auth.login');
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(app()->getLocale().'/admins/login');
    }
    public function create()
    {
        return view("admins.admins.create");
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:admins',   // required and email format validation
            'mobile' => 'required|unique:admins',   // required and email format validation
            'password' => 'required', // required and number field validation
        ]);
        if ($validator->fails())
        {
           return back()->withInput()->withErrors($validator);
        }else{
            if($request -> image_file) {
                $image_file =  Helper::saveImage($request -> image_file,"admin_");
            }else
                $image_file ="";
            Admin :: create([
                'name' => $request -> name ,
                'mobile' => $request -> mobile ,
                'email' => $request -> email ,
                'password' => $request -> password ,
                'image' => "$image_file" ,
            ]);
            return redirect(app()->getLocale().'/admins/admins/');
        }

    }
    public function edit(Request $request) {


        $admin= Admin::where('id', $request->id)->first();
        return view("admins.admins.edit",compact('admin'));
    }
    public function update(Request $request) {
        $admin = Admin:: find($request->id);
        if($request -> image_file) {
            $image =  Helper::saveImage($request -> image_file,"admin_");
        }else
            $image ="";

        $updated= $admin->update([
            'name' => $request -> name ,
            'mobile' => $request -> mobile ,
            'email'  => $request -> email ,
            'password'=> $request -> password ,
            'image' => $image ,
        ]);
        if($updated)
        {
            request()->session()->flash('swal', [
                'title' => "  التحديث  ",
                'message' => "تم التحديث بنجاح",
                'icon' => "success",
                //'position' => "bottom-end",
                'showConfirmButton' => false,
            ]);
            return redirect(app()->getLocale().'/admins/admins/');

        }else{
            return response()->json([
                'status' => 'false' ,
                'msg' => 'store faild' ,

            ]);

        }
    }

    public function destroy(Request $request) {
        $user= Admin::find($request -> id);
        $user_img = Config::get('app.upload_image_folder').$user ->	image;
        if(File::exists($user_img)) {
            File::delete($user_img);
        }
        $deleted= $user->delete();
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
        //return redirect(app()->getLocale().'/admins/admins/');

    }


}
