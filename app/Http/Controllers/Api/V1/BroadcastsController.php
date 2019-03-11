<?php

namespace App\Http\Controllers\Api\V1;

use App\Broadcast;
use App\Http\Controllers\Controller;
use App\Http\Resources\Broadcast as BroadcastResource;
use App\Http\Requests\Admin\StoreBroadcastsRequest;
use App\Http\Requests\Admin\UpdateBroadcastsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class BroadcastsController extends Controller
{
    public function index()
    {
        

        return new BroadcastResource(Broadcast::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('broadcast_view')) {
            return abort(401);
        }

        $broadcast = Broadcast::with([])->findOrFail($id);

        return new BroadcastResource($broadcast);
    }

    public function store(StoreBroadcastsRequest $request)
    {
        if (Gate::denies('broadcast_create')) {
            return abort(401);
        }

        $broadcast = Broadcast::create($request->all());
        
        

        return (new BroadcastResource($broadcast))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateBroadcastsRequest $request, $id)
    {
        if (Gate::denies('broadcast_edit')) {
            return abort(401);
        }

        $broadcast = Broadcast::findOrFail($id);
        $broadcast->update($request->all());
        
        
        

        return (new BroadcastResource($broadcast))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('broadcast_delete')) {
            return abort(401);
        }

        $broadcast = Broadcast::findOrFail($id);
        $broadcast->delete();

        return response(null, 204);
    }
}
