<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class AdminCon extends Controller
{
    public function home() {
        //$routes = Route::getRoutes()->get();

        return view('admin.home');
        //return response()->json($routes);
    }
}
