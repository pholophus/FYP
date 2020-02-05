@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="/subjects/create">Create Subject</a>
                </div>

            </div> 
                @foreach($subjects as $key => $subject)
                <div class="card mt-3">
                <div class="card-header"><strong>{{$key+1}}.</strong> Subject</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Subject Name</strong> : {{ $subject->subject}}</li>
                            <li class="list-group-item"><strong>Subject Code</strong> : {{ $subject->subjectcode}}</li>
                        </ul>
                    </div>

                    <div class="card-footer">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-outline-success mr-4" href="/subjects/{{ $subject->id}}/edit">Edit</a>
                            </li>
                            <li class="nav-item">
                                <form action="/subjects/{{$subject->id}}" method="post">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-outline-danger mr-4">Delete</button>
                                </form>
                            </li>
                            
                            <li class="nav-item">
                                <a class="btn btn-sm btn-outline-primary mr-4" href="/chapters/{{$subject->id}}">View Chapter</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-sm btn-outline-primary mr-4" href="/questions/{{$subject->id}}/subject">View Questions</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-sm btn-outline-primary " href="/exams/{{$subject->id}}">View Exam</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                @endforeach
            
        </div>
    </div>
</div>
@endsection
