@extends('landingpage')


@section('content')

    <nav class="navbar navbar-default navbar-fixed-top">
        <div >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div>
               
                <a class="navbar-brand page-scroll" href="#page-top">Pause Break</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div  >
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/login">Log In</a>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
           <!--  <img src="../design/images/logo.png" width="700" height="700"> -->
                <h1 id="homeHeading">Pause Break</h1>
                <hr>
                <p>Pause Break is a system which is develop to keep track of the user's computer whereabouts. This will show the summary reports of the users activities during work. </p>
               
            </div>
        </div>
    </header>

    
   
@endsection