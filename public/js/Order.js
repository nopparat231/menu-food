var pathNow = window.location.pathname;
if (pathNow == "/" || pathNow == "/MyOrders") {
    setTimeout("location.reload(true);", 15000);
}

$(document).ready(function () {
    $(".con-order-btn").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var id = $(this).closest(".product_data").find(".orders_id").val();

        $.ajax({
            url: "/update-orders/" + id,
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                orders_status: 2,
            },
            success: function (response) {
                alertify.set("notifier", "position", "top-right");
                alertify.success("รับออเดอร์แล้ว");
                location.reload();
                //cartload();
            },
        });
    });
});

$(document).ready(function () {
    $(".done-order-btn").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var id = $(this).closest(".product_data").find(".orders_id").val();
        var users_provider_id = $(this)
            .closest(".product_data")
            .find(".users_provider_id")
            .val();

        $.ajax({
            url: "/update-orders/",
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                id: id,
                orders_status: 3,
                users_provider_id: users_provider_id,
            },
            success: function (response) {
                alertify.set("notifier", "position", "top-right");
                alertify.success("ทำอาหารเสร็จแล้ว");
                //location.reload();
                //cartload();
            },
        });
    });
});

$(document).ready(function () {
    $(".done-order-btn").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var users_provider_id = $(this)
            .closest(".product_data")
            .find(".users_provider_id")
            .val();

        $.ajax({
            url: "/hooks/",
            method: "GET",
            data: {
                _token: $("input[name=_token]").val(),
                users_provider_id: users_provider_id,
            },
            success: function (response) {
                // LineAlert();
                // alertify.set("notifier", "position", "top-right");
                // alertify.success("ทำอาหารเสร็จแล้ว");
                // location.reload();
                //cartload();
            },
        });
    });
});

function LineAlert() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    var users_provider_id = $(this)
        .closest(".product_data")
        .find(".users_provider_id")
        .val();

    $.ajax({
        url: "/hooks/",
        method: "GET",
        data: {
            _token: $("input[name=_token]").val(),
            users_provider_id: users_provider_id,
        },
        success: function (response) {
            console.log(response);
        },
    });
}

$(document).ready(function () {
    $(".can-order-btn").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var id = $(this).closest(".product_data").find(".orders_id").val();

        $.ajax({
            url: "/update-orders/" + id,
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                orders_status: 0,
            },
            success: function (response) {
                alertify.set("notifier", "position", "top-right");
                alertify.success("ยกเลิกออเดอร์แล้ว");
                location.reload();
                //cartload();
            },
        });
    });
});

$(document).ready(function () {
    $(".del-order-btn").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var id = $(this).closest(".product_data").find(".orders_id").val();

        $.ajax({
            url: "/update-orders/" + id,
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                orders_status: 4,
            },
            success: function (response) {
                alertify.set("notifier", "position", "top-right");
                alertify.success("ลบเลิกออเดอร์แล้ว");
                location.reload();
                //cartload();
            },
        });
    });
});
