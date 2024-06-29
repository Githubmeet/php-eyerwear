<?php include 'header.php'; ?>
<?php include 'db.php'; ?>


<div class="container">
    <div class="form-container">
    <div class="col-md-5 register-bg">
        <div class="text-center text-white p-5 mt-5">
            <h2 class="mt-5">Welcome to Eyewear</h2>
            <p>Join us to start shopping !</p>
            <a href="login.php" class="btn btn-primary1">Login</a>

        </div>
    </div>
        <div class="form">
            <h2>Register</h2>
            
            <form method="post" action="">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
    <div class="form-group">
        <label>Password</label>
        <div class="input-group">
            <input type="password" name="password" id="password" class="form-control" required>
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fas fa-eye" id="togglePassword"></i>
                </span>
            </div>
        </div>
    </div>
                
                <button type="submit" class="btn btn-primary btn-block mb-2">Register</button>
            </form>
            <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    // Check if username or email already exists
    $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='alert alert-danger'>Username or email already exists!</div>";
    } else {
        // Insert the user into the database
        $sql_insert = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "<div class='alert alert-success'>Registration successful!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $sql_insert . "<br>" . $conn->error . "</div>";
        }
    }
}
?>

        </div>
       

    </div>
</div>



<script>
document.addEventListener("DOMContentLoaded", function() {
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye / eye-slash icon
        this.classList.toggle('fa-eye-slash');
    });
});
</script>