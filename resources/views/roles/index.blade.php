@extends('dashboard.main')

@section('title', '| Roles')

@section('content-of-user')
               
<div class="content-wrapper">
    <section class="content-header">
        <h1> Roles <small>it all starts here</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Roles listing</h3>
                
            </div>
            <div class="box-body">
                <div class="col-lg-12">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th style="width:2%"><input type="checkbox" name=""></th>
                                    <th style="width:2%">#</th>
                                    <th style="width:10%">Name</th>
                                    <th style="width:70%">Permissions</th>
                                    <th style="width:16%" class="text-center">Actions</th>
                                </tr>
                                 @foreach ($roles as $role)
                                    <tr>
                                        <td><input type="checkbox" name=""></td>
                                        <td>{{ $role->id}}</td>
                                        <td><b>{{ ucfirst($role->name) }}</b></td>

                                        <td>
                                            <?php 
                                                $permissions = $role->permissions()->pluck('name');
                                                foreach ($permissions as $key => $value) 
                                                {
                                                ?>
                                                    <span class="badge bg-green"><?php echo $value; ?></span>
                                                <?php
                                                }
                                            ?>
                                        </td>
                                        {{-- Retrieve array of permissions associated to a role and convert to string --}}
                                        
                                        <td>
                                            <a class="btn btn-info pull-right" 
                                               href="{{ URL::to('roles/'.$role->id.'/edit') }}" 
                                               class="btn-edit-cl btn-info pull-right" 
                                               style="margin-right: 3px;">Edit</a>

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn-del-role pull-right btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>
                </div>
            </div>
            <div class="box-footer"> Footer </div>
        </div>
    </section>
</div>

@endsection