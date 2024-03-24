<!DOCTYPE html>

<html>
<head>

<title>Home File</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-primary" id="nav_background">
  <div class="container-fluid">
    <div class="navbar-brand">
      <img src="images\cropped-masar_logo-1-1-60x86.png" alt="logo">
    </div>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link text-white" href="/">Home </a>
        <a class="nav-item nav-link text-white" href="{{url('/upload')}}">upload</a>
        <a class="nav-item nav-link text-white" href="{{url('/upload')}}">files shred to me</a>
        <a class="nav-item nav-link text-white" href="{{url('/upload')}}">files shred to other</a>

   
        @if (Route::has('login'))
        @auth
        <x-app-layout>
        </x-app-layout>
        @else
        <a href="{{ route('register') }}" class="nav-item nav-link text-white">Register</a>
        <a href="{{ route('login') }}" class="nav-item nav-link text-white">Login</a>
        @endauth
        @endif
      </div>
    </div>
  </div>
</nav>




    <h1>welcome {{Auth::user()->name}}</h1>
    <h1>The App work well!!</h1>
    <h1>no errors</h1>

    <h1>{{session('access')}}</h1>
   <form action="/" method="POST">
    @csrf
    <table>
        <tr>
            <th>file name</th>
            <th>share</th>
            <th>download</th>
            
        </tr>
        @foreach($data as $file)
        <tr>
            <th>{{$file->filename}}</th>
            <th><input type="checkbox" name='assigned[]' value={{$file->id}} ></th>
            <th><a href="{{ url('/download/' . $file->id) }}" class='btn'>download</a></th>
           
        </tr>
        @endforeach
    </table>

    <select name="user_id[]" id="">
            @foreach($users as $user)
            <option value= {{$user->name}} > {{$user->name}} </option>
            @endforeach
        </select>
    <input type="submit" onclick="submit" >
    
</form>





<script>
    function limitCheckboxSelection(groups) {
        groups.forEach(function(groupName) {
            var checkboxes = document.querySelectorAll('input[name="' + groupName + '"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        // Uncheck all checkboxes in the other groups
                        groups.forEach(function(otherGroupName) {
                            if (otherGroupName !== groupName) {
                                var otherCheckboxes = document.querySelectorAll('input[name="' + otherGroupName + '"]');
                                otherCheckboxes.forEach(function(otherCheckbox) {
                                    otherCheckbox.checked = false;
                                });
                            }
                        });
                    }
                });
            });
        });
    }

    // Specify group names in an array
    var groups = ['assigned[]', 'download[]'];

    // Call the function with the array of group names
    limitCheckboxSelection(groups);
</script>

</body>

</html>