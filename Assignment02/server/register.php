<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/stylesRegister.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../images/ZiyaIcon.png">
    <title>AniZI Register</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div><a href="index.php">AniZI</a></div>
            <div class="logo">
                <a href="index.php">
                    <img src="../images/ZiyaIcon.png" alt="Home Icon" id="icon" draggable="false" style="height: 120px; width: 120px;">
                    </a>
            
            </div>
            
                <ul class="links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="mangaList.php">Manga List</a></li>
                    <li><a href="animeList.php">Anime List</a></li>    
                </ul>
                <a href="" class="action_btn">Login</a>
                <div class="toggle_btn">
                    <i class='bx bx-menu'></i>
                </div>
        </div>
    </header>
    
        <div class="dropdawn_menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="mangaList.php">Manga List</a></li>
            <li><a href="animeList.php">Anime List</a></li> 
            <li><a href="login.php" class="action_btn">Login</a></li>
        </div>



    <div class="center">
    
    <div class="wrapper">
    <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           require_once ("database.php");
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required ");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success' style='text-align:center; color: white; background-color: green; border-radius:12px; font-size:36px;'>
                You are registered successfully.</div>";
                echo '<script>
                setTimeout(function() {
                    window.location.href = "login.php";
                }, 2000);
                </script>';
            exit;
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="register.php" method="post">
        <h1>Register</h1>
        <div class="input-box">
            <input type="text" class="Form-control" name="fullname" placeholder="User Name" >
            <i class='bx bxs-user' ></i>
        </div>
        <div class="input-box">
            <input type="email" class="Form-control" name="email" placeholder="Email" >
            <i class='bx bxs-envelope' ></i>
        </div>
        <div class="input-box">
            <input type="password" class="Form-control" name="password" placeholder="Password" >
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="input-box">
            <input type="password" class="Form-control" name="repeat_password" placeholder="Repeat Password" >
            <i class='bx bxs-lock-alt'></i>
        </div>
    
        <button type="submit" class="btn" value="Register" name="submit">Register</button>

        <div class="register-link">
            <p>Go Back To</p> <a href="login.php">Login</a>
        </div>
        </form>
    </div>
    </div>

    <script>
        const toggleBTN = document.querySelector('.toggle_btn')
        const toggleBtnIcon = document.querySelector('.toggle_btn i')
        const dropdawnMenu = document.querySelector('.dropdawn_menu')
        const centerDiv = document.querySelector('.center');
        toggleBTN.onclick = function(){
            dropdawnMenu.classList.toggle('open')
            if (dropdawnMenu.classList.contains('open')) {
            const dropdawnMenuHeight = dropdawnMenu.offsetHeight;
            centerDiv.style.marginTop = dropdawnMenuHeight + 'px'; 
        } else {
            centerDiv.style.marginTop = '0';
        }
        }
        
    </script>
    <?php
        include 'footer.php';
    ?>
</body>
</html>