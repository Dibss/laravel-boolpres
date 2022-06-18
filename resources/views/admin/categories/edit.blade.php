@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="text-center">
      <h2>Modifica la categoria</h2>
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
  
    <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
  
      @method('PUT')
  
      @csrf
  
      <div class="form-group">
        <label for="label">Categoria:</label>
        <input type="text" name="label" class="form-control" value="{{ old('label', $category->label) }}" id="label" required>
        <!-- <div class="form-text">
        </div> -->
      </div>

      <div class="form-group">
        <label for="color">Color:</label>
        <input type="text" name="color" class="form-control" value="{{ old('color', $category->color) }}" id="color" required>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Aggiorna</button>
      </div>
    </form>
  </div>
@endsection