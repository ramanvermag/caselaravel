@extends('dashboard.main')

@section('title','Create caselaw')
@section('content-of-user')
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Caselaws <small>it all starts here</small> </h1>
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
                        <h3 class="box-title">Caselaws Listing.</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
                            
                        </div>
                    </div>
                    <div class="box-body">
                      
                        <!-- /.box-header -->
                        
                        <div class="box-body table-responsive no-padding">

                            <?php //echo $total; ?>

                            

                            <?php if ($total > 0): ?>
                                

                            <table class="table table-hover table-permissions-listing">
                                <tbody>
                                    <tr>
                                        <th style="width: 3%"><input type="checkbox" name=""></th>
                                        <!-- <th style="width: 3%">#</th> -->
                                        <th style="width: 20%">Title</th>
                                        <th style="width: 47%">Description</th>
                                        <th class="text-center" style="width: 15%">link</th>
                                        <th class="text-center" style="width: 15%">Action</th>
                                    </tr>
                                    <?php $sr=0; ?>
                                        
                                            
                                            <?php 
                                            foreach ($caselaws as $key => $value) 
                                            { 
                                                 ?>
                                                 
                                                     
                                                 <tr>                                                     
                                                    <td><input type="checkbox" name=""></td>                                                    
                                                    <!-- <td>{{$value['id']}}</td>                                                     -->
                                                    <td><span class="align-middle">{{ str_limit($value['title'],20)}}</span></td>                                                    
                                                    <td>{{ str_limit($value['description'], 120)}}</td>                                                   
                                                    <td>{{$value['link']}}</td>                                                   
                                                    <td class="text-center">



                                                        <a class="btn btn-default" href="{{url('caselaws')}}/{{$value['id']}}">View</a>                                         
                                                        <!-- 
                                                        <a class="btn btn-info" href="{{URL::to('deleteCaselaw')}}/{{$value['id']}}">Delete</a>
                                                        -->
                                                    </td>                                                    
                                                 
                                                 </tr>
                                            
                                            <?php
                                            }
                                            ?>
                                        

                                </tbody>
                            </table>
                            {{ $caselaws->links() }}

                            <?php else: ?>
                            <p>
                                no caselaws.
                            </p>
                            <?php endif ?>



                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer"> Footer </div>
                </div>
                            <a href="{{ URL::to('caselaws/create') }}" class="btn btn-success">Add new caselaw</a>
            </section>
        </div>



@endsection