@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                    <div class="card-header"><Strong>Subject : {{$subject->subject}}</strong></div>

                    <form action="/exams/{{$subject->id}}/store" method="post">

                    
                    <div class="card-body">
                        <div class="form-group ">
                            <label for="exam"><Strong>Exam Name</Strong></label>
                            <input type="text" name="exam[exam]" class="form-control" id="exam" aria-describedby="examHelp" placeholder="Enter exam"
                            value="{{ old('exam') }}">

                            @error('exam')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                @foreach($questions as $key => $question)
                        <div class="card-body">
                        
                        @csrf
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <strong>{{$key+1}}. Question</strong> : {{ $question->question}}
                                    </div>
                                    <div>
                                    @if(empty($question->chapter->id))
                                        Does not belong to any chapter
                                    @else
                                        Chapter:{{$question->chapter->chapter}}
                                    @endif
                                    </div>
                                </li>
                            </ul>
                            <input type="hidden" name="id" value="{{$question->id}}">
                        
                            <div class="card-footer">

                                <ul class="list-group">
                                    <li class="list-group-item">Mark: {{$question->mark}}</li>
                                    <li class="list-group-item">Level: {{$question->level}}</li>
                                </ul>

                                <div>
                                <label class="btn btn-secondary mt-2">
                                    <input type="radio" name="questions[{{$key}}][question]" class="button1" value="{{$question->id}} {{$question->mark}} {{$question->question}}" autocomplete="off"> Add Question
                                </label>
                                </div>
                                
                            </div>
                        </div>
                @endforeach
                
                <div class="card-body">
                    <ul class="list-group" id="list-ques"></ul>
                    <ul class="nav">
                        <li class="nav-item mt-3">
                            <h5 class="screen"> </h5>
                        </li>
                    </ul>

                <div class="card-body">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="btn btn-outline-primary mr-5" href="/home">Go Back</a>
                        </li>
                        <li class="nav-item">
                            <button type="submit" class="btn btn-outline-success mr-5">Submit</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-outline-danger" id="clear">Clear Selection</button>
                        </li>
                    </ul>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
  var result = 0;
  var prevEntry = 0;
  var operation = null;
  var currentEntry = '0';
  updateScreen(result);
  
  $('.button1').on('click', function(evt) {
    
    var words = $(this).val();
    var buttonPresses = words.split(" ");
    var buttonPressed = buttonPresses[1];
    var selectedVal = buttonPresses[2];
    var level = buttonPresses[2];
    var no = 1;
    $('#list-ques').append("<li class='list-group-item'>"+ "Question: "+selectedVal+"</li>");
    no++;
    console.log('button '+buttonPressed);
    
      if (isNumber(buttonPressed)) {
      if (currentEntry === '0'){ 
            prevEntry = currentEntry;
            currentEntry = buttonPressed;
        }
        else{
            prevEntry = result;
            currentEntry = buttonPressed;
            
          }
    } 
    
    console.log('prev '+prevEntry);
    console.log('current '+currentEntry);
    a = parseFloat(prevEntry);
    b = parseFloat(currentEntry);
    console.log(a, b, operation);
    result = a + b;
    
    updateScreen(result);
  });

  $('#clear').on('click', function(evt) {
    
    var words = $(this).val();
    var buttonPresses = words.split(" ");
    var buttonPressed = buttonPresses[1];
    var selectedVal = buttonPresses[1];
    var level = buttonPresses[2];
    var no = buttonPresses[3];

    var ele = document.getElementsByClassName('button1');
	for(var i=0;i<ele.length;i++)
    {
        ele[i].checked = false;
    }

    $("#list-ques").empty();
    console.log('button '+buttonPressed);
    
    result=0;
    updateScreen(result);
  });
});

updateScreen = function(displayValue) {
  var displayValue = displayValue.toString();
  displayValue = 'Mark: '+ displayValue;
  $('.screen').html(displayValue.substring(0, 10));
};

isNumber = function(value) {
  return !isNaN(value);
}


</script>
@endsection
