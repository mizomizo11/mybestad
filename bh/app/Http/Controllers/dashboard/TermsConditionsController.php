<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\TermsConditions;
use App\Models\UsageConditions;
use Illuminate\Http\Request;

class TermsConditionsController extends Controller
{
    public function edit() {
        $terms_conditions=  TermsConditions :: find(1);
        return view('admins.terms_conditions.edit', compact('terms_conditions'));
    }
    public function update(Request $request) {
        $terms_conditions=  TermsConditions :: find($request -> id);
        $terms_conditions->update($request->all());
        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);

        return redirect(app()->getLocale().'/admins/terms-conditions');
    }


}
