@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>სტატიები</h1>
@stop

@section('content')
    
<div class="col-xs-12">


          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
                @foreach($languages as $lang)
                @if($post != null) 
                <a href="/new?language_id={{ $lang->id }}&display_name={{ $post->display_name }}" class="btn btn-success btn-xs">{{ $lang->name }}</a>
                @else
                 <a href="/new?language_id={{ $lang->id }}" class="btn btn-success btn-xs">{{ $lang->name }}</a>
                  @endif
                @endforeach
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/submit" method="post">
              {!! csrf_field() !!}
              <input type="hidden" name="language_id" value="{{ $language_id }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">ტექსტი</label>
                  <input type="hidden" name="display_name" value="{{ $display_name}}">
                  @if($post != null) 
                  <textarea name="text" class="form-control">{{ $post->text }}</textarea> 
                  @else
                  <textarea name="text" class="form-control"></textarea>
                  @endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">შენახვა</button>
              </div>
            </form>
          </div>
          <!-- /.box -->


        </div>

@stop
