@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <h5>{{$subject->subject}}</h5>

                @foreach($exams as $key => $exam)
                <div class="card mb-4">
                    <div class="card-header"><Strong>{{$key +1}}) Exam : </strong> {{ $exam->exam}}</div>
                    <div class="card-body my-3">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Exam Mark</strong> : {{ $exam->mark}}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="/exams/{{$exam->id}}/show" class="btn btn-outline-primary mr-4">View Questions</a>
                            </li>
                            <li class="nav-item"><form action="/exams/{{$exam->id}}" method="post">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-outline-danger mr-5">Delete</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a href="/generate-docx/{{$exam->id}}" class="btn btn-primary">Save</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
                @endforeach
                
                <div class="card-body">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="btn btn-outline-primary mr-4" href="/home">Go Back</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-success mr-4" href="/exams/{{$subject->id}}/create">Create Exam Manually</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-success" href="/exams/{{$subject->id}}/requirement">Generate Exam</a>
                        </li>
                    </ul>
                    
                </div>
            
        </div>
    </div>
</div>
@endsection
