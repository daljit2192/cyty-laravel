@extends('layouts.backend.app')
@section('content')
<div class="row-fluid" style="margin-top: 65px;">
    <div class="span6 category-list">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            
            <div class="portlet-title">
                <h4><i class="icon-cogs"></i>Service Providers</h4>
                <a href="{{url('/admin/serviceprovider/new')}}" class="btn btn-white btn-sm pull-right"><i class="fa fa-plus"></i>Add new</a>
            </div>
            <div class="portlet-body">
                <?php if (isset($serivice_providers) && count($serivice_providers) > 0 && !empty($serivice_providers)) { ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Skills</th>
                                <th>Price</th>
                                <th>Portfolio</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($serivice_providers as $serivice_provider) {
                                $path = public_path() . "/user-images/";
                                ?>
                                <tr class='cat_row_{{$serivice_provider["id"]}}'>
                                    <td>{{$serivice_provider["id"]}}</td>
                                    <td>{{$serivice_provider["user"]["name"]}}</td>
                                    <td><img width="40px;" height="40px;" src = '{{url("/")."/user-images/ServiceProvider/".$serivice_provider["user"]["licence_img"]}}'></td>
                                    <td>{{$serivice_provider["description"]}}</td>
                                    <td>{{$serivice_provider["skill"]}}</td>
                                    <td>{{$serivice_provider["price"]}}</td>
                                    <td>{{$serivice_provider["portfolio"]}}</td>
                                    <td>{{$serivice_provider["latitude"]}}</td>
                                    <td>{{$serivice_provider["longitude"]}}</td>
                                    <td><a href="{{url('/admin/serviceprovider/1')}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i>Edit</a><a data-toggle="modal" data-target="#deleteModal" data-id="{{$serivice_provider['id']}}"  class="btn btn-danger btn-sm _delete_cat"><i class="fa fa-trash"></i>Delete</a></td>
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