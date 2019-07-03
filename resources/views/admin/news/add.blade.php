@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{$error}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('notification'))
                            <div class="alert alert-success">
                                {{session('notification')}}
                            </div>
                        @endif

                        <form action="admin/news/add" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="categories" id="categories">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="types" id="types">
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title Name</label>
                                <input class="form-control" name="title" placeholder="Please Enter Title Name" />
                            </div>
                            <div class="form-group">
                                <div>
                                    <label>Summary</label>
                                </div>
                                <textarea name="summary" id="demo" rows="3" cols="69,9"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="demo" class="form-control ckeditor" name="content" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Highlight</label>
                                <label class="radio-inline">
                                    <input type="radio" name="highlight" value="0" checked="">No
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="highlight" value="1" checked="">Yes
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" >
                            </div>
                            <button type="submit" class="btn btn-default">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->
@endsection