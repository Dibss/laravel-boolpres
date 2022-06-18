@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="text-center">
      <h2>Modifica il post</h2>
    </div>
  
    @if( $errors->any() )
      <div>
        <ul>
          @foreach ( $errors->all() as $error )
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  
    <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
  
      @method('PUT')
  
      @csrf
  
      <div class="form-group col-6">
        <label for="title">Title:</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" id="title" required>
        <!-- <div class="form-text">
        </div> -->
      </div>
      
      <div class="form-group col-6">
        <label for="description">Description:</label>
        <input type="text" name="description" class="form-control" value="{{ old('description', $post->description) }}" id="description" required>
      </div>
  
      <div class="form-group col-6">
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" placeholder="url dell'immagine" class="form-control-file">
      </div>
  
      <div class="form-group col-6">
        <label for="category">Category</label>
        <select name="category_id" id="category" class="form-control">
          <option value="">Nessuna categoria</option>
          @foreach ( $categories as $category )
            <option @if(old('category_id', $post->category_id == $category->id)) selected @endif value="{{$category->id}}">{{ $category->label }}</option>
          @endforeach
        </select>
      </div>
  
      <div class="form-group">
        @foreach ( $tags as $tag )
          <div class="form-check-form-check-inline">
            <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" name="tags[]">
            <label for="tag-{{$tag->id}}" class="form-check-label">{{ $tag->label }}</label>
            @if ( in_array($tag->id, old('tags', [$post_tags_id])) ) checked @endif
          </div>
        @endforeach
      </div>
  
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Aggiorna</button>
      </div>
    </form>
  </div>
@endsection