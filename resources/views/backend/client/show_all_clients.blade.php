@extends('layouts.backend.app')
@section('content')
<div class="row-fluid">
    <div class="span6 category-list" style="margin:45px 0 0 0;">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <h4><i class="icon-cogs"></i>Clients</h4>
                <a href="{{url('/admin/client/new')}}" class="btn btn-white btn-sm pull-right"><i class="fa fa-plus"></i>Add new</a>
            </div>
            <div class="portlet-body">
                <?php if (isset($clients) && count($clients) > 0 && !empty($clients)) { ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($clients as $client) {
                                $path = public_path() . "/user-images/";
                                ?>
                                <tr class='cat_row_{{$client["id"]}}'>
                                    <td>{{$client["id"]}}</td>
                                    <td>{{$client["name"]}}</td>
                                    <td>{{$client["email"]}}</td>
                                    <td>{{$client["phone_no"]}}</td>
                                    <td><a href="{{url('/admin/product/'.$client['id'])}}" class="btn btn-warning btn-sm" ><i class="fa fa-pencil"></i>Edit</a><a data-toggle="modal" data-target="#deleteModal" data-id="{{$client['id']}}" class="btn btn-danger btn-sm pull-right _delete_product"><i class="fa fa-trash" ></i>Delete</a></td>
                                </tr>
    <?php } ?>
                        </tbody>
                    </table>
<?php } ?>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Warning !!</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete categories?.</p>
            </div>
            <input type="hidden" name="id" id="_category_id" value=""/>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger _delete_ok" data-dismiss="modal">Delete</button>
            </div>
        </div>

    </div>
</div>
@endsection