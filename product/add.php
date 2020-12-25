<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Products List Page for Books">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="shortcut icon" type="image/svg+xml" href="img/stream-solid.svg">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/add.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <main>
        <form id="submit-form" action="" method="POST">
            <div class="header">
                <h1>Product Add</h1>

                <div class="buttons">
                    <button class="btn save" id="form_submit" type="submit" name="submit"><span>Save</span></button>
                    <a class="btn cancel" role="button" href="list"><span>Cancel</span></a>
                </div>
            </div>
            <hr>

            <div class="form-container">

                <div id="product-sku">
                    <label for="product_sku">SKU</label>
                    <input type="text" id="product_sku" name="product_sku" autocomplete="off">
                    <span class="error product_sku"></span>
                </div>

                <div id="product-name">
                    <label for="product_name">Name</label>
                    <input type="text" id="product_name" name="product_name" autocomplete="off">
                    <span class="error product_name"></span>
                </div>

                <div class="product-price">
                    <label for="product_price">Price ($)</label>
                    <input type="text" id="product_price" name="product_price" autocomplete="off">
                    <span class="error product_price"></span>
                </div>

                <div class="product-type">
                    <label for="product_type">Type Switcher</label>
                    <select id="product_type" name="product_type">
                        <option value=""></option>
                        <option>DVD-Disc</option>
                        <option>Book</option>
                        <option>Furniture</option>
                    </select>
                    <span class="error product_type"></span>
                </div>

                <!-- The input for description is dynamically added by Jquery on main.js -->
                <div id="description">
                    <div class="first-descr">
                        <label id="label-desription" for='product_descr'></label>
                        <input  type='text' id='product_descr' name='product_descr' autocomplete='off'>
                        <span class="error product_descr"></span>
                    </div>
                    <div class="second-descr">
                        <label id="label-desription2" for='product_descr2'>Width (CM)</label>
                        <input  type='text' id='product_descr2' name='product_descr2' autocomplete='off'>
                        <span class="error product_descr2"></span>
                    </div>
                    <div class="third-descr">
                        <label id="label-desription3" for='product_descr3'>Length (CM)</label>
                        <input  type='text' id='product_descr3' name='product_descr3' autocomplete='off'>
                        <span class="error product_descr3"></span>
                    </div>
                    <p id="descr-message"></p>
                </div>

            </div> 

            <hr>
        </form>
    </main>

    <footer>
        <p>Daniela Shmayev Nozaki for Scandiweb Test Assignment</p>
    </footer>

<script type="text/javascript" src="js/form_validation.js"></script>
<script type="text/javascript" src="js/input_display.js"></script>
</body>
</html>