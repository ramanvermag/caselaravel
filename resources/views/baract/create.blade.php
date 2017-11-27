@extends('dashboard.main')
<?php //die; ?>
@section('title', '| Create baract')

@section('content-of-user')
<?php //die; ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Bar Act <small>it all starts here</small> </h1>
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
                <div class="alert alert-success alert-dismissible">
                    
                    
                     
                         
                    {{ Session::get('message') }}
                     
                    
                
                </div>
                @endif

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create new Bar Act</h3>
                        <div class="box-tools pull-right">
                            <span class="btn btn-link"><a href="{{ url('baract') }}">View all</a></span>
                        </div>
                    </div>
                   
                    <div class="box-body"> 
                        
                        <div class="row">
                            <div class="col-md-12 ">

                                {{-- @include ('errors.list') --}}

                                {{-- Using the Laravel HTML Form Collective to create our form --}}

                                {{ Form::open(array('route' => 'baract.store')) }} 

                                    <div class="form-group">
                                        <p>
                                            
                                        
                                        {{ Form::label('title', 'Bar Act title') }}

                                        {{ Form::text('title', null, array('class' => 'form-control bar-act-name', 'placeholder' => 'Enter title of Bar Act')) }}
                                        </p>

                                        <p>                                           
                                            <span class="text-muted eg-text">
                                                <em>After creating bar act go to 
                                                    <b>chapters</b> to add chapters in Bar Act.
                                                </em>
                                            </span>
                                        </p>

                                        <p>
                                            
                                            {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
                                        
                                        </p>
                                        
                                    </div>

                                {{ Form::close() }}
                            </div>
                        </div>


                     </div>
                    <div class="box-footer"> Footer </div>
                </div>
            </section>
        </div>

@endsection