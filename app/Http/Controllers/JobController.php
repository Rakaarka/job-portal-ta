<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->search;
        if ($request->search) {
            $data = Job::where('title', 'LIKE', "%{$searchTerm}%")->paginate(8);
        } else {
            $data = Job::paginate(8);
        }
        return view('admin.job.index', compact('data'));
    }

    public function formAdd()
    {
        return view('admin.job.add');
    }

    public function addAction(Request $request)
    {
        $rules = [
            'title' => 'required',
            'banner' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'start_register_date' => 'required',
            'end_register_date' => 'required',
            'contact' => 'required',
            'focus' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('flash', 'errorAddRequired');
        }
        $directoryPath = 'public/banner/job';
        Storage::makeDirectory($directoryPath);
        $fullDirectoryPath = storage_path('app/' . $directoryPath);
        if (!is_dir($fullDirectoryPath)) {
            mkdir($fullDirectoryPath, 0755, true);
        } else {
            chmod($fullDirectoryPath, 0755);
        }
        $filePath = $request->banner->store($directoryPath);

        $data = new Job();
        $data->title = $request->title;
        $data->banner = $filePath;
        $data->category = $request->category;
        $data->desc = $request->desc;
        $data->start_register_date = $request->start_register_date;
        $data->end_register_date = $request->end_register_date;
        $data->contact = $request->contact;
        $data->focus = $request->focus;
        $data->save();

        return redirect()->back()->with('flash', 'successAdd');
    }

    public function detail($id)
    {
        $data = Job::where('id_job', $id)->first();

        return view('admin.job.detail', compact('data'));
    }

    public function formEdit($id)
    {
        $data = Job::where('id_job', $id)->first();

        return view('admin.job.edit', compact('data'));
    }

    public function editAction(Request $request)
    {
        $rules = [
            'title' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'start_register_date' => 'required',
            'end_register_date' => 'required',
            'contact' => 'required',
            'focus' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('flash', 'errorAddRequired');
        }
        if ($request->banner) {
            $directoryPath = 'public/banner/job';
            Storage::makeDirectory($directoryPath);
            $fullDirectoryPath = storage_path('app/' . $directoryPath);
            if (!is_dir($fullDirectoryPath)) {
                mkdir($fullDirectoryPath, 0755, true);
            } else {
                chmod($fullDirectoryPath, 0755);
            }
            $filePath = $request->banner->store($directoryPath);
            $data = [
                'title' => $request->title,
                'banner' => $filePath,
                'category' => $request->category,
                'desc' => $request->desc,
                'start_register_date' => $request->start_register_date,
                'end_register_date' => $request->end_register_date,
                'contact' => $request->contact,
                'focus' => $request->focus
            ];
        } else {
            $data = [
                'title' => $request->title,
                'category' => $request->category,
                'desc' => $request->desc,
                'start_register_date' => $request->start_register_date,
                'end_register_date' => $request->end_register_date,
                'contact' => $request->contact,
                'focus' => $request->focus
            ];
        }

        Job::where('id_job', $request->id_job)->update($data);

        return redirect()->back()->with('flash', 'successUpdate');
    }

    public function deleteAction($id)
    {
        $data = Job::where('id_job', $id)->first();
        Storage::delete($data->banner);
        $data->delete();

        return redirect()->back()->with('flash', 'successDelete');
    }
}
