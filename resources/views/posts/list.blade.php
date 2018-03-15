@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>სტატიები</h1>
@stop

@section('content')
     <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <a href="/new" class="btn btn-success">დამატება</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Text</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post) 
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->text }}</td>
                            <td><a href="/new?language_id=1&display_name={{ $post->display_name }}" class="btn btn-primary btn-xs">რედაქტირება</a> </td>
                        </tr>
                    @endforeach
               </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>


@stop

