const notyf = new Notyf({
    duration: 3000,
    position: {
        x: "right",
        y: "top",
    },
});

$(document).ready(function () {
    /*----------------------------------
            Load Cart Item Count
    ----------------------------------*/
    loadCart();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    function loadCart() {
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function (response) {
                $(".cart-count").html("");
                $(".cart-count").html(response.count);
                // console.log(response.count);
            },
        });
    }

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
        var selected_color = $(this)
            .closest(".product_data")
            .find(".selected_color")
            .val();
        var selected_size = $(this)
            .closest(".product_data")
            .find(".selected_size")
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
                color: selected_color,
                size: selected_size,
            },
            success: function (response) {
                notyf.success(response.status);
                loadCart();
            },
            error: function (xhr, status, error) {
                if (xhr.status === 400) {
                    // If the response has 400 status code, show as an error notification
                    notyf.error(xhr.responseJSON.status);
                } else {
                }
            },
        });
    });

    $(".color-selection").click(function (e) {
        e.preventDefault();
        var selectedColor = $(this).data("color");
        $(".selected_color").val(selectedColor);
    });

    $(".pro-details-size a").click(function (e) {
        e.preventDefault();
        var selectedSize = $(this).data("size");
        $(".selected_size").val(selectedSize);
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

    /*---------------------------------------------------------------------------------------------------
        Checking whether the products added to the cart are out of stock before proceeding to checkout
    ----------------------------------------------------------------------------------------------------*/
    $(".proceed-to-checkout-btn").click(function (e) {
        e.preventDefault();

        // Perform the check before proceeding to checkout
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "GET",
            url: "/validate-cart-products",
            success: function (response) {
                if (response.status === "success") {
                    // All products in the cart are available, proceed to checkout
                    window.location.href = "/checkout";
                } else {
                    // Some products in the cart are out of stock
                    // Show error message with the product names
                    notyf.error(
                        "Now out of stock: " +
                            response.product_names.join(", ") +
                            " Can't Proceet to checkout."
                    );
                }
            },
            error: function (xhr, status, error) {},
        });
    });

    /*-----------------------------------------
            Checkout & Payment Validate
    ------------------------------------------*/
    $(".payhere_btn").click(function (e) {
        e.preventDefault();

        var firstname = $(".firstname").val();
        var lastname = $(".lastname").val();
        var email = $(".email").val();
        var phone = $(".phone").val();
        var address1 = $(".address1").val();
        var address2 = $(".address2").val();
        var city = $(".city").val();
        var state = $(".state").val();
        var country = $(".country").val();
        var zipcode = $(".zipcode").val();

        if (!firstname) {
            fname_error = "First Name is Required";
            $("#fname_error").html("");
            $("#fname_error").html(fname_error);
        } else {
            fname_error = "";
            $("#fname_error").html("");
        }

        if (!lastname) {
            lname_error = "Last Name is Required";
            $("#lname_error").html("");
            $("#lname_error").html(lname_error);
        } else {
            lname_error = "";
            $("#lname_error").html("");
        }

        if (!email) {
            email_error = "Email is Required";
            $("#email_error").html("");
            $("#email_error").html(email_error);
        } else {
            email_error = "";
            $("#email_error").html("");
        }

        if (!phone) {
            phone_error = "Phone is Required";
            $("#phone_error").html("");
            $("#phone_error").html(phone_error);
        } else {
            phone_error = "";
            $("#phone_error").html("");
        }

        if (!address1) {
            address1_error = "Address1 is Required";
            $("#address1_error").html("");
            $("#address1_error").html(address1_error);
        } else {
            address1_error = "";
            $("#address1_error").html("");
        }

        if (!address2) {
            address2_error = "Address2 is Required";
            $("#address2_error").html("");
            $("#address2_error").html(address2_error);
        } else {
            address2_error = "";
            $("#address2_error").html("");
        }

        if (!city) {
            city_error = "City is Required";
            $("#city_error").html("");
            $("#city_error").html(city_error);
        } else {
            city_error = "";
            $("#city_error").html("");
        }

        if (!state) {
            state_error = "State is Required";
            $("#state_error").html("");
            $("#state_error").html(state_error);
        } else {
            state_error = "";
            $("#state_error").html("");
        }

        if (!country) {
            country_error = "Country is Required";
            $("#country_error").html("");
            $("#country_error").html(country_error);
        } else {
            country_error = "";
            $("#country_error").html("");
        }

        if (!zipcode) {
            zipcode_error = "Zipcode is Required";
            $("#zipcode_error").html("");
            $("#zipcode_error").html(zipcode_error);
        } else {
            zipcode_error = "";
            $("#zipcode_error").html("");
        }

        if (
            fname_error != "" ||
            lname_error != "" ||
            email_error != "" ||
            phone_error != "" ||
            address1_error != "" ||
            address2_error != "" ||
            city_error != "" ||
            state_error != "" ||
            country_error != "" ||
            zipcode_error != ""
        ) {
            return false;
            // } else {
            //     var data = {
            //         firstname: firstname,
            //         lastname: lastname,
            //         email: email,
            //         phone: phone,
            //         address1: address1,
            //         address2: address2,
            //         city: city,
            //         state: state,
            //         country: country,
            //         zipcode: zipcode,
            //     };

            //     $.ajax({
            //         method: "POST",
            //         url: "/proceed-to-pay",
            //         data: data,
            //         success: function (response) {},
            //     });
        }
    });
});
