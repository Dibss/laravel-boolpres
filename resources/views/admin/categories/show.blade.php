@extends('layouts.app');

@section('content')
  <div class="container">

    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{$category->label}}</h5>
        <h6 class="card-subtitle mb-2 text-muted badge" style="background-color: {{$category->color}};">{{$category->label}}</h6>
        <div>
          <button type="button" class="btn btn-primary my-2"><a class="text-white" href="{{ route('admin.categories.edit', $category->id) }}">Modifica</a></button>
          <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" class="delete-form" data-label="{{ $category->label }}">
            @csrf
            @method('DELETE')
            <button type='submit' class="btn btn-primary">Delete</button>
          </form>
        </div>
      </div>
    </div>

  </div>
@endsection

@section('scripts')
  <script>
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(element => {
      
      const label = element.getAttribute('data-label')

      element.addEventListener('submit', (e)=>{
        // prevent default previene il refresh della pagina
        e.preventDefault();
        const accept = confirm(`Sei sicuro di voler eliminare: ${label}?`);
        if(accept) e.target.submit();
      }) 

    });
  </script>
@endsection