@extends('includes.newmaster2',['productdata'=> $productdata,'cart_result'=> $response])

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets2/css/product.css') }}">
    <div id="sns_content" class="wrap layout-m">
    <div class="container">
        <div class="col-md-9 col-sm-9 col-md-offset-1">
            <div id="success" class="alert alert-success alert-dismissable" hidden>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Seccessfully Added to Favourite
            </div>
            <div id="error" class="alert alert-danger alert-dismissable" hidden>
                <a href="#" class="close" data-dismiss="alert" aria-label="close" hidden>&times;</a>
                Please sign in to add this product to your favourites list, Thank you.
            </div>
            <div class="row">
                <div id="sns_main">

                <div class="col-md-4 col-main col-sm-4 @if($gallery->isEmpty()) col-sm-offset-2 @endif">
                        <div id="sns_mainmidle">
                            <div class="product-view sns-product-detail">
                                <div class="product-essential clearfix">
                                    <div class="product-img-box">
                                        <div class="detail-img product-review-carousel-img">
                                            <img src="{{ url('/assets/images/products')}}/{{$productdata->feature_image}}"
                                                alt="" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-main col-sm-4">
                        <div id="sns_mainmidle">
                            <div class="product-view sns-product-detail">
                                <div class="product-essential clearfix">
                                    <div class="product-img-box">
                                        <div class="detail-img product-review-carousel-img">
                                            <div class="text-center price">
                                                ${{ number_format((float) $productdata->price, 2, '.', '') }}</div>
                                            <div class="title text-center">{{$productdata->title}}</div>



                                            <div class="product-shop">
                                                <div class="item-inner product_list_style">
                                                    <div class="item-info">
                                                        <div class="actions" id="product"
                                                            style="border: none; padding: 0px; margin-top: 0px">
                                                            <div class="form-group"
                                                                style="display: table; text-align: center; margin: 0 auto;">
                                                                <form class="addtocart-form" action="/cartupdate"
                                                                    method="POST">
                                                                    <div class="qty-container"
                                                                        style="margin-bottom:10px;">
                                                                        {{-- <br> --}}
                                                                        <button class="qty-decrease"
                                                                            onclick="var qty_el = document.getElementById('input-quantity'); var qty = qty_el.value; if( !isNaN( qty ) && qty > 1 ) qty_el.value--;return false;"
                                                                            type="button"></button>
                                                                        <input id="input-quantity"
                                                                            class="input-text qty quantity" type="text"
                                                                            title="Qty" value="1" name="quantity">
                                                                        <button class="qty-increase"
                                                                            onclick="var qty_el = document.getElementById('input-quantity'); var qty = qty_el.value; if( !isNaN( qty )) qty_el.value++;return false;"
                                                                            type="button"></button>
                                                                    </div>

                                                                    <br>
                                                                    {{csrf_field()}}
                                                                    @if(Session::has('uniqueid'))
                                                                    <input type="hidden" id="uniqueid" name="uniqueid"
                                                                        value="{{Session::get('uniqueid')}}"
                                                                        class="uniqueid">
                                                                    @else
                                                                    <input type="hidden" id="uniqueid" name="uniqueid"
                                                                        value="{{str_random(7)}}" class="uniqueid">
                                                                    @endif
                                                                    <input type="hidden" id="price" class="price"
                                                                        name="price" value="{{$productdata->price}}">
                                                                    <!-- <input type="hidden" id="page" name="page"
                                                                                                value="/product/{{$productdata->id}}/{{$productdata->title}}"> -->
                                                                    <input type="hidden" class="title" id="title"
                                                                        name="title" value="{{$productdata->title}}">
                                                                    <input type="hidden" class="product" id="product"
                                                                        name="product" value="{{$productdata->id}}">
                                                                    <input type="hidden" class="cost" id="cost"
                                                                        name="cost" value="{{$productdata->price}}">
                                                                    <!-- <input type="hidden" id="quantity" name="quantity" value="1"> -->
                                                                    <input type="hidden" class="size" id="size"
                                                                        name="size" value="">

                                                                    <button type="button" data-loading-text="Loading..."
                                                                        class="product-addCart-btn btn-cart"
                                                                        onclick="toAddCartFromProduct(this)"><span
                                                                            class="fa fa-cart-plus"></span><span>
                                                                            {{$language->add_to_cart}}</span></button>
                                                                    <meta name="csrf_token"
                                                                        content="{{ csrf_token() }}" />
                                                                    <ul class="add-to-links">
                                                                        @if(Auth::guard('profile')->user())
                                                                        @if(isset($fav_product->id))
                                                                        <li>
                                                                            <a style="color: white;!important; background-color: #e34444;!important;"
                                                                                class="link-wishlist add_fav"
                                                                                id="add_fav"
                                                                                data-original-title="Add to Wishlist"
                                                                                data-toggle="tooltip" href=""
                                                                                title=""></a>
                                                                        </li>
                                                                        @else
                                                                        <li>
                                                                            <a class="link-wishlist add_fav"
                                                                                id="add_fav"
                                                                                data-original-title="Add to Wishlist"
                                                                                data-toggle="tooltip" href=""
                                                                                title=""></a>
                                                                        </li>
                                                                        @endif
                                                                        @else
                                                                        <li>
                                                                            <a class="link-wishlist add_fav"
                                                                                id="add_fav"
                                                                                data-original-title="Add to Wishlist"
                                                                                data-toggle="tooltip" title=""></a>
                                                                        </li>
                                                                        @endif

                                                                    </ul>

                                                                    {{-- <a class="product-addCart-btn btn-cart btn-block"
                                                                            href="{{url('/checkout')}}">Check
                                                                    out</a>
                                                                    <br>
                                                                    <br>
                                                                    <a class="product-addCart-btn btn-cart"
                                                                        href="{{url('/cart')}}">Go to
                                                                        cart</a> --}}
                                                                </form>
                                                                <div class="row"
                                                                    style="width: 100%; margin-left:auto; margin-right: auto;">
                                                                    {{-- <div class="col-md-6"> --}}
                                                                    <a class="product-addCart-btn btn-cart"
                                                                        href="{{url('/order-summary')}}"
                                                                        style="width:100%;"><span>Check
                                                                            out</span></a>
                                                                    {{-- </div> --}}
                                                                    {{-- <div class="col-md-6"> --}}
                                                                    <a class="product-addCart-btn btn-cart"
                                                                        href="{{url('/cart')}}"
                                                                        style="width:100%;"><span>Go to
                                                                            cart</span></a>

                                                                    <a style="width:100%; margin-bottom:10px;"
                                                                        class="product-addCart-btn btn-cart"
                                                                        href="{{url(url()->previous())}}"><span>GO
                                                                            BACK</span></a>

                                                                    {{-- </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <br> --}}
                                            {{-- <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input class="btn btn-md login-btn" type="button" value="Back to Product List">
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!$gallery->isEmpty())
                    <div class="col-md-4 col-main col-sm-4">
                        <div id="sns_mainmidle">
                            <div class="product-view sns-product-detail">
                                <div class="product-essential clearfix">
                                    <div class="product-img-box">
                                        <div class="detail-img product-review-carousel-img">
                                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                                    @if(!$gallery->isEmpty())
                                                    @foreach($gallery as $key => $galdta)
                                                    <li data-target="#myCarousel" data-slide-to="{{ $key + 1 }}"></li>
                                                    @endforeach
                                                    @endif
                                                </ol>

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner">
                                                    {{-- <div class="item active">
                                                        <img class="img-responsive" style="padding: 20%;"
                                                            src="{{ url('/assets/images/products')}}/{{$productdata->feature_image}}"
                                                    alt="productimage">
                                                </div> --}}
                                                @foreach($gallery as $key => $galdta)
                                                @if($key == 0)
                                                <div class="item active">
                                                    <img id="galleryimg{{$galdta->id}}"
                                                        onclick="productGallery(this.id)"
                                                        src="{{url('/assets/images/gallery')}}/{{$galdta->image}}"
                                                        alt="">
                                                </div>
                                                @else
                                                <div class="item">
                                                    <img id="galleryimg{{$galdta->id}}"
                                                        onclick="productGallery(this.id)"
                                                        src="{{url('/assets/images/gallery')}}/{{$galdta->image}}"
                                                        alt="">
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>

                                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                                <i class="fas fa-arrow-circle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                                <i class="fas fa-arrow-circle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
</div>
@stop

@section('footer')

<script>
    function refreshPage(){
    setTimeout('location.reload()', 1000);
}
$('#star1').starrr({
    rating: 5,
    change: function(e, value) {
        if (value) {
            $('.your-choice-was').show();
            $('.choice').text(value);
            $('#rate').val(value);
        } else {
            $('.your-choice-was').hide();
        }
    }
});

$("#showmore").click(function() {
    $('html, body').animate({
        scrollTop: $("#description").offset().top - 200
    }, 1000);
});


$('#star1').starrr({
    rating: 5,
    change: function(e, value) {
        if (value) {
            $('.your-choice-was').show();
            $('.choice').text(value);
            $('#rate').val(value);
        } else {
            $('.your-choice-was').hide();
        }
    }
});
$(".add_fav").click(function() {

    var data={};

    $.ajax({
        url: '{{URL::route('add-product-favourite')}}',
        type:"POST",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: { 
                product_id :$('input#product').val(),
            },
        success:function(data){
           console.log(data);
           //$("#success").show();
            location.reload(true);
        },error:function(){ 
            //console.log(data);
            $("#error").show();
        }
    }); //end of ajax
    
});
</script>
@stop