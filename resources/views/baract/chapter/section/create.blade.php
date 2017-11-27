@extends('dashboard.main')

@section('title', '| Create section')

@section('content-of-user')

        <div class="content-wrapper">
            <section class="content-header">
                <h1> sections <small>it all starts here</small> </h1>
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
                        <h3 class="box-title">Create new section</h3>
                        <div class="box-tools pull-right">
                            <span class="btn"><a href="{{ url('section') }}">View all</a></span>
                        </div>
                    </div>

                   
                    <div class="box-body">
                        <div class="row">
                        <div class="col-md-12 ">

                            

                        {{-- @include ('errors.list') --}}

                        {{-- Using the Laravel HTML Form Collective to create our form --}}
                        {{ Form::open(array('route' => 'section.store')) }} 

                        <div class="form-group">
                        {{ Form::label('baracts', 'Chapters') }}
                        <p>
                        {{Form::select('baract_chapter_id', $chapters, null, ['class' => 'form-control'])}}
                        </p>
                        <p>
                                sections of this chapter
                            </p>
                            <p>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                            </p>
                        <p>

                        {{ Form::label('section_number', 'Section number') }}
                        {{ Form::text('section_number', null, array('class' => 'form-control', 'placeholder' => 'section number')) }}

                        </p>

                        <p>

                        {{ Form::label('section_title', 'Section title') }}
                        {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'section title')) }}

                        </p>


                        <p>                                
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Description')) }}
                        </p>

                        <p>
                        {{ Form::submit('Save section', array('class' => 'btn btn-success')) }}
                        </p>
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