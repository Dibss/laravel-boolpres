@extends('layouts.app');

@section('content')

  <div class="container">
    <div class="mb-4 text-center">
      <h2>Crea un nuovo post</h2>
    </div>
  
    @if ( $errors->any() )
      <div>
        <ul>
          @foreach ( $errors->all() as $error )
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="post" class="row" enctype="multipart/form-data">
      @csrf

      <div class="form-group col-6">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" required>
        <!-- <div class="form-text">
        </div> -->
      </div>

      <div class="form-group col-6">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" class="form-control" required>
      </div>

      
      <div class="form-group col-6">
        <label for="category">Category</label>
        <select class="form-control" name="category_id" id="category">
          <option value="">Nessuna categoria</option>
          @foreach ( $categories as $category )
          <option value="{{$category->id}}">{{ $category->label }}</option>
          @endforeach
        </select>
      </div>
      
      <div class="form-group col-6">
        <label for="image">Image:</label>
        <input type="file" class="form-control-file" id="image" name="image" placeholder="url dell'immagine">
      </div>

      
      <div class="form-group">
        <h3 class="mr-5">Seleziona i tag:</h3>
        @foreach ( $tags as $tag )
          <div class="form-check-form-check-inline">
            <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" name="tags[]">
            <label for="tag-{{$tag->id}}" class="form-check-label">{{ $tag->label }}</label>
            @if ( in_array($tag->id, old('tags', [])) ) checked @endif
          </div>
        @endforeach
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

  </div>

@endsection
