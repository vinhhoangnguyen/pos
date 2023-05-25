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
                           <a href="{{ route('add.customer') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Thêm khách hàng </a>
                        </ol>
                    </div>
                    <h4 class="page-title">Danh sách khách hàng</h4>
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
                                    <th>Địa chỉ</th>
                                    <th>Thao tác</th>

                                </tr>
                            </thead>

                            <tbody>

                            @foreach($customers as $key=> $item)
                                <tr>
                                    <td width="3%">{{ $key+1 }}</td>
                                    <td width="7%"> <img src="{{ (!empty($item->image)) ? url($item->image) : url('backend/upload/no_image.jpg') }}" style="width:50px; height: 40px;"> </td>
                                    <td width="10%">{{ $item->name }}</td>
                                    <td width="10%">{{ $item->phone }}</td>
                                    <td width="10%">{{ $item->email }}</td>
                                    <td width="40%">{{ $item->address }}</td>
                                    <td>
                                        <a href="{{route('edit.customer', $item->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light" title="Sửa khách hàng"><i class="fas fa-pen"></i></a>
                                        <a href="{{route('delete.customer', $item->id)}}" id="delete" class="btn btn-danger rounded-pill waves-effect waves-light" title="Xoá khách hàng"><i class="fas fa-trash"></i></a>
                                        <a href="" class="btn btn-info rounded-pill waves-effect waves-light" id="{{ $item->id }}" onclick="customerView(this.id)" data-bs-toggle="modal" data-bs-target="#viewDetail-modal" title="Xem chi tiết"><i class="fas fa-eye"></i></a>
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
                <h4 class="modal-title" id="standard-modalLabel">Thông tin khách hàng</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                  <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên khách hàng</label>
                                        <p class="text-danger" id="cname">Tên supplier</p>


                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Số điện thoại</label>
                                        <p class="text-danger" id="cphone">Số điện thoại</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Email khách hàng</label>
                                        <p class="text-danger" id="cemail">Email</p>

                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Địa chỉ</label>
                                        <p class="text-danger" id="caddress">Địa chỉ</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Thành phố</label>
                                        <p class="text-danger"  id="ccity">Thuộc thành phố</p>

                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Số tài khoản</label>
                                        <p class="text-danger" id="caccount_number">Số tài khoản khách hàng</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Chủ tài khoản</label>
                                        <p class="text-danger" id="caccount_holder">Chủ tài khoản khách hàng</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên ngân hàng</label>
                                        <p class="text-danger" id="cbank_name">Tên ngân hàng</p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Chi nhánh ngân hàng</label>
                                        <p class="text-danger" id="cbank_branch">Chi nhánh ngân hàng</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên shop</label>
                                        <p class="text-danger" id="cshopname">khách hàng</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Ngày tạo</label>
                                        <p class="text-danger" id="cdate">Ngày tạo khách hàng</p>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="example-fileinput" class="form-label">Hình  </label>
                                       <img id="cimage" src="{{ url('backend/upload/no_image.jpg') }}" style="width: 80px; height: 80px">

                                    </div>
                                </div> <!-- end col -->

                                <hr style="height:2px; width:100%; border-width:0; color: #e5e8eb; background-color:#e5e8eb">
                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Giao dịch thực hiện</label>
                                        <p class="text-primary" id="s">Đây chứa thông tin giao dịch khách hàng.....</p>

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

{{-- View Detail Supplier Modal --}}
<script>
    function customerView(id){
       // alert(id);
        $.ajax({
            type: 'GET',
            url: '/customer/view/modal/'+id,
            dataType: 'json',
            success:function(data){
                console.log(data);
                // $('#sinfo').text(data.customer.name);
                $('#cname').text(data.customer.name);
                $('#cphone').text(data.customer.phone);
                $('#cemail').text(data.customer.email);
                $('#caddress').text(data.customer.address);
                $('#ccity').text(data.customer.city);

                $('#caccount_number').text(data.customer.account_number);
                $('#caccount_holder').text(data.customer.account_holder);
                $('#cbank_name').text(data.customer.bank_name);
                $('#cbank_branch').text(data.customer.bank_branch);
                $('#cshopname').text(data.customer.shopname);
                $('#cdate').text(data.customer.created_at);
                $('#cimage').attr('src','/'+data.customer.image );

                //$(#sname').text('Name');
            }
        })
    }
</script>

@endsection
