@extends('dashboard.main')

@section('title', '| Create caselaw')

@section('content-of-user')

        <div class="content-wrapper">
            <section class="content-header">
                <h1> CaseLaws <small>it all starts here</small> </h1>
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

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Caselaws</h3>
                        <div class="box-tools pull-right">
                            <span class="btn"><a href="{{ url('caselaws') }}">View all</a></span>
                        </div>
                    </div>
                   
                    <div class="box-body"> 
                        
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">

                        {{-- @include ('errors.list') --}}

                        {{-- Using the Laravel HTML Form Collective to create our form --}}
                        {{ Form::open(array('route' => 'caselaws.store')) }} 

                        <div class="form-group">
                            {{ Form::label('title', 'Title') }}
                            {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Enter caselaw title')) }}
                            <br>

                            {{ Form::label('description', 'Description') }}
                            {{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Description')) }}
                            <br>

                            {{ Form::label('link', 'Link') }}
                            {{ Form::url('link', null, array('class' => 'form-control','placeholder' => 'Link')) }}
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