@extends('dashboard.main')

@section('title','Create caselaw')
@section('content-of-user')
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Sections <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">

                @if(Session::get('message'))
                <div class="callout callout-success">
                    
                    <h4>{{ Session::get('message') }}</h4>
                
                </div>
                @endif
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sections.</h3>
                        <!-- 
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> 
                                <i class="fa fa-minus"></i></button>
                            
                        </div>
                         -->
                    </div>
                    <div class="box-body">
                      
                        <!-- /.box-header -->
                        
                        <div class="box-body table-responsive no-padding">

                           <?php if ($total > 0): ?>
                               


                            <table class="table table-hover table-permissions-listing">
                                <tbody>
                                    <tr>
                                        <th style="width: 3%"><input type="checkbox" name=""></th>
                                        <!-- <th style="width: 3%">#</th> -->
                                        <th style="width: 3%">#</th>
                                        <th style="width: 20%">Title</th>
                                        <th style="width: 4%">Baract chapter id</th>
                                        <th class="text-center" style="width: 55%">Description</th>
                                        <th class="text-center" style="width: 15%">Action</th>
                                    </tr>
                                    <?php $sr=0; ?>
                                        
                                        <?php if (isset($sections)): ?>
                                                
                                        <?php 
                                            foreach ($sections as $key => $value) 
                                            { 
                                                 ?>
                                                 
                                                     
                                                 <tr>                                                     
                                                    <td><input type="checkbox" name=""></td>                                                    
                                                    <td>{{$value['id']}} </td>                                                    
                                                    <!-- <td>{{$value['id']}}</td>                                                     -->
                                                    <td><span class="align-middle">{{ str_limit( $value['title'],30)}}</span></td>                                                    
                                                    <td>{{ str_limit( $value['baract_chapter_id'],120) }}</td>                                                   
                                                    <td>{{$value['description']}}</td>                                                   
                                                    <td class="text-center">

                                                    <a class="btn btn-default" href="{{url('section')}}/{{$value['id']}}">View</a>                                         
                                                    
                                                    </td>                                                    
                                                 
                                                 </tr>
                                            
                                            <?php
                                            }
                                            ?>
                                            <?php endif ?>
                                        

                                </tbody>
                            </table>
                            {{$sections->links()}}
                           
                           <?php else: ?>

                            <p class="">
                                
                                no sections.
                                
                            </p>

                           <?php endif ?>
                           <a href="{{ URL::to('section/create') }}" class="btn btn-success">Add new section</a>



                            

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer"> Footer </div>
                </div>
                
            </section>
        </div>



@endsection