<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\StudentAttendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use function Ramsey\Collection\offer;

class WebsiteController extends Controller
{
    public function staffList(Request $request){
        $search = $request['search'] ? $request['search'] : "";
        $person = $request['person_type'];
        $created = $request['created_at'];
        if ($search !== ""){
//            dd('yes');
            $staffs = User::where('person_type','!=','st')
                ->where('person_type','!=','super')
                ->where('name','LIKE',"%$search%")
                ->orWhere('email','LIKE',"%$search%")
                ->paginate(10);
        }elseif($person != ""){
            $staffs = User::where('person_type',$request->person_type)
//                ->Orwhere('created_at',$request->created_at)
                ->paginate(10);
        }elseif($created != ""){
            $staffs = User::where('created_at',$request->created_at)
                ->paginate(10);
        }elseif($request->person_type != "" || $request->created_at != ""){
            $staffs = User::where('person_type',$request->person_type)
                ->Orwhere('created_at',$request->created_at)
                ->paginate(10);
        }else{
//            dd('no');
            $staffs = User::where('person_type','!=','st')
                ->where('person_type','!=','super')
                ->orderBy('id','desc')
                ->paginate(10);
        }
        return view('website.staff_list',compact('staffs','search'));
    }
    public function studentList(Request $request){
        $search = $request['search'] ? $request['search'] : "";
        $st_category = $request['st_category'];
        $st_level = $request['st_level'];
        if ($search != ""){
            $students = User::where('person_type','st')
                ->where('name','LIKE',"%$search%")
                ->orWhere('email','LIKE',"%$search%")
                ->paginate(10);
        }elseif($st_category != ""){
            $students = User::where('person_type','st')
                ->where('st_category',$request->st_category)
                ->paginate(10);
        }elseif($st_level != ""){
            $students = User::where('person_type','st')
                ->where('st_level',$request->st_level)
                ->paginate(10);
        }else{
            $students = User::where('person_type','st')
                ->orderBy('id','desc')
                ->paginate(10);
        }
        return view('website.student_list',compact('students','search'));
    }
    public function courseList(){
        $courses = Course::get();
        $users = User::where('person_type','!=','st')->where('person_type','!=','super')->get(['id','name']);
        if (auth('web')->user()->person_type == 'super'){
            return view('website.course_list',compact('courses','users'));
        }else{
            return view('website.staff_course_list',compact('courses','users'));
        }
    }
    public function report(){
        return view('website.report');
    }
    public function addStaff(Request $request){
        try{
            Alert::success('success message','Staff Added Success');
            $staff = new User();
            if($request->image){
                $filename = time().'.'.$request->image->extension();
                $request->image->move(public_path('dashboard/uploads/staffs/'), $filename);
                $staff->image = $filename;
            }
            $staff->name = $request->name;
            $staff->email = $request->email;
            $staff->staff_id = $request->staff_id;
            $staff->password = bcrypt($request->password);
            $staff->person_type = $request->person_type;
            $staff->save();
            return redirect()->back();
        }catch (\Exception $exception){
            Alert::success('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }
    public function addStudent(Request $request){
        try{
            Alert::success('success message','Staff Added Success');
            $student = new User();
            if($request->image){
                $filename = time().'.'.$request->image->extension();
                $request->image->move(public_path('dashboard/uploads/staffs/'), $filename);
                $student->image = $filename;
            }
            $student->name = $request->name;
            $student->email = $request->email;
            $student->staff_id = $request->staff_id;
            $student->password = bcrypt($request->password);
            $student->person_type = 'st';
            $student->st_gpa = $request->st_gpa;
            $student->st_level = $request->st_level;
            $student->st_category = $request->st_category;
            $student->save();
            return redirect()->back();
        }catch (\Exception $exception){
            Alert::success('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }
    public function mangeAttendance(){
        if (auth('web')->user()->person_type == 'super'){
            return view('website.mangeAttendance');
        }else{
            $courses = Course::where('user_id',auth('web')->user()->id)->get(['id','name','level']);
            return view('website.staffMangeAttendance',compact('courses'));
        }
    }
    public function addCourse(Request $request){
        try{
            $course = Course::create([
               'name' => $request->name,
               'course_id'  =>$request->course_id,
               'user_id' => $request->user_id,
               'level' => $request->level,
                'category' => $request->category
            ]);
            return redirect()->back();
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function getStaffs(Request $request){
        try{
            $course_id = $request['course_id'];
            $category = $request['category'];
            $level = $request['level'];
            if ($course_id != ""){
//            dd('yes');
                $staffs = Course::where('id',$request->course_id)
//                    ->where('person_type','!=','super')
                    ->paginate(10);
            }elseif($category != ""){
//                dd('cat');
                $staffs = Course::where('category',$request->category)
//                    ->where('person_type','st')
                    ->paginate(10);
            }elseif($level != ""){
//                dd('lev');
                $staffs = Course::where('level',$request->level)
//                    ->where('person_type','st')
                    ->paginate(10);
            }else{
//            dd('no');
                $staffs = Course::orderBy('id','desc')
//                    ->where('person_type','!=','super')
                    ->paginate(10);
            }
            $courses = Course::get(['id','name']);
            return view('website.getStaffs',compact('staffs','courses'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function deleteUser($id){
        try{
            Alert::success('success msg','Deleted Success');
            $user = User::where('id',$id)->first();
            if ($user){
                $user->delete();
                return redirect()->back();
            }
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }
    public function searchUser(Request $request){
        try{
            $search = $request->search;
            if ($search !== ""){
                $user = User::where('staff_id',$request->search)->first();
                return view('website.data_after_search',compact('user'));
            }
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function attendSt($st_id,$course_id,$att){
        try{
            Alert::success('Student attend','Attend Now');
            $attend = StudentAttendance::where('student_id',$st_id)->where('course_id',$course_id)
                ->first();
            if ($att == 1){
                $attend->lecturer_one = true;
                $attend->save();
                return redirect()->back();
            }elseif($att == 2){
                $attend->lecturer_two = true;
                $attend->save();
                return redirect()->back();
            }elseif($att == 3){
                $attend->lecturer_three = true;
                $attend->save();
                return redirect()->back();
            }elseif($att == 4){
                $attend->lecturer_four = true;
                $attend->save();
                return redirect()->back();
            }elseif($att == 5){
                $attend->lecturer_five = true;
                $attend->save();
                return redirect()->back();
            }elseif($att == 6){
                $attend->lecturer_six = true;
                $attend->save();
                return redirect()->back();
            }elseif($att == 7){
                $attend->lecturer_seven = true;
                $attend->save();
                return redirect()->back();
            }elseif($att == 8){
                $attend->lecturer_eight = true;
                $attend->save();
                return redirect()->back();
            }else{
                $attend->lecturer_nine = true;
                $attend->save();
                return redirect()->back();
            }
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }
}
