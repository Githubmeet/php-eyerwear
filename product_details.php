<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "<div class='container mt-4'><p class='text-center'>Product not found.</p></div>";
        include 'includes/footer.php';
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="images/<?php echo $product['image']; ?>" class="img-fluid" alt="<?php echo $product['name']; ?>">
        </div>
        <div class="col-md-6">
            <h2><?php echo $product['name']; ?></h2>
            <p><?php echo $product['description']; ?></p>
            <h4>$<?php echo $product['price']; ?></h4>
            <button class="btn btn-primary">Add to Cart</button>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
