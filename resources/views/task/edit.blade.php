@extends('home')

@section('content')
    <div class="col-12 col-md-12" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-12">
                <h1>Cập nhật Task</h1>
            </div>
            <div class="col-12">
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="<?php echo $task->id; ?>"/>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $task->title; ?>"
                               class="form-control"/>
                        @if($errors->has('title'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control"><?php echo $task->content; ?></textarea>
                        @if($errors->has('content'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" value="<?php echo $task->image;?>"class="form-control-file"/>
                        @if($errors->has('image'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('image') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Due_Date</label>
                        <input type="date" name="due_date" value="<?php echo $task->due_date;?>"class="form-control-file"/>
                        @if($errors->has('due_date'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('due_date') }}</p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection