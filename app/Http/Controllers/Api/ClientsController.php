<?php

namespace App\Http\Controllers\Api;

use App\Model\Clients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Clients::create([
            'services' => $request['services'],
            'other_services' => $request['other_services'],
            'lastname' => $request['lastname'],
            'firstname' => $request['firstname'],
            'mi' => $request['mi'],
            'age_group' => $request['age_group'],
            'gender' => $request['gender'],
            'email' => $request['email'],
            'mobile_number' => $request['mobile_number'],
            'organization' => $request['organization'],
            'organization_type' => $request['organization_type'],
            'other_org_type' => $request['other_org_type'],
            'province_code' => $request['province_code'],
            'municipality_code' => $request['municipality_code'],
            'barangay_code' => $request['barangay_code'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $clients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }
}
