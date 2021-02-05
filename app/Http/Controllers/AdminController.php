<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function show()
    {   
        $admins = \App\Customer::all();

       
    
        return view('admin.index', [
            'admins' => $admins
        ]);
    
       // return view('customers.dashboard');
    }
}
