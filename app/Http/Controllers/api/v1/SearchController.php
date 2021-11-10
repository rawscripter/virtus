<?php


namespace App\Http\Controllers\api\v1;


use App\Events\SearchEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyAddressResource;
use App\Models\Owner;
use App\Models\PropertyAddress;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request){
        $searchType = $request->query('type');
        $query = $request->query('query');
        $perPage = $request->query('perPage');
        $results = null;

        if($searchType === 'address') {
            $results= $this->getAddress($query, $perPage);
        }elseif ('owner') {
            $results=  $this->getOwner($query, $perPage);

        }
        event(new SearchEvent($results));
    }


    private function getOwner($query, $perPage){
        return Owner::where('first_name', 'like', '%' . $query . '%')
            ->orWhere('last_name', 'like', '%' . $query . '%')
            ->paginate($perPage);
    }

    private function getAddress($query, $perPage){
        return PropertyAddress::where('property_address', 'like', '%' . $query . '%')
            ->orWhere('property_city', 'like', '%' . $query . '%')
            ->paginate($perPage);
    }
}
