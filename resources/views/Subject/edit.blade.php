@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Subject</div>

                <div class="card-body">
                    <form action="/subjects/{{$subject->id}}" method="post">
                    
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="subject">Subject Name</label>
                            <input type="text" name="subject" class="form-control" id="subject" aria-describedby="subjectHelp"
                            value="{{ $subject->subject}}">

                            @error('subject')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subjectcode">Subject Code</label>
                            <input type="text" name="subjectcode" class="form-control" id="subjectcode" aria-describedby="subjectcodeHelp" 
                            value="{{ $subject->subjectcode}}">

                            @error('subjectcode')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <ul class="nav">
                            <li class="nav-item">
                                <button type="submit" class="btn btn-success mr-5">Edit Subject</button>
                            </li>
                            <li class="nav-item">
                                <a href="/home" class="btn btn-primary">Cancel</a>
                            </li>
                        </ul>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
