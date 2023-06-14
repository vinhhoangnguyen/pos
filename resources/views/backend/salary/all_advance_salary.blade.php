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
                            <a href="{{ route('add.AdvanceSalary') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Thêm lương tạm ứng </a>
                        </ol>
                    </div>
                    <h4 class="page-title">Bảng tạm ứng lương nhân viên
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
                                    <th>Sl</th>
                                    <th>Hình</th>
                                    <th>Tên</th>
                                    <th>Tháng ứng lương</th>
                                    <th>Lương</th>
                                    <th>Tạm ứng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($salary as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td> <img src="{{ asset($item->employee->image) }}" style="width:50px; height: 40px;"> </td>
                                    <td>{{ $item['employee']['name'] }}</td>
                                    <td><span class="badge bg-info text-dark">Tháng {{ $item->month }} _ năm {{ $item->year }} </span></td>
                                    <td>{{ number_format($item['employee']['salary'], 0,',', '.')  }}</td>
                                    <td>{{ number_format($item->advance_salary, 0,',', '.') }}</td>
                                    <td>
                                        <a href="{{route('edit.AdvanceSalary', $item->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light" title="Sửa lương tạm ứng"><i class="fas fa-pen"></i></a>
                                        <a href="{{route('delete.AdvanceSalary', $item->id)}}" id="delete" class="btn btn-danger rounded-pill waves-effect waves-light" title="Xoá lương tạm ứng"><i class="fas fa-trash"></i></a>
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



@endsection
