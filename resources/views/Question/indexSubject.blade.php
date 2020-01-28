@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><Strong>Subject : {{$subject->subject}}</strong></div>

                @foreach($subject->questions as $key => $question)
                <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>{{$key+1}}. Question</strong> : {{ $question->question}}</li>
                </ul>

                <div class="card-footer">

                    <ul class="nav">
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-primary mr-5" href="/questions/{{ $question->id}}/">Show</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-success mr-5" href="/questions/{{ $question->id}}/edit/subject">Edit</a>
                        </li>
                        <li class="nav-item">
                            <form action="/questions/{{$question->id}}/subject/show" method="post">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
                </div>
                @endforeach
                
                <div class="card-body">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-primary mr-5" href="/home">Go Back</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary " href="/questions/{{$subject->id}}/create/subject">Add Question</a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
