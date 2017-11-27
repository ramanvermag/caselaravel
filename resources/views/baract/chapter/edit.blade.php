@extends('dashboard.main')

@section('title', '| Create Message')

@section('content-of-user')

        <div class="content-wrapper">
            <section class="content-header">
                <h1> Chapters <small>it all starts here</small> </h1>
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
                        <h3 class="box-title">Add new chapter's in Bar Acts</h3>
                        <div class="box-tools pull-right">
                            <span class="btn"><a href="{{ url('chapter') }}">View all</a></span>
                        </div>
                    </div>
                   
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 ">

                                {{-- @include ('errors.list') --}}

                                {{-- Using the Laravel HTML Form Collective to create our form --}}
                                
                                {{ Form::model($chapter, array('route' => array('chapter.update', $chapter->id), 'method' => 'PUT')) }} 

                                <div class="form-group">

                                    {{ Form::label('baracts', 'Bar Acts') }}
                                    
                                    <p>
                                        {{Form::select('baract_id', $baracts, null, ['class' => 'form-control'])}}
                                    </p>


                                    <p>
                                        {{ Form::label('chapter_number', 'Chapter number') }}
                                        {{ Form::text('chapter_number', null, array('class' => 'form-control', 'placeholder' => 'Enter chapter number')) }}
                                    </p>

                                    <p>
                                        {{ Form::label('title', 'Chapter Name') }}
                                        {{ Form::text('title', null, array('class' => 'form-control','placeholder' => 'Enter chapter name')) }}
                                    <p>

                                        <span class="text-muted eg-text">
                                            
                                            <em>After adding <b>chapter</b> go to <b>section</b> to add sactions in a chapter.</em>

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