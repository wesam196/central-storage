@extends('layouts.template')


@section('homeHeader')
<title>Home</title>
@endsection

@section('homeBody')

    <h1>welcome {{Auth::user()->name}}</h1>
    <h1>The App work well!!</h1>
    <h1>no errors</h1>

    <h1>{{session('access')}}</h1>

    @if(session()->has('msg'))
            <div class="alert alert-success">
            {{session()->get('msg')}}
            <button data-dismiss="alert" class="close">X</button>
            </div>
            @endif

   <form action="/" method="POST">
    @csrf
    <table>
        <tr>
            <th>file name</th>
            <th>share</th>
            <th>download</th>
            <th>Edit</th>
            
        </tr>
        @foreach($data as $file)
        <tr>
            <th>{{$file->filename}}</th>
            <th><input type="checkbox" name='assigned[]' value="{{$file->id}}" ></th>
            <th><a href="{{ url('/download/' . $file->id) }}" class='btn'>download</a></th>
            <th><a href="{{ url('/edit/' . $file->id) }}" action='' class='btn'>edit</a></th>
           
        </tr>
        @endforeach
    </table>

    <select name="user_id[]" id="chose" class="hidden">
            @foreach($users as $user)
            <option value= "{{$user->id}}" > {{$user->name}} </option>
            @endforeach
        </select>
    <input type="submit" onclick="submit" id="btn" class="hidden">
    
</form>





<script>
const checkboxes = document.getElementsByName('assigned[]');
const button = document.getElementById('btn');
const select = document.getElementById('chose');

function toggleVisibility() {
  const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
  button.classList.toggle('hidden', !anyChecked);
  select.classList.toggle('hidden', !anyChecked);
}

checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', toggleVisibility);
});

// Initial visibility check
toggleVisibility();
</script>

@endsection