<?php

namespace App\Http\Controllers;

use App\Company;
use App\Events\Tenant\TenantWasCreated;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $company = Company::make([
            'name' => $request->name
        ]);

        $request->user()->companies()->save($company);

        event(new TenantWasCreated($company));

        return redirect()->route('tenant.switch', $company);
    }
}
