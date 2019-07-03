@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New
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
                                <th>Title</th>
                                <th>Summary</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>View</th>
                                <th>Highlight</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $new)
                            <tr class="odd gradeX" align="center">
                                <td>{{$new->id}}</td>
                                <td>
                                <p>{{$new->title}}</p>
                                    <img width="100px" src="upload/tintuc/{{$new->image}}" alt="">
                                </td>
                                <td>{{$new->summary}}</td>
                                <td>{{$new->types->categories->name}}</td>
                                <td>{{$new->types->name}}</td>
                                <td>{{$new->view}}</td>
                                <td>
                                    @if($new->highlight == 0)
                                        {{"No"}}
                                    @else
                                        {{"Yes"}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/news/delete/{{$new->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news/edit/{{$new->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->

@endsection