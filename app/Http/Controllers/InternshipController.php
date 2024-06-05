<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InternshipController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->search;
        if ($request->search) {
            $data = Internship::where('title', 'LIKE', "%{$searchTerm}%")->paginate(8);
        } else {
            $data = Internship::paginate(8);
        }
        return view('admin.internship.index', compact('data'));
    }

    public function formAdd()
    {
        return view('admin.internship.add');
    }

    public function addAction(Request $request)
    {
        $rules = [
            'title' => 'required',
            'banner' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'desc' => 'required',
            'start_register_date' => 'required',
            'end_register_date' => 'required',
            'contact' => 'required',
            'job' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('flash', 'errorAddRequired');
        }
        $directoryPath = 'public/banner/internship';
        Storage::makeDirectory($directoryPath);
        $fullDirectoryPath = storage_path('app/' . $directoryPath);
        if (!is_dir($directoryPath)) {
            mkdir($fullDirectoryPath, 0755, true);
        } else {
            chmod($fullDirectoryPath, 0755);
        }
        $filePath = $request->banner->store($directoryPath);

        $data = new Internship();
        $data->title = $request->title;
        $data->banner = $filePath;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->start_register_date = $request->start_register_date;
        $data->end_register_date = $request->end_register_date;
        $data->desc = $request->desc;
        $data->contact = $request->contact;
        $data->focus = $request->focus;
        $data->save();

        return redirect()->back()->with('flash', 'successAdd');
    }

    public function detail($id)
    {
        $data = Internship::where('id_internship', $id)->first();

        return view('admin.internship.detail', compact('data'));
    }

    public function formEdit($id)
    {
        $data = Internship::where('id_internship', $id)->first();

        return view('admin.internship.edit', compact('data'));
    }

    public function editAction(Request $request)
    {
        $rules = [
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
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
            $directoryPath = 'public/banner/internship';
            Storage::makeDirectory($directoryPath);
            $fullDirectoryPath = storage_path('app/' . $directoryPath);
            if (!is_dir($directoryPath)) {
                mkdir($fullDirectoryPath, 0755, true);
            } else {
                chmod($fullDirectoryPath, 0755);
            }
            $filePath = $request->banner->store($directoryPath);
            $data = [
                'title' => $request->title,
                'banner' => $filePath,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'desc' => $request->desc,
                'start_register_date' => $request->start_register_date,
                'end_register_date' => $request->end_register_date,
                'contact' => $request->contact,
                'focus' => $request->focus
            ];
        } else {
            $data = [
                'title' => $request->title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'desc' => $request->desc,
                'start_register_date' => $request->start_register_date,
                'end_register_date' => $request->end_register_date,
                'contact' => $request->contact,
                'focus' => $request->focus
            ];
        }

        Internship::where('id_internship', $request->id_internship)->update($data);

        return redirect()->back()->with('flash', 'successUpdate');
    }

    public function deleteAction($id)
    {
        $data = Internship::where('id_internship', $id)->first();
        Storage::delete($data->banner);
        $data->delete();

        return redirect()->back()->with('flash', 'successDelete');
    }
}
