<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Subject;
use App\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index(Subject $subject)
    {
        $exams = $subject->exams;
        ////dd($exams);
        ////dd($exams);
        return view('exam.index', compact('exams','subject'));
    }
    public function create(Subject $subject)
    {
        $ids = Subject::find($subject->id)->questions->pluck('id');
        $questions = $subject->questions()->with('chapter')->find($ids);
        

        return view('Exam.create', compact('subject','questions','question'));
    }

    public function requirement(Subject $subject)
    {
        return view('Exam.requirement', compact('subject'));
    }

    public function store(Subject $subject)
    {
        $data = request()->validate([
            'questions.*.question' => 'required',
            'exam.exam' => 'required'
        ]);

        $ids = array();
        $mark = 0;
        $values = array();
        ////dd($data['questions']['question']);
        foreach($data['questions'] as $key => $question)
        {
            $values[$key] = explode(' ',$question['question']);
        }
        foreach($values as $value)
        {
            $ids[] = $value[0];
            $mark += $value[1];
        }
        ////dd($data['exam']['exam']);
        $exam = $subject->exams()->create([
            'exam' => $data['exam']['exam'],
            'mark' => $mark
        ]);
        ////dd($exam);
        $question = Question::whereIn('id',$ids)->update([
            'exam_id' => $exam->id,
        ]);
        
        //$question->save();
        return redirect('exams/'.$exam->id.'/show');

        //$exam->questions()->where('id',$data)->update([
         //   'exam_id'=>$exam->id]);
        //Question::where('id',$data)->update($exam->id);
        ////dd($exam->id);
    }

    public function generate(Subject $subject)
    {
        $data = request()->validate([
            'level' => 'required',
            'mark' => 'required'
        ]);

        $ids1=array();
        $ids2=array();
        $ids3=array();
        $ids4=array();
        $ids5=array();
        $ids6=array();

        $sum1=0;
        $sum2=0;
        $sum3=0;
        $sum4=0;
        $sum5=0;
        $sum6=0;

        $target1=0;
        $target2=0;
        $target3=0;
        $target4=0;
        $target5=0;
        $target6=0;

        ////dd($data['level']);
        if(in_array('1',$data['level']))
        {
            $questions = $subject->questions()->where('level',1)->get()->pluck('mark','id');
            $marks = $questions->toArray();
            sort($marks);

            ////dd($questions);
            //how many marks
            $n = sizeof($marks);
            
            //target of mark
            ////dd($data);
            $target = $data['mark'][0];
            $target1 = $target;

            //search for accurate first
            $c = ExamController::subsetAccurateSums($marks, $n, $target); 
            $listAccurate = $c[0];
            $sumAccurate = $c[1];

            if(empty($listAccurate)){
                $d = ExamController::subsetNearestSums($marks, $n, $target);
                $listNearest = $d[0];
                $sumNearest = $d[1];
                $sum1 = $d[1];

                $result = ExamController::search($questions, $d[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids1[] = $values[$key];
                }
                //dd($ids1);

            }else{
                $result = ExamController::search($questions, $c[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids1[] = $values[$key];
                }
                $sum1 = $c[1];
                //dd($ids1);
            }
        }
        if(in_array('2',$data['level']))
        {
            $questions = $subject->questions()->where('level',2)->get()->pluck('mark','id');
            $marks = $questions->toArray();
            sort($marks);

            //dd($questions);
            //how many marks
            $n = sizeof($marks);
            
            //target of mark
            $target = $data['mark'][1];
            $target2 = $target;
            //dd($target);
            //search for accurate first
            $c = ExamController::subsetAccurateSums($marks, $n, $target); 
            //dd($c);
            $listAccurate = $c[0];
            $sumAccurate = $c[1];
            
            //dd($sumAccurate);

            if(empty($listAccurate)){
                $d = ExamController::subsetNearestSums($marks, $n, $target);
                $listNearest = $d[0];
                $sumNearest = $d[1];
                $sum2 = $d[1];

                //dd($d);
                //dd($sum2);

                $result = ExamController::search($questions, $d[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids2[] = $values[$key];
                }
                //dd($ids2);
            }else{
                $result = ExamController::search($questions, $c[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids2[] = $values[$key];
                }
                $sum2 = $c[1];
                //dd($ids2);
            }
        }
        if(in_array('3',$data['level']))
        {
            $questions = $subject->questions()->where('level',3)->get()->pluck('mark','id');
            $marks = $questions->toArray();
            sort($marks);

            //dd($questions);
            //how many marks
            $n = sizeof($marks);
            
            //target of mark
            $target = $data['mark'][2];
            $target3 = $target;
            //search for accurate first
            $c = ExamController::subsetAccurateSums($marks, $n, $target); 
            $listAccurate = $c[0];
            $sumAccurate = $c[1];
            

            if(empty($listAccurate)){
                $d = ExamController::subsetNearestSums($marks, $n, $target);
                $listNearest = $d[0];
                $sumNearest = $d[1];
                $sum3 = $d[1];

                $result = ExamController::search($questions, $d[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids3[] = $values[$key];
                }
            }else{
                $result = ExamController::search($questions, $c[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids3[] = $values[$key];
                }
                $sum3 = $c[1];
                //dd($ids3);
            }
        }
        if(in_array('4',$data['level']))
        {
            $questions = $subject->questions()->where('level',4)->get()->pluck('mark','id');
            $marks = $questions->toArray();
            sort($marks);

            //dd($questions);
            //how many marks
            $n = sizeof($marks);
            
            //target of mark
            $target = $data['mark'][3];
            $target4 = $target;
            //search for accurate first
            $c = ExamController::subsetAccurateSums($marks, $n, $target); 
            $listAccurate = $c[0];
            $sumAccurate = $c[1];
            

            if(empty($listAccurate)){
                $d = ExamController::subsetNearestSums($marks, $n, $target);
                $listNearest = $d[0];
                $sumNearest = $d[1];
                $sum4 = $d[1];

                $result = ExamController::search($questions, $d[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids4[] = $values[$key];
                }
            }else{
                $result = ExamController::search($questions, $c[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids4[] = $values[$key];
                }
                $sum4 = $c[1];
                //dd($ids4);
            }
        }
        if(in_array('5',$data['level']))
        {
            $questions = $subject->questions()->where('level',5)->get()->pluck('mark','id');
            $marks = $questions->toArray();
            sort($marks);

            //dd($questions);
            //how many marks
            $n = sizeof($marks);
            
            //target of mark
            $target = $data['mark'][4];
            $target5 = $target;
            //search for accurate first
            $c = ExamController::subsetAccurateSums($marks, $n, $target); 
            $listAccurate = $c[0];
            $sumAccurate = $c[1];
            

            if(empty($listAccurate)){
                $d = ExamController::subsetNearestSums($marks, $n, $target);
                $listNearest = $d[0];
                $sumNearest = $d[1];
                $sum5 = $d[1];

                $result = ExamController::search($questions, $d[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids5[] = $values[$key];
                }
            }else{
                $result = ExamController::search($questions, $c[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids5[] = $values[$key];
                }
                $sum5 = $c[1];
                //dd($ids5);
            }
        }
        if(in_array('6',$data['level']))
        {
            $questions = $subject->questions()->where('level',6)->get()->pluck('mark','id');
            $marks = $questions->toArray();
            sort($marks);

            //dd($questions);
            //how many marks
            $n = sizeof($marks);
            
            //target of mark
            $target = $data['mark'][5];
            $target6 = $target;
            //search for accurate first
            $c = ExamController::subsetAccurateSums($marks, $n, $target); 
            $listAccurate = $c[0];
            $sumAccurate = $c[1];
            

            if(empty($listAccurate)){
                $d = ExamController::subsetNearestSums($marks, $n, $target);
                $listNearest = $d[0];
                $sumNearest = $d[1];
                $sum6 = $d[1];

                $result = ExamController::search($questions, $d[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids6[] = $values[$key];
                }
                /*print "List of the values ".json_encode($marks)."<br>";
                print "Desired value ".$target."<br>";
                print "Nearest sum ".$sumNearest."<br>";
                print "Nearest list".json_encode($listNearest);*/
            }else{
                $result = ExamController::search($questions, $c[0]);
                $location = array();
                $location = $result[0];
                $keys = array_unique($location);
                $values = $result[1];
                //get ids
                foreach($keys as $key)
                {
                    $ids6[] = $values[$key];
                }
                $sum6 = $c[1];
                //dd($ids6);
                /*print "List of the original ".json_encode($questions->toArray())."<br>";
                print "List of the values ".json_encode($marks)."<br>";
                print "Desired value ".$target."<br>";
                print "Accurate sum ".$sumAccurate."<br>";
                print "Accurate list".json_encode($listAccurate);*/
            }
        }
        //get marks
        //dd($ids3);
        $ids = array();
        array_push($ids,$ids1);
        array_push($ids,$ids2);
        array_push($ids,$ids3);
        array_push($ids,$ids4);
        array_push($ids,$ids5);
        array_push($ids,$ids6);
        //dd($ids);
        $sums = array();
        array_push($sums,$sum1);
        array_push($sums,$sum2);
        array_push($sums,$sum3);
        array_push($sums,$sum4);
        array_push($sums,$sum5);
        array_push($sums,$sum6);
        //dd($sums);

        $targets = array();
        array_push($targets,$target1);
        array_push($targets,$target2);
        array_push($targets,$target3);
        array_push($targets,$target4);
        array_push($targets,$target5);
        array_push($targets,$target6);
        //dd($targets);

        $questions1 = array();
        foreach($ids[0] as $id)
        {
            $questions1[] = Question::where('level',1)->find($id);
        }

        $questions2 = array();
        foreach($ids[1] as $id)
        {
            $questions2[] = Question::where('level',2)->find($id);
        }

        $questions3 = array();
        foreach($ids[2] as $id)
        {
            $questions3[] = Question::where('level',3)->find($id);
        }

        $questions4 = array();
        foreach($ids[3] as $id)
        {
            $questions4[] = Question::where('level',4)->find($id);
        }

        $questions5 = array();
        foreach($ids[4] as $id)
        {
            $questions5[] = Question::where('level',5)->find($id);
        }

        $questions6 = array();
        foreach($ids[5] as $id)
        {
            $questions6[] = Question::where('level',6)->find($id);
        }
        //$question1 = Question::where('level',1)->find($ids[0][0]);
        //dd($questions3);
        $id1 = ($questions1[0]->pluck('id'));
        return view('exam.product',compact('questions1','questions2','questions3',
        'questions4','questions5','questions6','subject','sums','targets'));
    }

    public function product(Subject $subject)
    {
        $data = request()->validate([
            'questions' => 'required',
            'exam' => 'required'
        ]);

        //dd($data['questions']);
        $matches=array();
        foreach($data['questions'] as $a)
        {
            $int = (int) filter_var($a, FILTER_SANITIZE_NUMBER_INT);
            array_push($matches, $int);
        }        
        //dd($matches);

        $marks = Question::find($matches)->pluck('mark');

        $sum = $marks->sum();
        //dd($marks);

        $exam = $subject->exams()->create([
            'exam' => $data['exam'], 
            'mark' => $sum
        ]);

        $question = Question::whereIn('id',$matches)->update([
            'exam_id' => $exam->id,
        ]);


        return redirect('exams/'.$subject->id);

    }

    public function show(Exam $exam)
    {
        //$ids = Subject::find($exam->subject_id)->questions->pluck('id');
        //$questions = $subject->questions()->with('chapter')->find($ids);
        $questions = $exam->questions;
        ////dd($questions);
        return view('exam.show', compact('exam','questions'));
    }

    public function destroy(Exam $exam)
    {
        //$ids = Subject::find($exam->subject_id)->questions->pluck('id');
        //$questions = $subject->questions()->with('chapter')->find($ids);
        $exam->delete();
        ////dd($questions);
        return redirect('exams/'.$exam->subject_id); 
    }

    public function word(Exam $exam)
    {
        $questions = $exam->questions;

        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection();

        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(20);

        $phpWord->addTitleStyle(1, array('size' => 20), array('numStyle' => 'hNum', 'numLevel' => 0));
        $title = $section->addTitle($exam->exam, 1);
       

        foreach($questions as $key => $question)
        {
            //dd($question->mark);
            $text = $section->addText($key+1 .") ".$question->question);
            $section->addText($question->mark." mark");
        }


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('helloWorld.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('helloWorld.docx'));
    }


    public function subsetAccurateSums($marks, $n, $target) 
    { 
        
            // There are totoal 2^n subsets 
            $total = 1 << $n; 
            $list = array();

        // Consider all numbers 
        // from 0 to 2^n - 1 
        for ($i = 0; $i < $total; $i++) 
        { 
            $sum = 0;

            // Consider binary reprsentation of 
            // current i to decide which elements 
            // to pick.
            $hold = array();		
            for ($j = 0; $j < $n; $j++){	
                if ($i & (1 << $j)){
                    $sum += $marks[$j];
                    array_push($hold, $marks[$j]);
                }
            }
            
            if($sum == $target){
                $list[] = $hold;
            }
            // Print sum of picked elements. 
            //echo $sum , " "; 
        }

            return array($list,$target, $marks);
    } 

    public function subsetNearestSums($marks, $n, $target) 
    { 
        
            // There are totoal 2^n subsets 
            $total = 1 << $n; 
            $list = array();

            $near = 0;
            $forMax	= array();
            $max=0;
            $forMin = array();
            $min =0;
            
        // Consider all numbers 
        // from 0 to 2^n - 1 
        
        for ($i = 0; $i < $total; $i++) 
        { 
            $sum = 0;
            $hold = array();
            
            for ($j = 0; $j < $n; $j++){	
                if ($i & (1 << $j)){
                    $sum += $marks[$j];
                    array_push($hold, $marks[$j]);
                }
            }
            if($sum <= $target){
                array_push($forMax, $sum);
            }
            if($sum >= $target){
                array_push($forMin, $sum);
            }
            //echo "forMin";
            //print json_encode($forMin);
            //echo "<br>";
            
            if(!empty($forMax)){
                $max = max($forMax);
            }
            
            if(!empty($forMin)){
                $min = min($forMin);
            }
        }
        
        $check = array();
            $max1 = $target - $max;
            $min1 = $min - $target;
            
            if($max1 > $min1){
                $near = $min;
            }else{
                $near = $max;
            }
        
        for ($i = 0; $i < $total; $i++) 
        { 
            $sum = 0;
            $hold = array();
            
            for ($j = 0; $j < $n; $j++){	
                if ($i & (1 << $j)){
                    $sum += $marks[$j];
                    array_push($hold, $marks[$j]);
                }
            }
            
            if($sum == $near){
                $list[] = $hold;
            }
            //print json_encode($hold);
        }
        //print json_encode($hold);
            return array($list,$near, $marks);
    }

    public function search($products, $value)
    {
        ////dd($products->toArray());
        $test = $products->toArray();

        $power_set = ExamController::pc_array_power_set($test);

        ////dd($power_set[0]);
        $aa = array(2,6);
        $ab = array(6,2);

       sort($aa);
       sort($ab);
       if($aa == $ab)
       {
           $true;       
       }
        
       $ids=array();
       
        foreach($value as $a)
        {   $count=0;
            foreach($power_set[0] as $b)
            {
                sort($a);
                sort($b);
                if($a == $b){
                    array_push($ids, $count);
                 }
                 
                 $count++;
            }
        }
        
        return array($ids,$power_set[1]);
    }

    public function pc_array_power_set($array) 
    {
        // initialize by a//dding the empty set
        $results = array(array( ));
        $ids = array(array( ));
    
        foreach ($array as $key => $element)
        {
        
            foreach ($results as $combination)
            {
                array_push($results, array_merge(array($element), $combination));
            }
            foreach($ids as $combinations)
            {
                array_push($ids, array_merge(array($key), $combinations));
            }
        }
        return array($results,$ids);
    }
}
