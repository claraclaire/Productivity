@extends('layout.student_profile')
<style>

  .txt{.
        margin-bottom: 40px;
        width:320px;
        font-family: sans-serif;
    }
  .in{
        background-color: #8DCAC7;
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
                
                <h1 class="page-header">
                   Evaluation of Practicum Experience - ({{ $getcompany->company->companyname }})
                  
                   
                </h1>

                <p style="padding-left:40px;">Please rate the practicum experience on the following areas by indicating the
                    rating which most represents your evaluation</p>
                    
     @if (count($errors) > 0)
     <div class="alert alert-danger">
     <strong>Whoops! </strong> There were some problems with your input. <br> <br>
     <ul>
    
            @foreach ($errors->all() as $error)
         <li>{{ $error }} </li>
        @endforeach
     </ul>
     </div>
     @endif 
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
               @if($eval == 1)
                   <h2 style="padding-left:40px;">You already submitted an Evaluation!</h2>
                @else  
             {!! Form::open(array('url'=>'/student/evaluatecomp'))!!}

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
                                <td><select name="immediate_superior"> 
                                       <option>5</option>
                                        <option>4</option>
                                         <option>3</option>
                                          <option>2</option>
                                           <option>1</option>
                                    </select>
                                    </td>
                                 <td><textarea name="iscomment" class="form-control"></textarea></td>
                            </tr>
                             <tr>
                               <td>Co-worker</td>
                                <td><select name="co_worker"> 
                                       <option>5</option>
                                        <option>4</option>
                                         <option>3</option>
                                          <option>2</option>
                                           <option>1</option>
                                            </select>
                                            </td>
                                 <td><textarea name="cwcomment" class="form-control"></textarea></td>
                            </tr>
                             <tr>
                               <td>Workplace</td>
                                <td><select name="workplace"> 
                                       <option>5</option>
                                        <option>4</option>
                                         <option>3</option>
                                          <option>2</option>
                                           <option>1</option> </select></td>
                                 <td><textarea name="wpcomment" class="form-control"></textarea></td>
                            </tr>
                             <tr>
                               <td>Opportunities to learn new skills</td>
                                <td><select name="opportunities"> 
                                       <option>5</option>
                                        <option>4</option>
                                         <option>3</option>
                                          <option>2</option>
                                           <option>1</option> </select></td>
                                 <td><textarea name="ocomment" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                               <td>Tasks assigned</td>
                                <td><select name="tasks_assigned"> 
                                       <option>5</option>
                                        <option>4</option>
                                         <option>3</option>
                                          <option>2</option>
                                           <option>1</option> </select></td>
                                 <td><textarea name="tacomment" class="form-control"></textarea></td>
                            </tr>
                             <tr>
                               <td>Overall experience</td>
                                <td><select name="overall_experience"> 
                                       <option>5</option>
                                        <option>4</option>
                                         <option>3</option>
                                          <option>2</option>
                                           <option>1</option> </select></td>
                                 <td><textarea name="oecomment" class="form-control"></textarea></td>
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
                                 <td><textarea name="greatest_benefits" class="form-control"></textarea></td>
                       
                        </tr>
                         <tr>
                            <td>What were the biggest problems you encountered in this internship?</td>
                       
                        </tr>
                        <tr>
                                 <td><textarea name="biggest_problems" class="form-control"></textarea></td>
                       
                        </tr>
                         <tr>
                            <td>What suggestions do you have for improving the practicum program?</td>
                       
                        </tr>
                        <tr>
                                 <td><textarea name="suggest_improvement" class="form-control"></textarea></td>
                       
                        </tr>
                        <tr>
                            <td>Do you recommend this company to future practicum students?</td>
                       
                        </tr>
                        <tr>
                                 <td><textarea name="recommend_company" class="form-control"></textarea></td>
                       
                        </tr>
                        </thead>
                        </table>
                        </div>
                          <div class="panel-body">
                          @if($eval == 1)
                          <h3></h3>
                          @else
                         {!!Form::submit('Submit',array("class"=>"txt btn-primary btn"))!!}
                          @endif
                        {!!Form::close()!!} 
                  </div>
                            
                                           </div>   

           @endif                            
            </div>
        </div>
    </div>
        <!-- /#page-wrapper -->


@endsection