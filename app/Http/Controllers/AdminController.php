<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Job;
use App\Models\Workshop;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $countWorkshop = Workshop::count();
        $countInternship = Internship::count();
        $countJob = Job::count();

        return view('admin.dashboard', compact('countWorkshop', 'countInternship', 'countJob'));
    }
}
