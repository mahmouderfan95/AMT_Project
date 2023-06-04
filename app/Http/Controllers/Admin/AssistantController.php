<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Doctors\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class AssistantController extends Controller
{
    public function index(){
        return view('Admin.assistants.index');
    }

    public function getData() {
        $assistants = User::where('person_type','ass')
            ->orderBy('id','desc')
            ->select();
        return DataTables::of($assistants)->smart(true)
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
                return view('Admin.assistants.datatable.actions',compact('user'));
            })
            ->rawColumns(['image','actions'])
            ->toJson();
    }

    public function create(){
        return view('Admin.assistants.create');
    }

    public function store(Store $request){
        try{
            $request->validated();
            // toast('added success','success');
            $assistant = new User();
            if($request->image){
                $filename = time().'.'.$request->image->extension();
                $request->image->move(public_path('dashboard/uploads/staffs/'), $filename);
                $assistant->image = $filename;
            }
            $assistant->name = $request->name;
            $assistant->email = $request->email;
            $assistant->staff_id = $request->staff_id;
            $assistant->password = bcrypt($request->password);
            $assistant->person_type = 'ass';
            $assistant->save();
            Alert::success('success msg', 'Success Added');
            return redirect(route('assistants.index'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id){
        try{
            $assistant = User::where('id',$id)
                ->where('person_type','ass')
                ->first();
            return view('Admin.assistants.edit',compact('assistant'));
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
            $assistant = User::where('id',$request->id)
                ->where('person_type','ass')
                ->first();
            if($request->image){
                $filename = time().'.'.$request->image->extension();
                $request->image->move(public_path('dashboard/uploads/staffs/'), $filename);
                $assistant->image = $filename;
            }
            $assistant->name = $request->name;
            $assistant->email = $request->email;
            $assistant->staff_id = $request->staff_id;
            $assistant->person_type = 'dr';
            $assistant->save();
            return redirect(route('assistants.index'));
        }catch (\Exception $exception){
            Alert::error('error msg',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        try {
            $st = User::where('id',$request->id)->where('person_type','ass')->first();
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
