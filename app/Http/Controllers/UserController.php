<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Job;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\JobName;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function about()
    {
        return view('user.about');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function service()
    {
        return view('user.service');
    }

    public function blog()
    {
        return view('user.blog');
    }

    // job
    public function job(Request $request)
    {
        // Inisialisasi query dasar
        $query = Job::query();

        // Periksa dan tambahkan kondisi untuk setiap filter yang diberikan
        if ($request->filled('start_register_date')) {
            $query->where('start_register_date', '>=', $request->start_register_date);
        }

        if ($request->filled('end_register_date')) {
            $query->where('end_register_date', '<=', $request->end_register_date);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('focus')) {
            $query->where('focus', $request->focus);
        }

        // Jalankan query dan dapatkan hasilnya
        $datas = $query->get();

        // Kembalikan view dengan data yang telah difilter
        return view('user.job', compact('datas'));
    }

    public function detailJob($id)
    {
        $data = Job::where('id_job', $id)->first();

        return view('user.detail-job', compact('data'));
    }

    // internship
    public function internship(Request $request)
    {
        // Inisialisasi query dasar
        $query = Internship::query();

        // Periksa dan tambahkan kondisi untuk setiap filter yang diberikan
        if ($request->filled('start_register_date')) {
            $query->where('start_register_date', '>=', $request->start_register_date);
        }

        if ($request->filled('end_register_date')) {
            $query->where('end_register_date', '<=', $request->end_register_date);
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('focus')) {
            $query->where('focus', $request->focus);
        }

        // Jalankan query dan dapatkan hasilnya
        $datas = $query->get();

        // Kembalikan view dengan data yang telah difilter
        return view('user.internship', compact('datas'));
    }

    public function detailInternship($id)
    {
        $data = Internship::where('id_internship', $id)->first();

        return view('user.detail-internship', compact('data'));
    }

    // workshop
    public function workshop(Request $request)
    {
        // Inisialisasi query dasar
        $query = Workshop::query();

        // Periksa dan tambahkan kondisi untuk setiap filter yang diberikan
        if ($request->filled('daterange')) {
            $dates = explode(' - ', $request->daterange);
            $query->where('start_register_date', '>=', $dates[0])
                  ->where('end_register_date', '<=', $dates[1]);
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('focus')) {
            $query->where('focus', $request->focus);
        }

        // Jalankan query dan dapatkan hasilnya
        $datas = $query->get();

        // Kembalikan view dengan data yang telah difilter
        return view('user.workshop', compact('datas'));
    }

    public function detailWorkshop($id)
    {
        $data = Workshop::where('id_workshop', $id)->first();

        return view('user.detail-workshop', compact('data'));
    }
}