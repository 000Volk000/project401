<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UndefineController extends Controller
{
    public function index($id){
        return view('undefine');
    }
}
