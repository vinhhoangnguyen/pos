<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\AdvanceSalary;
use App\Models\PaySalary;
use App\Models\Employee;

class SalaryController extends Controller
{

    ///////////////////////////////// ADVANCE SALARY /////////////////////////////////
    //Add Advance Salary
    public function add_AdvanceSalary(){

        $employee = Employee::latest()->get();
        return view('backend.salary.add_advance_salary',compact('employee'));

    }// End Method

    //Store
    public function store_AdvanceSalary(Request $request){
        //Validate
        $validateData = $request->validate([
            'employee_id' => 'required',
            'advance_date' => 'required',
            'advance_salary' => 'required',
        ], [
            'employee_id.required' => 'Chọn nhân viên ứng lương.',
            'advance_date.required' => 'Chọn ngày ứng lương để trống.',
            'advance_salary.required' => 'Nhập số tiền lương tạm ứng.',
        ]);

        $employee_id = $request->employee_id;
        $advance_salary = $request->advance_salary;

        $date = Carbon::createFromFormat('Y-m-d', $request->advance_date);
        $month = $date->month;
        $year = $date->year;

        $advanced = AdvanceSalary::where('employee_id', $employee_id)->where('month','>=', $month)->where('year','>=', $year)->first();
        if ($advanced === null) {
            AdvanceSalary::insert([
                'employee_id' => $request->employee_id,
                'advance_date' => $request->advance_date,
                'month' => $month,
                'year' => $year,
                'advance_salary' => $advance_salary,
                'reason' => $request->reason,
                'created_at' => Carbon::now(),
            ]);

            //Notification result
            $notification = array(
                'message' => 'Tạm ứng lương nhân viên thành công',
                'alert-type' => 'success'
            );

            return redirect()->route('all.AdvanceSalary')->with($notification);
        } else {
             //Notification result
             $notification = array(
                'message' => 'Nhân viên đã tạm ứng lương tháng này rồi',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        }

    }//end Method

    // All Advance Salary
    public function all_AdvanceSalary(){

        $salary = advancesalary::latest()->get();
        return view('backend.salary.all_advance_salary',compact('salary'));

    }// End Method

    //Edit Advance Salary
    public function edit_AdvanvceSalary($id){
        // $advance_employee = Employee::with('advance')->get();

        $advance_salary = advancesalary::findOrFail($id);
        return view('backend.salary.edit_advance_salary', compact('advance_salary'));
    }// End Method

    //Update Advance Salary
    Public function update_AdvanvceSalary(Request $request){
        //validate
        $validateData = $request->validate([
            'advance_date' => 'required',
            'advance_salary' => 'required',
        ], [
            'advance_date.required' => 'Chọn ngày ứng lương để trống.',
            'advance_salary.required' => 'Nhập số tiền lương tạm ứng.',
        ]);

        //Cập nhật, thông báo và chuyển hướng
        $date = Carbon::createFromFormat('Y-m-d', $request->advance_date);
        $month = $date->month;
        $year = $date->year;
        $advance_id = $request->advance_id;

        $advance_edit = AdvanceSalary::findOrFail($advance_id);

        $advanced = $advance_edit->where('month','>', $month)->where('year','>=', $year)->first();

        //dd($advanced);
        if ($advanced === null) {
            $advance_edit->update([
                // 'emloyee_id'=>$request->employee_id,
                'advance_date'=>$request->advance_date,
                'month'=> $month,
                'year'=> $year,
                'advance_salary'=>$request->advance_salary,
                'reason'=>$request->reason,
            ]);

            //Notification result
            $notification = array(
                'message' => 'Nội dung tạm ứng lương nhân viên cập nhật thành công',
                'alert-type' => 'success'
            );

            return redirect()->route('all.AdvanceSalary')->with($notification);

        } else {
           //Notification result
           $notification = array(
            'message' => 'Nhân viên này đã tạm ứng lương rồi.',
            'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);

        }

    }

    //Edit Advance Salary
    public function delete_AdvanvceSalary($id){

        $deleted_salary = AdvanceSalary::findOrFail($id)->delete();
        //Notification result
        $notification = array(
            'message' => 'Xoá tạm ứng lương nhân viên thành công.',
            'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }// End Method

    ///////////////////////////////// PAY SALARY /////////////////////////////////

     //All Salary
    public function all_PaySalary(){

        $employee_salary = Employee::latest()->get();

        return view('backend.salary.all_salary',compact('employee_salary'));
    }// End Method

     // View PaySalary Detail Modal Loading
    public function view_PaySalary($id){
        //$employee = Employee::with('advance')->findOrFail($id);
        $employee = Employee::findOrFail($id);

        $advance = $employee->advance->advance_salary ?? 0;
        $due = $employee->salary - $advance;
        return response()->json(array(
         'employee' => $employee,
         'advance' => $advance,
         'due' => $due
        ));
    }

}
