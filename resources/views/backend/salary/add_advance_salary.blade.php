@extends('backend.admin.admin_dasboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('all.employee') }}">Quản lý lương nhân viên</a></li>
                            <li class="breadcrumb-item active">Tạm ứng lương nhân viên</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tam ứng lương nhân viên</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <form id="add_employee_form" method="POST" action="{{ route('store.AdvanceSalary') }}" enctype="multipart/form-data">
                        @csrf

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên nhân viên</label>
                                       <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror" id="example-select">
                                            <option selected disabled>Chọn nhân viên</option>
                                        @foreach ($employee as $item)                                         
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                         
                                        </select>
                                        @error('employee_id')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tháng ứng lương</label>
                                        <select name="month" class="form-select @error('month') is-invalid @enderror" id="example-select">
                                            <option selected disabled >Chọn tháng</option>
                                            <option value="01">Tháng 01</option>
                                            <option value="02">Tháng 02</option>
                                            <option value="03">Tháng 03</option>
                                            <option value="04">Tháng 04</option>
                                            <option value="05">Tháng 05</option>
                                            <option value="06">Tháng 06</option>
                                            <option value="07">Tháng 07</option>
                                            <option value="08">Tháng 08</option>
                                            <option value="09">Tháng 09</option>
                                            <option value="10">Tháng 10</option>
                                            <option value="11">Tháng 11</option>
                                            <option value="12">Tháng 12</option> 
                                        </select>
                                        @error('month')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Nội dung ứng lương</label>
                                        <input type="text" name="reason" class="form-control @error('reason') is-invalid @enderror" value="{{ old('reason') }}" >
                                        @error('reason')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mt-5 mb-3 form-group">
                                        <label class="form-label">Ngày ứng lương</label>
                                        <input type="text" name="advance_date" class="form-control @error('advance_date') is-invalid @enderror " value="{{ old('advance_date') }}" data-provide="datepicker" >
                                        @error('advance_date')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="mt-5 mb-3 form-group">
                                        <label for="firstname" class="form-label">Số tiền ứng lương</label>
                                        <input type="text" name="advance_salary" class="form-control @error('advance_salary') is-invalid @enderror" value="{{ old('advance_salary') }}" >
                                        @error('advance_salary')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                            </div> <!-- end row -->

                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Tạm ứng lương</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>

    </div> <!-- container -->

</div> <!-- content -->

{{-- Jquery JavaScript: change image --}}

{{-- Validate From JS --}}
<script type="text/javascript">
    $(document).ready(function (){
        $('#add_employee_form').validate({
            rules: {
                employee_id: {
                    required : true,
                },
                advance_date: {
                    required : true,
                },
                advance_salary: {
                    required : true,
                },
           

            },
            messages :{
                employee_id: {
                    required : 'Vui lòng chọn nhân viên để tạm ứng lương',
                },
                advance_date: {
                    required : 'Chọn ngày tạm ứng lương',
                },
                advance_salary: {
                    required : 'Số tiền tạm ứng lương không để trống',
                },
               
                
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

@endsection
