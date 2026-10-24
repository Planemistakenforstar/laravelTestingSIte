<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard', [
            'user' => auth()->user(),
        ]);
    }

    public function profile(){
        return view('user.profile', [
            'user'=> auth()->user(),
        ]);
    }


}
