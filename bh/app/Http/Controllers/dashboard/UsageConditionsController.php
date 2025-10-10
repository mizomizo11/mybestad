<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\UsageConditions;
use Illuminate\Http\Request;

class UsageConditionsController extends Controller
{
    public function edit() {
        $usage_conditions=  UsageConditions :: find(1);
        return view('admins.usage_conditions.edit', compact('usage_conditions'));
    }
    public function update(Request $request) {
        $privacy_policy=  UsageConditions :: find($request -> id);
        $privacy_policy->update($request->all());
        request()->session()->flash('swal', [
            'title' => "  التحديث  ",
            'message' => "تم التحديث بنجاح",
            'icon' => "success",
            //'position' => "bottom-end",
            'showConfirmButton' => false,
        ]);

        return redirect(app()->getLocale().'/admins/usage-conditions');
    }


}
