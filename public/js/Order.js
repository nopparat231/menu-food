var pathNow = window.location.pathname;
if (pathNow == "/" || pathNow == "/MyOrders") {
    setTimeout("location.reload(true);", 10000);
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
        var users_provider_id = $(this)
            .closest(".product_data")
            .find(".users_provider_id")
            .val();
        var orders_text = "รับออเดอร์แล้ว";
        LineAlert(users_provider_id, orders_text);

        $.ajax({
            url: "/update-orders/" + id,
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                orders_status: 2,
                users_provider_id: users_provider_id,
                orders_text: orders_text,
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
        var orders_text = "ทำอาหารเสร็จแล้ว";
        LineAlert(users_provider_id, orders_text);

        $.ajax({
            url: "/update-orders/" + id,
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                id: id,
                orders_status: 3,
                users_provider_id: users_provider_id,
                orders_text: orders_text,
            },
            success: function (response) {
                alertify.set("notifier", "position", "top-right");
                alertify.success("ทำอาหารเสร็จแล้ว");
                location.reload();
                //cartload();
            },
        });
    });
});

function LineAlert(users_provider_id, orders_text) {
    $.ajax({
        url: "/hooks/",
        method: "GET",
        data: {
            _token: $("input[name=_token]").val(),
            users_provider_id: users_provider_id,
            orders_text: orders_text,
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
        var users_provider_id = $(this)
            .closest(".product_data")
            .find(".users_provider_id")
            .val();
        var orders_text = "ยกเลิกออเดอร์แล้ว";
        LineAlert(users_provider_id, orders_text);

        $.ajax({
            url: "/update-orders/" + id,
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                orders_status: 0,
                users_provider_id: users_provider_id,
                orders_text: orders_text,
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
        var users_provider_id = $(this)
            .closest(".product_data")
            .find(".users_provider_id")
            .val();
        var orders_text = "ลูกค้ามารับอาหารแล้ว";
        LineAlert(users_provider_id, orders_text);

        $.ajax({
            url: "/update-orders/" + id,
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                orders_status: 4,
                users_provider_id: users_provider_id,
                orders_text: orders_text,
            },
            success: function (response) {
                alertify.set("notifier", "position", "top-right");
                alertify.success("ลูกค้ามารับอาหารแล้ว");
                location.reload();
                //cartload();
            },
        });
    });
});
