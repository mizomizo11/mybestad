<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Controllers\Controller;

use App\Models\WhousModel;
use Illuminate\Http\Request;


class WhousController extends Controller
{
    public function edit() {
        $whous=  WhousModel :: find(1);
        return view('admins.whous.edit', compact('whous'));

    }
    public function update(Request $request) {



        $whous=  WhousModel :: find($request -> id);
        $whous->update($request->all());

        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);
        return redirect(app()->getLocale() . '/admins/whous/');

    }


}
