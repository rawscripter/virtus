<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Resources\CallResource;
use App\Models\Call;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Owner $owner)
    {
        return CallResource::collection($owner->calls)->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Owner  $owner
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Owner $owner, Request $request)
    {
        $call = Call::query()->make([
            $request->input()
        ]);

        $owner->calls()->save($call);

        return CallResource::make($call)->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Call $call)
    {
        return CallResource::make($call)->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Call $call)
    {
        $call->update($request->input());
        return CallResource::make($call)->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Call $call
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Call $call)
    {
        $call->delete();

        return CallResource::make($call)->response();
    }
}
