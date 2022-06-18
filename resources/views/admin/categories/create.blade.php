@extends('layouts.app');

@section('content')

  <div class="container">
    <div class="text-center">
      <h2>Crea una nuova categoria</h2>
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
  
    <form action="{{ route('admin.categories.store') }}" method="post">
  
      @csrf
  
      <div class="form-group">
        <label for="label">Categoria:</label>
        <input type="text" name="label" id="label" class="form-control" value="{{ old('label') }}" required>
        <!-- <div class="form-text">
        </div> -->
      </div>

      <div class="form-group">
        <label for="color">Color:</label>
        <input type="text" name="color" id="color" class="form-control" value="{{ old('color') }}" required>
      </div>

      <div>
        <button type="submit">Aggiungi</button>
      </div>
    </form>
  </div>

@endsection
