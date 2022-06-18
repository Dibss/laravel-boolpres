@extends('layouts.app');

@section('content')
  <div class="container">

    @if(session('message'))
      {{ session('message') }}
    @endif
    
    @forelse ( $posts as $post )
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        @if($post->category)
          <span class="card-subtitle mb-2 text-muted badge" style="background-color: {{$post->category->color}};">{{$post->category->label}}</span>
        @else
          <span>-</span>
        @endif
        <p class="card-text">{{ $post->description }}</p>
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img w-50" alt="{{ $post->title }}">
        
        <div class="mt-2">
          <button type="button" class="btn btn-primary"><a class="text-white" href="{{ route('admin.posts.show', $post->id) }}">View</a></button>
          <button type="button" class="btn btn-primary"><a class="text-white" href="{{ route('admin.posts.edit', $post->id) }}">Update</a></button>
          <form class="my-2" action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="delete-form" data-title="{{ $post->title }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type='submit'>Delete</button>
          </form>
        </div>
      </div>
    </div>
    @empty
        <p>Non ci sono post</p>
    @endforelse

    <div class="my-2">
      @if($posts->hasPages())
        {{ $posts->links() }}
      @endif
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(element => {
      
      const title = element.getAttribute('data-title')

      element.addEventListener('submit', (e)=>{
        // prevent default previene il refresh della pagina
        e.preventDefault();
        const accept = confirm(`Sei sicuro di voler eliminare: ${title}?`);
        if(accept) e.target.submit();
      }) 

    });
  </script>
@endsection