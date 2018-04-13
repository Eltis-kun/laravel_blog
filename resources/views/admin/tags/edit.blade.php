@extends('admin.layouts')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Добавить тег
            </h1>
        </section>
        <section class="content">
            <div class="box">
                {{Form::open(['route'=> [
                'tags.update', $tag->id],
                 'method' => 'put'
                 ])}}
                <div class="box-header with-border">
                </div>
                @include('admin.errors')
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name ="title" placeholder="" value="{{$tag->title}}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('tags.index')}}" class="btn btn-default" > Назад</a>
                    <button class="btn btn-warning pull-right">Змінить</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
    </div>
    @endsection