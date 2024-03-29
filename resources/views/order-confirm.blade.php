@extends('includes.newmaster2',['cart_result'=> $response])
@section('content')

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets2/css/order-confirm.css') }}">
@php
$price=0;
$items =0;
foreach($response as $res){
$price += $res->cost * $res->quantity;
$items += $res->quantity;

$user = Auth::user();
}
@endphp

@php
$quantities = 0;
$products = 0;
// $quantity = 0;
// $quantity = null;
@endphp
@foreach($response as $res)
@php
// $quantity += $res->quantity;
if ($products == 0 && $quantities == 0){
$products = $res->product;
$quantities = $res->quantity;
}else{
$products = $products.",".$res->product;
$quantities = $quantities.",".$res->quantity;
}
@endphp
@endforeach

@php
$delivery_fee=$settings[0]->delivery_fee;
@endphp

@php
$delivery_fee=$settings[0]->delivery_fee;
$donation_amount=$settings[0]->donation_amount;
@endphp

@php
$discount = 0;
if(Session::has('coupon')){
$discount = App\Coupon::calculateDiscount(Session::get('coupon'), $price);
}
@endphp

@php
$grandTotal = number_format((float)($price+$delivery_fee) * 13/100 +
$price - $discount + $delivery_fee + $donation_amount, 2, '.', '');
@endphp
<div class="home-wrapper">

    <div class="container-fluid">
        <!-- Starting of product filter area -->
        <div class="section-padding product-filter-wrapper wow fadeInUp">

            <div class="container inner-block order-confrm-page">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    @if ($email_confirm_message = Session::get('confirm_email_message'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $email_confirm_message }}</strong>
                                    </div>
                                    @endif
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @endif


                                </div>
                            </div>


                        </div>
                        <!-- ui start from here -->
                        @if($response->count() == 0)
                        <div class="ube-card-body">


                            <div class="text-center" id="emptyCart">
                                Hey! Looks like your cart is empty, Please add some products! <br>
                                <a href="{{ url('/category/dry-clean-laundry') }}"><i
                                        class="fas fa-cart-arrow-down"></i></a>
                            </div>
                        </div>
                        <div>
                            @else
                            <div class="row col-container ">
                                <div class="col-sm-6 cv-col">
                                    <div class="ube-card">
                                        <div class="ube-card-title">
                                            Customer Information
                                        </div>
                                        <div class="ube-card-body">
                                            <div class="bill-wrapper">
                                                <div class="bil-title">
                                                    Bill to:
                                                </div>
                                                <div class="bill-address">
                                                    <div class="customer-name">{{ $user->name }}</div>
                                                    <div class="customer-lane">{{ $multiple_address->street }}
                                                    </div>
                                                    <div class="customer-lane">{{ $multiple_address->city }}</div>
                                                    <div class="customer-lane">{{ $multiple_address->province }}</div>
                                                    <div class="customer-zip">{{ $multiple_address->zip }}</div>
                                                    <div class="customer-email">{{ $user->email }}</div>
                                                </div>
                                            </div>
                                            <div class="delivery-wrapper">
                                                <div class="delivery-title">
                                                    Pickup / Delivery:
                                                </div>
                                                <div class="delivery-address">
                                                    <div class="customer-name">{{ $user->name }}</div>
                                                    <div class="customer-lane">{{ $multiple_address->street }}
                                                    </div>
                                                    <div class="customer-lane">{{ $multiple_address->city }}</div>
                                                    <div class="customer-lane">{{ $multiple_address->province }}</div>
                                                    <div class="customer-zip">{{ $multiple_address->zip }}</div>
                                                    <div class="customer-phone">{{ $user->phone }}</div>

                                                </div>
                                            </div>

                                            <div class="btn-area">

                                                <a href="{{ route('user.account-details') }}" class="btn btn-primary"
                                                    target="_blank">View
                                                    Profile page</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 cv-col">
                                    <div class="ube-card quickplay">
                                        <div class="ube-card-title">
                                            <img src="assets/img/uqickpay.png" />
                                        </div>
                                        <div class="ube-card-body">
                                            <div class="order-summery">
                                                <div class="row os-item">
                                                    <div class="col-xs-8 os-item-title">
                                                        Account Balance:
                                                    </div>
                                                    <div class="col-xs-4 os-price" id="user-account-balance">
                                                        ${{$user->balance}}
                                                    </div>
                                                </div>
                                                <div class="row os-item">
                                                    <div class="col-xs-8 os-item-title">
                                                        Order total:
                                                    </div>
                                                    <div class="col-xs-4 os-price" id="grand-total-row">
                                                        ${{$grandTotal}}
                                                    </div>
                                                </div>


                                                <div class="row">

                                                    <div class="col-xs-12">
                                                        <hr class="ube-hr">
                                                    </div>
                                                </div>
                                                <div class="row os-item">
                                                    <div class="col-xs-8 os-item-title">
                                                        New Balance:
                                                    </div>
                                                    <div class="col-xs-4 os-price" id="new-balance-row">
                                                        <b>
                                                            ${{ number_format((float)$user->balance - $grandTotal, 2, '.', '') }}</b>
                                                    </div>
                                                </div>

                                                <form action="{{ route('purchase.order') }}" method="POST" id="pay_now_form">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="products" id="products" value="{{ $products }}" />
                                                    <input type="hidden" name="quantities" id="quantities" value="{{ $quantities }}" />
                                                    <input type="hidden" name="customer" id="customer" value="{{Auth::guard('profile')->user()->id}}" />

                                                    <input type="hidden" name="discount" id="discount" value="{{ Session::has('coupon') ? Session::get('coupon')->value : null }}" />
                                                    <input type="hidden" name="discount_type" id="discount_type" value="{{ Session::has('coupon') ? Session::get('coupon')->type : null }}" />
                                                    <input type="hidden" name="subtotal" id="subtotal" value="{{ number_format((float)$price, 2, '.', '') }}" />
                                                    <input type="hidden" name="discount_amount" id="discount_amount" value="{{ number_format((float)$discount, 2, '.', '') }}" />
                                                    <input type="hidden" name="delivery" id="delivery" value="{{ number_format((float)$delivery_fee, 2, '.', '') }}" />
                                                    <input type="hidden" name="tax" id="tax" value="{{ number_format((float) ($price+$delivery_fee) * 13/100, 2, '.', '') }}" />
                                                    <input type="hidden" name="make_it_count" id="make_it_count" value="{{ number_format((float)$donation_amount, 2, '.', '') }}" />
                                                    <input type="hidden" name="total" id="total" value="{{ number_format((float)($price+$delivery_fee) * 13/100 + $price - $discount + $delivery_fee + $donation_amount, 2, '.', '') }}" />

                                                    <div class="row">
                                                        <div class="own-space"></div>
                                                        <div class="col-xs-12 text-center">
                                                            @if(($user->balance == 0) || ($user->balance < $grandTotal))
                                                                <button type="submit" class="paynow-btn" disabled><span
                                                                    class="sr-only">Checkout</span></button>
                                                                @elseif($user->balance < 25.00) <button type="submit"
                                                                    class="paynow-btn" disabled><span
                                                                        class="sr-only">Checkout</span></button>
                                                                    @else
                                                                    <button type="submit" class="paynow-btn"><span
                                                                            class="sr-only">Checkout</span></button>
                                                                    @endif
                                                        </div>
                                                    </div>
                                                </form>


                                            </div>
                                            <form action="" method="POST">
                                                <input type="hidden" name="latitude" id="latitude"
                                                    value="{{$multiple_address->latitude }}" />
                                                <input type="hidden" name="logtitude" id="longitude"
                                                    value="{{$multiple_address->longitude }}" />
                                            </form>
                                            <div class="btn-area">

                                                <a href="{{ url('/buy-credits') }}" class="btn btn-primary">Get
                                                    Credits</a>

                                            </div>
                                            @if(($user->balance == 0) || ($user->balance < $grandTotal)) <p
                                                class="text-center warning-text">
                                                Please load your credits
                                                before you
                                                make
                                                the
                                                purchase!</p>
                                            @elseif($user->balance < 25.00) <p class="text-center warning-text">
                                                Your credit balance must have a minimum of $25.00 Credits to make
                                                a purchase, Thanks!</p>
                                            @else
                                                <p class="text-center warning-text hidden">Please load your credits before you make the purchase!</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="ube-card">
                                        <div class="ube-card-title">
                                            Order Summary
                                        </div>
                                        <table id="productTable" class="table table-striped tabele-bordered"
                                            style="margin-top:20px;">
                                            <thead>
                                                <tr style="text-transform: uppercase;">
                                                    <th>Item</th>
                                                    <th class="text-center">QTY</th>
                                                    <th class="text-left">Rate</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>

                                            <tbody style="font-size: 12px; font-weight: 500;">
                                                @foreach($response as $res)
                                                <tr>
                                                    <td>
                                                        <a
                                                            href="{{ route('product.details', ['id' => $res->product, 'title' => str_slug(str_replace(' ', '-', $res->title))]) }}">{{ $res->title }}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $res->quantity }}
                                                    </td>
                                                    <td class="text-left">
                                                        {{-- <img class="credit-sign"
                                                                            src="{{ url('/') . '/assets2/images/rsign.png' }}"
                                                        alt=""> --}}
                                                        ${{ number_format((float)$res->cost, 2, '.', '') }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{-- <img class="credit-sign"
                                                                        src="{{ url('/') . '/assets2/images/rsign.png' }}"
                                                        alt=""> --}}
                                                        ${{ number_format((float)$res->cost * $res->quantity, 2, '.', '') }}
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>

                                        </table>






                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        @if(!Session::has('coupon'))
                                                        <h5 class="card-title all-caps">Have a Coupon Code?</h5>
                                                        <form action="{{ route('coupon.apply') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="coupon_code"
                                                                    name="coupon_code" placeholder="Coupon Code"
                                                                    required>
                                                            </div>
                                                            <button type="submit" class="btn apply-btn">Apply</button>
                                                        </form>
                                                        @else
                                                        <h5 class="card-title">Coupon Applied</h5>
                                                        <form class="form-inline" action="{{ route('coupon.remove') }}"
                                                            method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="coupon_code"
                                                                    name="coupon_code" placeholder="Coupon Code"
                                                                    value="{{ Session::get('coupon')['code'] }}"
                                                                    readonly>
                                                            </div>
                                                            <button type="submit" class="btn btn-danger">Remove</button>
                                                        </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div>

                                                    <div class="row os-item">
                                                        <div class="col-xs-8 os-item-title">
                                                            Subtotal:
                                                        </div>
                                                        <div class="col-xs-4 ">
                                                            ${{ number_format((float)$price, 2, '.', '') }}
                                                        </div>
                                                    </div>
                                                    @if(Session::has('coupon'))
                                                    <div class="row os-item">
                                                        <div class="col-xs-8 os-item-title">
                                                            Discount:
                                                        </div>
                                                        <div class="col-xs-4 ">
                                                            -$ {{ number_format((float)$discount, 2, '.', '') }}
                                                        </div>
                                                    </div>
                                                    @endif

                                                    <div class="row os-item">
                                                        <div class="col-xs-8 os-item-title">
                                                            Delivery:
                                                        </div>
                                                        <div class="col-xs-4 ">
                                                            ${{ number_format((float)$delivery_fee, 2, '.', '') }}
                                                        </div>
                                                    </div>



                                                    <div class="row os-item">
                                                        <div class="col-xs-8 os-item-title">
                                                            Tax (13%):
                                                        </div>
                                                        <div class="col-xs-4 ">
                                                            ${{ number_format((float) ($price+$delivery_fee) * 13/100, 2, '.', '') }}
                                                        </div>
                                                    </div>

                                                    <div class="row os-item">
                                                        <div class="col-xs-8 os-item-title">
                                                            <img class="makeitcounticon"
                                                                src="assets/img/3742-300x300.jpg">

                                                            <div class="makeittext" class="capital popovers"
                                                                data-toggle="popover" title="" data-content="Help Us Make A Difference!
Your small micro donation will go towards providing free services and programs for Mental Health.  In addition, this Merchant will also generously match your donation. <br> <br> <a href='https://dryclean.io/makeitcount.php' title='test add link'><b style='color:#5e8000;'>Click Here </b> </a> to learn more about this program
and the Janeen Foundation" data-original-title="Make It Count">Make it Count <i
                                                                    class="helpicon far fa-question-circle"></i> :
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4 ">

                                                                    <span class="input-group-text">$</span>

                                                                <input class="editable-text" style="width:45px;display: inline-block;" aria-label="Amount (to the nearest dollar)"
                                                                    id="user-entered-donation-amount"
                                                                    grand-total-without-donation-amount="{{ $grandTotal-$donation_amount }}"
                                                                    value="{{ number_format((float)$donation_amount, 2, '.', '') }}"
                                                                    type="number" step="0.01" min="0"
                                                                    onkeypress="return (event.charCode >= 48 &amp;&amp; event.charCode <= 57) || event.charCode == 46  || event.charCode == 0">
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-xs-12">
                                                            <hr class="ube-hr">
                                                        </div>
                                                    </div>
                                                    <div class="row os-item">
                                                        <div class="col-xs-8 os-item-title">
                                                            <b>Grand Total:</b>
                                                        </div>
                                                        <div class="col-xs-4 ">
                                                            <b id="grand-total-row">${{ $grandTotal }}</b>
                                                        </div>
                                                    </div>


                                                    @endif

                                                    {{-- @endif --}}
                                                </div>

                                                <form action="{{ route('purchase.order') }}" method="post" id="confirm_and_buy_form">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="products" id="products" value="{{ $products }}" />
                                                    <input type="hidden" name="quantities" id="quantities" value="{{ $quantities }}" />
                                                    <input type="hidden" name="customer" id="customer" value="{{Auth::guard('profile')->user()->id}}" />

                                                    <input type="hidden" name="discount" id="discount" value="{{ Session::has('coupon') ? Session::get('coupon')->value : null }}" />
                                                    <input type="hidden" name="discount_type" id="discount_type" value="{{ Session::has('coupon') ? Session::get('coupon')->type : null }}" />
                                                    <input type="hidden" name="subtotal" id="subtotal" value="{{ number_format((float)$price, 2, '.', '') }}" />
                                                    <input type="hidden" name="discount_amount" id="discount_amount" value="{{ number_format((float)$discount, 2, '.', '') }}" />
                                                    <input type="hidden" name="delivery" id="delivery" value="{{ number_format((float)$delivery_fee, 2, '.', '') }}" />
                                                    <input type="hidden" name="tax" id="tax" value="{{ number_format((float) ($price+$delivery_fee) * 13/100, 2, '.', '') }}" />
                                                    <input type="hidden" name="make_it_count" id="make_it_count" value="{{ number_format((float)$donation_amount, 2, '.', '') }}" />
                                                    <input type="hidden" name="total" id="total" value="{{ number_format((float)($price+$delivery_fee) * 13/100 + $price - $discount + $delivery_fee + $donation_amount, 2, '.', '') }}" />

                                                    @if($response->count() !== 0)
                                                    <div class="btn-area text-right">
                                                        @if(($user->balance == 0) || ($user->balance < $grandTotal))
                                                            <button id="confirmBtn" class="btn btn-block btn-primary"
                                                            disabled>
                                                            Confirm</button>
                                                            @elseif($user->balance < 25.00) <button id="confirmBtn"
                                                                class="btn btn-block btn-primary" disabled>
                                                                Confirm</button>
                                                                @else
                                                                <button type="submit" id="confirmBtn"
                                                                    class="btn btn-block btn-primary">Confirm</button>
                                                                @endif
                                                                @if(($user->balance == 0) || ($user->balance <
                                                                    $grandTotal)) <p class="text-center warning-text">
                                                                    Please load your credits
                                                                    before you
                                                                    make
                                                                    the
                                                                    purchase!</p>
                                                                @elseif($user->balance < 25.00) <p
                                                                    class="text-center warning-text">
                                                                    Your credit balance must have a minimum of
                                                                    $25.00
                                                                    Credits to make a purchase, Thanks!</p>
                                                                @else
                                                                    <p class="text-center warning-text hidden">Please load your credits before you make the purchase!</p>
                                                                @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- ui end here -->

                    </div>
                    @endif

                </div>
            </div>
        </div>

        <!-- Trigger the modal with a button -->
        {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Buy Credits</button> --}}

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center" style="font-size: 20px; font-weight: 700;">Buy
                            Credits</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Select your desired credit package and click Buy Now to purchase,
                            Thanks!</p>
                        <br>
                        <section>
                            <div>
                                <form action="{{ route('buy.credits') }}">
                                    {{ csrf_field() }}
                                    <input type="radio" id="control_01" name="select1" value="1">
                                    <input type="hidden" name="select" value="1">
                                    <label for="control_01">
                                        <h2>Starter</h2>
                                        <br>
                                        <p>Purchase <span style="font-size: 16px;">$30</span> package worth
                                            <span style="font-size: 16px;">30 Credits</span></p>
                                        <button type="submit" class="btn btn-default"
                                            style="background: hsla(150, 75%, 50%, 1); color: #fff; font-weight: 500; margin-top: 10px;">Buy
                                            Now</button>
                                    </label>
                                </form>
                            </div>
                            <div>
                                <form action="{{ route('buy.credits') }}">
                                    {{ csrf_field() }}
                                    <input type="radio" id="control_02" name="select2" value="2" checked>
                                    <input type="hidden" name="select" value="2">
                                    <label for="control_02" style="background: hsla(150, 75%, 50%, 1); color:#fff;">
                                        <h2>Valued</h2>
                                        <br>
                                        <p>Purchase <span style="font-size: 16px;">$50</span> package worth
                                            <span style="font-size: 16px;">60 Credits</span></p>
                                        <button type="submit" class="btn btn-default"
                                            style="background: #fff; color: hsla(150, 75%, 50%, 1); font-weight: 500; margin-top: 10px;">Buy
                                            Now</button>
                                    </label>
                                </form>
                            </div>
                            <div>
                                <form action="{{ route('buy.credits') }}">
                                    {{ csrf_field() }}
                                    <input type="radio" id="control_03" name="select3" value="3">
                                    <input type="hidden" name="select" value="3">
                                    <label for="control_03">
                                        <h2>Mega</h2>
                                        <br>
                                        <p>Purchase <span style="font-size: 16px;">$100</span> package worth
                                            <span style="font-size: 16px;">125 Credits</span></p>
                                        <button type="submit" class="btn btn-default"
                                            style="background: hsla(150, 75%, 50%, 1); color: #fff; font-weight: 500; margin-top: 10px;">Buy
                                            Now</button>
                                    </label>
                                </form>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ending of product filter area -->
</div>


{{-- <form id="orderConfirm" action="#!" style="display:none">
    <input type="hidden" name="total" id="grandtotal"
        value="{{ number_format((float)($price+$delivery_fee+$donation_amount) * 13/100 + $price - $discount + $delivery_fee + $donation_amount, 2, '.', '') }}"
/>
<input type="hidden" name="products" value="{{ $products }}" />
<input type="hidden" name="quantities" value="{{ $quantities }}" />
<input type="hidden" name="sizes" value="{{$sizes}}" />
<input type="hidden" name="customer" value="{{Auth::guard('profile')->user()->id}}" />
{{ csrf_field() }}
</form> --}}

@stop

@section('footer')

<script>
    incrementVar = 1;

    var grandTotalWithoutDonation = parseFloat($("#user-entered-donation-amount").attr("grand-total-without-donation-amount"));
    var userAccountBalance = parseFloat($("#user-account-balance").html().replace('$', ''));
    $("#user-entered-donation-amount").change(function(event) {
        refreshGrandTotal();
    });

    function incrementValue(elem) {
        var $this = $(elem);
        $input = $this.prev('input');
        $parent = $input.closest('div');
        newValue = parseInt($input.val()) + 1;
        $parent.find('.inc').addClass('a' + newValue);
        $input.val(newValue);
        incrementVar += newValue;
    }

    function decrementValue(elem) {
        var $this = $(elem);
        $input = $this.next('input');
        $parent = $input.closest('div');
        newValue = parseInt($input.val()) - 1;
        $parent.find('.inc').addClass('a' + newValue);
        if (newValue <= 1) {
            $input.val(1);
        } else {
            $input.val(newValue);
        }
        incrementVar += newValue;
    }

    function refreshGrandTotal() {
        let donation = parseFloat($("#user-entered-donation-amount").val());
        if (isNaN(donation)) {
            donation = 0;
            $("#user-entered-donation-amount").val(0);
        }

        let grandTotal = (grandTotalWithoutDonation + donation).toFixed(2);
        let newBalance = (userAccountBalance - grandTotal).toFixed(2);

        if (grandTotal > userAccountBalance) {
            $("#confirmBtn").attr("disabled", true);
            $(".paynow-btn").attr("disabled", true);
            $(".warning-text").removeClass("hidden");
        } else {
            $("#confirmBtn").attr("disabled", false);
            $(".paynow-btn").attr("disabled", false);
            $(".warning-text").addClass("hidden");
        }

        // $('input[id="grandtotal"]').val(grandTotal);
        $('#pay_now_form').find('#total').val(grandTotal);
        $('#pay_now_form').find('#make_it_count').val(donation);
        $('#confirm_and_buy_form').find('#total').val(grandTotal);
        $('#confirm_and_buy_form').find('#make_it_count').val(donation);
        $('[id="grand-total-row"]').html("$" + grandTotal);
        $('[id="new-balance-row"]').html("$" + newBalance);
        console.log(grandTotal, newBalance);
    }
</script>
<script>
    // Initialize and add the map
    function initMap() {
        var lat = document.getElementById("latitude").value;
        var long = document.getElementById("longitude").value;

        var latitude = parseFloat(lat);
        var longitude = parseFloat(long);

        // The location of Uluru
        var uluru = {
            lat: latitude,
            lng: longitude
        };
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {
                zoom: 15,
                center: uluru
            });
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script>
    $(document).ready(function () {
        $(document).on('submit', 'form', function () {
            $('button').attr('disabled', 'disabled');
        });
    });
</script>
{{-- <script>
    function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script> --}}
<!-- <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRu_qlT0HNjPcs45NXXiOSMd3btAUduSc&libraries&callback=initMap">
</script> -->

<script>
    $(document).ready(function (e) {

        // $("#confirmBtn").click(function(){
        // var balance = {!! $user->balance !!};
        // var total = {!! $grandTotal !!};

        // if(balance < total){
        // }
        // $formData = $("#orderConfirm").serialize();
        // $(this).prop('disabled', true);
        // $.ajax({
        //         url: "{!! route('purchase.order') !!}",
        //         data: $formData,
        //         type: 'POST',
        //         success: function(result){
        //             // console.log(result);
        //             if(result == "success"){
        //                 location.href = "{!! route('order.confirmed') !!}";
        //             }
        //             else{
        //                 alert('Something went wrong, please refresh the page, thank you!')
        //             }

        // console.log(result)
        //             }
        //         });
        // });
    });
</script>
@stop
