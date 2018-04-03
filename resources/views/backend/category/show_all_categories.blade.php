@extends('layouts.backend.app')
@section('content')
<div class="row-fluid" style="margin-top: 65px;">
    <div class="span6 category-list">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            
            <div class="portlet-title">
                <h4><i class="icon-cogs"></i>Categories</h4>
                <a href="{{url('/admin/category/new')}}" class="btn btn-white btn-sm pull-right"><i class="fa fa-plus"></i>Add new</a>
            </div>
            <div class="portlet-body">
                <?php if (isset($categories) && count($categories) > 0 && !empty($categories)) { ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Edit Category</th>
                                <th>Delete Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) {
                                $path = public_path() . "/user-images/";
                                ?>
                                <tr class='cat_row_{{$category["id"]}}'>
                                    <td>{{$category["id"]}}</td>
                                    <td>{{$category["name"]}}</td>
                                    <td><img width="40px;" height="40px;" src = '{{url("/")."/user-images/category/".$category["image"]}}'></td>
                                    <td>{{$category["description"]}}</td>
                                    <td><a href="{{url('/admin/category/'.$category['id'])}}" class="btn btn-warning btn-sm" style=""><i class="fa fa-pencil"></i>Edit</a></td>
                                    <td><a data-toggle="modal" data-target="#deleteModal" data-id="{{$category['id']}}"  class="btn btn-danger btn-sm _delete_cat"><i class="fa fa-trash"></i>Delete</a></td>
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