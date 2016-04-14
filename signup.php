<?php
require_once ("classes/init.php");
$pageTitle = "Sign Up";
if($session->is_logged_in()){
    header('Location:index.php');
}
?>

<?php 

if (isset($_POST['submit'])) {

    $student = new Student();
    $student->username = $_POST['username'];
    $student->password = $_POST['password'];
    $student->create();
}

?>

<?php
require(ROOT_PATH . 'inc/head.php'); 
 ?>

</pre>
<body>
<?php include (ROOT_PATH . 'inc/header.php') ?>
<?php include (ROOT_PATH . 'inc/navbar.php') ?>
  <div class="main">
    <div class="container">
      <div class="form">
        <form action="signup.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value="" />
            </div>

            <!-- <input type="hidden" name="token" value="" /> -->
            <input type="submit" name="submit" value="Create" />

        </form>
      </div>
    </div>
  </div>
<?php include (ROOT_PATH . 'inc/footer.php') ?>
</body>
</html>