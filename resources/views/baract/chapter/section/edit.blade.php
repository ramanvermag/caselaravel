@extends('dashboard.main')

@section('title', '| Permissions')

@section('content-of-user')

<div class="content-wrapper">
            <section class="content-header">
                <h1> chapter <small>it all starts here</small> </h1>
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
<?php die; ?>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit  <b>{{ str_limit($chapter->heading,30)}}</b></h3>
                        <div class="box-tools pull-right">
                            <!-- <span class="btn"><a href="{{ url('chapter') }}">Back to chapter</a></span> -->
                        </div>
                    </div>
                   
                    <div class="box-body"> 
                        
                    <div class="row">
                        <div class="col-md-12">

                        {{-- @include ('errors.list') --}}

                        {{-- Using the Laravel HTML Form Collective to create our form --}}
                        
                        {{ Form::model($chapter, array('route' => array('chapter.update', $chapter->id), 'method' => 'PUT')) }}
                        


                        <div class="form-group">
                            {{ Form::label('heading', 'Heading') }}
                            {{ Form::text('heading', null, array('class' => 'form-control')) }}
                            <br>

                            {{ Form::label('chapter', 'chapter') }}
                            {{ Form::textarea('chapter', null, array('class' => 'form-control')) }}
                            <br>

                            {{ Form::label('file_link', 'File Link') }}
                            {{ Form::url('file_link', null, array('class' => 'form-control')) }}
                            <span class="text-muted eg-text"><small>http://www.example.com</small></span>
                            <br>

                            {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
                            <a class="btn btn-default" href="{{url('chapter')}} ">Cancle</a>
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
