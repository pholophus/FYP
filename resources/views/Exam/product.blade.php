@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <h5>{{$subject->subject}}</h5>

                <form action="/exams/{{$subject->id}}/product" method="post">
                
                @csrf
                <div class="card-body">
                    <div class="form-group ">
                        <label for="exam"><Strong>Exam Name</Strong></label>
                        <input type="text" name="exam" class="form-control" id="exam" aria-describedby="examHelp" placeholder="Enter exam"
                        value="{{ old('exam') }}">

                        @error('exam')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="card mb-5">
                    <div class="card-header bg-dark text-light">
                        <h3>Level 1</h3>
                    </div>
                    @foreach($questions1 as $key => $question1)
                    
                        <div class="card-header d-flex justify-content-between bg-secondary text-light">
                            
                                <div>
                                    <h5>{{$key+1}})</h5>
                                </div>
                                <div>
                                    <h5>
                                        <span> Expected:</span> {{$targets[0]}}
                                        <span class="pl-3"> Acquire:</span> {{$sums[0]}}
                                        <span class="pl-3">No of ques. :</span> {{$question1->count()}}
                                    </h5>
                                </div>
                        </div>
                        
                            @foreach($question1 as $q1)
                                <div class="card-body d-flex justify-content-between">
                                        <div>
                                            <h5>Question: {{$q1->question}} </h5>
                                        </div> 
                                        <div>
                                            <h5>Mark: {{$q1->mark}}</h5> 
                                        </div>
                                        
                                </div>
                            @endforeach
                            <label class="btn btn-primary btn-xs mx-5 mb-4">
                                <input type="radio" name="questions[0]" class="button" value="{{$questions1[$key]->pluck('id')}}" style="vertical-align: middle;">Choose
                            </label>
                            
                    @endforeach

                        <div class="card-footer">
                             <button id="clear" type="button" class="btn btn-danger">Clear</button>
                        </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-dark text-light">
                        <h3>Level 2</h3>
                    </div>
                    @foreach($questions2 as $key => $question2)
                    
                        <div class="card-header d-flex justify-content-between bg-secondary text-light">
                            
                                <div>
                                    <h5>{{$key+1}})</h5>
                                </div>
                                <div>
                                    <h5>
                                        <span> Expected:</span> {{$targets[1]}}
                                        <span class="pl-3"> Acquire:</span> {{$sums[1]}}
                                        <span class="pl-3">No of ques. :</span> {{$question2->count()}}
                                    </h5>
                                </div>
                        </div>
                        
                            @foreach($question2 as $q2)
                                <div class="card-body d-flex justify-content-between">
                                        <div>
                                            <h5>Question: {{$q2->question}} </h5>
                                        </div> 
                                        <div>
                                            <h5>Mark: {{$q2->mark}}</h5> 
                                        </div>
                                        
                                </div>
                            @endforeach

                            <label class="btn btn-primary btn-xs mx-5 mb-4">
                                <input type="radio" name="questions[1]" class="button" value="{{$questions2[$key]->pluck('id')}}" style="vertical-align: middle;">Choose
                            </label>
                            
                   
                    @endforeach
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-dark text-light">
                        <h3>Level 3</h3>
                    </div>
                    @foreach($questions3 as $key => $question3)
                    
                        <div class="card-header d-flex justify-content-between bg-secondary text-light">
                            
                                <div>
                                    <h5>{{$key+1}})</h5>
                                </div>
                                <div>
                                    <h5>
                                        <span> Expected:</span> {{$targets[2]}}
                                        <span class="pl-3"> Acquire:</span> {{$sums[2]}}
                                        <span class="pl-3">No of ques. :</span> {{$question3->count()}}
                                    </h5>
                                </div>
                        </div>
                        
                            @foreach($question3 as $q3)
                                <div class="card-body d-flex justify-content-between">
                                        <div>
                                            <h5>Question: {{$q3->question}} </h5>
                                        </div> 
                                        <div>
                                            <h5>Mark: {{$q3->mark}}</h5> 
                                        </div>
                                        
                                </div>
                            @endforeach

                            <label class="btn btn-primary btn-xs mx-5 mb-4">
                                <input type="radio" name="questions[2]" class="button" value="{{$questions3[$key]->pluck('id')}}" style="vertical-align: middle;">Choose
                            </label>
                            
                   
                    @endforeach
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-dark text-light">
                        <h3>Level 4</h3>
                    </div>
                    @foreach($questions4 as $key => $question4)
                    
                        <div class="card-header d-flex justify-content-between bg-secondary text-light">
                            
                                <div>
                                    <h5>{{$key+1}})</h5>
                                </div>
                                <div>
                                    <h5>
                                        <span> Expected:</span> {{$targets[3]}}
                                        <span class="pl-3"> Acquire:</span> {{$sums[3]}}
                                        <span class="pl-3">No of ques. :</span> {{$question4->count()}}
                                    </h5>
                                </div>
                        </div>
                        
                            @foreach($question4 as $q4)
                                <div class="card-body d-flex justify-content-between">
                                        <div>
                                            <h5>Question: {{$q4->question}} </h5>
                                        </div> 
                                        <div>
                                            <h5>Mark: {{$q4->mark}}</h5> 
                                        </div>
                                        
                                </div>
                            @endforeach

                            <label class="btn btn-primary btn-xs mx-5 mb-4">
                                <input type="radio" name="questions[3]" class="button" value="{{$questions4[$key]->pluck('id')}}" style="vertical-align: middle;">Choose
                            </label>
                            
                   
                    @endforeach
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-dark text-light">
                        <h3>Level 5</h3>
                    </div>
                    @foreach($questions5 as $key => $question5)
                    
                        <div class="card-header d-flex justify-content-between bg-secondary text-light">
                            
                                <div>
                                    <h5>{{$key+1}})</h5>
                                </div>
                                <div>
                                    <h5>
                                        <span> Expected:</span> {{$targets[4]}}
                                        <span class="pl-3"> Acquire:</span> {{$sums[4]}}
                                        <span class="pl-3">No of ques. :</span> {{$question5->count()}}
                                    </h5>
                                </div>
                        </div>
                        
                            @foreach($question5 as $q5)
                                <div class="card-body d-flex justify-content-between">
                                        <div>
                                            <h5>Question: {{$q5->question}} </h5>
                                        </div> 
                                        <div>
                                            <h5>Mark: {{$q5->mark}}</h5> 
                                        </div>
                                        
                                </div>
                            @endforeach

                            <label class="btn btn-primary btn-xs mx-5 mb-4">
                                <input type="radio" name="questions[4]" class="button" value="{{$questions5[$key]->pluck('id')}}" style="vertical-align: middle;">Choose
                            </label>
                            
                   
                    @endforeach
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-dark text-light">
                        <h3>Level 6</h3>
                    </div>
                    @foreach($questions6 as $key => $question6)
                    
                        <div class="card-header d-flex justify-content-between bg-secondary text-light">
                            
                                <div>
                                    <h5>{{$key+1}})</h5>
                                </div>
                                <div>
                                    <h5>
                                        <span> Expected:</span> {{$targets[5]}}
                                        <span class="pl-3"> Acquire:</span> {{$sums[5]}}
                                        <span class="pl-3">No of ques. :</span> {{$question6->count()}}
                                    </h5>
                                </div>
                        </div>
                        
                            @foreach($question6 as $q6)
                                <div class="card-body d-flex justify-content-between">
                                        <div>
                                            <h5>Question: {{$q6->question}} </h5>
                                        </div> 
                                        <div>
                                            <h5>Mark: {{$q6->mark}}</h5> 
                                        </div>
                                        
                                </div>
                            @endforeach

                            <label class="btn btn-primary btn-xs mx-5 mb-4">
                                <input type="radio" name="questions[5]" class="button" value="{{$questions6[$key]->pluck('id')}}" style="vertical-align: middle;">Choose
                            </label>
                            
                   
                    @endforeach
                </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
$('#clear').on('click', function(evt) {

        var ele = document.getElementsByClassName('button');
        for(var i=0;i<ele.length;i++)
        {
            ele[i].checked = false;
        }
    });
});
</script>
@endsection
