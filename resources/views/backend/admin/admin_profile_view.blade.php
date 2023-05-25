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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Trí Đức</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $admin_data->name }}</a></li>
                            <li class="breadcrumb-item active">Hồ sơ</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Hồ sơ</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ (!empty($admin_data->photo)) ? url($admin_data->photo) : url('backend/upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail"
                        alt="profile-image">

                        <h4 class="mb-0">{{ $admin_data->name }}</h4>
                        <p class="text-muted">{{ $admin_data->email }}</p>
                       
                        <div class="text-start mt-3">
                           
                            <p class="text-muted mb-2 font-13"><strong>Tên :</strong> <span class="ms-2">{{ $admin_data->name }}</span></p>
                        
                            <p class="text-muted mb-2 font-13"><strong>Số điện thoại :</strong><span class="ms-2">{{ $admin_data->phone }}</span></p>
                        
                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{ $admin_data->email }}</span></p>
                        
                            <p class="text-muted mb-1 font-13"><strong>Quyền hạn :</strong> <span class="ms-2">USA</span></p>
                        </div>                                    

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>   
                    </div>                                 
                </div> <!-- end card -->
            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <form id="profile_store_form" method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                        @csrf

                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Thông tin</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $admin_data->name }}" placeholder="Tên">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="lastname" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone" name="phone"  value="{{ $admin_data->phone }}" placeholder="Số điện thoại">
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="lastname" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"  value="{{ $admin_data->email }}" placeholder="Email">
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Hình hồ sơ</label>
                                            <input type="file" name="photo" id="image" class="form-control">
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                            <label for="example-fileinput" class="form-label"> </label>
                                            <img id="showImage" src="{{ (!empty($admin_data->photo)) ? url($admin_data->photo) : url('backend/upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail"
                                                    alt="profile-image">
                                    </div>
                                </div> <!-- end col -->

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

<script type="text/javascript">
    $(document).ready(function (){
        $('#profile_store_form').validate({
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