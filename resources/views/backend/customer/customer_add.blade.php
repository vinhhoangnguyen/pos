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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i>
                            </a></li>
                            <li class="breadcrumb-item"><a href="{{ route('all.customer') }}">Quản lý khách hàng</a></li>
                            <li class="breadcrumb-item active">Thêm khách hàng</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Thêm khách hàng</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <form id="add_customer_form" method="POST" action="{{ route('store.customer') }}" enctype="multipart/form-data">
                        @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên khách hàng</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" >
                                         @error('name')
                                  <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"  >
                                        @error('phone')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Email khách hàng</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  >
                                        @error('email')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"  value="{{ old('address') }}" >
                                        @error('address')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Thành phố</label>
                                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"  value="{{ old('city') }}" >
                                        @error('city')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Số tài khoản</label>
                                        <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror"  value="{{ old('account_number') }} " >
                                        @error('account_number')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Chủ tài khoản</label>
                                        <input type="text" name="account_holder" class="form-control @error('account_holder') is-invalid @enderror"  value="{{ old('account_holder') }} " >
                                        @error('account_holder')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên ngân hàng</label>
                                        <input type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror"  value="{{ old('bank_name') }} " >
                                        @error('bank_name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Chi nhánh ngân hàng</label>
                                        <input type="text" name="bank_branch" class="form-control @error('bank_branch') is-invalid @enderror"  value="{{ old('bank_branch') }} " >
                                        @error('bank_branch')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên shop</label>
                                        <input type="text" name="shopname" class="form-control @error('shopname') is-invalid @enderror" value="{{ old('shopname') }}" >
                                        @error('shopname')
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
                                        <img id="showImage" src="{{  url('backend/upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail"
                                                    alt="profile-image">
                                    </div>
                                </div> <!-- end col -->

                            </div> <!-- end row -->

                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Thêm</button>
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
        $('#add_customer_form').validate({
            rules: {
                name: {
                    required : true,
                },
                phone: {
                    required : true,
                },
                address: {
                    required : true,
                },
                city: {
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

                address: {
                    required : 'Địa chỉ không để trống',
                },
                city: {
                    required : 'Thành phố không để trống',
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
