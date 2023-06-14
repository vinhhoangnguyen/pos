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
                            <li class="breadcrumb-item"><a href="{{ route('all.AdvanceSalary') }}">Quản lý lương nhân viên</a></li>
                            <li class="breadcrumb-item active">Cập nhật lương tạm ứng nhân viên</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Cập nhật lương tạm ứng nhân viên</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <form id="edit_advance_form" method="POST" action="{{ route('update.AdvanceSalary') }}">
                        @csrf
                            <input type="hidden" name="advance_id" value="{{ $advance_salary->id }}">
                            <div class="row">
                                 
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label"> Tên nhân viên</label>
                                        <input type="text" value="{{ $advance_salary['employee']['name'] }}" disabled>
                                       
                                    </div>
                                </div>
                            
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label"> Ngày ứng lương   </label>
                                        <input type="date" name="advance_date" class="form-control @error('advance_date') is-invalid @enderror" value="{{ $advance_salary->advance_date }}"   >
                                        @error('advance_date')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Số tiền tạm ứng   </label>
                                        <input type="text" name="advance_salary" class="form-control @error('advance_salary') is-invalid @enderror" value="{{ $advance_salary->advance_salary }}"   >
                                        @error('advance_salary')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Nội dung ứng lương   </label>
                                        <input type="text" name="reason" class="form-control @error('reason') is-invalid @enderror" value="{{ $advance_salary->reason }}"   >
                                        @error('reason')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                              

                            </div> <!-- end row -->

                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>

    </div> <!-- container -->

</div> <!-- content -->



{{-- Validate From JS --}}
<script type="text/javascript">
    $(document).ready(function (){
        $('#edit_advance_form').validate({
            rules: {
                advance_date: {
                    required : true,
                },
                advance_salary: {
                    required : true,
                },
               
            },
            messages :{
                advance_date: {
                    required : 'Chọn ngày ứng lương',
                },
                advance_salary: {
                    required : 'Lương tạm ứng không để trống',
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
