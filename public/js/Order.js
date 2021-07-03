setTimeout("location.reload(true);", 15000);

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
            url: "/update-orders/"+id,
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

        $.ajax({
            url: "/update-orders/"+id,
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                orders_status: 3,
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
            url: "/update-orders/"+id,
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                orders_status: 0,
            },
            success: function (response) {
                alertify.set("notifier", "position", "top-right");
                alertify.success('ยกเลิกออเดอร์แล้ว');
                location.reload();
                //cartload();
            },
        });
    });
});