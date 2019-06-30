@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Types
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('notification'))
                        <div class="alert alert-success">
                            {{session('notification')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
								<th>Unsigned Name</th>
                                <th>Category</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($types as $type)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$type->id}}</td>
                                    <td>{{$type->name}}</td>
                                    <td>{{$type->unsigned_name}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/types/delete/{{$type->id}}"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/types/edit/{{$type->id}}">Edit</a></td>
                                </tr>
                            @endforeach
                            <!-- <tr class="even gradeC" align="center">
                                <td>2</td>
                                <td>Bóng Đá</td>
                                <td>Thể Thao</td>
                                <td>Ẩn</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->

@endsection