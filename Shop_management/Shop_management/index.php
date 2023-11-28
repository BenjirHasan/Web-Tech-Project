<!DOCTYPE html>
<html lang="en">
<fieldset>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Management Site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <?php include 'header.php'; ?>
    </header>

    <main>
        <fieldset>
        <section class="hero-section">
            <h1>Welcome to Fashion Bd: A new era of your stylish fashion</h1>
            <p>Explore our wide range of products and find the perfect items for your needs.</p>
            <a href="products.php" class="btn btn-primary">Shop Now</a>
        </section>

        <section class="products-section">
            <h2>Featured Products</h2>
            <div class="products-grid">
                <div class="product">
                    <img src="Product_img/shirt.png" alt="Shirt Image">
                    <h3>Shirts</h3>
                    <p>Product Description</p>
                </div>
                <div class="product">
                    <img src="Product_img/pant.png" alt="Pant Image">
                    <h3>Pants</h3>
                    <p>Product Description</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
                <div class="product">
                    <img src="Product_img/bag.png" alt="Bags Image">
                    <h3>Bags</h3>
                    <p>Product Description</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
                <div class="product">
                    <img src="Product_img/shoe.png" alt="Shoe Image">
                    <h3>Shoes</h3>
                    <p>Product Description</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>

            <a href="products.php" class="btn btn-primary">See More Products</a>
        </section>
</fieldset>
    </main>


<?php include 'footer.php'; ?>

</body>
</fieldset>
</html>
