<?php include 'header1.php'; ?>
<?php include 'db.php'; ?>

<div class="container mt-4">
    <h2 class="text-center">Admin Panel - Manage Products</h2>
    <a href="add_product.php" class="btn btn-primary mb-4">Add New Product</a>
    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['description']}</td>
                        <td>₹{$row['price']}</td>
                        <td><img src='images/{$row['image']}' width='50' height='50'></td>
                        <td>
                            <a href='edit_product.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_product.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>No products found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</div>
