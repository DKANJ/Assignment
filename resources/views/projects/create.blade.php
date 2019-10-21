@extends('layout')

@section('content')


    <h1 class="title">Create a new Project</h1>
    
<form method="POST" action="/projects">
    {{csrf_field()}}

    <div class="field">
    <label class="label" for="title">Project Title</label>
    
    <div class="control">
    
    <input type="text" class="input" name="title" value="{{old('title')}}">
    
    </div>
    </div>
    
    <div class="field">
        <label class="label" for="description">Project Description</label>
        
        <div class="control">
        <textarea name ="description" class="textarea">{{old('description')}}</textarea>
    </div>
    </div>
    
    <div class="field">
        <div class ="control">
        <button type="submit" class="button is-link">Create Project</button>
    </div>
    </div>
    
    
    @if ($errors->any())
    <div class="notification is-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
</form>

@endsection