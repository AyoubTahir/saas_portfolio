<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->first_time) {
            User::where('id', Auth::user()->id)->update(['first_time' => 0]);
        }

        return view('admin.dashboard.index');
    }
}
