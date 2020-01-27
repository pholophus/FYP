@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add chapter</div>

                <div class="card-body">
                    <form action="/chapters/{{$chapter->id}}" method="post">
                    
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="chapter">chapter Name</label>
                            <input type="text" name="chapter" class="form-control" id="chapter" aria-describedby="chapterHelp"
                            value="{{ $chapter->chapter}}">

                            @error('chapter')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Edit chapter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
