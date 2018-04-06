@extends('layouts.backend.app')

@section('content')
<div class="portlet-body form">
    <?php if (isset($message) && !empty($message)) { ?>
        <span>{{$message}}</span>
    <?php }
    ?>
    <!-- BEGIN FORM-->
    {{Form::open(array('route' => ['admin.jobcategory.update_job_category'],'method'=>'patch','files'=>'true','class'=>'horizontal-form'))}}
    <h3 class="form-section">Update Job Category</h3>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group">
                <label class="control-label">Category</label>
                <div class="controls">

                    <input type="text" id="catName" name="name" value="{{$job_category['name']}}" class="m-wrap span12" placeholder="Category Name">
                    <input type="hidden" id="catId" name="id" value="{{$job_category['id']}}" class="m-wrap span12" placeholder="Category Name">
                </div>
            </div>
            <div class="controls">
                <label class="control-label">Description</label>
                <textarea class="span6 m-wrap" rows="3" style="width: 570px;" name= "description" placeholder="Category Description"> {{$job_category['description']}} </textarea>
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