<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($slug)
    {

        $business = Business::where('slug', $slug)->first();

        return view('buisness', ['business' => $business]);
    }


    public function employeeLogin($business_id, $work_type)
    {

        return view('auth.employeeLogin', ['business_id' => $business_id]);
    }
}
