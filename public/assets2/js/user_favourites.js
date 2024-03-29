
    var categories = {
@foreach($categories as $category)
{{ $category->id }}: "{{ $category->name }}",
    @endforeach
};

    $(document).ready(function (e) {
    fetch();
});

    function getProductCategory(str){
    for (var i = 0; i < str.length; i++) {
    if (typeof this.categories[str[i]] != 'undefined') {
    str[i] = this.categories[str[i]];
} else {
    str.splice(i, 1);
}
}
    return str.join(", ");
}

    function incrementValue(el){
    var $tr = $(el).closest("tr");
    var rate = parseFloat($tr.find("#rate").html().replace(/[$ ]/g, ''));
    var qty = parseFloat($tr.find("#qty").val());
    qty++;
    $tr.find("#qty").val(qty);
    var rate = $tr.find("#price").html('$ ' + (rate * qty).toFixed(2));
}

    function decrementValue(el){
    var $tr = $(el).closest("tr");
    var rate = parseFloat($tr.find("#rate").html().replace(/[$ ]/g, ''));
    var qty = parseFloat($tr.find("#qty").val());
    qty = qty-- > 1 ? qty-- : 1;
    $tr.find("#qty").val(qty);
    var rate = $tr.find("#price").html('$ ' + (rate * qty).toFixed(2));
}

    function addToShoppingCart(el){
    var $tr = $(el).closest("tr");
    var uniqueid = "{{$uniqueid}}";
    var data = {
    _token: null,
    uniqueid: uniqueid,
    quantity: $tr.find('#qty').val(),
    price: $tr.find('#rate').html().replace(/[$ ]/g, ''),
    title: $tr.find('#title').html(),
    product: $tr.find('#productId').val(),
    cost: $tr.find('#rate').html().replace(/[$ ]/g, ''),
    size: null
};
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }});
    $.ajax({
    url: '{{ route("api.user.cartupdate") }}',
    type: 'post',
    dataType: "JSON",
    data: data,
    success: function (response)
{
    alert('success', 'Success!', 'Cart updated successfully. <a href="{{ route("user.cart") }}"><b><i class="fa fa-cart-plus cart-icon" style="margin-top: 0px; padding-top: 0px;"></i> Go to cart</b></a>');
},
    error: function(xhr) {
    alert('error', 'Error!', 'Unknown error occurred.');
    console.log(xhr.responseText);
}
});
}

    function removeFromFav(el){
    var $tr = $(el).closest("tr");
    var id = $tr.attr('id');
    var confirmation = confirm("Are you sure want to remove " + $tr.find('#title').html() + " product from your My Favourite List?");
    if (confirmation) {
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }});
    $.ajax({
    url: '{{ route("api.user.product-favourite.get") }}/' + id,
    type: 'delete',
    dataType: "JSON",
    data: {
    "id": id
},
    success: function (response)
{
    if (response.error) {
    alert('error', 'Error!', 'Unknown error occurred.');
    return;
}
    alert('success', 'Success!', 'Favourite product has been deleted successfully.');
    $('#userFavouritesTable').DataTable().destroy();
    $tr.remove();
    $('#userFavouritesTable').DataTable();
},
    error: function(xhr) {
    alert('error', 'Error!', 'Unknown error occurred.');
    console.log(xhr.responseText);
}
});
}
}

    function tbodyLoading(flag) {
    if (flag) {
    $("#userFavouritesTable tbody").html('<tr><td class="v-align-middle" colspan="7"><i class="fa fa-spinner fa-spin"></i> Loading...</td></tr>').hide().fadeIn("slow");
} else {
    $("#userFavouritesTable tbody").html('').hide().fadeIn("slow");
}
}

    function alert(type, title, message) {
    $.notify(
        {
            icon: type == 'error' ? 'fa fa-exclamation-triangle' : 'fa fa-check',
            title: title,
            message: message
        },
        {
            element: 'body',
            position: null,
            type: type,
            allow_dismiss: true,
            newest_on_top: true,
            showProgressbar: false,
            placement: {
                from: "bottom",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon" style="font-weight: 600;"></span> ' +
                '<span data-notify="title" style="font-weight: 600;">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '</div>'
        });
}

    function fetch(limit, page, search) {
    tbodyLoading(true);
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }});
    $.ajax({
    url: '{{ route("api.user.product-favourite.get") }}?search=' + search + '&limit=' + limit + '&page=' + page,
    type: 'get',
    dataType: "JSON",
    success: function (response)
{
    if (response.error) {
    alert('error', 'Error!', 'Unknown error occurred.');
    return;
}

    var trows;
    tbodyLoading(false);
    response = response.data;
    $('#userFavouritesTable').DataTable().destroy();
    if (response.length == 0) {
    $("#userFavouritesTable tbody").append("<tr><td class='text-center' colspan='4'>Your favourite product list is empty!</td></tr>").hide().fadeIn("slow");
} else {
    for (var i = 0; i < response.length; i++) {
    var price = parseFloat(response[i].price);
    trows += '<tr id="' + response[i].id + '">' +
    '<input type="hidden" id="productId" value="' + response[i].product.id + '">' +
    // '<td class="v-align-left" id="category">' + getProductCategory(response[i].product.category) + '</td>' +
    '<td class="v-align-left"><a ' +
    'href="{{url("product")}}/' + response[i].product.id + '/' + response[i].product.title.toLowerCase().replace(" ", "-") + '"' +
    'target="_blank" id="title">' + response[i].product.title + '</a></td>' +
    // '<td class="v-align-right text-center" id="orders">' + response[i].orders + '</td>' +
    '<td class="v-align-right text-center" id="rate">$ ' + response[i].product.price + '</td>' +
    '<td class="v-align-middle text-center minus-i icons">' +
    '<i style="cursor: pointer;" class="fa fa-minus-circle" onclick="decrementValue(this)"></i>' +
    '<input class="number quantity" style="border-style: none;width: 16px;" type="text" id="qty" value="1" readonly="">' +
    '<i style="cursor: pointer;" class="fa fa-plus-circle" onclick="incrementValue(this)"></i>' +
    '</td>' +
    '<td class="v-align-right" id="price">$ ' + response[i].product.price + '</td>' +
    '<td class="v-align-middle text-center">' +
    '<a class="add-cart" style="cursor: pointer;" onclick="addToShoppingCart(this)"><i class="fa fa-cart-plus cart-icon" style="margin-top: 0px; padding-top: 0px;"></i></a>' +
    '</td>' +
    '<td class="v-align-middle text-center">' +
    '<a class="add-cart" style="cursor: pointer;" onclick="removeFromFav(this)"><i class="fa fa-times-circle remove-icon" style="margin-top: 0px; padding-top: 0px;"></i></a>' +
    '</td>' +
    '</tr>';
}
    $("#userFavouritesTable tbody").append(trows).hide().fadeIn("slow");
}
    $('#userFavouritesTable').DataTable();
},
    error: function(xhr) {
    console.log(xhr.responseText);
}
});
}