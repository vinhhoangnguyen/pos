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
                           <a href="{{ route('add.supplier') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Thêm nhà cung cấp </a>
                        </ol>
                    </div>
                    <h4 class="page-title">Danh sách nhà cung cấp</h4>
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

                                    <th>Tên</th>
                                    <th>Số Phone</th>
                                    <th>Dạng</th>
                                    <th>Địa chỉ</th>
                                    <th>Thao tác</th>

                                </tr>
                            </thead>

                            <tbody>

                            @foreach($suppliers as $key=> $item)
                                <tr>
                                    <td width="3%">{{ $key+1 }}</td>

                                    <td width="10%">{{ $item->name }}</td>
                                    <td width="10%">{{ $item->phone }}</td>
                                    <td width="10%">{{ $item->type }}</td>
                                    <td width="50%">{{ $item->address }}</td>
                                    <td>
                                        <a href="{{route('edit.supplier', $item->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light" title="Sửa nhà cung cấp"><i class="fas fa-pen"></i></a>
                                        <a href="{{route('delete.supplier', $item->id)}}" id="delete" class="btn btn-danger rounded-pill waves-effect waves-light" title="Xoá nhà cung cấp"><i class="fas fa-trash"></i></a>
                                        <a href="" class="btn btn-info rounded-pill waves-effect waves-light" id="{{ $item->id }}" onclick="supplierView(this.id)" data-bs-toggle="modal" data-bs-target="#viewDetail-modal" title="Xem chi tiết"><i class="fas fa-eye"></i></a>

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
                <h4 class="modal-title" id="standard-modalLabel">Thông tin nhà cung cấp</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                  <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên nhà cung cấp</label>
                                        <p class="text-danger" id="sname">Tên supplier</p>


                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Số điện thoại</label>
                                        <p class="text-danger" id="sphone">Số điện thoại</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Email nhà cung cấp</label>
                                        <p class="text-danger" id="semail">Email</p>

                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Địa chỉ</label>
                                        <p class="text-danger" id="saddress">Địa chỉ</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Thành phố</label>
                                        <p class="text-danger"  id="scity">Thuộc thành phố</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Dạng</label>
                                        <p class="text-danger" id="stype">Dạng nhà cung cấp</p>

                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Số tài khoản</label>
                                        <p class="text-danger" id="saccount_number">Số tài khoản nhà cung cấp</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Chủ tài khoản</label>
                                        <p class="text-danger" id="saccount_holder">Chủ tài khoản nhà cung cấp</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên ngân hàng</label>
                                        <p class="text-danger" id="sbank_name">Tên ngân hàng</p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Chi nhánh ngân hàng</label>
                                        <p class="text-danger" id="sbank_branch">Chi nhánh ngân hàng</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tên shop</label>
                                        <p class="text-danger" id="sshopname">nhà cung cấp</p>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <label for="example-fileinput" class="form-label">Hình  </label>
                                       <img id="simage" src="{{ url('backend/upload/no_image.jpg') }}" style="width: 80px; height: 80px">

                                    </div>
                                </div> <!-- end col -->



                                <hr style="height:2px; width:100%; border-width:0; color: #e5e8eb; background-color:#e5e8eb">
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Nhân viên kinh doanh liên lạc</label>
                                        <p class="text-primary" id="scontact_sale">Nhân viên sale nhà cung cấp</p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Số điện thoại bảo hành</label>
                                        <p class="text-primary" id="swarranty_phone">Số điện thoại bảo hành</p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Địa chỉ bảo hành</label>
                                        <p class="text-primary" id="swarranty_address">Địa chỉ bảo hành</p>

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
    function supplierView(id){
       // alert(id);
        $.ajax({
            type: 'GET',
            url: '/supplier/view/modal/'+id,
            dataType: 'json',
            success:function(data){
                console.log(data);
                // $('#sinfo').text(data.supplier.name);
                $('#sname').text(data.supplier.name);
                $('#sphone').text(data.supplier.phone);
                $('#semail').text(data.supplier.email);
                $('#saddress').text(data.supplier.address);
                $('#scity').text(data.supplier.city);
                $('#stype').text(data.supplier.type);
                $('#saccount_number').text(data.supplier.account_number);
                $('#saccount_holder').text(data.supplier.account_holder);
                $('#sbank_name').text(data.supplier.bank_name);
                $('#sbank_branch').text(data.supplier.bank_branch);
                $('#sshopname').text(data.supplier.shopname);
                $('#simage').attr('src','/'+data.supplier.image );
                $('#scontact_sale').text(data.supplier.contact_sale);
                $('#swarranty_phone').text(data.supplier.warranty_phone);
                $('#swarranty_address').text(data.supplier.warranty_address);
                //$('#sname').text('Name');
            }
        })
    }
</script>

@endsection
