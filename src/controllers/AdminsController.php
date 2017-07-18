<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Schema;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('tsameem.admin.dashboard');
    }
}
