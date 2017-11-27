@extends('dashboard.main')

@section('title', '| Permissions')

@section('content-of-user')

<div class="content-wrapper">
            <section class="content-header">
                <h1> Baract edit <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                 @if ($errors->any())             
                
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    
                    @endif
                     @if(Session::get('message'))
                <div class="callout callout-success">
                    
                    <h4>{{ Session::get('message') }}</h4>
                
                </div>
                @endif
                <div class="box">
                    <div class="box-header with-border">
                         <a href="{{ url('baract') }}">
                        
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a>
                        <div class="box-tools pull-right">
                            <!-- <span class="btn"><a href="{{ url('baract') }}">Back to baract</a></span> -->
                        </div>
                    </div>
                   
                    <div class="box-body"> 
                        
                    <div class="row">
                        <div class="col-md-12">

                        {{-- @include ('errors.list') --}}

                        {{-- Using the Laravel HTML Form Collective to create our form --}}
                        
                        {{ Form::model($baract, array('route' => array('baract.update', $baract->id), 'method' => 'PUT')) }}
                        


                        <div class="form-group">
                            {{ Form::label('title', 'Title') }}
                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                            <br>
                            
                                
                            <div class="row">
                                
                                <div class="col-md-12">

                                    
                                    @if (empty($chapter_data))
                                    
                                    <p>There's no chapter(s) in this baract go to <b><a href="{{url('chapter/create')}}">Create chapter</a></b> to add chpter in this baract.</p>
                                    @else
                                    <p>Click on the chapter(s) to <b>remove</b> from Baract.</p>

                                    @endif

                                </div>
                            </div>
                            
                            

                            <div class="row">
                                
                            <?php 

                                foreach ($chapter_data as $chapter) 
                                {
                                  // print_r($chapter);
                                  // echo "<br>";
                                  ?>
                                  <div class="col-md-2 col-sm-3">
                                      
                                  <input class="chapter-del-checkbox" id="{{$chapter[0]}}" type="checkbox" name="chapter[]" value="{{$chapter[0]}}">
                                  <label class="del-chkbox-lbl label label-info" for="{{$chapter[0]}}">Chapter no: {{$chapter[0]}}</label>
                                  </div>
                                  <?php
                                }


                             ?>
                            </div>

                             <br>
                             <br>









                            

                            {{ Form::submit('Update Baract', array('class' => 'btn btn-success')) }}
                            <a class="btn btn-default" href="{{url('baract')}} ">Cancle</a>
                            {{ Form::close() }}
                        </div>
                        </div>
                    </div>


                     </div>
                    <div class="box-footer"> Footer </div>
                </div>
            </section>
        </div>






@endsection
