@extends('layouts.app');

@section('content')
  <div class="container">

    <div class="card" style="width: 36rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>

        @if($post->category)
          <span class="badge" style="background-color: {{$post->category->color}};">{{$post->category->label}}</span>
        @endif

        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-2" alt="{{ $post->title }}">
        <p class="card-text">{{ $post->description }}</p>

        <span>Tags:</span>
        @forelse($post->tags as $tag)
          <span  class="badge badge-pill" style="background-color: {{$tag->color}};">{{$tag->label}}</span>
        @empty
          <h3>Non ci sono tag abbinati</h3>
        @endforelse

        <div>
          <button type="button" class="btn btn-primary my-2"><a class="text-white" href="{{route('admin.posts.edit', $post->id)}}">Update</a></button>
          <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="delete-form" data-title="{{ $post->title }}">
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


<!-- <div class="card">
  @if($post->category)
    <span style="background-color: {{$post->category->color}};">{{$post->category->label}}</span>
  @endif
  
  <h2>{{ $post->title }}</h2>
  <p>{{ $post->description }}</p>
  <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
  {{ $post->slug }}

  <h3>Tags:</h3>
  @forelse($post->tags as $tag)
    <span  class="badge badge-pill" style="background-color: {{$tag->color}};">{{$tag->label}}</span>
  @empty
    <h3>Non ci sono tag abbinati</h3>
  @endforelse

  <button><a href="{{route('admin.posts.edit', $post->id)}}">Update</a></button>
  <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="delete-form" data-title="{{ $post->title }}">
    @csrf
    @method('DELETE')
    <button type='submit'>Delete</button>
  </form>
</div> -->