<?php

namespace App\Http\Controllers;

use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->kindusers;
                switch ($role) {
                    case '1':
                        return view('Panel.Admin_Panel');
                        break;
                    case '2':
                        return view('Panel.Candidate_panel');
                        break;
                    case '3':
                        return view('Panel.Examiner_Panel');
                        break;
                    case '4':
                        return view('Panel.Instructures_Panel');
                        break;
                    default:
                        return view('auth.login');

                }
    }




}
