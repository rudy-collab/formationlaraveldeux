@extends('base')

@section('content')

<h2 class='text-center mt-5'>Connectez vous</h2>



<div class="container card center mt-5 shadow">
    <div class="card-body">
        <div class="mb-3">
            <form action="{{ route('logins') }}"  method='post'>
                @csrf
         
          </div>
        <div class="mb-3">
            <form action="">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name='email'>
            @error('email')
            {{ $message }}
        @enderror
          </div>
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleFormControlInput1"  name='password'>
          @error('password')
          {{ $message }}
      @enderror
        </div>
        <div class='center mt-3 mb-5'>
            <button class='btn btn-dark'>Soumettre</button>
        </div>
        </form>
    </div>

    @if (session('success'))
    <div class='center'>
        <div class="alert alert-success" role="alert">
           {{ session('success') }}
          </div>

    </div>
        
    @endif
   


@endsection

<style>
    .center{
        display: flex;
        justify-content: center !important;
       
    }

</style>