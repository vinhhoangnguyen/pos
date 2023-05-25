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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('all.employee') }}">Quản lý lương nhân viên</a></li>
                            <li class="breadcrumb-item active">Bảng tạm ứng lương nhân viên</li>
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
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Month</th>
                                    <th>Salary</th>
                                    <th>Advance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($salary as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td> <img src="{{ asset($item->employee->image) }}" style="width:50px; height: 40px;"> </td>
                                    <td>{{ $item['employee']['name'] }}</td>
                                    <td>{{ $item->month }}</td>
                                    <td>{{ $item['employee']['salary'] }}</td>
                                    <td>{{ $item->advance_salary }}</td>
                                    <td>
                                        <a href="{{ route('edit.employee',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
                                        <a href="{{ route('delete.employee',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>

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
