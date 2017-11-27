@extends('dashboard.main') 
@section('title','Create caselaw') 
@section('content-of-user')

<div class="content-wrapper">
    <section class="content-header">
        <h1> Bar Acts <small>it all starts here</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content">

        @if(Session::get('message'))
        
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('message') }}

        </div>
        @endif
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bar Acts Listing.</h3>

            </div>
            <div class="box-body min-height">

                <div class="box-body table-responsive no-padding">

                    <?php if ($total > 0): ?>

                        <table class="table table-permissions-listing">
                            <tbody>
                                <tr>
                                    <th scope="col" style="width: 3%"><input type="checkbox" name=""></th>
                                    <!-- <th scope="col" style="width: 3%">#</th> -->
                                    <th scope="col" style="width: 80%">Name of Bar Act</th>
                                    <th scope="col" class="text-center" style="width: 17%">Action</th>
                                </tr>
                                <?php $sr=0; ?>

                                    <?php if (isset($baracts)): ?>

                                        <?php 
                                            foreach ($baracts as $key => $value) 
                                            { 
                                                 ?>

                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="">
                                                </td>
                                                <!-- <td>{{$value['id']}} </td> -->

                                                <td>{{ str_limit( $value['title'],80) }}</td>
                                                <td class="text-center">

                                                    <a class="btn btn-default pull-left" href="{{url('baract')}}/{{$value['id']}}">View</a>

                                                    <form class="pull-right" action="{{ route('baract.destroy', $value['id']) }}" method="POST">
                                                        {{ method_field('DELETE') }} {{ csrf_field() }}
                                                        <button class="btn btn-default del-message">Delete</button>
                                                    </form>

                                                </td>

                                            </tr>

                                            <?php
                                            }
                                            ?>
                                                <?php endif ?>

                            </tbody>
                        </table>
                        {{$baracts->links()}}

                        <?php else: ?>

                            <p class="">

                                No Bar Acts.

                            </p>

                            <?php endif ?>
                            <p></p>
                                <a href="{{ URL::to('baract/create') }}" class="btn btn-success">Add Bar Act</a>

                </div>
                <!-- /.box-body -->
            </div>
            <div class="box-footer"> Footer </div>
        </div>

    </section>
</div>

@endsection