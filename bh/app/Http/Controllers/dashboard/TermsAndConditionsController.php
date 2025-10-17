<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Controllers\Controller;

use App\Models\TermsAndConditionsModel;
use App\Models\TermsConditions;
use Illuminate\Http\Request;


class TermsAndConditionsController extends Controller
{
    public function edit() {
        $termsConditions=  TermsConditions :: find(1);
        return view('dashboard.terms_conditions.edit', compact('termsConditions'));

    }
    public function update(Request $request) {

        $termsAndConditions=  TermsConditions :: find($request -> id);
        $termsAndConditions->update($request->all());

        return redirect('dashboard/terms-conditions');
    }


}
