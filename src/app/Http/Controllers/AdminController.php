<?php

namespace App\Http\Controllers;

use App\Data;
use App\User;
use App\Language;
use App\Content;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_users=User::get();
        return view('admin', compact(
            'all_users'
        ));
    }

    public function post_data(Request $request)
    {
        return back();
    }
}
