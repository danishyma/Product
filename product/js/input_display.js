$(document).ready(function() {

    var fst = $(".first-descr");
    var furn = $(".second-descr, .third-descr");

    var optObj = {
        'DVD-Disc': {  
            txt: '"Please, provide the products dimensions in MB."',
            lbl1: "Size (MB)",
            display: {
               show: $(".first-descr"),
               noshow: $(".second-descr, .third-descr")
            }
        },
        'Book': {
            txt: '"Please, provide the products weight in KG."',
            lbl1: "Weight (KG)",
            display: {
                show: $(".first-descr"),
                noshow: $(".second-descr, .third-descr")
            }
        },
        'Furniture': {
            txt: '"Please, provide the products dimentions as HxWxL."',
            lbl1: "Height (CM)",
            display: {
                show: $(".first-descr, .second-descr, .third-descr")
            }
        },
        '' : {
            txt: '',
            lbl1: '',
            display: {
                noshow: $(".first-descr, .second-descr, .third-descr")
            }
        },
    };

    fst.hide();
    furn.hide();
    
    $('#product_type').change(function() {
        $("#product_type").each(function() {

            var type = $(this).val();
            var p = $('#descr-message');
            var show = optObj[type]['display']['show'];
            var noshow = optObj[type]['display']['noshow'];
            
            p.text(optObj[type]['txt']);
            fst.find("label").text(optObj[type]['lbl1']);

            $.each( show, function( key, val ) {
                show.show();
            });
            $.each( noshow, function( key, val ) {
                noshow.hide();
            });

        });

      });

});
