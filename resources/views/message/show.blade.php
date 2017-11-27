@extends('dashboard.main')

<?php //die('dfhdjhdfkjhgkjdhfghdfk'); ?>
@section('title', '| View Post')

@section('content-of-user')
   
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Edit message <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b># {{$message->id}}  {{ str_limit($message->heading, 50)}}</b></h3>
                        <div class="box-tools pull-right">
                            <!-- <a href="{{url('message')}} " class="btn">Back to messages</a> -->

                           <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> 
                                <i class="fa fa-minus"></i>
                            </button> -->

                            <!-- 
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> 
                                <i class="fa fa-times"></i>
                            </button>
                             -->

                        </div>
                    </div>
                    <div class="box-body">                      


                        <div class="bs-callout">
                            <p><b>Heading</b></p>
                            <p>{{$message->heading}}</p>
                            <hr>
                            <p><b>Message</b></p>
                            <p>{{$message->message}}</p>
                            <hr>
                            <p><b>Link</b></p>
                            <a  href="{{$message->file_link}}">{{$message->file_link}}</a>
                            
                        </div>
                        
                        <a class="btn btn-info pull-right" href="{{URL::to('/message')}}/{{$message->id}}/edit">Edit</a>

                       

                        <form action="{{ route('message.destroy', $message->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger pull-right del-message">Delete</button>
                        </form>

                        <a href="{{url('message')}} " class="btn btn-default">Back to messages</a>
                            
                        </div>
                    <div class="box-footer text-muted "> Edit message </div>
                </div>
            </section>
        </div>




@endsection