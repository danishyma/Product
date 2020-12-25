$(document).ready(function() {

    var fst = $(".first-descr");
    var furn = $(".second-descr, .third-descr");
    var p = $('#descr-message');
    
    fst.hide();
    furn.hide();
    
    $('#product_type').change(function() {
        var type = $(this).val();
        switch (type) {
            case 'DVD-Disc':
                fst.show();
                furn.hide();
                fst.find("label").text("Size (MB)");
                p.text('"Please, provide the products dimensions in MB."');
                break;
            case 'Book':
                fst.show();
                furn.hide();
                fst.find("label").text("Weight (KG)");
                p.text('"Please, provide the products weight in KG."');
                break;
            case 'Furniture':
                fst.show();
                furn.show();
                fst.find("label").text("Height (CM)");
                p.text('"Please, provide the products dimentions as HxWxL."');
                break;
            default:
                fst.hide();
                furn.hide();
                p.empty();
        }
      });

});