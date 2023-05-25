<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\AdvanceSalary; 
use App\Models\Employee; 

class AdvanceSalaryController extends Controller
{
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

   // dd($request->all());
       $employee_id = $request->employee_id;
       $advance_salary = $request->advance_salary;
       //dd($request->advance_date);
        $date = Carbon::createFromFormat('m/d/Y', $request->advance_date);
        $month = $date->month; 
        $year = $date->year; 
        //dd($date, $month, $year);
        $advanced = AdvanceSalary::where('month',$month)->where('employee_id',$employee_id)->first();
        if ($advanced === null) {
            AdvanceSalary::insert([
                'employee_id' => $request->employee_id,
                'month' => $month,
                'year' => $year,
                'advance_salary' => $advance_salary,
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

}
