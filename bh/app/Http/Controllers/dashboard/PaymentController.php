<?php
//
//namespace App\Http\Controllers\dashboard;
//
//use App\Helpers\Helper;
//use App\Http\Controllers\Controller;
//
//
//use App\Models\CityModel;
//use App\Models\Consultation;
//use App\Models\CountryModel;
//use App\Models\Payment;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Config;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\File;
//
//class PaymentController extends Controller
//{
//
//    public function store(Request $request)
//    {
//
//        $consultation =  Consultation::updateOrInsert(
//            [
//                'doctor_id' => session("the_doctor_id"),
//                'patient_id' => Auth::guard('patient')->user()->id,
//                "status"=>"open"
//            ],
////            ['appointment_id' => $request->appointment_id,'agreement' => 'yes', ]
//        );
//
//        //if($consultation )
//       // {
//            if ($request->image_file) {
//                $image =  Helper::saveImage($request->image_file, "payment_image");
//            } else
//                $image = "";
//            $payment =  Payment::create([
//                'consultation_id'  => $request->consultation_id,
//                'patient_id'       => Auth::guard('patient')->user()->id,
//                'doctor_id'        => session("the_doctor_id"),
//                'payment_method'   => $request->payment_method,
//                'payment_value'    => $request->payment_value,
//                'payment_date'     => $request->payment_date,
//                'image'            => $image,
//                'accepted'         =>  "no",
//                'reference'        =>  $request->reference,
//            ]);
//       // }
//
//        if ($payment) {
//
//            return response()->json([
//                'status' => "true",
//            ]);
//        } else {
//            return response()->json([
//                'status' => "false",
//            ]);
//        }
//        // return redirect(app()->getLocale().'/admins/patients/');
//    }
//
//
//    public function index(Request $request)
//    {
//        $from = $request->from ?? '';
//        $to = $request->to ?? '';
//        $payment_method = $request->payment_method ?? '';
//        return view("dashboard.payments.index", compact('from', 'to', 'payment_method'));
//    }
//
//    public function get_payments_in_json_old(Request $request)
//    {
//        $from = $request->from ?? '';
//        $to = $request->to ?? '';
//        $payment_method = $request->payment ?? '';
//
//        $payments = DB::table('payments')
//            ->select("payments.*", "accounts.account_number", "accounts.owner_name", "users.name AS driver_name", "users.name AS user_name")
//            ->leftJoin("accounts", "account_id", 'accounts.id')
//            ->leftJoin("users", "driver_id", 'users.id');
//        //  ->leftJoin("users","user_id",'users.id')
//        //    ->where ("account_id",$request->account_id)
//
//        if ($from) {
//            $payments->whereDate('payments.created_at', '>=', $from);
//        }
//        if ($to) {
//            $payments->whereDate('payments.created_at', '<=', $to);
//        }
//
//        if ($payment_method)
//            $payments->where("payment_method", $payment_method);
//
//        $payments = $payments->get();
//
//        $payments->map(function ($payment) {
//
//            $res = DB::table('users')->where('id', $payment->user_id)->first();
//            $payment->user_name = @$res->name;
//
//        });
//
//        $response = array(
//            "data" => $payments
//        );
//
//        return response()->json($response);
//    }
//    public function get_payments_in_json(Request $request)
//    {
//        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
//
//        if (in_array("administrator", explode(',', Auth::user()->permissions))) {
//            $totalDataRecord = DB::table('payments') ->count();
//        } else {
//            $totalDataRecord = DB::table('payments')
//                ->where('user_id', '=', Auth::user()->id)
//                ->count();
//        }
//
//
//
//
//        $totalFilteredRecord = $totalDataRecord;
//        $limit_val = $request->input('length');
//        $start_val = $request->input('start');
//        $column_name = $request->order[0]["column"];
//
//        if (empty($request->input('search.value'))) {
//
//
//            if (in_array("administrator", explode(',', Auth::user()->permissions))) {
//                $payments = Payment::offset($start_val)
//                    ->leftJoin("accounts", "account_id", 'accounts.id')
//                    ->leftJoin("users", "payments.driver_id", 'users.id')//driver_id
//                    ->select("payments.*", "accounts.account_number", "accounts.owner_name", "users.name AS driver_name", "users.name AS user_name")
//                    ->limit($limit_val)
//                    ->orderBy($column_name, $request->order[0]["dir"])
//                    ->get();
//            } else {
//                $payments = Payment::offset($start_val)
//                    ->leftJoin("accounts", "account_id", 'accounts.id')
//                    ->leftJoin("users", "payments.driver_id", 'users.id')//driver_id
//                    ->where('payments.user_id', '=', Auth::user()->id)
//                    ->select("payments.*", "accounts.account_number", "accounts.owner_name", "users.name AS driver_name", "users.name AS user_name")
//                    ->limit($limit_val)
//                    ->get();
//            }
//
//
//
//        }else {
//
//            $search_text = $request->input('search.value');
//            if (in_array("administrator", explode(',', Auth::user()->permissions)))    {
//
//                    $payments = Payment::offset($start_val)
//                        ->leftJoin("accounts", "account_id", 'accounts.id')
//                        ->leftJoin("users", "payments.driver_id", 'users.id')//driver_id
//                        ->where('payments.id', 'LIKE', "%{$search_text}%")
//                        ->orWhere('users.name', 'LIKE', "%{$search_text}%")
//                        ->orWhere('accounts.owner_name', 'LIKE', "%{$search_text}%")
//                        ->select("payments.*", "accounts.account_number", "accounts.owner_name", "users.name AS driver_name", "users.name AS user_name")
//                        ->limit($limit_val)
//                        ->orderBy($column_name, $request->order[0]["dir"])
//                        ->get();
//                    $totalFilteredRecord = Payment::offset($start_val)
//                        ->leftJoin("accounts", "account_id", 'accounts.id')
//                        ->leftJoin("users", "payments.driver_id", 'users.id')//driver_id
//                        ->where('payments.id', 'LIKE', "%{$search_text}%")
//                        ->orWhere('users.name', 'LIKE', "%{$search_text}%")
//                        ->orWhere('accounts.owner_name', 'LIKE', "%{$search_text}%")
//                        ->select("payments.*", "accounts.account_number", "accounts.owner_name", "users.name AS driver_name", "users.name AS user_name")
//                        ->limit($limit_val)
//                        ->orderBy($column_name, $request->order[0]["dir"])
//                        ->count();
//
//                } else {
//                    $payments = Payment::offset($start_val)
//                        ->leftJoin("accounts", "account_id", 'accounts.id')
//                        ->leftJoin("users", "payments.driver_id", 'users.id')
//                        ->where('payments.user_id', '=', Auth::user()->id)
//                        ->where(function ($query) use ($search_text) {
//                        $query
//                            ->orWhere('payments.id', 'LIKE', "%{$search_text}%")
//                            ->orWhere('users.name', 'LIKE', "%{$search_text}%")
//                            ->orWhere('accounts.owner_name', 'LIKE', "%{$search_text}%");
//                         })
//                        ->select("payments.*", "accounts.account_number", "accounts.owner_name", "users.name AS driver_name", "users.name AS user_name")
//                        ->limit($limit_val)
//                        ->orderBy($column_name, $request->order[0]["dir"])
//                        ->get();
//                    $totalFilteredRecord = Payment::offset($start_val)
//                        ->leftJoin("accounts", "account_id", 'accounts.id')
//                        ->leftJoin("users", "payments.driver_id", 'users.id')
//                        ->where('payments.user_id', '=', Auth::user()->id)
//                        ->where(function ($query) use ($search_text) {
//                            $query
//                                ->orWhere('payments.id', 'LIKE', "%{$search_text}%")
//                                ->orWhere('users.name', 'LIKE', "%{$search_text}%")
//                                ->orWhere('accounts.owner_name', 'LIKE', "%{$search_text}%");
//                        })
//                        ->select("payments.*", "accounts.account_number", "accounts.owner_name", "users.name AS driver_name", "users.name AS user_name")
//                        ->limit($limit_val)
//                        ->orderBy($column_name, $request->order[0]["dir"])
//                        ->count();
//
//            }
//
//
//
//
//
//
//        }
//        $draw_val = $request->input('draw');
//
//        $response = array(
//            "draw"            => intval($draw_val),
//            "recordsTotal"    => intval($totalDataRecord),
//            "recordsFiltered" => intval($totalFilteredRecord),
//            "data"            => $payments
//        );
//        return response()->json($response);
//
//
//
//
//
//    }
//    public function create()
//    {
//        $accounts = DB::table('accounts')
//            //   ->where('id', $request->id)
//            ->get();
//
//        $chord = "driver";
//        $drivers = DB::table('users')
//            ->orderBy('users.id', 'desc')
//            ->where('permissions', 'like', '%' . $chord . '%')
//            ->get();
//
//
//        $paymentMethods = Payment::getPaymentMethods();
//
//        return view("dashboard.payments.create", compact('accounts', 'drivers', 'paymentMethods'));
//    }
//
//
//
//    public function edit($id)
//    {
//        //  $payment =  Payment :: find($id);
//
//        $payment = DB::table('payments')
//            ->leftJoin("accounts", "account_id", 'accounts.id')
//            ->leftJoin("users", "driver_id", 'users.id')
//            ->where('payments.id', $id)
//            ->select("payments.*", "accounts.account_number", "users.name AS driver_name")
//            ->first();
//
//        // dd($payment);
//
//        $accounts = DB::table('accounts')
//            ->get();
//
//        $chord = "driver";
//        $drivers = DB::table('users')
//            ->orderBy('users.id', 'desc')
//            ->where('permissions', 'like', '%' . $chord . '%')
//            ->get();
//
//        $paymentMethods = Payment::getPaymentMethods();
//
//        return view('dashboard.payments.edit', compact('payment', 'accounts', 'drivers', 'paymentMethods'));
//    }
//
//    public function update(Request $request)
//    {
//        $payment =  Payment::find($request->id);
//
//        if ($request->image_file) {
//            $payment_image_old = Config::get('app.upload_image_folder') . $payment->pic;
//            if (File::exists($payment_image_old)) {
//                File::delete($payment_image_old);
//            }
//
//            $payment_image =  Helper::saveImage($request->image_file, "payment_image");
//            $payment->update([
//                'pic'     => $payment_image,
//            ]);
//        }
//
//
//        $payment->update([
//            'user_id'     => session("user_id"),
//            'account_id'     => $request->account_id,
//            'driver_id'     => $request->driver_id,
//            'payment_value' => $request->payment_value,
//            'payment_method' => $request->payment_method,
//            'accepted'     =>  $request->accepted,
//            'reference'     =>  $request->reference,
//            'budget'     =>  $request->budget,
//            'payment_date'     =>  $request->payment_date
//        ]);
//
//        if ($payment) {
//            return response()->json([
//                'status' => "true",
//
//            ]);
//        } else {
//            return response()->json([
//                'status' => "false",
//
//            ]);
//        }
//
//        // return redirect("/dashboard/payments");
//    }
//
//    public function destroy(Request $request)
//    {
//        $payment = Payment::find($request->id);
//
//        $payment_image = Config::get('app.upload_image_folder') . $payment->pic;
//        if (File::exists($payment_image)) {
//            File::delete($payment_image);
//        }
//
//        $payment->delete();
//        return response()->json([
//            'status' => "true",
//
//        ]);
//        //        return redirect('/dashboard/city/');
//
//    }
//
//
//    public function show_payments_for_account(Request $request)
//    {
//        $account_id = $request->account_id;
//        $account = DB::table('accounts')
//            ->where('id', $account_id)
//
//            ->first();
//        return view("dashboard.accounting.accounts.payments.index", compact("account"));
//    }
//    public function get_payments_in_json_for_account(Request $request)
//    {
//        $payments = DB::table('payments')
//            ->leftJoin("accounts", "account_id", 'accounts.id')
//            ->leftJoin("users", "driver_id", 'users.id')
//            ->where("account_id", $request->account_id)
//            ->where('accepted', "yes")
//            ->select("payments.*", "accounts.account_number", "accounts.owner_name", "users.name AS driver_name")
//            ->get();
//        $response = array(
//            "data" => $payments
//        );
//        //dd($response);
//        return response()->json($response);
//    }
//
//
//    public function show_payments_for_driver(Request $request)
//    {
//        $driver_id = $request->driver_id;
//        $user = DB::table('users')
//            ->where('id', $driver_id)
//            ->first();
//        return view("dashboard.accounting.drivers.payments.index", compact("user"));
//    }
//    public function get_payments_for_driver_in_json(Request $request)
//    {
//
//        //  echo($request->driver_id);
//        $payments = DB::table('payments')
//            ->where('driver_id', $request->driver_id)
//            ->where('accepted', "yes")
//            ->get();
//
//
//        $response = array(
//            "data" => $payments
//        );
//
//        //dd($response);
//        return response()->json($response);
//    }
//
//
//    public function set_accepted(Request $request)
//    {
//        $updated = DB::table('payments')
//            ->where('id', $request->payment_id)
//            ->update([
//                'accepted' => "yes",
//            ]);
//        if ($updated) {
//            return response()->json([
//                'status' => "true",
//            ]);
//        } else {
//            return response()->json([
//                'status' => "false",
//            ]);
//        }
//    }
//    public function set_unaccepted(Request $request)
//    {
//        $updated = DB::table('payments')
//            ->where('id', $request->payment_id)
//            ->update([
//                'accepted' => "no",
//            ]);
//        if ($updated) {
//            return response()->json([
//                'status' => "true",
//            ]);
//        } else {
//            return response()->json([
//                'status' => "false",
//            ]);
//        }
//    }
//}
