<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Students\Store;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
;

class StudentController extends Controller
{
    public function index(){
        return view('Admin.students.index');
    }

    public function getData() {
        $students = User::where('person_type','st')
            ->orderBy('id','desc')
            ->select();
        return DataTables::of($students)->smart(true)
            ->addIndexColumn()
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('Y-m-d');
            })
            ->editColumn('image',function (User $user){
                if($user->image == null){
                    $html = '<img width="100" src="'.asset('images/no-image.png').'">';
                }else{
                    $html = '<img width="100" src="'.asset('dashboard/uploads/staffs/' . $user->image).'">';
                }
                return $html;
            })
            ->addColumn('actions', function (User $user) {
                return view('Admin.students.datatable.actions',compact('user'));
            })
            ->rawColumns(['image','actions'])
            ->toJson();
    }

    public function create(){
        return view('Admin.students.create');
    }

    public function store(Store $request){
        try{
            $request->validated();
            // toast('added success','success');
            $student = new User();
            if($request->image){
                $filename = time().'.'.$request->image->extension();
                $request->image->move(public_path('dashboard/uploads/staffs/'), $filename);
                $student->image = $filename;
            }
            $student->name = $request->name;
            $student->email = $request->email;
            $student->staff_id = $request->staff_id;
            $student->st_gpa = $request->st_gpa;
            $student->st_level = $request->st_level;
            $student->st_category = $request->st_category;
            $student->password = bcrypt(123123);
            $student->person_type = 'st';
            $student->save();
            Alert::success('success msg', 'Success Added');
            return redirect(route('students.index'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id){
        try{
            $student = User::where('id',$id)
                ->where('person_type','st')
                ->first();
            return view('Admin.students.edit',compact('student'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function update(Store $request){
        try{
//            return $request;
            $request->validated();
            // toast('updated success','success');
            $student = User::where('id',$request->id)
                ->where('person_type','st')
                ->first();
            if($request->image){
                $filename = time().'.'.$request->image->extension();
                $request->image->move(public_path('dashboard/uploads/staffs/'), $filename);
                $student->image = $filename;
            }
            $student->name = $request->name;
            $student->email = $request->email;
            $student->staff_id = $request->staff_id;
            $student->st_gpa = $request->st_gpa;
            $student->st_level = $request->st_level;
            $student->st_category = $request->st_category;
            $student->person_type = 'st';
            $student->save();
            Alert::success('success msg', 'Success Updated');
            return redirect(route('students.index'));
            // return redirect()->back();
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
        {
            try {
                $st = User::where('id',$request->id)->where('person_type','st')->first();
                if ($st->image != null && file_exists(public_path('dashboard/uploads/staffs/' . $st->image))) {
                    unlink('dashboard/uploads/staffs/' . $st->image);
                }
                $st->delete();
                Alert::success('success message', 'deleted success');
                return redirect()->back();
            } catch (\Exception $exception) {
                Alert::error('error msg', $exception->getMessage());
                return redirect()->back();
            }
        }

}
