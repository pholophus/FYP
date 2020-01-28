@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">question</div>

                <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>question </strong> : {{ $question->question}}</li>
                    <li class="list-group-item"><strong>level </strong> : C{{ $question->level}}</li>
                    <li class="list-group-item"><strong>mark</strong> : {{ $question->mark}}</li>
                    <li class="list-group-item"><strong>answer</strong> : {{ $question->answer}}</li>
                </ul>

                <div class="card-footer">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-primary mr-5" href="/questions/{{ $question->chapter_id}}/chapters">Go Back</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-sm btn-outline-success mr-5" href="/questions/{{ $question->id}}/edit/chapters">Edit</a>
                        </li>
                        <li class="nav-item">
                            <form action="/questions/{{$question->id}}/chapters" method="post">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-sm btn-outline-danger mr-5">Delete</button>
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
