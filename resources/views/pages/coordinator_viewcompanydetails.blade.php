@extends('layout.coordinator_profile')

@section('content')

<a href="/coordinator/companies"><img src="../../design/icon/back.png" width="40" height="40" style="padding-left:10px;padding-top:10px;"></a>
<div class="container">
      <div class="row">
   
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" style = "padding-left:0px;margin-left:100px;">
        

   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>{{ $companyinfo->companyname }}</strong> <button type = "submit" class = "txt btn-primary btn" style="float:right;height:20px;" ><a href="{{URL::to('/coordinator/viewcompanyintern/'. $companyinfo->userid)}}"><h6 style="color:white;">View Intern and Evaluation</h6></a></button></h3>
              
                
                
              

            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../../design/icon/company.png" class="img-circle img-responsive"> </div>
                
              
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Representative Name</td>
                        <td>{{ $companyinfo->repfirstname }} {{ $companyinfo->repmiddlename }} {{ $companyinfo->replastname }}</td>
                      </tr>
                      <tr>
                        <td>Representative Position</td>
                        <td>{{ $companyinfo->position }}</td>
                      </tr>
                      <tr>
                        <td>Registered Since</td>
                        <td>{{ $companyinfo->created_at }}</td>
                      </tr>
                      <tr>
                        <td>Email Address</td>
                        <td>{{ $user->email }}</td>
                      </tr>
                      <tr>
                        <td>Contact</td>
                        <td>{{ $companyinfo->contact }}</td>
                      </tr>
                        <tr>
                        <td>Located at</td>
                        <td>{{ $companyinfo->address }}</td>
                      </tr>
                      <tr>
                        <td>No. of Interns</td>
                        <td>{{ $counts }}</td>
                      </tr>
                      
                        <td>Description</td>
                        <td>{{ $companyinfo->description }}</td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                       
                    </div>
            
          </div>
        </div>
      </div>
    </div>


@endsection