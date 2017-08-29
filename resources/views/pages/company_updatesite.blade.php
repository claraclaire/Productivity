@extends('layout.company_profile')

@section('content')

  <h1 style="padding-left:60px;padding-top:15px;">Update a Category</h1><hr width="1150">
<br>
<div style="padding-left:50px;">

 			{!! Form::open(array('url'=>'/company/updatesite'))!!}
               
               <div class="form-group">
                <label for="description">ID</label>
                <input type="text" class="form-control" name = "catsitesid" style="width:300px;" disabled value = "{{$getsite->catsitesid}}">
              </div>
              <div class="form-group">
                <label for="description">Name</label>
                <input type="text" class="form-control" name = "sitename" style="width:300px;" value="{{$getsite->sitename}}">
              </div>
              <div class="form-group">
                <label for="username">Category</label>
                <select class="form-control" name = "category" style="width:200px;" value = "{{$getsite->category}}">
                	<option>Choose option</option>
                	<option>productive</option>
                	<option>unproductive</option>
                	<option>neutral</option>
                	
                </select>
              </div>
              <div class="form-group">
                <label for="username">Status    (1 - Active, 0 - Inactive)</label><br><br>
                <select class="form-control" name = "status" style="width:200px;" value = "{{$getsite->status}}">
                	<option>Choose option</option>
                	<option>1</option>
                	<option>0</option>
                	
                </select>
              </div>
              
             
             
  
              <br><br><br>
             {!!Form::submit('Update',array("class"=>"txt btn-primary btn", "name"=>"submit"))!!} &nbsp&nbsp
</div>
@endsection