<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Image;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    //View All 
    public function AllEmployee(){
        $employees = Employee::latest()->get();
        return view('backend.employee.employee_all', compact('employees'));
    }//end Method

    //Add View
    public function AddEmployee(){
        return view('backend.employee.employee_add');
    }//end Method

    //Store
    public function StoreEmployee(Request $request){
        //Validate
        $validateData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:employees|max:200',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'city' => 'required|max:200',
            'salary' => 'required|max:200',
            'vacation' => 'required|max:200',  
            'experience' => 'required',  
            'image' => 'required',  
        ], [
            'name.required' => 'Tên nhân viên không được để trống.',
            'email.required' => 'Email nhân viên không được để trống.',
            'email.unique' => 'Email nhân viên đã tồn tại.',
            'phone.required' => 'Số điện thoại nhân viên không được để trống.',
            'address.required' => 'Địa chỉ nhân viên không được để trống.',
            'city.required' => 'Tỉnh thành nhân viên không được để trống.',
            'salary.required' => 'Lương nhân viên không được để trống.',
            'vacation.required' => 'Số ngày phép nhân viên không được để trống.',
            'experience.required' => 'Số năm kinh nghiệm nhân viên không được để trống.',
            'image.required' => 'Hình nhân viên không được để trống.',
        ]);

        //Insert Data
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('backend/upload/employee/'.$name_gen);
        $save_url = 'backend/upload/employee/'.$name_gen;

        Employee::insert([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'vacation' => $request->vacation,
            'city' => $request->city,
            'image' => $save_url,
            'created_at' => Carbon::now(), 

        ]);

        //Notification result
        $notification = array(
            'message' => 'Thêm nhân viên thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification); 
    }//end Method

    //Edit View
    public function EditEmployee($id){
        $employee_edit = Employee::findOrFail($id);
        return view('backend.employee.employee_edit', compact('employee_edit'));
    }//end Method

    //Update
    public function UpdateEmployee(Request $request){

        $employee_id = $request->id;

        if ($request->file('image')) {

            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('backend/upload/employee/'.$name_gen);
            $save_url = 'backend/upload/employee/'.$name_gen;

            Employee::findOrFail($employee_id)->update([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'experience' => $request->experience,
                'salary' => $request->salary,
                'vacation' => $request->vacation,
                'city' => $request->city,
                'image' => $save_url,
                'created_at' => Carbon::now(), 

            ]);

            
        } else{

            Employee::findOrFail($employee_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'experience' => $request->experience,
                'salary' => $request->salary,
                'vacation' => $request->vacation,
                'city' => $request->city, 
                'created_at' => Carbon::now(), 
            ]);

            
        } // End else Condition  
        
        $notification = array(
            'message' => 'Cập nhật nhân viên thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification); 

    } // End Method 

     //Delete
    public function DeleteEmployee($id){
        $employee_delete = Employee::findOrFail($id);

        if($employee_delete->image){
            unlink($employee_delete->image);
        }

        $employee_delete->delete();

        $notification = array(
            'message' => 'Xoá nhân viên thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }//end Method

     // View Detail Modal Loading
     public function employeeViewAjax($id){
        $employee = Employee::findOrFail($id);

        return response()->json(array(
         'employee' => $employee,
        ));
    }


}
