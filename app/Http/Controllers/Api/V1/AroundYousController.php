<?php

namespace App\Http\Controllers\Api\V1;

use App\AroundYou;
use App\Http\Controllers\Controller;
use App\Http\Resources\AroundYou as AroundYouResource;
use App\Http\Requests\Admin\StoreAroundYousRequest;
use App\Http\Requests\Admin\UpdateAroundYousRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class AroundYousController extends Controller
{
    public function index()
    {
        return new AroundYouResource(AroundYou::all());
    }
}
