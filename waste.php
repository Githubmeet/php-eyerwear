<?php include 'header1.php'; ?>
<?php include 'db.php'; ?>
  <!-- Jumbotron -->
  <div class="jumbotron">
    <h1 class="display-4">Eyewear</h1>
    <p class="lead">Your Online Eyewear Store</p>
    
    <p class="lead" id="welcomeMessage" style="display: none;">Welcome, User!</p>
</div>

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="productDetails">
        <!-- Product details will be displayed here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add to Cart</button>
      </div>
    </div>
  </div>
</div>

    <!-- Products -->
    <h2 class="mt-4 text-center">Products</h2>
    <div class="row">
        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='col-md-4'>
                    <div class='card mb-4 shadow-sm'>
                        <img src='images/" . $row['image'] . "' class='card-img-top' alt='" . $row['name'] . "'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $row['name'] . "</h5>
                            <p class='card-text'>" . substr($row['description'], 0, 100) . "...</p>
                            <p class='card-text'><strong>Price: $" . $row['price'] . "</strong></p>
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

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>Contact Us</h4>
        <p>Address: 123 Main Street, City, Country</p>
        <p>Phone: +1-123-456-7890</p>
        <p>Email: info@eyewear.com</p>
      </div>
      <div class="col-md-6">
        <h4>Follow Us</h4>
        <ul class="list-inline">
          <li>
            Facebook<br>
            Twitter<br>
            Instagram<br>
          </li>
          <!-- <li class="list-inline-item"><a href="#">Facebook</a></li>
          <li class="list-inline-item"><a href="#">Twitter</a></li>
          <li class="list-inline-item"><a href="#">Instagram</a></li> -->
        </ul>
      </div>
    </div>
    <hr>
    <p class="text-center">&copy; 2024 EYEWEAR. All rights reserved.</p>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="script.js"></script>

</body>
</html>
