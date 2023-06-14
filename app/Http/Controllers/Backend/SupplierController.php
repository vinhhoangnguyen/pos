<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Image;
use Carbon\Carbon;
use App\Models\Supplier;

class SupplierController extends Controller
{
    //View All
    public function Allsupplier(){
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all', compact('suppliers'));
    }//end Method

    //Add View
    public function Addsupplier(){
        return view('backend.supplier.supplier_add');
    }//end Method

    public function Storesupplier(Request $request){

        $validateData = $request->validate([
            'name' => 'required|max:200',
            'phone' => 'required|unique:suppliers|max:200',
            'address' => 'required|max:400',
            'type' => 'required|max:200',
            // 'account_holder' => 'required|max:200',
            // 'account_number' => 'required',
            // 'image' => 'required',
        ], [
            'name.required' => 'Tên khách hàng không để trống',
            'phone.required' => 'Số điện thoại khách hàng không để trống',
            'address.required' => 'Địa chỉ khách hàng không để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'type.required' => 'Dạng nhà cung cấp không để trống',
        ]);

        $save_url = null;
        if ($image = $request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('backend/upload/supplier/'.$name_gen);
            $save_url = 'backend/upload/supplier/'.$name_gen;
        }

        supplier::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'type' =>$request->type,
            'shopname' => $request->shopname,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'city' => $request->city,
            'image' => $save_url,
            'contact_sale' => $request->contact_sale,
            'warranty_phone' => $request->warranty_phone,
            'warranty_address' => $request->warranty_address,

            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Nhà cung cấp đã được thêm vào thành công.',
            'alert-type' => 'success'
        );

        return redirect()->route('all.supplier')->with($notification);
    } // End Method


    //Edit supplier
    public function Editsupplier($id){
        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit', compact('supplier'));
    }// End Method


    //Update supplier
    public function Updatesupplier(Request $request){

         // Xác thực dữ liệu
         $validateData = $request->validate([
            'name' => 'required|max:200',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'type' => 'required|max:200',

        ], [
            'name.required' => 'Tên khách hàng không để trống',
            'phone.required' => 'Số điện thoại khách hàng không để trống',
            'address.required' => 'Địa chỉ khách hàng không để trống',
            // 'phone.unique' => 'Số điện thoại đã tồn tại',
            'type.required' => 'Dạng nhà cung cấp không để trống',
        ]);

        $supplier_update = Supplier::findOrFail($request->id);

        if ($request->file('image')) {

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('backend/upload/supplier/'.$name_gen);
            $save_url = 'backend/upload/supplier/'.$name_gen;

            if($supplier_update->image){
                unlink($supplier_update->image);
            }

            $supplier_update->update([

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
             $supplier_update->update([
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
            'message' => 'Cập nhật nhà cung cấp thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('all.supplier')->with($notification);
    }// End Method

    //Delete supplier
    public function Deletesupplier($id){
        $supplier = Supplier::findOrFail($id);
        if($supplier->image){
            unlink($supplier->image);
        }
        $supplier->delete();

        $notification = array(
            'message' => 'Nhà cung cấp đã được xóa thành công.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End Method


    // View Detail Modal Loading
    public function SupplierViewAjax($id){
        $supplier = Supplier::findOrFail($id);

        return response()->json(array(
         'supplier' => $supplier,
        ));
    }

}
