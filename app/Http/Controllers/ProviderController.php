<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function index()
    {
        return response()->json(Provider::all(), 200);
    }
}
