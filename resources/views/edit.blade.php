@extends('layouts.template')

@section('editHeader')
<title>Edit File</title>
@endsection


@section('editBody')

    <h1>edit File</h1>
  
    <form action="{{ url('edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Choose a file:</label>
            <input type="file" name="file[]" id="file" required  multiple>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</body>
</html>

@endsection