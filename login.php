<!DOCTYPE html>
<html>
<head>
    <style>
        * {
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
}

section {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  width: 100%;
  background: url("./image/zhongli.jpg") no-repeat;
  background-position: center;
  background-size: cover;
}

.form-box {
  position: relative;
  width: 400px;
  height: 450px;
  background: transparent;
  border: 2px solid rgba(255, 255, 255, 0.5);
  border-radius: 20px;
  backdrop-filter: blur(15px);
  display: flex;
  justify-content: center;
  align-items: center;
}

h2 {
  font-size: 2em;
  color: #fff;
  text-align: center;
}

.inputbox {
  position: relative;
  margin: 30px 0;
  width: 310px;
  border-bottom: 2px solid #fff;
}

.inputbox label {
  position: absolute;
  top: 50%;
  left: 5px;
  transform: translateY(-50%);
  color: #fff;
  font-size: 1em;
  pointer-events: none;
  transition: 0.5s;
}

input:focus ~ label {
  top: -5px;
}
input:valid ~ label {
  top: -5px;
}

.inputbox input {
  width: 100%;
  height: 50px;
  background: transparent;
  border: none;
  outline: none;
  font-size: 1em;
  padding: 0 35px 0 5px;
  color: #fff;
}


.forget {
  display: flex;
  justify-content: space-between;
  margin: 10px 0 15px;
  font-size: 0.9em;
  color: #fff;
}

.forget label:nth-child(2) {
  order: 1;
}

.forget label {
  display: flex;
  align-items: center;
}

.forget label input[type="checkbox"] {
  margin-right: 6px;
}

.forget label a {
  color: #fff;
  text-decoration: none;
}

.forget label a:hover {
  text-decoration: underline;
}

input[type="submit"] {
  width: 100%;
  height: 40px;
  border-radius: 40px;
  background: #fff;
  border: none;
  outline: none;
  cursor: pointer;
  font-size: 1em;
  font-weight: 600;
}

.register {
  font-size: 0.9em;
  color: #fff;
  text-align: center;
  margin: 25px 0 10px;
}

.register p a {
  text-decoration: none;
  color: #fff;
  font-weight: 600;
}

.register p a:hover {
  text-decoration: underline;
}
    </style>
</head>
<body>
<section>
  <div class="form-box">
    <div class="form-value">
      <form action="" method="POST">
        <h2>Login</h2>
        <div class="inputbox">
          <input type="text" name="uname" required>
          <label for="">Username</label>
        </div>
        <div class="inputbox">
          <input type="password" name="psw" required>
          <label for="">Password</label>
        </div>
        <div class="forget">
          <label>
            <input type="checkbox"> Remember me
          </label>
          <label>
            <a href="#">Forgot password?</a>
          </label>
        </div>
        <input type="submit" name="submit" value="Log In">
        <div class="register">
          <p>Don't have a account ? <a href="signup.php">Register</a></p>
        </div>
      </form>
    </div>
  </div>
</section>
</body>
    <?php

if(isset($_POST['submit'])){
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    session_start();
    include 'dbconnect.php';

    $sql = "SELECT * FROM register WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;

            echo "Login successful!";
            header('Location:dashboard.php');
        } else {
            echo '<script>alert("Wrong username or password");</script>';
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
</html>