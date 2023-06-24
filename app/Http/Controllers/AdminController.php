<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Rules\MatchOldPassword;


class AdminController extends Controller
{
    public function AdminProfileView()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.adminProfile', compact('adminData'));
    }

    //End AdminProfileView method

    public function StoreProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->updated_at = Carbon::now();
        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            @unlink(public_path('upload/adminImages/' . $data->profile_image));
            //TODO อย่าลืมใส่ตรงนี้ทุกครั้ง
            $filename = $id . "_" . $file->getClientOriginalName();
            $file->move(public_path('upload/adminImages'), $filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile.view')->with($notification);


    }

    //End StoreProfile method

    public function ChangePasswordView()
    {

        return view('admin.ChangePassword');
    }
    //End ChangePasswordView method

    public function ChangePassword(Request $request){



        $validateData=$request->validate(
            [
                'OldPassword' =>['required',new MatchOldPassword],
                // 'required',
                
                'NewPassword' =>'required',
                'ConfirmPassword'=>'required|same:NewPassword',
            ]
            );

        $hashPassword =Auth::user()->password;
        // if($request->NewPassword!=$request->ConfirmPassword){
        //     $errors=['oldpassword','ไม่ตรงกัน'];
        //     return redirect()->back()->withErrors($errors);
        // }

        if( Hash::check($request->OldPassword, $hashPassword)){

            $users= User::find(Auth::id());
            $users->password = bcrypt($request->NewPassword);
            $users->save();

            session()->flash('message', 'Password changed successfully');
            // return back()->with('error','LOGIN FAILED');
          
            return redirect()->back();


        }else{

            // session()->flash('oldpassword', 'Old password is not match');
            return redirect()->back()->withErrors('oldpassword','Old Password is not match');
        }





    }
    //End ChangePassword method
}
