<?php


namespace App\Http\Controllers\api\v1;


use App\Http\Controllers\Controller;
use App\Http\Resources\OwnerResource;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{

    public function filterOwners(Request $request)
    {
        $query = $request->query('query');
        $perPage = $request->query('perPage');
        $page = $request->query('page');
        $campaignContact = Owner::where('first_name', 'like', '%' . $query . '%')
            ->orWhere('last_name', 'like', '%' . $query . '%')
            ->paginate($perPage)
            ->appends($page);
        return OwnerResource::collection($campaignContact);
    }

}
