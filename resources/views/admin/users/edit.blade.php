@extends('admin.layouts')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить пользователя
                <small>приятные слова..</small>
            </h1>
        </section>
        <section class="content">
            <form action="{{route('users.update', $user->id )}}" id="form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="put">
                <div class="box">
                <div class="box-header with-border">
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder=""
                                   value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder=""
                                   value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="password"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <img src="{{$user->getImage()}}" alt="" width="200" class="img-responsive">
                            <label for="exampleInputFile">Аватар</label>
                            <input type="file"  id="exampleInputFile" name="avatar">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('users.index')}}" class="btn btn-default" > Назад</a>
                    <button class="btn btn-warning pull-right">Змінить</button>
                </div>
            </div>
            </form>
        </section>
    </div>
@endsection