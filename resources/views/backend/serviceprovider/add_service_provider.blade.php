@extends('layouts.backend.app')

@section('content')
<div class="portlet-body form">
    <?php if (isset($message) && !empty($message)) { ?>
        <span>{{$message}}</span>
    <?php }
    ?>
    <!-- BEGIN FORM-->
    {{Form::open(array('route' => ['admin.serviceprovider.save_service_provider'],'method'=>'post','files'=>'true','class'=>'horizontal-form'))}}
    <h3 class="form-section">New Service Provider</h3>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input type="text" required="" name="user[name]" class="m-wrap span12" placeholder="Service Provider Name">
                </div>
                <div class="controls">
                    <label class="control-label">Email</label>
                    <input type="email" required="" name="user[email]" class="m-wrap span12" placeholder="Service Provider Email">
                </div>
                <div class="controls">
                    <label class="control-label">Phone number</label>
                    <input type="text" required="" name="user[phone_no]" class="m-wrap span12" placeholder="Service Provider Contact Number">
                </div>
                
                <div class="controls">
                    <label class="control-label">Contractor Type</label>
                    <input type="text" required="" name="service_provider[contractor_type]" class="m-wrap span12" placeholder="Contractor Type">
                </div>
                
                <div class="controls">
                    <label class="control-label">Job Category</label>
                    <select name="service_provider[job_category]">
                        
                        @foreach($job_categories as $job_catgeory)
                        <option value="{{$job_catgeory['id']}}">{{$job_catgeory["name"]}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="controls">
                    <label class="control-label">Skill</label>
                    <input type="text" name="service_provider[skill]" class="m-wrap span12" placeholder="Skill">
                </div>
                
                <div class="controls">
                    <label class="control-label">Tag Line</label>
                    <input type="text" name="service_provider[tag_line]" class="m-wrap span12" placeholder="Tag Line">
                </div>
                
                <div class="controls">
                    <label class="control-label">Description</label>
                    <textarea name="service_provider[description]" placeholder="Description"></textarea>
                </div>
                
                <div class="controls">
                    <label class="control-label">Experience</label>
                    <input type="text" name="service_provider[experience]" class="m-wrap span12" placeholder="Experience">
                </div>
                
                <div class="controls">
                    <label class="control-label">Portfolio</label>
                    <input type="text" name="service_provider[portfolio]" class="m-wrap span12" placeholder="Portfolio">
                </div>
                
                <div class="controls">
                    <label class="control-label">Price</label>
                    <input type="text" name="service_provider[price]" class="m-wrap span12" placeholder="Price">
                </div>
                
                <div class="controls">
                    <label class="control-label">Availability</label>
                    <input type="text" name="service_provider[avalaibility]" class="m-wrap span12" placeholder="Availability">
                </div>
                
                <div class="controls">
                    <label class="control-label">Location</label>
                    <input type="text" name="service_provider[location]" class="m-wrap span12" placeholder="Location">
                </div>
                
                <div class="controls">
                    <label class="control-label">License Image</label>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="user[licence_img]" class="default"></span>
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
                
                <div class="controls">
                    <label class="control-label">Latitude</label>
                    <input type="text" name="service_provider[latitude]" class="m-wrap span12" placeholder="Latitude">
                </div>
                
                <div class="controls">
                    <label class="control-label">Longitude</label>
                    <input type="text" name="service_provider[longitude]" class="m-wrap span12" placeholder="Longitude">
                </div>
                
                <div class="controls">
                    <label class="control-label">Password</label>
                    <input type="password" name="user[password]" class="m-wrap span12" placeholder="Password">
                </div>
                
                <div class="controls">
                    <label class="control-label">Confirm Password</label>
                    <input type="password" name="user[confirm_password]" class="m-wrap span12" placeholder="Confirm Password">
                </div>
                
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success _save_category"><i class="icon-ok"></i>Save</button>
        <button type="button" class="btn btn-danger ">Cancel</button>
    </div>
    {{ Form::close() }}
    <!-- END FORM--> 
</div>
@endsection