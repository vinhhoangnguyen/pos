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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ Auth::user()->name }}</a></li>
                            <li class="breadcrumb-item active">Thay đổi mật khẩu</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Thay đổi mật khẩu</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row">
            

            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <form id="update_password_form" method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
                        @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="old_password" class="form-label">Mật khẩu cũ</label>
                                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" value="{{ old('old_password')}}" placeholder="Mật khẩu cũ">
                                        @error('old_password')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="new_password" class="form-label">Mật khẩu mới</label>
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" value="" placeholder="Mật khẩu mới">
                                        @error('new_password')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu </label>
                                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" value="" placeholder="Nhập lần nữa mật khẩu mới">
                                    </div>

                                </div>
                               
                            

                            </div> <!-- end row -->

                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i>Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->

<script type="text/javascript">
    $(document).ready(function (){
        $('#update_password_form').validate({
            rules: {
                old_password: {
                    required : true,
                },  
                new_password: {
                    required : true,
                },  
                new_password_confirmation: {
                    required : true,
                },  
               
            },
            messages :{
                old_password: {
                    required : 'Mật khẩu cũ không để trống',
                }, 
                new_password: {
                    required : 'Mật khẩu mới không để trống',
                }, 
                new_password_confirmation: {
                    required : 'Xác nhận mật khẩu không để trống',
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