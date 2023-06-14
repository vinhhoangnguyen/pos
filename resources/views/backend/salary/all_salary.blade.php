@extends('backend.admin.admin_dasboard')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{ route('all.PaySalary') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Thêm lương tạm ứng </a>
                        </ol>
                    </div>
                    <h4 class="page-title">Bảng lương nhân viên
            </div>
        </div>
        <!-- end page title -->



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Tháng {{ date("n") }} _ năm  {{ date("Y") }}</h4>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Hình</th>
                                    <th>Tên</th>
                                    <th>Tháng</th>
                                    <th>Lương</th>
                                    <th>Tạm ứng</th>
                                    <th>Còn lại</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($employee_salary as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td> <img src="{{ asset($item->image) }}" style="width:50px; height: 40px;"> </td>
                                    <td>{{$item->name}}</td>
                                    <td><span class="badge bg-info text-dark">Tháng {{ date("n", strtotime('-1 month')) }} </span></td>
                                    <td>{{ number_format($item->salary, 0,',', '.') }}</td>
                                    <td>
                                        @if (!isSet($item['advance']['advance_salary']))
                                            <p>Chưa ứng lương</p>
                                        @else
                                            {{ number_format($item['advance']['advance_salary'], 0,',', '.') }}
                                        @endif
                                    </td>
                                    @php
                                        $advanced = $item['advance']['advance_salary'] ?? 0;
                                        $amount = $item->salary - $advanced;
                                    @endphp
                                    <td>
                                        <strong > {{ number_format(round($amount), 0, ',', '.') }} </strong>
                                    </td>
                                    <td>
                                        <a href="{{ route('add.PaySalary',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light">Trả lương</a>
                                        <a href="" id="{{ $item->id }}" onclick="pay_Salary(this.id)" data-bs-toggle="modal" data-bs-target="#viewPaySalary-modal" class="btn btn-info rounded-pill waves-effect waves-light" title="Xem chi tiết"><i class="fas fa-eye"></i></a>

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

<!-- PaySalary Detail modal content -->
<div id="viewPaySalary-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Thông tin chi trả lương</h4>
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
                                        <p class="text-danger" id="pname">Tên Employee</p>


                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Lương nhân viên</label>
                                        <p class="text-danger" id="psalary">Lương nhân viên</p>

                                    </div>
                                </div>




                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Tạm ứng</label>
                                        <p class="text-danger" id="padvance">Lương tạm ứng</p>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 form-group">
                                        <label for="firstname" class="form-label">Lương còn lại</label>
                                        <p class="text-danger" id="pdue">Lương còn lại</p>

                                    </div>
                                </div>

                                <hr style="height:2px; width:100%; border-width:0; color: #e5e8eb; background-color:#e5e8eb">
                            </div> <!-- end row -->
                        </div>

                  </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Huỷ</button>
                <button type="button" class="btn btn-primary">Chi lương</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{-- View Detail Employee Modal --}}
<script>
    function pay_Salary(id){
       //alert(id);
        $.ajax({
            type: 'GET',
            url: '/view/PaySalary/'+id,
            dataType: 'json',
            success:function(data){
                console.log(data);
                // $('#sinfo').text(data.customer.name);
                $('#pname').text(data.employee.name);
                $('#psalary').text(parseInt(data.employee.salary).toLocaleString());
                $('#padvance').text(parseInt(data.advance).toLocaleString());
                $('#pdue').text(parseInt(data.due).toLocaleString());




                //$(#sname').text('Name');
            }
        })
    }
</script>
@endsection
