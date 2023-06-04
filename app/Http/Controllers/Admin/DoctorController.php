<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Doctors\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class DoctorController extends Controller
{
    public function index(){
        return view('Admin.doctors.index');
    }

    public function getData() {
        $doctors = User::where('person_type','dr')
            ->orderBy('id','desc')
            ->select();
        return DataTables::of($doctors)->smart(true)
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
                return view('Admin.doctors.datatable.actions',compact('user'));
            })
            ->rawColumns(['image','actions'])
            ->toJson();
    }

    public function create(){
        return view('Admin.doctors.create');
    }

    public function store(Store $request){
        try{
            $request->validated();
            // toast('added success','success');
            $doctor = new User();
            if($request->image){
                $filename = time().'.'.$request->image->extension();
                $request->image->move(public_path('dashboard/uploads/staffs/'), $filename);
                $doctor->image = $filename;
            }
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->staff_id = $request->staff_id;
            $doctor->password = bcrypt($request->password);
            $doctor->person_type = 'dr';
            $doctor->save();
            Alert::success('success msg', 'Success Added');
            return redirect(route('doctors.index'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id){
        try{
            $doctor = User::where('id',$id)
                ->where('person_type','dr')
                ->first();
            return view('Admin.doctors.edit',compact('doctor'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request){
        try{
//            return $request;
//            $request->validated();
            Alert::success('success msg', 'Success Updated');
            $doctor = User::where('id',$request->id)
                ->where('person_type','dr')
                ->first();
            if($request->image){
                $filename = time().'.'.$request->image->extension();
                $request->image->move(public_path('dashboard/uploads/staffs/'), $filename);
                $doctor->image = $filename;
            }
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->staff_id = $request->staff_id;
            $doctor->person_type = 'dr';
            $doctor->save();
            return redirect(route('doctors.index'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        try {
            $st = User::where('id',$request->id)->where('person_type','dr')->first();
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
