<?php
 session_start();

require('header.php');
?>
<body>
    <div class="container" id="c.Log">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $_SESSION['email'] = $email;
           $password = $_POST["password"];
            require_once "db.php";
            $resultadoLogin = loginUser($email, $password);

            if ($resultadoLogin == true) {
                header("Location: index.php");
            }else{
                header("Location: login.php");
            }
        }
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p>Não tem conta? <a href="registro.php">Registro</a></p></div>
    </div>
</body>
</html>