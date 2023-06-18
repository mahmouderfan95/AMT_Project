<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScheduleTables\Store;
use App\Models\Course;
use App\Models\ScheduleTable;
use App\Models\StudentAttendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
class ScheduleTableController extends Controller
{
    public function index(){
        return view('Admin.ScheduleTables.index');
    }

    public function getData() {
        $ScheduleTables = ScheduleTable::orderBy('id','desc')
            ->select();
        return DataTables::of($ScheduleTables)->smart(true)
            ->addIndexColumn()
            ->editColumn('created_at', function (ScheduleTable $scheduleTable) {
                return $scheduleTable->created_at->format('Y-m-d');
            })
            ->editColumn('course_id', function (ScheduleTable $scheduleTable) {
                return $scheduleTable->course->name;
            })
            ->editColumn('student_id', function (ScheduleTable $scheduleTable) {
                return $scheduleTable->student->name;
            })
            ->addColumn('actions', function (ScheduleTable $scheduleTable) {
                return view('Admin.ScheduleTables.datatable.actions',compact('scheduleTable'));
            })
            ->rawColumns(['actions'])
            ->toJson();
    }

    public function create(){
        $users = User::where('person_type','=','st')
            ->get(['id','name']);
        $courses = Course::get(['id','name']);
        return view('Admin.ScheduleTables.create',compact('users','courses'));
    }

    public function store(Store $request){
        try{
            DB::beginTransaction();
            $request->validated();
            toast('added success','success');
            if (ScheduleTable::where('student_id',$request->user_id)->where('course_id',$request->course_id)->exists()){
                Alert::error('success msg', 'Student Exists!');
                return redirect()->back();
            }else{
                $suc = ScheduleTable::create([
                    'course_id' => $request->course_id,
                    'student_id' => $request->user_id,
                ]);
                // create Attendances
                $att = StudentAttendance::create([
                    'student_id' => $suc['student_id'],
                    'course_id' => $suc['course_id']
                ]);
                Alert::success('success msg', 'Course Added');
                DB::commit();
                return redirect(route('ScheduleTables.index'));
            }
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id){
        try{
            $users = User::where('person_type','=','st')
                ->where('person_type','!=','super')
                ->get(['id','name']);
            $courses = Course::get(['id','name']);
            $suc = ScheduleTable::where('id',$id)->first();
            return view('Admin.ScheduleTables.edit',compact('users','courses','suc'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function update(Store $request){
        try{
            $request->validated();
//             toast('updated success','success');
            $suc = ScheduleTable::where('id',$request->id)
                ->update([
                    'course_id' => $request->course_id,
                    'student_id' => $request->user_id,
                ]);
            Alert::success('success msg', 'Updated');
            return redirect(route('ScheduleTables.index'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        try {
            $ScheduleTables = ScheduleTable::where('id',$request->id)->first();
//            if ($st->image != null && file_exists(public_path('dashboard/uploads/staffs/' . $st->image))) {
//                unlink('dashboard/uploads/staffs/' . $st->image);
//            }
            $ScheduleTables->delete();
            Alert::success('success message', 'deleted success');
            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::error('error msg', $exception->getMessage());
            return redirect()->back();
        }
    }
}
