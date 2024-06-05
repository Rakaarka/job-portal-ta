<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->search;
        if ($request->search) {
            $data = Workshop::where('title', 'LIKE', "%{$searchTerm}%")->paginate(8);
        } else {
            $data = Workshop::paginate(8);
        }
        return view('admin.workshop.index', compact('data'));
    }

    public function formAdd()
    {
        return view('admin.workshop.add');
    }

    public function addAction(Request $request)
    {
        $rules = [
            'title' => 'required',
            'banner' => 'required',
            'date' => 'required',
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
        $directoryPath = 'public/banner/workshop';
        Storage::makeDirectory($directoryPath);
        $fullDirectoryPath = storage_path('app/' . $directoryPath);
        if (!is_dir($fullDirectoryPath)) {
            mkdir($fullDirectoryPath, 0755, true);
        } else {
            chmod($fullDirectoryPath, 0755);
        }
        $filePath = $request->banner->store($directoryPath);

        $data = new Workshop();
        $data->title = $request->title;
        $data->banner = $filePath;
        $data->date = $request->date;
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
        $data = Workshop::where('id_workshop', $id)->first();

        return view('admin.workshop.detail', compact('data'));
    }

    public function formEdit($id)
    {
        $data = Workshop::where('id_workshop', $id)->first();

        return view('admin.workshop.edit', compact('data'));
    }

    public function editAction(Request $request)
    {
        $rules = [
            'title' => 'required',
            'date' => 'required',
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
            $directoryPath = 'public/banner/workshop';
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
                'date' => $request->date,
                'desc' => $request->desc,
                'start_register_date' => $request->start_register_date,
                'end_register_date' => $request->end_register_date,
                'contact' => $request->contact,
                'focus' => $request->focus
            ];
        } else {
            $data = [
                'title' => $request->title,
                'date' => $request->date,
                'desc' => $request->desc,
                'start_register_date' => $request->start_register_date,
                'end_register_date' => $request->end_register_date,
                'contact' => $request->contact,
                'focus' => $request->focus
            ];
        }

        Workshop::where('id_workshop', $request->id_workshop)->update($data);

        return redirect()->back()->with('flash', 'successUpdate');
    }

    public function deleteAction($id)
    {
        $data = Workshop::where('id_workshop', $id)->first();
        Storage::delete($data->banner);
        $data->delete();

        return redirect()->back()->with('flash', 'successDelete');
    }
}
