@extends('home')

@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>My Task</h1></div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Image</th>
                    <th scope="col">Due_Date</th>
                </tr>
                </thead>
                @if(count($tasks) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($tasks as $key => $task)
                        <tr>
                            <th scope="row"{{++$key}}></th>
                            <td>{{$task->title}}</td>
                            <td>{{$task->content}}</td>
                            <td><img src="{{'upload/images/' . $task->image}}" style="height:200px", width=200px></td>
                            <td>{{$task->due_date}}</td>

                            <td><a href="{{ route('task.edit', $task->id) }}">sửa</a></td>
                            <td><a href="{{ route('task.destroy', $task->id) }}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            <a class="btn btn-primary" href="{{ route('task.create') }}">Thêm mới</a>
        </div>
    </div>
@endsection