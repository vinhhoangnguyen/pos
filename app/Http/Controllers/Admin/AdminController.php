<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //Logout
     /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //Thông báo xuất thành công
        $notification = ['message'=> 'Đăng xuất thành công', 'alert-type' => 'success'];

        return redirect('/')->with($notification);
    }

    //View Profile
    public function AdminProfile(){
        $id = Auth::user()->id;
        $admin_data = User::find($id);
        return view('backend.admin.admin_profile_view', compact('admin_data'));
    }//end method

    //Update Profile
    public function AdminProfileStore(Request $request){
        //Lấy đối tượng user đăng nhập
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        //cập nhật thông tin user
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;

        //Cập nhật hình nếu có: cập nhật link hình, xoá hình cũ...
        $image_path = 'backend/upload/admin_image/';
        if ($request->file('photo')) {
            $image = $request->file('photo');
            $name_gen = date('dmyHi').'.'.$image->getClientOriginalExtension();
            $image_url = $image_path.$name_gen;

            if ($user->photo) {
                unlink($user->photo);
            } 

            Image::make($image)->resize(300,300)->save($image_url);
            $user->photo = $image_url;
        
        } 

        $user->update();
       
        //xuất thông báo trạng thái và quay về trang quản lý
        $notification = [ 'message' => 'Cập nhật hồ sơ thành công', 'alert-type' => 'success'];

        return redirect()->back()->with($notification);

    }//end method

    //Change Password
    public function PasswordChange(){

        return view('backend.admin.admin_change_password');

    }//end method

    //Change Password
    public function PasswordUpdate(Request $request){
         // Xác thực dữ liệu 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',

        ], [
            'old_password.required' => 'Nhập mật khẩu cũ nhé.',
            'new_password.required' => 'Nhập mật khẩu mới nhé.',
            'new_password.confirmed' => 'Mật khẩu mới xác nhận chưa khớp với mật khẩu mới.',
        ]);

        // So khớp mật khẩu cũ
        if (!Hash::check($request->old_password, Auth::user()->password)) {
             
            $notification = [ 'message' => 'Mật khẩu cũ chưa đúng', 'alert-type' => 'error'];
            return back()->with($notification);
        }

        //Cập nhật mật khẩu mới

        User::whereId(Auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        //xuất thông báo trạng thái và quay về trang quản lý
        $notification = [ 'message' => 'Cập nhật mật khẩu thành công', 'alert-type' => 'success'];
        return back()->with($notification);
        
    }//end method


}
