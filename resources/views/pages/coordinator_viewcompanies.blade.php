@extends('layout.coordinator_profile')
  
@section('content')


<div class="container">
	<div class="row">
    <br>
    <strong><b><h2>COMPANIES</h2><b></strong>
    <hr>
        <div class="col-lg-12">
            <input type="search" class="form-control" id="input-search" placeholder="Search Company..." >
        </div>
        <br><br><br><br>
        <div class="searchable-container">

         @foreach($company as $company)
            <div class="items col-xs-12 col-sm-6 col-md-6 col-lg-6 clearfix"><hr>
               <div class="info-block block-info clearfix">
                    <div class="square-box pull-left">
                        <span><img  src = "../../design/icon/company.png" width="100" height="70"></span>
                    </div>
                    <h2><a href="{{URL::to('/coordinator/viewcompanydetails/'. $company->userid)}}">{{ $company->companyname }}</a></h2>
                    <br>
                    <span><strong>Description :</strong> {{ $company->description }}</span>
                </div><hr>
            </div>
            
          @endforeach  
        </div>
	</div>
</div>


@endsection