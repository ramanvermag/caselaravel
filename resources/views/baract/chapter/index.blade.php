@extends('dashboard.main')

@section('title','Create caselaw')
@section('content-of-user')
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Bar Act chapters <small>it all starts here</small> </h1>
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
                        <h3 class="box-title">Chapter's</h3>
                        <div class="box-tools pull-right">
                            <a href="{{ URL::to('chapter/create') }}" class="btn btn-success">Add new chepter</a>
                            
                        </div>
                    </div>
                    <div class="box-body box-min-height">
                      
                        <!-- /.box-header -->
                        
                        <div class="box-body table-responsive no-padding">

                           <?php if ($total > 0): ?>
                               


                            <table class="table table-hover table-permissions-listing">
                                <tbody>
                                    <tr>
                                        <th style="width: 3%"><input type="checkbox" name=""></th>
                                        <th style="width: 10%">Chapter&nbsp;number</th>
                                        <th style="width: 68%">Chapter title</th>
                                        <th class="text-center" style="width: 25%"></th>
                                    </tr>
                                    <?php $sr=0; ?>
                                        
                                        <?php if (isset($chapters)): ?>
                                                
                                        <?php 
                                            foreach ($chapters as $key => $value) 
                                            { 
                                                 ?>
                                                 
                                                     
                                                 <tr>                                                     
                                                    <td><input type="checkbox" name=""></td>                                                    
                                                 
                                                    <td class="text-center"><span class="align-middle">{{$value->chapter_number}}</span></td>                                                    
                                               
                                                    <td><span class="align-middle">{{ str_limit( $value->title,30)}}</span></td>                                                    
                                                                                             
                                                    <td class="text-center">

                                                    <a class="btn btn-default pull-right" href="{{url('chapter')}}/{{$value->id}}">View</a>
                                                    
                                                    <form action="{{ route('chapter.destroy', $value->id) }}" method="POST">
                                                        
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger pull-right">Delete</button>

                                                    </form>                                         
                                                    
                                                    </td>                                                    
                                                 
                                                 </tr>
                                            
                                            <?php
                                            }
                                            ?>
                                            <?php endif ?>
                                        

                                </tbody>
                            </table>

                           
                           <?php else: ?>

                            <p class="">
                                
                                no chepters.
                                
                            </p>

                           <?php endif ?>
                           

                            {{$chapters->links()}}


                            

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer"> Footer </div>
                </div>
                
            </section>
        </div>



@endsection