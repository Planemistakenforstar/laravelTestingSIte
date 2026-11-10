<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    public function index()
    {

        return view('lessons.lessons', [
            'user' => auth()->user(),
        ]);
    }
}
