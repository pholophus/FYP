@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                    <div class="card-header">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <strong>Exam: {{$exam->exam}}</strong>
                                </div>
                                <div>
                                    <strong>Marks: {{$exam->mark}}</strong>
                                </div>
                            </li>
                        </ul>
                        
                        
                    </div>

                @foreach($questions as $key => $question)
                        <div class="card-body">
                        
                        @csrf
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <strong>{{$key+1}}. Question</strong> : {{ $question->question}}
                                    </div>
                                </li>
                            </ul>
                        
                    <div class="card-footer">

                        <ul class="list-group">
                            <li class="list-group-item">Mark: {{$question->mark}}</li>
                            <li class="list-group-item">Level: {{$question->level}}</li>
                            <li class="list-group-item">Answer: {{$question->answer}}</li>
                        </ul>
                        
                    </div>
                </div>
                @endforeach
                </form>
                
                <div class="card-body">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-primary mr-5" href="/exams/{{$exam->subject_id}}">Go Back</a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
