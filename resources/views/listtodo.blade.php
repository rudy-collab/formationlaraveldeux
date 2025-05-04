@extends('base')

@section('content')

@if (count($listTodo) == 0)
<div class='center mt-5'>
    <div>
        <img src="{{ asset('empty.png') }}" alt="Description de l'image" width="200" height="200">
        <p class='text-center'>Aucune(s) tache(s) enregistrée(s)...</p>
    </div>
  
</div>

@elseif (count($listTodo) > 0)
<div class='center mt-3 mb-3'>
  <img src="{{ asset('add.png') }}" alt="" width="200">
</div>
<h2 class='text-center mt-5'>Ajouter des taches</h2>
<table class="container table table-striped mt-5 shadow">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Titre</th>
        <th scope="col">Description</th>
        <th>Modifier</th>
        <th>Supprimer</th>
     
      </tr>
    </thead>
    <tbody>
        @foreach ($listTodo as $listtodo)
        <tr>
            <th scope="row">{{ $listtodo->id }}</th>
            <td>{{ $listtodo->name }}</td>
            <td>{{ $listtodo->description }}</td>
            <td><a href="{{ route('updateTask',['id'=>$listtodo->id]) }}">
                <button class='btn btn-info btn-sm'>Modifier</button>
            </a></td>
            <td>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModaldelete">
   Delete
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModaldelete" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Voulez-vous suprimmer ces données ?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body center">
            <form class='mx-2' action="{{ route('deleteTask',['id'=>$listtodo->id]) }}" method='post'>
                @csrf 
                @method('delete')
                <button  class='btn btn-success '>Oui</button>
            </form>
            <button class='btn btn-danger mx-2' data-bs-dismiss="modal">Non</button>
        </div>
    
      </div>
    </div>
  </div>
               
               
            </td>

          </tr>
        @endforeach
    
    </tbody>
  </table>
    <div class='center'>
  {{ $listTodo->links() }}
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
@endif
<div class='center mt-5'>
<!-- Button trigger modal -->
<button type="button" class="btn btn-dark  animate__animated animate__headShake animate__infinite infinite" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Creez votre Tache...
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creez votre tache...</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('createTask') }}" method='post'>

          @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titre de la tache</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez le titre de votre tache" name='titre'>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='description'></textarea>
              </div>
           
              <div class='center'>
                <button type='submit' class='btn btn-dark'>Soumettre</button>
              </div>
             
            </form>
        </div>
    
      </div>
    </div>
  </div>

  
    
</div>

@endsection
