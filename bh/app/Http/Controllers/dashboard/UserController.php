<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\UserModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = UserModel::orderBy('id', 'DESC')->get();
        return view("dashboard.users.index", compact('users'));
    }

    public function create()
    {
        return view("dashboard.users.create");
    }

    public function store(Request $request) {



        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',   // required and email format validation
            'mobile' => 'required|unique:users',   // required and email format validation
            'password' => 'required', // required and number field validation

        ]);

        if ($validator->fails())
        {

            return back()->withInput()->withErrors($validator);


        }else{


            if($request -> image_file) {
                $image_file =  Helper::saveImage($request -> image_file,"user_image");
            }else
                $image_file ="";


             UserModel :: create([
                'name' => $request -> name ,
                'name_eng' => $request -> name_eng ,
                'mobile' => $request -> mobile ,
                'email' => $request -> email ,
                'password' => $request -> password ,
                'image' => "$image_file" ,

            ]);

            return redirect(app()->getLocale().'/dashboard/users/');

        }







    }
    public function edit(Request $request) {
        $user =  UserModel :: find($request->id);
        return view('dashboard.users.edit', compact('user'));

    }
    public function update(Request $request) {

        $user = UserModel:: find($request->id);

        $validator = Validator::make($request->all(), [
            'email' => 'unique:users,email,'.$user->id,
            'mobile' => 'required|unique:users,mobile,'.$user->id,    // required and email format validation
            'password' => 'required', // required and number field validation
        ]);


        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }else {




            if ($request->image_file) {
                $user_image_old = Config::get('app.upload_image_folder') . $user->image;
                if (File::exists($user_image_old)) {
                    File::delete($user_image_old);
                }

                $image_file = Helper::saveImage($request->image_file, "user_image");
                $user->update([
                    'image' => $image_file,
                ]);

            }


            $user->update([
                'name' => $request->name,
                'name_eng' => $request->name_eng,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'password' => $request->password,

            ]);

            return redirect(app()->getLocale().'/dashboard/users/');
        }






    }

    public function destroy(Request $request) {
        $user= UserModel::find($request -> id);

        $user_img = Config::get('app.upload_image_folder').$user ->	pic;
        if(File::exists($user_img)) {
            File::delete($user_img);
        }


        $user->delete();
        return redirect(app()->getLocale().'/dashboard/users/');

    }








}
