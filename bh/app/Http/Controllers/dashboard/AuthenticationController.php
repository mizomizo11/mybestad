<?php

namespace App\Http\Controllers\dashboard;


use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\ShipmentModel;
use App\Models\StoreModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthenticationController extends Controller
{

    function index()
    {
        $customers_count= CustomerModel::count();
        return view("dashboard.index",compact('customers_count',));
    }
    function displayLoginForm()
    {
        return view("dashboard.login");
    }
    function displayRegisterForm()
    {
        return view("dashboard.register");
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',   // required and email format validation
            'password' => 'required', // required and number field validation

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {

            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form

        } else {

            $user = DB::table('users')
                ->where('email', '=', $request->email)
                ->where('password', '=', $request->password)
                ->first();


            if(filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $user = DB::table('users')
                    ->where('email', '=', $request->email)
                    ->where('password', '=', $request->password)
                    ->first();


            } else {

                $user = DB::table('users')
                    ->where('mobile', '=', $request -> email)
                    ->where('password', '=', $request -> password)
                    ->first();


            }



            if($user){


                session()->put('user', $user );
                session()->put('user_id', $user->id );


                $permissions_array=explode(",", $user->permissions);
                session()->put('permissions_array', $permissions_array );



                return redirect(app()->getLocale()."/dashboard/index")->with('success', 'Login Successful');

            }else{

                return back()->withErrors( "Invalid credentials"); // auth fail redirect with error
            }




        }



    }
    // logout method to clear the sesson of logged in user
    function logout()
    {

        session()->forget('user');
        session()->forget('permissions_array');

        session()->forget('user_id');
        session()->forget('user_has_administrator_role');



        //Auth::logout();
        // return redirect('/');
        //\Auth::logout();
        // return view("dashboard.login");
      //  return redirect(app()->getLocale().'/dashboard/users/');
        return redirect(app()->getLocale()."/dashboard/")->with('success', 'Logout successfully');;
    }






}

