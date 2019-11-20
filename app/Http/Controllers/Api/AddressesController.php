<?php

namespace App\Http\Controllers\Api;

use App\Model\Provinces;
use App\Model\Municipalities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;

class AddressesController extends Controller
{
    public function index() 
    {
        return UserResource::collection(User::paginate(10));
    }

    public function provinces()
    {
        return Provinces::orderBy('name', 'ASC')->get();
    }

    public function municipalities(Request $request)
    {
        return Municipalities::where('province_code', $request->province_code)->orderBy('name', 'ASC')->get();
    }
}
