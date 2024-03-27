<!DOCTYPE html>

<html>
<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
      .hidden {
    display: none;
  }

</style>
@yield('homeHeader')
@yield('shareToOtherHeader')
@yield('shareToMeHeader')
@yield('editHeader')
@yield('uploadHeader')

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
        <a class="nav-item nav-link text-white" href="{{url('/shareToMe')}}">files shred to me</a>
        <a class="nav-item nav-link text-white" href="{{url('/shareToOther')}}">files shred to other</a>

        
        @if (Auth::check())
            <x-app-layout>
            </x-app-layout>
        @else
            <a href="{{ route('register') }}" class="nav-item nav-link text-white">Register</a>
            <a href="{{ route('login') }}" class="nav-item nav-link text-white">Login</a>
        @endif
      </div>
    </div>
  </div>
</nav>

@yield('homeBody')
@yield('shareToOtherBody')
@yield('shareToMeBody')
@yield('editBody')
@yield('uploadBody')



</body>

</html>