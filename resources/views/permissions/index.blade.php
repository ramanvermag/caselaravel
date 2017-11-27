@extends('dashboard.main')

@section('title', '| Permissions')

@section('content-of-user')



        
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Permissions <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Permissions Listing.</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
                            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button> -->

                        </div>
                    </div>
                    <div class="box-body">



                      
                        <!-- /.box-header -->
                        
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-permissions-listing">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Permission name</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    <?php $sr=0; ?>
                                    @foreach ($permissions as $permission)
                                    <?php $sr++; ?>
                                        <tr>
                                            <td>{{$sr}}</td>
                                            <td>
                                                {{ $permission->name }}
                                            </td>
                                            <td >
                                                
                                        <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-right" style="margin-right: 3px;">Edit</a>

                                        {!! Form::open(['method' => 'DELETE','class'=>'text-right', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                            <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Create Permission</a>
                        </div>
                        <!-- /.box-body -->


                     
                    </div>
                    <div class="box-footer"> Footer </div>
                </div>
            </section>
        </div>

@endsection


    


