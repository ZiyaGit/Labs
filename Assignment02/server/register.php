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
        $fullNameError = $emailError = $passwordError = $passwordRepeatError = '';
        if (isset($_POST["submit"])) {
            require_once("database.php");

            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];

            $errors = array();
            
            if (empty($fullName)) {
                $fullNameError = "Full name is required";
            }

            if (empty($email)) {
                $emailError = "Email is required";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Email is not valid";
            }

            if (empty($password)) {
                $passwordError = "Password is required";
            } elseif (strlen($password) < 8) {
                $passwordError = "Password must be at least 8 characters long";
            }

            if ($password !== $passwordRepeat) {
                $passwordRepeatError = "Passwords do not match";
            }

            if (empty($emailError) && empty($fullNameError) && empty($passwordError) && empty($passwordRepeatError)) {
                $sql = "SELECT * FROM users WHERE email = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    $emailError = "Email already exists!";
                } else {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<script>alert('You are registered successfully.'); window.location.href = 'login.php';</script>";
                }
                mysqli_stmt_close($stmt);
            }
            mysqli_close($conn);
        }
    ?>
    <form action="register.php" method="post">
        <h1>Register</h1>
        <div class="input-box">
            <input type="text" class="Form-control" name="fullname" placeholder="User Name" value="<?php echo isset($fullName) ? $fullName : ''; ?>" >
            <div class="error"><?php echo $fullNameError ? "X " . $fullNameError : ""; ?></div>
        </div>
        <div class="input-box">
            <input type="email" class="Form-control" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : ''; ?>" >
            <div class="error"><?php echo $emailError ? "X " . $emailError : ""; ?></div>
        </div>
        <div class="input-box">
            <input type="password" class="Form-control" name="password" placeholder="Password">
            <div class="error"><?php echo $passwordError ? "X " . $passwordError : ""; ?></div>
        </div>
        <div class="input-box">
            <input type="password" class="Form-control" name="repeat_password" placeholder="Repeat Password">
            <div class="error"><?php echo $passwordRepeatError ? "X " . $passwordRepeatError : ""; ?></div>
        </div>
    
        <button type="submit" class="btn" value="Register" name="submit">Register</button>

        <div class="register-link">
            <p>Go Back To</p> <a href="login.php">Login</a>
        </div>
    </form>
    <style>
        .error {
            color: red;       
            text-align: center;  
            font-size: 1em;   
            margin-top: 5px;     
        }
    </style>

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
    
</body>
</html>