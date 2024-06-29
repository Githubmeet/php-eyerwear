<?php include 'header1.php'; ?>
<?php include 'db.php'; ?>



<style>
    .jumbotron {
    background-color: #007bff;
    color: white;
    padding: 2rem 1rem;
}

.card-img-top {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

/* .carousel-caption {
    background: rgba(0, 0, 0, 0.5);
    padding: 1rem;
    border-radius: 10px;
} */

.navbar-nav .nav-link {
    margin-right: 1rem;
}

.btn-block {
    display: block;
    width: 100%;
}

</style>
    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img1.jpg" class="d-block w-100" alt="Eyewear 1">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h4 style="color: #010042;">Welcome to Eyewear <br> Discover Our Latest Collection</h4> -->

                    <!-- <p>Premium quality eyewear for every style.</p> -->
                <?php if (isset($_SESSION['username'])): ?>
                    <h2 style="color: #010042">Welcome to Eyewear, <?php echo $_SESSION['username']; ?>!</h2>
                <?php endif; ?>
                </div>
            </div>
        </div>
    <!-- Products -->
    <div class="container-fluied m-3">

    <h2 class="mt-4 text-center mb-3">Products</h2>
    <div class="row">
        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='col-md-3'>
                    <div class='card mb-4 shadow-sm'>
                        <img src='images/" . $row['image'] . "' class='card-img-top' alt='" . $row['name'] . "'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $row['name'] . "</h5>
                            <p class='card-text'>" . substr($row['description'], 0, 100) . "...</p>
                            <p class='card-text'><strong>Price: ₹" . $row['price'] . "</strong></p>
                            <a href='#' class='btn btn-primary btn-block'>Add to Cart</a>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<p>No products found.</p>";
        }
        ?>
    </div>
</div>
</div>

<?php include 'footer.php'; ?>
