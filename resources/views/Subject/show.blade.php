@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subject</div>

                <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Subject Name</strong> : {{ $subject->subject}}</li>
                    <li class="list-group-item"><strong>Subject Code</strong> : {{ $subject->subjectcode}}</li>
                </ul>

                
                <div class="card-footer">

                    <ul class="nav">
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-success mr-5" href="/subjects/{{ $subject->id}}/edit">Edit</a>
                        </li>
                        <li class="nav-item">
                            <form action="/subjects/{{$subject->id}}" method="post">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
