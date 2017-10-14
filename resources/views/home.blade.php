@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">掲示板フォーム</div>

                <div class="panel-body">

<form action="./submit" method="POST">
<div class="form-group">
<label for="title">Title</label>
<input type="text" class="form-control" name="title" id="title" placeholder="Title">
</div>
<div class="form-group">
<label for="body">Body</label>
<textarea class="form-control" name="body" id="body" rows="3"></textarea>
</div>
{{ csrf_field() }}
<button type="submit" class="btn btn-primary">Submit</button>
</form>

                </div>
            </div>
        </div>
    </div>
</div>

@foreach($boards as $board)
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">{{ $board->title }}</div>
<div class="panel-body">
{{ $board->body }}
</div>
</div>
</div>
</div>
@endforeach

@endsection
