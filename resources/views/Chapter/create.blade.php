@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Chapter</div>

                <div class="card-body">
                    <form action="/chapters/{{$subject->id}}" method="post">
                    
                        @csrf
                        <div class="form-group">
                            <label for="chapter">Chapter Name</label>
                            <input type="text" name="chapter" class="form-control" id="chapter" aria-describedby="chapterHelp" placeholder="Enter chapter Name"
                            value="{{ old ('chapter') }}">

                            @error('chapter')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add chapter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
