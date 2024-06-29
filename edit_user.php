<?php include 'header1.php'; ?>
<?php include 'db.php'; ?>

<?php
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_BCRYPT) : $row['password'];

        $sql = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: admin.php");
        } else {
            echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }
} else {
    header("Location: admin.php");
    exit();
}
?>

<h2>Edit User</h2>
<form method="post" action="">
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
    </div>
    <div class="form-group">
        <label>Password (leave blank to keep current password)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update User</button>
</form>

