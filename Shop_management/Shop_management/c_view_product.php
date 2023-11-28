<!DOCTYPE html>
<html lang="en">
<fieldset>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <?php include 'loged_header.php'; ?>
    </header>

    <main>
        <fieldset>

        <section class="products-section">
            <h2>Products</h2>
            <div class="products-grid">
                <div class="product">
                    <img src="Product_img/shirt.png" alt="Shirt Image">
                    <h3>Shirts</h3>
                    <p>Product Description</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                    <br>
                    <br>
                    <button onclick="window.location.href='add_to_cart.php'" >Add to Cart</button>
                    <br>
                    
                </div>
                <br>

                <div class="product">
                    <img src="Product_img/pant.png" alt="Pant Image">
                    <h3>Pants</h3>
                    <p>Product Description</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                    <br>
                    <br>
                    <button onclick="window.location.href='add_to_cart.php'" >Add to Cart</button>
                    <br>
                </div>
                <br>
                <div class="product">
                    <img src="Product_img/bag.png" alt="Bags Image">
                    <h3>Bags</h3>
                    <p>Product Description</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                    <br>
                    <br>
                    <button onclick="window.location.href='add_to_cart.php'" >Add to Cart</button>
                    <br>
                </div>
                <br>
                <div class="product">
                    <img src="Product_img/shoe.png" alt="Shoe Image">
                    <h3>Shoes</h3>
                    <p>Product Description</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                    <br>
                    <br>
                    <button onclick="window.location.href='add_to_cart.php'" >Add to Cart</button>
                    <br>
                </div>
            </div>
            <br>

            <a href="products.php" class="btn btn-primary">See More Products</a>
        </section>

        <br>
<br>
<br>

   <button onclick="window.location.href='customer_dashboard.php'" >Back</button>
<br>
<br>
<br>
</fieldset>
    </main>


<?php include 'footer.php'; ?>

</body>
</fieldset>
</html>
