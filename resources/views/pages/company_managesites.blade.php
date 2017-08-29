@extends('layout.company_profile')


{!! HTML::script('../../design/js/managesitetable.js') !!}

@section('content')


    <h1 style="padding-left:60px;padding-top:15px;">Manage Category</h1><hr width="1150">
<br>

<div style="float:right;padding-right:50px;">
<a href="#" data-toggle="modal" data-target="#squarespaceModal" style="" class="btn btn-primary">Add to Category</a>
</a>
                <!-- line modal -->
<div class="modal fade " id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog"  style = "margin-top: 60px;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="lineModalLabel">Add to Category</h3>
        </div>
        <div class="modal-body">
            
            <!-- content goes here -->
           
          
            <div class="form-group">
              
                {!! Form::open(array('url'=>'/company/addsites'))!!}
               
              <div class="form-group">
                <label for="description">SiteApp Name</label>
                <input type="text" class="form-control" name = "sitename" style="width:300px;">
              </div>
              <div class="form-group">
                <label for="username">Category</label>
                <select class="form-control" name = "category" style="width:200px;">
                	<option>Choose option</option>
                	<option>productive</option>
                	<option>unproductive</option>
                	<option>neutral</option>
                	
                </select>
              </div>
              
             
             
  
              <br><br><br>
             {!!Form::submit('Submit',array("class"=>"txt btn-primary btn", "name"=>"submit"))!!} &nbsp&nbsp
             <button data-dismiss="modal" class="btn btn-default" role = "button">Cancel</button>

              </table>
            </div>
              
              
              
            {!! Form::close() !!}

        </div>
        <div class="modal-footer">
            
        </div>
    </div>
  </div>
</div>
</div>
<!-- end modal -->
<div class="container" style="margin-top:40px">

<div class="panel panel-default">
<div style="margin:7px;padding-top:10px;">
        

      <!-- search -->
        <div class="col-xs-6 pull-left form-group">
            <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" style="border-radius:3px" placeholder="Search">
        </div>


</div>
        <br><br>

  <!--start table -->       
<div class="panel-body" style="padding-left:100px">

  <table class="table table-striped table-bordered" id="myTable" style="margin:0px;width:900px;">
    <thead>
    	<tr>
        
        <th>Site/Apps Name</th>
        <th>Category</th>
        <th>Status</th>
        <th style="width:130px">Actions</th>
        </tr>
	</thead>
	 @foreach($getall as $getall)
	<tbody>
		
		<td class="">{{$getall->sitename}}</td>
		<td class="">{{$getall->category}}</td>
		<td class="">
		@if($getall->status == '1')
		active
		@elseif($getall->status == '0')
		inactive
		@endif
		</td>
		<td style="padding-left:35px;">
  
		<button type="button" class="btn btn-xs btn-default" style="height:22px;">
         <a href="{{URL::to('/company/updatesite/'.$getall->catsitesid)}}"> <span class="glyphicon glyphicon-pencil"></span></a>
    </button>

			<button type="button" style="height:22px;" data-bind="click: $parent.remove" class="remove-news btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Delete" >
			   <a href="{{URL::to('/company/deletesite/'.$getall->catsitesid)}}"> <span class="glyphicon glyphicon-trash"></span></a>
			</button>
			
		</td>
	</tbody> 
	  @endforeach  
  </table>
  
 </div>
<!-- end table -->

<!-- footer -->
<div class="panel-footer"><br>
      <div class="col-xs-3"><div class="dataTables_info" id="example_info">Showing 51 - 60 of 100 total results</div></div>
    <div class="col-xs-6">
<div class="dataTables_paginate paging_bootstrap">
<ul class="pagination pagination-sm" style="margin:0 !important"><li class="prev disabled"><a href="#">← Previous</a></li>
<li class="active"><a href="#">1</a></li>

<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li class="next disabled"><a href="#">Next →</a></li></ul>
</div>
</div>
<div class="btn-group">
 <br><br>
</div>
  </div>
</div>
    

@endsection