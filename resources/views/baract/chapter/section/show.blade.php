@extends('dashboard.main')

<?php //die('dfhdjhdfkjhgkjdhfghdfk'); ?>
@section('title', '| View Post')

@section('content-of-user')


                
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Edit chapter section <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                          
                <?php  //print_r($section); ?>
                    
                <div class="box-header with-border">
                    <h3 class="box-title"><b># {{$section->id}}  {{ str_limit($section->heading, 50)}}</b></h3>


                    <table class="table">
                        <tr >
                            <!-- <th scope="row">id</th> -->
                            <th scope="row">Section number</th>
                            <th scope="row">Section name</th>
                            <th scope="row">Description</th>
                            <!-- <th scope="row">Baract chapter id</th> -->
                            <th scope="row">Action</th>
                        </tr>
                        <tr >
                            <!-- <td scope="col">{{$section->id}} </td> -->
                            <td scope="col">{{$section->title}} </td>
                            <td scope="col">{{$section->description}} </td>
                            <!-- <td scope="col">{{$section->baract_chapter_id}} </td> -->
                            <td scope="col">edit </td>
                        </tr>
                    </table>
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
                <!-- 
                <div class="box-body">
                    <div class="bs-callout">
                        <p><b>Heading</b></p>
                        <p>{{$section->heading}}</p>
                        <hr>
                        <p><b>Message</b></p>
                        <p>{{$section->message}}</p>
                        <hr>
                        <p><b>Link</b></p>
                        <a  href="{{$section->file_link}}">{{$section->file_link}}</a>
                        
                    </div>
                    
                    <a class="btn btn-info pull-right" href="{{URL::to('/message')}}/{{$section->id}}/edit">Edit</a>

                    <form action="{{ route('section.destroy', $section->id) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger pull-right del-message">Delete</button>
                    </form>

                    <a href="{{url('section')}} " class="btn btn-default">Back to messages</a>
                        
                </div>
                
                 -->
                    <div class="box-footer text-muted "> Edit message </div>
                </div>
            </section>
        </div>
@endsection