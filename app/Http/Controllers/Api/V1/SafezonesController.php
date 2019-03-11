<?php

namespace App\Http\Controllers\Api\V1;

use App\Safezone;
use App\Http\Controllers\Controller;
use App\Http\Resources\Safezone as SafezoneResource;
use App\Http\Requests\Admin\StoreSafezonesRequest;
use App\Http\Requests\Admin\UpdateSafezonesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class SafezonesController extends Controller
{
    public function index()
    {
        

        return new SafezoneResource(Safezone::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('safezone_view')) {
            return abort(401);
        }

        $safezone = Safezone::with([])->findOrFail($id);

        return new SafezoneResource($safezone);
    }

    public function store(StoreSafezonesRequest $request)
    {
        if (Gate::denies('safezone_create')) {
            return abort(401);
        }

        $safezone = Safezone::create($request->all());
        
        

        return (new SafezoneResource($safezone))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateSafezonesRequest $request, $id)
    {
        if (Gate::denies('safezone_edit')) {
            return abort(401);
        }

        $safezone = Safezone::findOrFail($id);
        $safezone->update($request->all());
        
        
        

        return (new SafezoneResource($safezone))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('safezone_delete')) {
            return abort(401);
        }

        $safezone = Safezone::findOrFail($id);
        $safezone->delete();

        return response(null, 204);
    }
}
