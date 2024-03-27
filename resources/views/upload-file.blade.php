@extends('layouts.template')

@section('uploadHeader')

<title>Upload File</title>

@endsection


@section('uploadBody')
@if(session()->has('msg'))
            <div class="alert alert-success">
            {{session()->get('msg')}}
            <button data-dismiss="alert" class="close">X</button>
            </div>
            @endif
<h1>Upload File</h1>
  
    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Choose a file:</label>
            <input type="file" name="file[]" id="file" required  multiple>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>


@endsection