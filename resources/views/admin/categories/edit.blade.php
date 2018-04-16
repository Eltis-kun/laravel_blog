@extends('admin.layouts')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Змінити категорію
            </h1>
        </section>
        <section class="content">
            <div class="box">
                {{Form::open(['route'=> ['categories.update', $category->id], 'method' => 'put'])}}
                <div class="box-header with-border">
                </div>
                @include('admin.errors')
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Назва</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name ="title" placeholder="" value="{{$category->title}}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('categories.index')}}" class="btn btn-default" > Назад</a>
                    <button class="btn btn-warning pull-right">Змінить</button>
                </div>
                <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @endsection

