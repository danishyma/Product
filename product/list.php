<?php
    include 'classes/db.class.php';
    include 'classes/get_products.class.php';
    include 'classes/delete.class.php';
    include 'includes/products.view.php';


    if(isset($_POST['submit'])){

        $delete = new DeleteItem();
        $delete->delItem();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Products List Page for Books">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="shortcut icon" type="image/svg+xml" href="img/stream-solid.svg">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>

    <main>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="header">
                <h1>Product List</h1>

                <div class="buttons">
                    <a class="btn add" role="button" href="add">Add</a>
                    <button class="btn delete" name="submit" type="submit">Mass Delete</button>
                </div>
            </div>
            <hr>

            <div class="product-container">
            
            <?php
                $products = new ViewProduct();
                $products->showProducts();
            ?>

             </div>
            <hr>
        </form>
    </main>

    <footer>
        <p>Daniela Shmayev Nozaki</p>
    </footer>

</body>
</html>