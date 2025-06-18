<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Http\Request\userrequest;
use Illuminate\Http\Request;

class aboutcontroller extends Controller
{
    //Show the About Us page
    public function index()
    {
        // You can pass data to the view here if needed
        return view('about');
    }
}