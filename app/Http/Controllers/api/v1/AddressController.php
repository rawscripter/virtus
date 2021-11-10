<?php


namespace App\Http\Controllers\api\v1;


use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyAddressResource;
use App\Models\PropertyAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{


    function index(){
        $properties = PropertyAddressResource::collection(PropertyAddress::all())->response();
        return $properties;
    }


    public function filterAddresses(Request $request)
    {
        $query = $request->query('query');
        $perPage = $request->query('perPage');
        $page = $request->query('page');
        $campaignContact = PropertyAddress::where('property_address', 'like', '%' . $query . '%')
            ->orWhere('property_city', 'like', '%' . $query . '%')
            ->paginate($perPage)
            ->appends($page);

        return PropertyAddressResource::collection($campaignContact);
    }

}
