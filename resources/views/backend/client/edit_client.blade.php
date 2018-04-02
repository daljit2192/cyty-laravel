@extends('layouts.backend.app')


@section('content')
<div class="portlet-body form">
    <?php if (isset($message) && !empty($message)) { ?>
    <span>{{$message}}</span>
    <?php }
    ?>
    <!-- BEGIN FORM-->
    {{Form::open(array('method'=>'patch','class'=>'horizontal-form'))}}
    <h3 class="form-section">Update Category</h3>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group">
                <label class="control-label">Category</label>
                <div class="controls">
                    
                    <input type="text" id="catName" name="name" value="{{$category['name']}}" class="m-wrap span12" placeholder="Category Name">
                    <input type="hidden" id="catId" name="id" value="{{$category['id']}}" class="m-wrap span12" placeholder="Category Name">
                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
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