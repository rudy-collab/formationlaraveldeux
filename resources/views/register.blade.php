@extends('base')

@section('content')

<h2 class='text-center mt-5'>Creer votre compte</h2>
<!--<p class='text-center mt-5'><a href="{{ route('logins') }}">Vous avez deja un compte? connectez-vous...</a></p>/-->

<div class='center'>
    <img src="{{ asset('login.png') }}" alt="" width='300' >
</div>




    @if (session('success'))
    <div class='center'>
      <div class="alert alert-success alert-dismissible fade show animate__animated animate__bounceInLeft " role="alert">
        {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
  
      </div>
        
    @endif

    @if (session('error'))
   <div class='center'>
    <div class="alert alert-danger alert-dismissible fade show animate__animated animate__bounceInLeft " role="alert">
      {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    </div>
        
    @endif
   
    <div class="modal fade" id="exampleModalToggle" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel">Enregistrez vous</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container card center mt-5 shadow">
                    <div class="card-body">
                        <div class="mb-3">
                            <form action="{{ route('register') }}"  method='post'>
                                @csrf
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name" name='name'>
                            @error('name')
                                {{ $message }}
                            @enderror
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
            </div>
            <div class="modal-footer">
              <button class="btn btn-outline-dark" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Connectez vous</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModalToggle2" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel2">Connetez vous</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
            </div>
            <div class="modal-footer">
              <button class="btn btn-outline-dark" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Enregistrez vous</button>
            </div>
          </div>
        </div>
      </div>
      <div class='center mt-5'>
        <a class="btn btn-dark" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Enregistrez vous</a>
      </div>
     

@endsection

<style>
    .center{
        display: flex;
        justify-content: center !important;
       
    }

</style>
