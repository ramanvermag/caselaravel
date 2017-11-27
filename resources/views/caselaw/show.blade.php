@extends('dashboard.main')

<?php //die('dfhdjhdfkjhgkjdhfghdfk'); ?>
@section('title', '| View Post')

@section('content-of-user')

    
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Edit caselaw <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Title :<b> {{$caselaw->title}}</b></h3>
                        <div class="box-tools pull-right">
                            <!-- <a href="{{url('caselaws')}} " class="btn">Back to caselaws</a> -->

                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> 
                                <i class="fa fa-minus"></i>
                            </button>
                            <!-- 
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> 
                                <i class="fa fa-times"></i>
                            </button>
                             -->
                        </div>
                    </div>
                    <div class="box-body">
                            
                        
                        <div class="bs-callout">
                            <p><b>Title</b></p>
                            <p>{{$caselaw->title}}</p>
                            <hr>
                            <p><b>Description</b></p>
                            <p>{{$caselaw->description}}</p>
                        <hr>
                        <p><b>Link</b></p>
                        
                            <a href="{{$caselaw->link}}">{{$caselaw->link}} </a>
                            
                        </div>
                        
                        <a class="btn btn-info pull-right" href="{{URL::to('/caselaws')}}/{{$caselaw->id}}/edit">Edit</a>
                        <a class="btn btn-danger pull-right del-caselaw" href="{{URL::to('/deleteCaselaw')}}/{{$caselaw->id}}">Delete</a>
                        <a href="{{url('caselaws')}} " class="btn btn-default pull-left">Back to caselaws</a>

                            
                        </div>
                    <div class="box-footer text-muted"> Edit caselaw </div>
                </div>
            </section>
        </div>




@endsection