@extends('layout.coordinator_profile')
<style>

  .txt{.
        margin-bottom: 40px;
        width:320px;
        font-family: sans-serif;
    }
  .in{
       
        font-family: sans-serif;
    }

  .lamisa tr td{
    padding: 10px;
    font-weight: bold;
    padding-left: 40px;
  }
  .tab tr td{
    padding: 10px;
    
  }
  .table-responsive
  {
  	padding-left: 80px;
  }
  .page-header
  {
  	padding-left: 40px;
  }
    
</style>

@section('content')

<div id="page-wrapper">
      <!-- /.col-lg-12 -->
         <div class="row">
            <div class="col-lg-12">
             
                <span style="float:right; font-size:20px;">
                </span>
                 @if($value == false)
                <h1 class="page-header">
                   Evaluation of Practicum Experience - {{$evaluation->company->companyname}}
                  
                </h1>
                <p style="padding-left:40px;">Please rate the practicum experience on the following areas by indicating the
                    rating which most represents your evaluation</p>
                    
  
                <table class="lamisa">
                    <tr>
                                <td>RATING</td>
                                
                            </tr>


                     <tr>
                                <td>5 - Excellent</td>
                                <td> 4 - Very Good</td>
                                <td>3 - Good</td>
                                 <td>2 - Fair</td>
                                  <td>1 - Poor</td>
                            </tr>
                </table>

             {!! Form::open()!!}


                <div class="table-responsive">
                    <table class="tab">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Rating</th>
                                <th>Comments</th>
                            </tr>
                            <tr>
                               <td>Immediate superior</td>
                                <td><input type = "text" class = "form-control" value = "{{$evaluation->immediate_superior}}" disabled></td>
                                 <td><input type = "textarea" name="iscomment" class="form-control" value = "{{$evaluation->iscomment}}" disabled></td>
                            </tr>
                             <tr>
                               <td>Co-worker</td>
                                <td><input type = "text" class = "form-control" value = "{{$evaluation->co_worker}}" disabled></td>
                                 <td><input type = "textarea" name="cwcomment" class="form-control" value = "{{$evaluation->cwcomment}}" disabled></td>
                            </tr>
                             <tr>
                               <td>Workplace</td>
                                <td><input type = "text" class = "form-control" value = "{{$evaluation->workplace}}" disabled></td>
                                 <td><input type = "textarea" name="wpcomment" class="form-control" value = "{{$evaluation->wpcomment}}" disabled></td>
                            </tr>
                             <tr>
                               <td>Opportunities to learn new skills</td>
                                <td><input type = "text" class = "form-control" value = "{{$evaluation->opportunities}}" disabled></td>
                                 <td><input type = "textarea" name="ocomment" class="form-control" value = "{{$evaluation->ocomment}}" disabled></td>
                            </tr>
                            <tr>
                               <td>Tasks assigned</td>
                                <td><input type = "text" class = "form-control" value = "{{$evaluation->tasks_assigned}}" disabled></td>
                                 <td><input type = "textarea" name="tacomment" class="form-control" value = "{{$evaluation->tacomment}}" disabled></td>
                            </tr>
                             <tr>
                               <td>Overall experience</td>
                                <td><input type = "text" class = "form-control" value = "{{$evaluation->overall_experience}}" disabled></td>
                                 <td><input type = "textarea" name="oecomment" class="form-control" value = "{{$evaluation->oexperience}}" disabled></td>
                            </tr>

                        </thead>
                        </table>
                        <div class="table-responsive">
                        <table class="tab">
                        <thead>
                        <tr>
                            <td>What were the greatest benefits you received from this internship? </td>
                       
                        </tr>
                        <tr>
                                 <td><input type = "textarea" name="greatest_benefits" class="form-control" value = "{{$evaluation->greatest_benefits}}" disabled></td>
                       
                        </tr>
                         <tr>
                            <td>What were the biggest problems you encountered in this internship?</td>
                       
                        </tr>
                        <tr>
                                 <td><input type = "textarea" name="biggest_problems" class="form-control" value = "{{$evaluation->biggest_problems}}" disabled ></td>
                       
                        </tr>
                         <tr>
                            <td>What suggestions do you have for improving the practicum program?</td>
                       
                        </tr>
                        <tr>
                                 <td><input type = "textarea" name="suggest_improvement" class="form-control" value = "{{$evaluation->suggest_improvement}}" disabled></td>
                       
                        </tr>
                        <tr>
                            <td>Do you recommend this company to future practicum students?</td>
                       
                        </tr>
                        <tr>
                                 <td><input type = "textarea" name="recommend_company" class="form-control" value = "{{$evaluation->recommend_company}}" disabled></td>
                       
                        </tr>
                        </thead>
                        </table>
                        </div>
                          <div class="panel-body">
                        {!!Form::close()!!} 
                    </div>
                            
                                           </div> 
                    @else($value == true)


                     <h1 class="page-header">
                   Evaluation of Practicum Experience - No Submittion yet
                  
                </h1>
                <p style="padding-left:40px;">Please rate the practicum experience on the following areas by indicating the
                    rating which most represents your evaluation</p>
                    
  
                <table class="lamisa">
                    <tr>
                                <td>RATING</td>
                                
                            </tr>


                     <tr>
                                <td>5 - Excellent</td>
                                <td> 4 - Very Good</td>
                                <td>3 - Good</td>
                                 <td>2 - Fair</td>
                                  <td>1 - Poor</td>
                            </tr>
                </table>

             {!! Form::open()!!}


                <div class="table-responsive">
                    <table class="tab">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Rating</th>
                                <th>Comments</th>
                            </tr>
                            <tr>
                               <td>Immediate superior</td>
                                <td><input type = "text" class = "form-control" value = "" disabled></td>
                                 <td><textarea name="iscomment" class="form-control" value = "" disabled></textarea></td>
                            </tr>
                             <tr>
                               <td>Co-worker</td>
                                <td><input type = "text" class = "form-control" value = "" disabled></td>
                                 <td><textarea name="cwcomment" class="form-control" value = "" disabled></textarea></td>
                            </tr>
                             <tr>
                               <td>Workplace</td>
                                <td><input type = "text" class = "form-control" value = "" disabled></td>
                                 <td><textarea name="wpcomment" class="form-control" value = "" disabled></textarea></td>
                            </tr>
                             <tr>
                               <td>Opportunities to learn new skills</td>
                                <td><input type = "text" class = "form-control" value = "" disabled></td>
                                 <td><textarea name="ocomment" class="form-control" value = "" disabled></textarea></td>
                            </tr>
                            <tr>
                               <td>Tasks assigned</td>
                                <td><input type = "text" class = "form-control" value = "" disabled></td>
                                 <td><textarea name="tacomment" class="form-control" value = "" disabled></textarea></td>
                            </tr>
                             <tr>
                               <td>Overall experience</td>
                                <td><input type = "text" class = "form-control" value = "" disabled></td>
                                 <td><textarea name="oecomment" class="form-control" value = "" disabled></textarea></td>
                            </tr>

                        </thead>
                        </table>
                        <div class="table-responsive">
                        <table class="tab">
                        <thead>
                        <tr>
                            <td>What were the greatest benefits you received from this internship? </td>
                       
                        </tr>
                        <tr>
                                 <td><textarea name="greatest_benefits" class="form-control" value = "" disabled></textarea></td>
                       
                        </tr>
                         <tr>
                            <td>What were the biggest problems you encountered in this internship?</td>
                       
                        </tr>
                        <tr>
                                 <td><textarea name="biggest_problems" class="form-control" value = "" disabled ></textarea></td>
                       
                        </tr>
                         <tr>
                            <td>What suggestions do you have for improving the practicum program?</td>
                       
                        </tr>
                        <tr>
                                 <td><textarea name="suggest_improvement" class="form-control" value = "" disabled></textarea></td>
                       
                        </tr>
                        <tr>
                            <td>Do you recommend this company to future practicum students?</td>
                       
                        </tr>
                        <tr>
                                 <td><textarea name="recommend_company" class="form-control" value = "" disabled></textarea></td>
                       
                        </tr>
                        </thead>
                        </table>
                        </div>
                          <div class="panel-body">
                        {!!Form::close()!!} 
                    </div>
                            
                                           </div> 

                    @endif
                                       
            </div>
        </div>
    </div>
        <!-- /#page-wrapper -->

	
@endsection