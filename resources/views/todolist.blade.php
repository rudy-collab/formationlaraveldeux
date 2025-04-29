@extends('base')

@section('content')


<h1 class='text-center mt-5'><strong>TODO APP</strong></h1>

@if (Auth::check())
<h5 class='text-center mt-5 blues'>Hello {{ Auth::User()->name }}</h5>
@endif

<div class="container card shadow mt-5">
    <div class="card-body text-center mt-5 mb-5">
        <strong><h3>Application Todo-List 😀😀</h3></strong>
    </div>
</div>
@if (Auth::check())
<div class='center mt-5 mt-5'>
    <a href="{{ route('listtodo') }}"><button class='btn btn-dark animate__animated animate__headShake animate__infinite infinite'>Commencer</button></a>
</div>
    
@endif



@endsection
