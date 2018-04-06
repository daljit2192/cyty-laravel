@extends('layouts.backend.app')

@section('content')
<div class="portlet-body form">
    <?php if (isset($message) && !empty($message)) { ?>
        <span>{{$message}}</span>
    <?php }
    ?>
    <!-- BEGIN FORM-->
    {{Form::open(array('route' => ['admin.serviceprovider.update_service_provider'],'method'=>'patch','files'=>'true','class'=>'horizontal-form'))}}
    <h3 class="form-section">Update Service Provider</h3>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">

                    <input type="text" id="catName" name="name" value="{{$service_provider['user']['name']}}" class="m-wrap span12" placeholder="Category Name">
                    <input type="hidden" id="catId" name="id" value="{{$service_provider['id']}}" class="m-wrap span12" placeholder="Category Name">

                </div>
            </div>
            <div class="controls">
                <label class="control-label">Email</label>
                <input type="email" required="" value="{{$service_provider['user']['email']}}" name="user[email]" class="m-wrap span12" placeholder="Service Provider Email">
            </div>
            <div class="controls">
                <label class="control-label">Phone number</label>
                <input type="text" required="" value="{{$service_provider['user']['phone_no']}}" name="user[phone_no]" class="m-wrap span12" placeholder="Service Provider Contact Number">
            </div>

            <div class="controls">
                <label class="control-label">Contractor Type</label>
                <input type="text" required="" value="{{$service_provider['user']['phone_no']}}" name="service_provider[contractor_type]" class="m-wrap span12" placeholder="Contractor Type">
            </div>
            <div class="controls">
                <label class="control-label">Description</label>
                <textarea class="span6 m-wrap" rows="3" style="width: 570px;" value="{{$service_provider['description']}}" name= "description" placeholder="Category Description"> {{$service_provider['description']}} </textarea>
            </div>
            <div class="controls">
                <label class="control-label">License Image</label>
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
            <div class="controls">
                <label class="control-label">Skill</label>
                <input type="text" name="service_provider[skill]" value="{{$service_provider['skill']}}" class="m-wrap span12" placeholder="Skill">
            </div>

            <div class="controls">
                <label class="control-label">Tag Line</label>
                <input type="text" name="service_provider[tag_line]" value="{{$service_provider['tag_line']}}" class="m-wrap span12" placeholder="Tag Line">
            </div>

            <div class="controls">
                <label class="control-label">Experience</label>
                <input type="text" name="service_provider[experience]" value="{{$service_provider['experience']}}" class="m-wrap span12" placeholder="Experience">
            </div>

            <div class="controls">
                <label class="control-label">Portfolio</label>
                <input type="text" name="service_provider[portfolio]" value="{{$service_provider['portfolio']}}" class="m-wrap span12" placeholder="Portfolio">
            </div>

            <div class="controls">
                <label class="control-label">Price</label>
                <input type="text" name="service_provider[price]" value="{{$service_provider['price']}}" class="m-wrap span12" placeholder="Price">
            </div>

            <div class="controls">
                <label class="control-label">Availability</label>
                <input type="text" name="service_provider[avalaibility]" value="{{$service_provider['avalaibility']}}" class="m-wrap span12" placeholder="Availability">
            </div>

            <div class="controls">
                <label class="control-label">Location</label>
                <input type="text" name="service_provider[location]" value="{{$service_provider['location']}}" class="m-wrap span12" placeholder="Location">
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success _update_category"><i class="icon-ok"></i>Update</button>
        <button type="button" class="btn">Cancel</button>
    </div>
    {{ Form::close() }}
    <!-- END FORM--> 
</div>
@endsection