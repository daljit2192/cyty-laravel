@extends('layouts.backend.app')

@section('content')
<div class="portlet-body form">
    <?php if (isset($message) && !empty($message)) { ?>
        <span>{{$message}}</span>
    <?php }
    ?>
    <!-- BEGIN FORM-->
    {{Form::open(array('route' => ['admin.category.update_category'],'method'=>'patch','files'=>'true','class'=>'horizontal-form'))}}
    <h3 class="form-section">Update Service Provider</h3>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">

                    <input type="text" id="catName" name="name" value="{{$service_provider['user']['name']}}" class="m-wrap span12" placeholder="Category Name">
                    <input type="hidden" id="catId" name="id" value="{{$service_provider['id']}}" class="m-wrap span12" placeholder="Category Name">
                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
                </div>
            </div>
            <div class="controls">
                <label class="control-label">Description</label>
                <textarea class="span6 m-wrap" rows="3" style="width: 570px;" name= "description" placeholder="Category Description"> {{$service_provider['description']}} </textarea>
            </div>
            <div class="controls">
                <label class="control-label">Category Image</label>
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src = '{{url("/")."/user-images/ServiceProvider/".$service_provider["user"]["licence_img"]}}' alt="">
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                            <span class="fileupload-exists">Change</span>
                            <input type="file" name="image" class="default" ></span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn blue _update_category"><i class="icon-ok"></i>Update</button>
        <button type="button" class="btn">Cancel</button>
    </div>
    {{ Form::close() }}
    <!-- END FORM--> 
</div>
@endsection