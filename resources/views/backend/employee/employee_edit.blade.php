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
                            <li class="breadcrumb-item"><a href="{{ route('all.employee') }}">Quản lý nhân viên</a></li>
                            <li class="breadcrumb-item active">Cập nhật thông tin nhân viên</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Cập nhật thông tin nhân viên</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <form id="edit_employee_form" method="POST" action="{{ route('update.employee') }}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id" value="{{ $employee_edit->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên nhân viên</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ $employee_edit->name }}" >
                                         @error('name')
                                  <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Email nhân viên</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $employee_edit->email }}"  >
                                        @error('email')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $employee_edit->phone }}"  >
                                        @error('phone')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $employee_edit->address }}"  >
                                        @error('address')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Kinh nghiệm làm việc</label>
                                       <select name="experience" class="form-select @error('experience') is-invalid @enderror" id="example-select">
                                            <option selected disabled>Chọn số năm</option>
                                        <label for="firstname" class="form-label">Địa chỉ</label>
                                            <option value="1 Year" {{ ($employee_edit->experience == '1 Year')? 'selected':'' }}>1 Năm</option>
                                            <option value="2 Year" {{ ($employee_edit->experience == '2 Year')? 'selected':'' }}>2 Năm</option>
                                            <option value="3 Year" {{ ($employee_edit->experience == '3 Year')? 'selected':'' }}>3 Năm</option>
                                            <option value="4 Year" {{ ($employee_edit->experience == '4 Year')? 'selected':'' }}>4 Năm</option>
                                            <option value="5 Year" {{ ($employee_edit->experience == '5 Year')? 'selected':'' }}>5 Năm</option>
                                        </select>
                                        @error('experience')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Lương căn bản</label>
                                        <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ $employee_edit->salary }}"  >
                                        @error('salary')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Ngày nghỉ phép</label>
                                        <input type="text" name="vacation" class="form-control @error('vacation') is-invalid @enderror" value="{{ $employee_edit->vacation }}"  >
                                        @error('vacation')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Thành phố</label>
                                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ $employee_edit->city }}"  >
                                        @error('city')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="example-fileinput" class="form-label">Hình</label>
                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                           <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="example-fileinput" class="form-label"> </label>
                                        <img id="showImage" src="{{ ($employee_edit->image !== null)? url($employee_edit->image): url('backend/upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail"
                                                    alt="profile-image">
                                    </div>
                                </div> <!-- end col -->

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

{{-- Jquery JavaScript: change image --}}
<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload =  function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

{{-- Validate From JS --}}
<script type="text/javascript">
    $(document).ready(function (){
        $('#edit_employee_form').validate({
            rules: {
                name: {
                    required : true,
                },
                phone: {
                    required : true,
                },
                email: {
                    required : true,
                },
                address: {
                    required : true,
                },
                city: {
                    required : true,
                },
                experience: {
                    required : true,
                },
                salary: {
                    required : true,
                },
                vacation: {
                    required : true,
                },


            },
            messages :{
                name: {
                    required : 'Tên không để trống',
                },
                phone: {
                    required : 'Số điện thoại không để trống',
                },
                email: {
                    required : 'Email không để trống',
                },
                address: {
                    required : 'Địa chỉ không để trống',
                },
                city: {
                    required : 'Thành phố không để trống',
                },
                experience: {
                    required : 'Chọn kinh nghiệm làm việc',
                },
                salary: {
                    required : 'Lương nhân viên không để trống',
                },
                vacation: {
                    required : 'Ngày phép không để trống',
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
