<?php

namespace App\Http\Controllers\dashboard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderby('id','desc')->get();
        return view("dashboard.faqs.index", compact('faqs'));
    }

    public function create()
    {
        return view("dashboard.faqs.create");
    }

    public function store(Request $request)
    {

        Faq:: create([
            'question_ar' => $request->question_ar,
            'answer_ar' => $request->answer_ar,
            'question_en' => $request->question_en,
            'answer_en'  => $request->answer_en,
            'record_order' => $request->record_order,
        ]);
        return redirect(app()->getLocale() . '/dashboard/faqs/');
    }



    public function edit(Request $request)
    {
        $faq = Faq:: find($request->id);
        return view('dashboard.faqs.edit', compact('faq'));
    }

    public function update(Request $request)
    {

        $Faq = Faq:: find($request->id);

        $Faq->update([
            'question_ar' => $request->question_ar,
            'answer_ar' => $request->answer_ar,
            'question_en' => $request->question_en,
            'answer_en'  => $request->answer_en,
            'record_order' => $request->record_order,
        ]);
        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale() . '/dashboard/faqs/');
    }

    public function destroy(Request $request)
    {
        $Faq = Faq::find($request->id);

        $deleted= $Faq->delete();
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
       // return redirect(app()->getLocale() . '/dashboard/faqs/');
    }


}
