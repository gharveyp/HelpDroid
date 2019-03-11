<?php

namespace App\Http\Controllers\Api\V1;

use App\Help;
use App\Http\Controllers\Controller;
use App\Http\Resources\Help as HelpResource;
use App\Http\Requests\Admin\StoreHelpsRequest;
use App\Http\Requests\Admin\UpdateHelpsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class HelpsController extends Controller
{
    public function index()
    {
        return new HelpResource(Help::all());
    }
}
