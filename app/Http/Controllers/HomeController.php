<?php

namespace App\Http\Controllers;

use App\Models\Unity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        return View::make('home.index');
    }
}
