@extends('layouts.backend.app')
@section('content')
<div class="row-fluid">
    <div class="span6 category-list" style="margin:45px 0 0 0;">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <h4><i class="icon-cogs"></i>Products</h4>
            </div>
            <div class="portlet-body">
                <?php if (isset($products) && count($products) > 0 && !empty($products)) { ?>
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
                            <?php
                            foreach ($products as $product) {
                                $path = public_path() . "/user-images/";
                                ?>
                                <tr class='cat_row_{{$product["id"]}}'>
                                    <td>{{$product["id"]}}</td>
                                    <td>{{$product["name"]}}</td>
                                    <td><img width="40px;" height="40px;" src = '{{url("/")."/user-images/".$product["images"]}}'</td>
                                    <td>{{$product["description"]}}</td>
                                    <td><a href="{{url('/admin/product/'.$product['id'])}}" style="color:blue;">Edit</a></td>
                                    <td><a data-toggle="modal" data-target="#deleteModal" data-id="{{$product['id']}}" style="color:red;" class="_delete_product">Delete</a></td>
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