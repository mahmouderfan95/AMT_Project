<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Courses\Store;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    public function index(){
        return view('Admin.courses.index');
    }

    public function getData() {
        $courses = Course::orderBy('id','desc')
            ->select();
        return DataTables::of($courses)->smart(true)
            ->addIndexColumn()
            ->editColumn('created_at', function (Course $course) {
                return $course->created_at->format('Y-m-d');
            })
            ->addColumn('actions', function (Course $course) {
                return view('Admin.courses.datatable.actions',compact('course'));
            })
            ->rawColumns(['actions'])
            ->toJson();
    }

    public function create(){
        $users = User::where('person_type','!=','st')->get(['id','name']);
        return view('Admin.courses.create',compact('users'));
    }

    public function store(Store $request){
        try{
            $request->validated();
             toast('added success','success');
            $student = Course::create([
                'name' => $request->name,
                'course_id' => $request->course_id,
                'user_id' => $request->user_id,
                'level' => $request->level,
                'category' => $request->category,
            ]);
            Alert::success('success msg', 'Course Added');
            return redirect(route('courses.index'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id){
        try{
            $course = Course::where('id',$id)
                ->first();
            $users = User::where('person_type','!=','st')->get(['id','name']);
            return view('Admin.courses.edit',compact('course','users'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request){
        try{
//            $request->validated();
            // toast('updated success','success');
            $course = Course::where('id',$request->id)
                ->update([
                    'name' => $request->name,
                    'course_id' => $request->course_id,
                    'user_id' => $request->user_id,
                    'level' => $request->level,
                    'category' => $request->category,
                ]);
//            if($request->image){
//                $filename = time().'.'.$request->image->extension();
//                $request->image->move(public_path('dashboard/uploads/staffs/'), $filename);
//                $student->image = $filename;
//            }
            Alert::success('success msg', 'Course Updated');
            return redirect(route('courses.index'));
            // return redirect()->back();
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        try {
            $course = Course::where('id',$request->id)->first();
//            if ($st->image != null && file_exists(public_path('dashboard/uploads/staffs/' . $st->image))) {
//                unlink('dashboard/uploads/staffs/' . $st->image);
//            }
            $course->delete();
            Alert::success('success message', 'deleted success');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::error('error msg', $exception->getMessage());
            return redirect()->back();
        }
    }
}
