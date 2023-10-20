@extends('layout.layout')
@section('page-header')
    <x-page-header title="List All Posts" />
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <button class="btn btn-success">Add new Post</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                            aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Post title
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">Pots Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending">Action
                                        </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                    <td>
                                        <img src="{{asset($post->image)}}" style="width: 150px" alt="">
                                    </td>
                                    <td>
                                        <button class="btn btn-info">Edit</button>
                                        <button class="btn btn-danger ml-2">Delete</button>
                                    </td>
                                </tr>
                               @endforeach
                            
                            </tbody>
                           
                        </table>
                    </div>
                </div>
              
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
