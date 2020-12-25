$(document).ready(function() {

    $("#submit-form").submit(function(event){
        event.preventDefault();
            var product_sku = $("#product_sku").val();
            var product_name = $("#product_name").val();
            var product_price = $("#product_price").val();
            var product_type = $("#product_type").val();
            var product_descr = $("#product_descr").val();
            var product_descr2 = $("#product_descr2").val();
            var product_descr3 = $("#product_descr3").val();
            var submit = $("#form_submit").val();
         $.ajax({
            type: "POST",
            url: "/product/includes/validator.inc.php",
            dataType: "json",
            data:{
                product_sku: product_sku,
                product_name: product_name,
                product_price: product_price,
                product_type: product_type,
                product_descr: product_descr,
                product_descr2: product_descr2,
                product_descr3: product_descr3,
                submit: submit
            },
            error: function($errors) { 
                var errStr = $errors.responseText;
                var fields = [
                    "product_sku", 
                    "product_name", 
                    "product_price",
                    "product_type",
                    "product_descr",
                    "product_descr2",
                    "product_descr3",
                ];
                
                var errObj = {};
                for (let entry of errStr.split(",")) {
                    let pair = entry.split(":");
                    errObj[pair[0]] = pair[1];
                }
                Object.keys(errObj).forEach(key => errObj[key] === undefined && delete errObj[key]);

                if ($errors.responseText.length > 0){

                    $.each( errObj, function( key, value ) {
                        if (jQuery.inArray( key, fields ) != -1){
                            $("." + key).text(value);
                            fields.splice( $.inArray(key,fields), 1 );
                        }
                    });

                    $.each( fields, function( i, val) {
                        $("." + val).empty();
                    });

                } else {
                    window.location.href = '/product/list';
                }
            },
        });
    });

});