@extends('layouts.app')

@section('title', '| Dashboard')

@section('content-page')

<?php 
    



 ?>


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">



        @yield('content-page')

  
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>











<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-3">
            <div class="row">
                
                <div class="left-menu">
                        <ul>
                            

                            <li><a class="active admin-operation-link" href="{{ route('roles.index') }}">Roles</a></li>
                            <!-- <li><a class="active admin-operation-link" href="{{ route('roles.create') }}">Create Roles</a></li> -->
                            <li><a class="active admin-operation-link" href="{{ route('permissions.index') }}">Permissions</a></li>
                            <!-- <li><a class="active admin-operation-link" href="{{ route('permissions.create') }}">Create Permissions</a></li> -->
                            <li><a class="active admin-operation-link" href="{{ route('users.index') }}">Users</a></li>
                            <li><a class="active admin-operation-link" href="{{ route('users.create') }}">Add User</a></li>


                        </ul>
                </div>
                
            </div>
        </div>

        <div class="col-lg-10 col-sm-10 col-md-10 col-xs-9">
            <div class="row">
            <div class="right-content-area">
                    <!-- content content content content content content content content content  -->
                     @yield('content-page')
            </div>
        </div>
        </div>
    </div>
</div>
   

@endsection