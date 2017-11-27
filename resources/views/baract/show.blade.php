@extends('dashboard.main')

<?php //die('dfhdjhdfkjhgkjdhfghdfk'); ?>
@section('title', '| View Post')

@section('content-of-user')
   
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Bar Acts <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        
                    <a href="{{ url('baract') }}">                      
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a>
                    
                    </div>
                    <div class="box-body">                      


                            <p><h4><b>{{$baract->title}}</b></h4></p>
                            <h5 >Chapters</h5>
                            
                            <div class="list-group">
                                
                                
                                  
                            @foreach($chapter_data as $chapter)
                            
                            @if($chapter=="No chapters")
                            
                            <div class="list-group-item">
                                
                                There's no chapter in this bar act yet. go to <b><a href="{{url('chapter/create')}}">Create Chapters</a></b> to add chapters in this bar act.
                            </div>
                            
                            @else
                            
                            <a class="list-group-item" href="{{url('chapter')}}/{{$chapter[0]}}">Chapter No : <span class=""><b>{{$chapter[2]}}</b></span>&nbsp;&nbsp; {{ $chapter[1] }} </a>
                            
                            @endif


                            @endforeach
                       
                            </div>
                            
                            
                            
                            
                        <!-- </div> -->
                        <p></p>
                        <a class="btn btn-info pull-right" href="{{URL::to('/baract')}}/{{$baract->id}}/edit">Edit</a>

                       

                        <form action="{{ route('baract.destroy', $baract->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger pull-right del-message">Delete</button>
                        </form>

                        <!-- <a href="{{url('baract')}} " class="btn btn-default">Back to Bar Acts</a> -->
                            
                        </div>
                    <div class="box-footer text-muted "> Bar Acts </div>
                </div>
            </section>
        </div>




@endsection