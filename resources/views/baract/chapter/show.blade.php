@extends('dashboard.main')

<?php //die('dfhdjhdfkjhgkjdhfghdfk'); ?>
@section('title', '| View Post')

@section('content-of-user')
   
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1> View chapter <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b># {{$chapter->id}}  {{ str_limit($chapter->heading, 50)}}</b></h3>
                        <div class="box-tools pull-right">
                            <!-- <a href="{{url('chapter')}} " class="btn">Back to chapters</a> -->

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
                            <p><b>Chapter Number</b></p>
                            <p>{{$chapter->chapter_number}}</p>
                            <hr>
                            <p><b>Chapter title</b></p>
                            <p>{{$chapter->title}}</p>
                            <hr>
                            <p><b>Bar Act</b></p>
                            <p>{{$baract_name}}</p>
                            
                            
                            
                        </div>
                        
                        <a class="btn btn-info pull-right" href="{{URL::to('/chapter')}}/{{$chapter->id}}/edit">Edit</a>

                       

                        <form action="{{ route('chapter.destroy', $chapter->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger pull-right del-chapter">Delete</button>
                        </form>

                        <a href="{{url('chapter')}} " class="btn btn-default">Back to chapters</a>
                            
                        </div>
                    <div class="box-footer text-muted "> Edit chapter </div>
                </div>
            </section>
        </div>




@endsection