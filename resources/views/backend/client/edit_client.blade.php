@extends('layouts.backend.app')


@section('content')
<div class="portlet-body form">
    <?php if (isset($message) && !empty($message)) { ?>
        <span>{{$message}}</span>
    <?php }
    ?>
    <!-- BEGIN FORM-->
    {{Form::open(array('method'=>'patch','route' => ['admin.client.update_client'],'class'=>'horizontal-form'))}}
    <h3 class="form-section">Update Client</h3>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group">
                <label class="control-label">Client</label>
                <div class="controls">

                    <input type="text" id="catName" name="name" value="{{$client['name']}}" class="m-wrap span12" placeholder="Category Name">
                    <input type="hidden" id="catId" name="id" value="{{$client['id']}}" class="m-wrap span12" placeholder="Category Name">
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
                    <input type="text" id="clientEmail" name="email" value="{{$client['email']}}" class="m-wrap span12" placeholder="Client Email">                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
                </div>

                <div class="controls">
                    <label class="control-label">Phone</label>
                    <input type="text" id="phoneNp" name="phone_no" value="{{$client['phone_no']}}" class="m-wrap span12" placeholder="Client Contact">
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
        <button type="submit" class="btn btn-success _update_category"><i class="icon-ok"></i>Update</button>
        <button type="button" class="btn">Cancel</button>
    </div>
    {{ Form::close() }}
    <!-- END FORM--> 
</div>
@endsection