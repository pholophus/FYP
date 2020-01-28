@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><Strong>Subject : {{$subject->subject}}</strong></div>

                @foreach($chapters as $chapter)
                <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Chapter Name</strong> : {{ $chapter->chapter}}</li>
                </ul>

                <div class="card-footer">

                    <ul class="nav">
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-primary mr-5" href="/questions/{{$chapter->id}}/chapters">View Questions</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-success mr-5" href="/questions/{{ $chapter->id }}/edit">Edit</a>
                        </li>
                        <li class="nav-item">
                            <form action="/chapters/{{$chapter->id}}" method="post">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-sm btn-outline-danger mr-5">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
                </div>
                @endforeach
                
                <div class="card-body">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="btn btn- btn-outline-primary mr-4" href="/chapters/{{$subject->id}}/create">Add Chapter</a>
                        </li>
                        <li>
                            <a class="btn btn-outline-primary " href="/home">Go Back</a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
