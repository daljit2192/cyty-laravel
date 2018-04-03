@extends('layouts.backend.app')

@section('content')
<div class="portlet-body form">
    <?php if (isset($message) && !empty($message)) { ?>
        <span>{{$message}}</span>
    <?php }
    ?>
    <!-- BEGIN FORM-->
    {{Form::open(array('route' => ['admin.job.save_job'],'method'=>'post','files'=>'true','class'=>'horizontal-form'))}}
    <h3 class="form-section">New Job</h3>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group">
                <label class="control-label">Job</label>
                <div class="controls">
                    <input type="text" id="jobName" name="name" class="m-wrap span12" placeholder="Job Name">
                </div>
                <label class="control-label">Phone Number</label>
                <div class="controls">
                    <input type="text" id="jobPhone" name="phone_no" class="m-wrap span12" placeholder="Job Phone">
                </div>
                <div class="controls">
                    <label class="control-label">Enquiry</label>
                    <textarea class="span6 m-wrap" rows="3" style="width: 570px;" name= "enquiry" placeholder="Job Enquiry"></textarea>
                </div>
                <div class="controls">
                    <label class="control-label">Job Image</label>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
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
                    <input type="text" id="start_price" name="start_price" class="m-wrap span12" placeholder="Start price">
                </div>
                <label class="control-label">End Price</label>
                <div class="controls">
                    <input type="text" id="end_price" name="end_price" class="m-wrap span12" placeholder="End Price">
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