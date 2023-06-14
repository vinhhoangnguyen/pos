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
                            <a href="{{ route('add.employee') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Thêm nhân viên </a>  
                        </ol>
                    </div>
                    <h4 class="page-title">Danh sách nhân viên</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hình</th>
                                    <th>Tên</th>
                                    <th>Số Phone</th>
                                    <th>Email</th>
                                    <th>Lương</th>
                                    <th>Thao tác</th>
                                    
                                </tr>
                            </thead>
        
                        
                            <tbody>

                            @foreach($employees as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td> <img src="{{ asset($item->image) }}" style="width:50px; height: 40px;"> </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ number_format($item->salary, 0,',', '.')  }}</td>
                                    <td>
                                        <a href="{{route('edit.employee', $item->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light" title="Sửa nhân viên"><i class="fas fa-pen"></i></a>
                                        <a href="{{route('delete.employee', $item->id)}}" id="delete" class="btn btn-danger rounded-pill waves-effect waves-light" title="Xoá nhân viên"><i class="fas fa-trash"></i></a>
                                        <a href="" id="{{ $item->id }}" onclick="employeeView(this.id)" data-bs-toggle="modal" data-bs-target="#viewDetail-modal" class="btn btn-info rounded-pill waves-effect waves-light" title="Xem chi tiết"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                                
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->

<!-- View Detail modal content -->
<div id="viewDetail-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Thông tin nhân viên</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                  <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên nhân viên</label>
                                        <p class="text-danger" id="ename">Tên Employee</p>


                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Số điện thoại</label>
                                        <p class="text-danger" id="ephone">Số điện thoại</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Email nhân viên</label>
                                        <p class="text-danger" id="eemail">Email</p>

                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Địa chỉ</label>
                                        <p class="text-danger" id="eaddress">Địa chỉ</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Thành phố</label>
                                        <p class="text-danger"  id="ecity">Thuộc thành phố</p>

                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Lương</label>
                                        <p class="text-danger" id="esalary">Lương nhân viên</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Kinh nghiệm làm việc</label>
                                        <p class="text-danger" id="eexperience">Số năm kinh nghiệm</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Số ngày phép</label>
                                        <p class="text-danger" id="evacation">Số ngày phép</p>

                                    </div>
                                </div>
                               
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Ngày tạo</label>
                                        <p class="text-danger" id="edate">Ngày tạo nhân viên</p>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="example-fileinput" class="form-label">Hình  </label>
                                       <img id="eimage" src="{{ url('backend/upload/no_image.jpg') }}" style="width: 80px; height: 80px">

                                    </div>
                                </div> <!-- end col -->

                                <hr style="height:2px; width:100%; border-width:0; color: #e5e8eb; background-color:#e5e8eb">
                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Thông tin thêm</label>
                                        <p class="text-primary" id="s">Đây chứa thông tin conhân viên.....</p>

                                    </div>
                                </div>




                            </div> <!-- end row -->
                        </div>

                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{-- View Detail Employee Modal --}}
<script>
    function employeeView(id){
       // alert(id);
        $.ajax({
            type: 'GET',
            url: '/employee/view/modal/'+id,
            dataType: 'json',
            success:function(data){
                console.log(data);
                // $('#sinfo').text(data.customer.name);
                $('#ename').text(data.employee.name);
                $('#ephone').text(data.employee.phone);
                $('#eemail').text(data.employee.email);
                $('#eaddress').text(data.employee.address);
                $('#ecity').text(data.employee.city);

                $('#esalary').text(data.employee.salary);
                $('#eexperience').text(data.employee.experience);
                $('#evacation').text(data.employee.vacation);
               
                $('#edate').text(data.employee.created_at);
                $('#eimage').attr('src','/'+data.employee.image );

                //$(#sname').text('Name');
            }
        })
    }
</script>

@endsection