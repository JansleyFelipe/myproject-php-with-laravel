@extends('layouts.app')



@section('content')

<h1>Create Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

    {{-- <form method ="post" action="/posts"> --}}
        {!! Form::open(['method' => 'POST', 'action' => 'PostsController@store']) !!}

        <div class="row">
                {!! Form::label('title', 'Title: ') !!}
            <div class="col-md-6">
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}
                {{-- <input type="text" name="title" placeholder="Enter title" size=10 maxlength=25> --}}
            </div>
        </div>
        <div class="row">
                {{-- <label for="content">Description: </label> --}}
                {!! Form::label('content', 'Description: ') !!}
            <div class="col-md-6">
                {!! Form::textarea('content', null,['class'=>'form-control', 'rows' => 4, 'cols' => 30, 'maxlength' => 50, 'placeholder' => 'Enter description']) !!}
                {{-- <textarea rows="4" column="10" type="text" name="content" placeholder="Enter content" size=10 maxlength=50></textarea> --}}
            </div>
        </div>
        @csrf

        {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
        {{-- <input type="submit" name="submit"> --}}

    {!! Form::close() !!}

@endsection