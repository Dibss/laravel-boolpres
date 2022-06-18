@extends('layouts.app');

@section('content')
  <div class="container">

    @if(session('message'))
      {{ session('message') }}
    @endif

    @forelse ( $categories as $category )
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$category->label}}</h5>
          <span class="card-subtitle mb-2 text-muted badge" style="background-color: {{$category->color}};">{{$category->label}}</span>
          <div class="mt-2">
            <button type="button" class="btn btn-primary"><a class="text-white" href="{{ route('admin.categories.show', $category->id) }}">View</a></button>
            <button type="button" class="btn btn-primary"><a class="text-white" href="{{ route('admin.categories.edit', $category->id) }}">Update</a></button>
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" class="my-2 delete-form" data-label="{{ $category->label }}">
              @csrf
              @method('DELETE')
              <button class="btn btn-primary" type='submit'>Delete</button>
            </form>
          </div>
        </div>
    @empty

      <p>Non ci sono categorie</p>
  
    @endforelse
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