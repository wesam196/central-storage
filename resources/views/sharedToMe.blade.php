@extends('layouts.template')


@section('shareToMeHeader')
<title>Files Shared To Me</title>
@endsection

@section('shareToMeBody')
    <h1>here you can find files other shared to you</h1>

    
    

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