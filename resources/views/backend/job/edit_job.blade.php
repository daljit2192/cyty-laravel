@extends('layouts.backend.app')

@section('content')
<div class="portlet-body form">
    <?php if (isset($message) && !empty($message)) { ?>
        <span>{{$message}}</span>
    <?php }
    ?>
    <!-- BEGIN FORM-->
    {{Form::open(array('route' => ['admin.job.update_job'],'method'=>'patch','files'=>'true','class'=>'horizontal-form'))}}
    <h3 class="form-section">Update Job</h3>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group">
                <label class="control-label">Job</label>
                <div class="controls">
                    <input type="text" id="jobName" name="name" value="{{$job['name']}}" class="m-wrap span12" placeholder="Job Name">
                    <input type="hidden" id="jobId" name="id" value="{{$job['id']}}" class="m-wrap span12" placeholder="Job Name">
                </div>
            </div>
            <label class="control-label">Phone Number</label>
            <div class="controls">
                <input type="text" id="jobPhone" value="{{$job['phone_no']}}" name="phone_no" class="m-wrap span12" placeholder="Job Phone">
            </div>
            <div class="controls">
                <label class="control-label">Enquiry</label>
                <textarea class="span6 m-wrap" rows="3" style="width: 570px;" name= "enquiry" placeholder="Job Enquiry">{{$job["enquiry"]}}</textarea>
            </div>
            <div class="controls">
                <label class="control-label">Job Image</label>
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src = '{{url("/")."/user-images/job/".$job["image"]}}' alt="">
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                            <span class="fileupload-exists">Change</span>
                            <input type="file" name="image" class="default"></span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
            </div>
            <label class="control-label">Start Price</label>
            <div class="controls">
                <input type="text" value="{{$job['start_price']}}" id="start_price" name="start_price" class="m-wrap span12" placeholder="Start price">
            </div>
            <label class="control-label">End Price</label>
            <div class="controls">
                <input type="text" id="end_price" value="{{$job['end_price']}}"  name="end_price" class="m-wrap span12" placeholder="End Price">
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