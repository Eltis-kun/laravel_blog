@extends('admin.layouts')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг сущности</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('announcements.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Теги</th>
                            <th>Картинка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($announcements as $announcement)
                        <tr>
                            <td>{{$announcement->id}}</td>
                            <td>{{$announcement->title}}</td>
                            <td>{{$announcement->getCategoryTitle()}}</td>
                            <td>{{$announcement->getTagsTitles()}}</td>
                            <td>
                                <img src="{{$announcement->getImage()}}" alt="" width="100">
                            </td>
                            <td>
                                <a href="{{route('announcements.edit', $announcement->id)}}" class="fa fa-pencil"></a>

                                <form action="{{route('announcements.destroy', $announcement->id)}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button onclick="return confirm('Ви дійсно хочете видалити цього юзера?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection