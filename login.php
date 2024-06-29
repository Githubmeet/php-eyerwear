<?php include 'header.php'; ?>
<?php include 'db.php'; ?>
<div class="container">
    <div class="form-container">
    <div class="form">
            <h2>Login</h2>
            
            <form method="post" action="">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
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
            <button type="submit" class="btn btn-primary btn-block mb-2">Login</button>
        </form>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger'>Invalid password!</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>No user found!</div>";
    }
}
?>
        </div>      
    <div class="col-md-5 register-bg">
        <div class="text-center text-white p-5 mt-5">
        <h2 class="mt-2">Welcome Back!</h2>
            <p>Login to continue shopping and manage your account.</p>
            <a href="register.php" class="btn btn-primary1">Register</a>
        </div>
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