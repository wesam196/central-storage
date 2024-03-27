@extends('layouts.template')


@section('shareToOtherHeader')
    <title>Files Shared To Other </title>
@endsection
  

@section('shareToOtherBody')

    <h1>{{session('msg')}}</h1>

    <h1>here you can find files you shared to other users</h1>

    
    

    <table>
    <tr>
        <th>File Name</th>
        <th>Sent To</th>
    </tr>
    @foreach($fulldata as $row)
    <tr>
        <td>{{ $row['filename'] }}</td> <!-- Accessing the file name from the $row array -->
        <td>{{ $row['shared_to'] }}</td> <!-- Accessing the shared_to field from the $row array -->
    </tr>
    @endforeach
</table>

{{ $shares->withQueryString()->links('pagination::bootstrap-5') }}

@endsection