/*Common page */
//Remove item product from icon cart
$("#change-item-cart").on("click", ".zmdi-delete", function (e) {
    e.preventDefault();
    let id = $(this).data("id");
    $.ajax({
        method: "GET",
        url: "http://127.0.0.1:8000/organic/remove-from-cart/",
        data: {
            id: id
        },
        success: function (repsonse) {
            $("#cart-icon").load(" #cart-icon");
            $("#change-item-cart").load(" #change-item-cart");
            $("#cart_table").load(" #cart_table");
            $(".checkout-form").load(" .checkout-form");

            alertify.set('notifier', 'position', 'bottom-right');
            alertify.success('Đã xóa sản phẩm!');
        }
    });
});
/*End Common page */


/*Show cart page */
    //Update item cart
    function cartUpdate(e) {
        e.preventDefault();
        let urlUpdateCart = $('.update_cart_url').data('url');
        let id = $(this).data('id');
        let quantity = $(this).parents('tr').find('input.quantity').val();
        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: {
                id: id,
                quantity: quantity
            },
            success: function (data) {
                $("#cart-icon").load(" #cart-icon");
                alertify.set('notifier', 'position', 'top-center');
                alertify.success('Đã thay đổi thành công!');
            }
        });
    }
    $(function () {
        $('.update-cart').on('click', cartUpdate);
    });

    // Remove item cart
     $(".remove-from-cart").click(function (e) {
         e.preventDefault();
         var id = $(this).parents("tr").attr("data-id");
         //grab the dialog instance using its parameter-less constructor then set multiple settings at once.
         if (alertify.alert()
             .setting({
                 'label': 'Đúng',
                 'message': 'Bạn muốn xóa sản phẩm này?',
                 'onok': function () {
                     $.ajax({
                         url: "http://127.0.0.1:8000/organic/remove-from-cart/",
                         method: "GET",
                         data: {
                             id: id
                         },
                         success: function (response) {
                             $("#cart-icon").load(" #cart-icon");
                             $("#change-item-cart").load(" #change-item-cart");
                             $("#cart_table").load(" #cart_table");
                             alertify.set('notifier', 'position', 'top-center');
                             alertify.success('Đã xóa sản phẩm!');
                         }
                     });
                 }
             }).show()) {}
     });
/*End Show cart page */

/*Product detail page */

    //Add to cart index shop

    $("#add__Cart").on('click', function (e) {
        e.preventDefault();
        let url = window.location.href;
        let route = url.split("product-detail", 1)
        let id = $(this).data('id');
        let quantity = $(this).parents(".product_variants").find('input.quantity-detail').val();
        quanty = quantity;
        console.log(quantity);
        $.ajax({
            type: "GET",
            url: route + "add-to-cart/" + id,
            data: {
                id: id,
                quantity: quanty
            },
            success: function (repsonse) {
                $("#cart-icon").load(" #cart-icon");
                // $("#change-item-cart").html(repsonse);
                $("#change-item-cart").load(" #change-item-cart");
                alertify.set('notifier', 'position', 'bottom-right');
                alertify.success('Đã thêm sản phẩm!');
            }
        });
    });

    //Add to cart icon  related product

    $(".add_cart_related").on('click', function (e) {
        e.preventDefault();
        let url = window.location.href;
        let route = url.split("product-detail", 1)
        let id = $(this).data('id');
        let quantity = $(this).parents(".product__content").find('input.quantity-product-relate').val();
        console.log(quantity);
        $.ajax({
            type: "GET",
            url: route + "add-to-cart/" + id,
            data: {
                id: id,
                quantity: quantity
            },
            success: function (repsonse) {
                $("#cart-icon").load(" #cart-icon");
                $("#change-item-cart").load(" #change-item-cart");
                alertify.set('notifier', 'position', 'bottom-right');
                alertify.success('Đã thêm sản phẩm!');
            }
        });
    });

    //Add to cart modal related product

    $(".add_cart_relate").on('click', function (e) {
        e.preventDefault();
        let url = window.location.href;
        let route = url.split("product-detail", 1);
        let id = $(this).data("id");
        let quantity = $(this).parents(".quickview_plus_minus_inner").find('input.quantity_product').val();
        console.log(quantity);
        $.ajax({
            method: "GET",
            url: route + "add-to-cart/" + id,
            data: {
                id: id,
                quantity: quantity
            },
            success: function (data) {
                $("#cart-icon").load(" #cart-icon");
                $("#change-item-cart").load(" #change-item-cart");
                alertify.set('notifier', 'position', 'bottom-right');
                alertify.success('Đã thêm sản phẩm!');
            }
        });

    });

    // Add smooth scrolling to all links
    $(".comments_advices a").on('click', function (event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;
            console.log(hash);

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, .breadcrumb_container').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
/*End Product detail page */

/*Shop page */
     //Add to cart index shop
     $(".add__cart").on('click', function (e) {
         e.preventDefault();
         let id = $(this).data("id");
         let quantity = $(this).parents(".single__product").find('input.quantity').val();
         $.ajax({
             type: "GET",
             url: "http://127.0.0.1:8000/organic/add-to-cart/" + id,
             data: {
                 id: id,
                 quantity: quantity
             },
             success: function (repsonse) {
                 $("#cart-icon").load(" #cart-icon");
                 $("#change-item-cart").load(" #change-item-cart");
                 alertify.set('notifier', 'position', 'bottom-right');
                 alertify.success('Đã thêm sản phẩm!');
             }
         });
     });

     //Add to cart modal
     $(".btn_add_cart").on('click', function (e) {
         e.preventDefault();
         let id = $(this).data("id");
         let quantity = $(this).parents(".quickview_plus_minus_inner").find('input.quantity').val();
         $.ajax({
             method: "GET",
             url: "http://127.0.0.1:8000/organic/add-to-cart/" + id,
             data: {
                 id: id,
                 quantity: quantity
             },
             success: function (data) {
                 $("#cart-icon").load(" #cart-icon");
                 $("#change-item-cart").load(" #change-item-cart");
                 alertify.set('notifier', 'position', 'bottom-right');
                 alertify.success('Đã thêm sản phẩm!');
             }
         });

     });

     $("#sort").on('change', function (e) {
         e.preventDefault();
         let url = $(this).val();
         if (url) {
             window.location = url;
         }
         return false;

     });
/*End Shop page */
