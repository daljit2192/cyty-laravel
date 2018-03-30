@extends('layouts.backend.app')

@section('content')
<div class="portlet-body form">
    <?php if (isset($message) && !empty($message)) { ?>
        <span>{{$message}}</span>
    <?php }
    ?>
    <!-- BEGIN FORM-->
    {{Form::open(array('route' => ['admin.product.save_product'],'method'=>'post','files'=>'true','class'=>'horizontal-form'))}}
    <h3 class="form-section">New Product</h3>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group">
                <label class="control-label">Product</label>
                <div class="controls">
                    <input type="text" id="productName" name="name" class="m-wrap span12" placeholder="Product Name">
                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
                </div>
                
                <div class="controls">
                    <label class="control-label">Category</label>
                    <select class="form-control" name="cat_id">
                        <option>Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category["name"]}}</option>
                        @endforeach
                    </select>
                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
                </div>
                
                <div class="controls">
                    <label class="control-label">Price</label>
                    <input type="text" id="productPrice" name="price" class="m-wrap span12" placeholder="Product Price">
                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
                </div>
                <div class="controls">
                    <label class="control-label">Description</label>
                    <textarea class="span6 m-wrap" rows="3" name= "description" placeholder="Category Description"></textarea>
                </div>
                
                <div class="controls">
                    <label class="control-label">Product Image</label>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="images" class="default"></span>
                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
                
                <div class="controls">
                    <label class="control-label">Discount</label>
                    <input type="text" id="productPrice" name="discount" class="m-wrap span12" placeholder="Product Discount">
                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
                </div>
                
                <div class="controls">
                    <label class="control-label">Offer</label>
                    <input type="text" id="productOffer" name="offer" class="m-wrap span12" placeholder="Product Offer">
                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
                </div>
                
                <div class="controls">
                    <label class="control-label">Coupon Code</label>
                    <input type="text" id="productCoupon" name="coupon_code" class="m-wrap span12" placeholder="Product Offer">
                    <span class="_error_span" style="color:red;">
                        <?php
                        if (isset($errors) && count($errors) && !empty($errors)) {
                            echo $errors["name"][0];
                        }
                        ?>
                    </span>
                </div>
                
                <div class="controls">
                    <label class="control-label">Seller Info</label>
                    <textarea class="span6 m-wrap" rows="3" name= "seller_info" placeholder="Seller informaton"></textarea>
                </div>
                
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn blue _save_category"><i class="icon-ok"></i>Save</button>
        <button type="button" class="btn">Cancel</button>
    </div>
    {{ Form::close() }}
    <!-- END FORM--> 
</div>
@endsection