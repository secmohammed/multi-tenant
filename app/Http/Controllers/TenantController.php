<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function switch(Company $company)
    {
        session()->put('tenant', $company->uuid);

        return redirect('/home');
    }
}
