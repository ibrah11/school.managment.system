<?php

namespace App\Http\Controllers;

//use Illuminate\Request;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
//use Illuminate\Htt\facade\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;




class ClassSubjectController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = ClassSubjectModel::getRecord();

        $data['header_title'] = "Class Subject List";
        return view('admin.assign_subject.list',  $data);
    }

    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_tittle'] = "Assign Subject Add";
        return view('admin.assign_subject.add',  $data);
    }

    public function insert(Request $request)
    {
        if(!empty($request->subject_id))
        {
            foreach ($request->subject_id as $subject_id)
            {
                $save = new ClassSubjectModel;
                $save->class_id = $request->class_id;
                $save->subject_id = $subject_id;
                $save->status = $request->status;
                $save->created_by = Auth::user()->id;
                $save->save();

                return redirect('admin/assign_subject/list')->with('success', "Successful assign subject");
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Due to some error plz try again');
        }
    }
}
