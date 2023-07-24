const notyf = new Notyf({
    duration: 2000,
    position: {
        x: "right",
        y: "top",
    },
});

$(document).ready(function () {
    /*----------------------------------
            Add To Cart Button
    ----------------------------------*/

    $(".add-to-cart").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        var product_qty = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_qty: product_qty,
            },
            success: function (response) {
                notyf.success(response.status);
            },
            error: function (xhr, status, error) {
                if (xhr.status === 400) {
                    // If the response has 400 status code, show as an error notification
                    notyf.error(xhr.responseJSON.status);
                } else {
                    // Handle other error scenarios here if needed
                }
            },
        });
    });

    /*----------------------------------
        Product Remove Button in Cart
    -----------------------------------*/
    $(".delete-cart-item").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                window.location.reload();
                notyf.success(response.status);
            },
        });
    });

    /*----------------------------------
        Clear Shopping Cart Button
    -----------------------------------*/
    $(".cart-clear a").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "/clear-cart",
            success: function (response) {
                window.location.reload();
                notyf.success(response.status);
            },
        });
    });

    /*----------------------------------------
        Change SubTotal Related to Quantity
    ------------------------------------------*/
    $(".changeQuantity").click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        var qty = $(this).closest(".product_data").find(".qty-input").val();
        data = {
            prod_id: prod_id,
            prod_qty: qty,
        };

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
                notyf.success(response.status);
            },
        });
    });
});
