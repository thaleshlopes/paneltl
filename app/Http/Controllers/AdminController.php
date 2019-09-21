<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AuthenticatesUsers;
use Auth;
use Image;

class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}

    public function index(){
    	return view('navbaradmin');
    }
}
