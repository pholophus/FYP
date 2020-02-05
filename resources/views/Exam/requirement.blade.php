@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Exam Requirement</div>

                <div class="card-body">
                    <form action="/exams/{{$subject->id}}/generate" method="post">
                    
                        @csrf
                        <h5>Please Choose Level</h5>
                        
                        <label class="btn btn-secondary mt-2 mr-4">
                            <input type="radio" name="level[0]" class="button1" id="btn1"  value=1 style="vertical-align: middle;"> <span style="vertical-align: middle;">C1</span>
                        </label>

                        <label class="btn btn-secondary mt-2 mr-4">
                            <input type="radio" name="level[1]" class="button1" id="btn2" value=2 style="vertical-align: middle;"> <span style="vertical-align: middle;">C2</span> 
                        </label>
                        
                        <label class="btn btn-secondary mt-2 mr-4">
                            <input type="radio" name="level[2]" class="button1" id="btn3" value=3 style="vertical-align: middle;"> <span style="vertical-align: middle;">C3</span> 
                        </label>

                        <label class="btn btn-secondary mt-2 mr-4">
                            <input type="radio" name="level[3]" class="button1" id="btn4" value=4 style="vertical-align: middle;"> <span style="vertical-align: middle;">C4</span> 
                        </label>

                        <label class="btn btn-secondary mt-2 mr-4">
                            <input type="radio" name="level[4]" class="button1" id="btn5" value=5 style="vertical-align: middle;"> <span style="vertical-align: middle;">C5</span> 
                        </label>

                        <label class="btn btn-secondary mt-2 mr-4">
                            <input type="radio" name="level[5]" class="button1" id="btn6" value=6 style="vertical-align: middle;"> <span style="vertical-align: middle;">C6</span> 
                        </label>

                        <div>
                            <button type="button" class="btn btn-outline-danger my-3" id="clear">Clear Selection</button>
                        </div>

                        <div class="form-group pb-3" id="mark1" hidden="true">
                            <label for="mark1">Exam Mark Level 1</label>
                            <input type="text" name="mark[0]" class="form-control" id="ans1" aria-describedby="markHelp" placeholder="Exam Expected Mark"
                            value="{{ old( 'mark.0') }}">

                            @error('mark')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group pb-3" id="mark2" hidden="true" >
                            <label for="mark2">Exam Mark Level 2</label>
                            <input type="text" name="mark[1]" class="form-control" id="ans2" aria-describedby="markHelp" placeholder="Exam Expected Mark"
                            value="{{ old( 'mark.1') }}">

                            @error('mark.0')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group pb-3" id="mark3" hidden="true" >
                            <label for="mark3">Exam Mark Level 3</label>
                            <input type="text" name="mark[2]" class="form-control" id="ans3" aria-describedby="markHelp" placeholder="Exam Expected Mark"
                            >

                            @error('mark.2')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group pb-3" id="mark4" hidden="true">
                            <label for="mark4">Exam Mark Level 4</label>
                            <input type="text" name="mark[3]" class="form-control" id="ans4" aria-describedby="markHelp" placeholder="Exam Expected Mark"
                            value="{{ old( 'mark.3') }}">

                            @error('mark.3')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group pb-3" id="mark5" hidden="true">
                            <label for="mark5">Exam Mark Level 5</label>
                            <input type="text" name="mark[4]" class="form-control" id="ans5" aria-describedby="markHelp" placeholder="Exam Expected Mark"
                            value="{{ old( 'mark.4') }}">

                            @error('mark.4')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group pb-3" id="mark6" hidden="true">
                            <label for="mark6">Exam Mark Level 6</label>
                            <input type="text" name="mark[5]" class="form-control" id="ans6" aria-describedby="markHelp" placeholder="Exam Expected Mark"
                            value="{{ old( 'mark.5') }}">

                            @error('mark.5')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary" id="generate" hidden="true">Generate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
$('#clear').on('click', function(evt) {

    var ele = document.getElementsByClassName('button1');
	for(var i=0;i<ele.length;i++)
    {
        ele[i].checked = false;
    }
    
    $("#mark1").prop('hidden', true);
    $("#mark2").prop('hidden', true);
    $("#mark3").prop('hidden', true);
    $("#mark4").prop('hidden', true);
    $("#mark5").prop('hidden', true);
    $("#mark6").prop('hidden', true);

    $("#ans1").val('');
    $("#ans2").val('');
    $("#ans3").val('');
    $("#ans4").val('');
    $("#ans5").val('');
    $("#ans6").val('');

    $("#generate").prop('hidden', true);
  });

    $("#btn1").on('click', function(evt){

        $("#mark1").prop('hidden', false);
        $("#generate").prop('hidden', false);
    });

    $("#btn2").on('click', function(evt){

        $("#mark2").prop('hidden', false);
        $("#generate").prop('hidden', false);
    });
    
    $("#btn3").on('click', function(evt){

        $("#mark3").prop('hidden', false);
        $("#generate").prop('hidden', false);
    });

    $("#btn4").on('click', function(evt){

        $("#mark4").prop('hidden', false);
        $("#generate").prop('hidden', false);
    });

    $("#btn5").on('click', function(evt){

        $("#mark5").prop('hidden', false);
        $("#generate").prop('hidden', false);
    });

    $("#btn6").on('click', function(evt){

        $("#mark6").prop('hidden', false);
        $("#generate").prop('hidden', false);
    });

});
</script>
@endsection
