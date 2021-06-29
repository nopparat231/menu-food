$(document).ready(function () {
    cartload();
});

function cartload() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/load-cart-data",
        method: "GET",
        success: function (response) {
            $(".basket-item-count").html("");
            var parsed = jQuery.parseJSON(response);
            var value = parsed; //Single Data Viewing
            $(".basket-item-count").append(
                $(
                    '<span class="badge badge-pill red">' +
                        value["totalcart"] +
                        "</span>"
                )
            );
        },
    });
}

$(document).ready(function () {
    $(".add-to-cart-btn").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var menu_name = $(this)
            .closest(".product_data")
            .find(".menu_name")
            .val();
        var menu_id = $(this).closest(".product_data").find(".menu_id").val();
        var order_quantity = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();

        $.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                order_quantity: order_quantity,
                menu_id: menu_id,
            },
            success: function (response) {
                alertify.set("notifier", "position", "top-right");
                alertify.success(response.status);
                cartload();
            },
        });
    });
});

$(document).ready(function () {
    $(".increment-btn").click(function (e) {
        e.preventDefault();
        var incre_value = $(this).parents(".quantity").find(".qty-input").val();
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).parents(".quantity").find(".qty-input").val(value);
        }
    });

    $(".decrement-btn").click(function (e) {
        e.preventDefault();
        var decre_value = $(this).parents(".quantity").find(".qty-input").val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).parents(".quantity").find(".qty-input").val(value);
        }
    });
});

// Update Cart Data
$(document).ready(function () {
    $(".changeQuantity").click(function (e) {
        e.preventDefault();

        var quantity = $(this).closest(".cartpage").find(".qty-input").val();
        var product_id = $(this).closest(".cartpage").find(".product_id").val();

        var data = {
            _token: $("input[name=_token]").val(),
            order_quantity: quantity,
            id: product_id,
        };

        $.ajax({
            url: "/update-to-cart",
            type: "POST",
            data: data,
            success: function (response) {
                window.location.reload();
                alertify.set("notifier", "position", "top-right");
                alertify.success(response.status);
            },
        });
    });
});

// Delete Cart Data
$(document).ready(function () {
    $(".delete_cart_data").click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest(".cartpage").find(".product_id").val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var data = {
            _token: $("input[name=_token]").val(),
            id: product_id,
        };

        // $(this).closest(".cartpage").remove();

        $.ajax({
            url: "/delete-from-cart",
            type: "DELETE",
            data: data,
            success: function (response) {
                //console.log(data)
                window.location.reload();
            },
        });
    });
});

// Clear Cart Data
$(document).ready(function () {
    $(".clear_cart").click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "/clear-cart",
            type: "GET",
            success: function (response) {
                window.location.reload();
                alertify.set("notifier", "position", "top-right");
                alertify.success(response.status);
            },
        });
    });
});

$(document).ready(function () {
    $(".add-to-orders-btn").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        const order = document.getElementById("shopping_cart").value;
        const myorder = JSON.parse(order);
        //$myorder = array($order);

        var orr = {
            _token: $("input[name=_token]").val(),
            user_id: 1,
            menu_id: 1,
            orders_detail: 1,
            order_quantity: 1,
            orders_status: 1
        };

        $.ajax({
            // url: "/add-to-orders",
            // method: "POST",
            data: orr,
            success: function (response) {
                console.log(orr);
                alertify.set("notifier", "position", "top-right");
                alertify.success("สั่งอาหารแล้ว");
                //cartload();
            },
        });
    });
});
