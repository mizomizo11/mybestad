<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Controllers\Controller;

use App\Models\DisclaimerModel;
use Illuminate\Http\Request;


class DisclaimerController extends Controller
{
    public function edit() {
        $disclaimer=  DisclaimerModel :: find(1);
        return view('admins.disclaimer.edit', compact('disclaimer'));

    }
    public function update(Request $request) {



        $whous=  DisclaimerModel :: find($request -> id);
        $whous->update($request->all());

        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale().'/admins/disclaimer');


    }


}
