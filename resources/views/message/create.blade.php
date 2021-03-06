@extends('dashboard.main')

@section('title', '| Create Message')

@section('content-of-user')

        <div class="content-wrapper">
            <section class="content-header">
                <h1> Messages <small>it all starts here</small> </h1>
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
                        <h3 class="box-title">Create new message</h3>
                        <div class="box-tools pull-right">
                            <span class="btn"><a href="{{ url('message') }}">View all</a></span>
                        </div>
                    </div>
                   
                    <div class="box-body"> 
                        
                    <div class="row">
                        <div class="col-md-12 ">

                        {{-- @include ('errors.list') --}}

                        {{-- Using the Laravel HTML Form Collective to create our form --}}
                        {{ Form::open(array('route' => 'message.store')) }} 

                        <div class="form-group">
                            {{ Form::label('heading', 'Heading') }}
                            {{ Form::text('heading', null, array('class' => 'form-control', 'placeholder' => 'Message heading')) }}
                            <br>

                            {{ Form::label('message', 'Message') }}
                            {{ Form::textarea('message', null, array('class' => 'form-control', 'placeholder' => 'Message')) }}
                            <br>

                            {{ Form::label('file_link', 'File link') }}
                            {{ Form::url('file_link', null, array('class' => 'form-control','placeholder' => 'File link')) }}
                            <span class="text-muted eg-text"><small>http://www.example.com</small></span>
                            <br>

                            {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
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