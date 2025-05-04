@extends('base')

@section('content')
<a href="{{ route('listtodo') }}"><button class='btn btn-info btn-sm mx-5 mt-5'>Back</button></a>



  <div class="row mt-5">
    <div class="col-3">
     
    </div>
  
      <div class='col-6 shadow'>
        <form class='mt-3' action="{{ route('updateTaskAll',['id'=>$task->id]) }}" method='post'>
    
            @csrf
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Titre de la tache</label>
                  <input type="text" class="form-control" value = "{{ $task->name }}" id="exampleFormControlInput1" placeholder="Entrez le titre de votre tache" name='titre'>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                  <textarea class="form-control" value="" id="exampleFormControlTextarea1" rows="3" name='description'>{{ $task->description }}</textarea>
                </div>
                <input type="hidden" name='ids' value="{{ $task->id }}">
                <div class='center'>
                  <button type='submit' class='btn btn-dark mb-5'>Soumettre</button>
                </div>
               
              </form>
    </div>
    
    <div class="col-3">
   
    </div>
  </div>


@endsection
