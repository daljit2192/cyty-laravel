@extends('layouts.backend.app')

@section('content')
<div class="portlet-body form">
    <?php if (isset($message) && !empty($message)) { ?>
        <span>{{$message}}</span>
    <?php }
    ?>
    <!-- BEGIN FORM-->
    {{Form::open(array('route' => ['admin.client.save_client'],'files'=>'true','method'=>'post','files'=>'true','class'=>'horizontal-form'))}}
    <h3 class="form-section">New Client</h3>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group">
                <label class="control-label">Full Name</label>
                <div class="controls">
                    <input type="text" id="clientName" name="name" class="m-wrap span12" placeholder="Client Name">
                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
                </div>
                
                <div class="controls">
                    <label class="control-label">Email</label>
                    <input type="text" id="clientEmail" name="email" class="m-wrap span12" placeholder="Client Email">                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
                </div>
                
                <div class="controls">
                    <label class="control-label">Phone</label>
                    <input type="text" id="phoneNp" name="phone_no" class="m-wrap span12" placeholder="Client Contact">
                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
                </div>
                
                <div class="controls">
                    <label class="control-label">Password</label>
                    <input type="password" id="phonePass" name="password" class="m-wrap span12" placeholder="Password">
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
        <button type="submit" class="btn btn-success _save_category"><i class="icon-ok"></i>Save</button>
        <button type="button" class="btn btn-danger">Cancel</button>
    </div>
    {{ Form::close() }}
    <!-- END FORM--> 
</div>
@endsection