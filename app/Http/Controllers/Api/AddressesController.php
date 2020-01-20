<?php

namespace App\Http\Controllers\Api;

use App\Model\Province;
use App\Model\Municipality;
use App\Model\Barangay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;

class AddressesController extends Controller
{
    public function index() 
    {
        return UserResource::collection(User::paginate(10));
    }

    public function addresses(Request $request) 
    {
        $search = $request->address;
        $searchAddresses = Barangay::where('name', 'like', '%'.$search.'%')
            ->orWhereHas('municipality', function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->with(['municipality'=> function ($q) {
                $q->select('code', 'name', 'province_code')
                    ->with('province:code,name');
            }])
            ->orderBy('barangays.name')
            ->get();

        $address = $searchAddresses->map(function ($searchAddress) {
            return [
                "code"=>$searchAddress['code'] ."|". $searchAddress['municipality']['code']  ."|". $searchAddress['municipality']['province']['code'],
                "address"=>$searchAddress['name'] .", ". $searchAddress['municipality']['name']  .", ". $searchAddress['municipality']['province']['name'],
            ];
        });

        return response()->json($address, 200);
            
    }

    public function provinces()
    {
        return Province::orderBy('name', 'ASC')->get();
    }

    public function municipalities(Request $request)
    {
        return Municipality::where('province_code', $request->province_code)->orderBy('name', 'ASC')->get();
    }

    public function barangays(Request $request)
    {
        return Barangay::where('municipality_code', $request->municipality_code)->orderBy('name', 'ASC')->get();
    }
}
