<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function AdminProfileView()
    {
        $id =Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.adminProfile',compact('adminData'));
    }
    //End AdminProfileView method

    public function  StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name=$request->name;
        $data->username=$request->username;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->	updated_at=Carbon::now();
        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            @unlink(public_path('upload/adminImages/'.$data->profile_image));
    //TODO อย่าลืมใส่ตรงนี้ทุกครั้ง
            $filename = $id."_".$file->getClientOriginalName();
            $file->move(public_path('upload/adminImages'),$filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.profile.view')->with($notification);


    }
    //End StoreProfile method
}
