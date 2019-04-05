@extends('layouts.app')



@section('content')

<h1>Edit Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

    {{-- <form method ="post" action="/posts/{{$post->id}}"> --}}
    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostsController@update', $post->id]]) !!}

        @csrf

        {{-- <input type="hidden" name="_method" value="PUT"> --}}

        <div class="row">
            {!! Form::label('title', 'Title: ') !!}
            <div class="col-md-6">
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}
                {{-- <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}" size=10 maxlength=25> --}}
            </div>
        </div>
        <div class="row">
                {!! Form::label('content', 'Description: ') !!}
            <div class="col-md-6">
                {!! Form::textarea('content', null,['class'=>'form-control', 'rows' => 4, 'cols' => 30, 'maxlength' => 50, 'placeholder' => 'Enter description']) !!}
                {{-- <textarea rows="4" column="10" type="text" name="content" placeholder="Enter content" size=10 maxlength=50>{{$post->content}}</textarea> --}}
            </div>
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="UPDATE" onclick="return confirm('Are you sure?')">

    {!! Form::close() !!}



    {{-- <form method="post" action="/posts/{{$post->id}}"> --}}
    {!! Form::open(['method' => 'DELETE', 'action' => ['PostsController@destroy', $post->id]]) !!}
        
        @csrf

        {{-- <input type="hidden" name="_method" value="DELETE"> --}}

        <input type="submit" class="btn btn-primary" value="DELETE" onclick="return confirm('Are you sure?')">
        
    
    {!! Form::close() !!}


@endsection