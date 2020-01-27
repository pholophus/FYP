@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Subject</div>

                <div class="card-body">
                    <form action="/subjects" method="post">
                    
                        @csrf
                        <div class="form-group">
                            <label for="subject">Subject Name</label>
                            <input type="text" name="subject" class="form-control" id="subject" aria-describedby="subjectHelp" placeholder="Enter Subject Name"
                            value="{{ old ('subject') }}">

                            @error('subject')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subjectcode">Subject Code</label>
                            <input type="text" name="subjectcode" class="form-control" id="subjectcode" aria-describedby="subjectcodeHelp" placeholder="Enter Subject Code"
                            value="{{ old( 'subjectcode') }}">

                            @error('subjectcode')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Subject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
