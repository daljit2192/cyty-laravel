@extends('layouts.frontend.app')

@section('content')

<section class="flat-row flat-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-title style1 center">
                    <h2>Shop</h2>
                </div>
                <div class="flat-contact-form">
                    
                </div>
            </div> <!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
@if(isset($products) && !empty($products) && count($products)>0 )
<div class="columns-3" style="margin:0 0 30px 124px;">
       <ul class="products columns-3">
           @foreach($products as $product)
          <li class="post-35 product type-product status-publish has-post-thumbnail product_cat-table first instock downloadable sold-individually taxable shipping-taxable purchasable product-type-simple">
             <a href="http://www.cytyservv.cytyserv.com/shop/table/outdoor-table-set/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                <img width="297" height="297" src = '{{url("/")."/user-images/".$product["images"]}}' sizes="(max-width: 297px) 100vw, 297px">
                <h1 >{{$product["name"]}}</h1>
                <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span>{{$product["price"]}}.00</span></span>
             </a>
             <a href="/shop/?add-to-cart=35" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="35" data-product_sku="" aria-label="Add “Outdoor Table Set” to your cart" rel="nofollow">Add to cart</a>
          </li>
          @endforeach
       </ul>
    </div>
@endif

@endsection