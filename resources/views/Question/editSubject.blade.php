@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit question</div>

                <div class="card-body">
                    <form action="/questions/{{$question->id}}/subjects" method="post">
                    
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea  name="question" class="form-control" id="question" aria-describedby="questionHelp" placeholder="Enter question "
                             rows="5" >{{ $question->question }}</textarea>

                            @error('question')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <!--<input type="text" name="level" class="form-control" id="level" aria-describedby="levelHelp" placeholder="Enter question level"
                            value="{{ old( 'level') }}">-->
                            <select name="level" class="form-control" id="level" aria-describedby="levelHelp">
                                <option value=1 >C1</option>
                                <option value=2 >C2</option>
                                <option value=3 >C3</option>
                                <option value=4 >C4</option>
                                <option value=5 >C5</option>
                                <option value=6 >C6</option>
                            </select>

                            @error('level')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mark">Mark</label>
                            <input type="text" name="mark" class="form-control" id="mark" aria-describedby="markHelp" placeholder="Enter mark"
                            value="{{ $question->mark}}">

                            @error('mark')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea  name="answer" class="form-control" id="answer" aria-describedby="answerHelp" placeholder="Enter answer "
                            rows="5" >{{ $question->mark }}</textarea>

                            @error('answer')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Edit question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
