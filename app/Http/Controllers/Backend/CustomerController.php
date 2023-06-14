<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Image;
use Carbon\Carbon;
use App\Models\Customer;

class CustomerController extends Controller
{
     //View All
    public function AllCustomer(){
        $customers = Customer::latest()->get();
        return view('backend.customer.customer_all', compact('customers'));
    }//end Method

    //Add View
    public function AddCustomer(){
        return view('backend.customer.customer_add');
    }//end Method

    //Store
    public function StoreCustomer(Request $request){

        $validateData = $request->validate([
            'name' => 'required|max:200',
            // 'email' => 'required|max:200',
            'phone' => 'required|unique:customers|max:200',
            'address' => 'required|max:400',

        ], [
            'name.required' => 'Tên khách hàng không để trống',
            'phone.required' => 'Số điện thoại khách hàng không để trống',
            'address.required' => 'Địa chỉ khách hàng không để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ]);

        $save_url = null;
        if ($image = $request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('backend/upload/customer/'.$name_gen);
            $save_url = 'backend/upload/customer/'.$name_gen;
        }

        Customer::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'shopname' => $request->shopname,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'city' => $request->city,
            'image' => $save_url,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Khách hàng đã được thêm vào thành công.',
            'alert-type' => 'success'
        );

        return redirect()->route('all.customer')->with($notification);
    } // End Method


    //Edit Customer
    public function EditCustomer($id){
        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }// End Method


    //Update Customer
    public function UpdateCustomer(Request $request){

         // Xác thực dữ liệu
         $validateData = $request->validate([
            'name' => 'required|max:200',
            'phone' => 'required|unique:customers|max:200',
            'address' => 'required|max:400',

        ], [
            'name.required' => 'Tên khách hàng không để trống',
            'phone.required' => 'Số điện thoại khách hàng không để trống',
            'address.required' => 'Địa chỉ khách hàng không để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ]);

        $customer_update = Customer::findOrFail($request->id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('backend/upload/customer/'.$name_gen);
            $save_url = 'backend/upload/customer/'.$name_gen;

            if($customer_update->image){
                unlink($customer_update->image);
            }

            $customer_update->update([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'account_number' => $request->account_number,
                'account_holder' => $request->account_holder,
                'bank_name' => $request->bank_name,
                'bank_branch' => $request->bank_branch,
                'shopname' => $request->shop_name,
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }

        else {
             $customer_update->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'account_number' => $request->account_number,
                'account_holder' => $request->account_holder,
                'bank_name' => $request->bank_name,
                'bank_branch' => $request->bank_branch,
                'shopname' => $request->shop_name,
                'created_at' => Carbon::now(),
            ]);

        }

        $notification = array(
            'message' => 'Cập nhật thông tin khách hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('all.customer')->with($notification);
    }// End Method

    //Delete Customer
    public function DeleteCustomer($id){
        $customer = Customer::findOrFail($id);
        if($customer->image){
            unlink($customer->image);
        }
        $customer->delete();

        $notification = array(
            'message' => 'Khách hàng đã được xóa thành công.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End Method

    // View Detail Modal Loading
    public function customerViewAjax($id){
        $customer = Customer::findOrFail($id);

        return response()->json(array(
         'customer' => $customer,
        ));
    }


}
