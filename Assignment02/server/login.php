<?php
session_start();

// Database connection parameters
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "assignment02"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch user details from the database based on email
function fetchUserDetailsFromDatabase($email) {
    global $conn;
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// Check if login form is submitted
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Fetch user details from the database
    $userDetails = fetchUserDetailsFromDatabase($email);
    
    if ($userDetails) {
        // Verify password
        if (password_verify($password, $userDetails["password"])) {
            $_SESSION["user"] = [
                'email' => $email,
                'full_name' => $userDetails['full_name']
            ];
        } else {
            $error = "Password does not match.";
        }
    } else {
        $error = "User not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/stylesLogin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../images/ZiyaIcon.png">
    <title>AniZI Login</title>
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
    
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    
                    $_SESSION["user"] = "yes";
                    echo "<div class='alert alert-success' style='text-align:center; color: white; 
                    background-color: green; border-radius:12px; font-size:36px;'>Login successful. </div>";
                    echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 2000);</script>";
                    exit;
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
        <h1>Login</h1>
        <div class="input-box">
            <input type="email" placeholder="Email" name="email">
            <i class='bx bxs-user' ></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" name="password">
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox"> Remember me</label>
            <a href="#">Forgot Password?</a>
        </div>
    
        <button type="submit" class="btn" value="Login" name="login">Login</button>

        <div class="register-link">
            <p>Don't Have an Account?</p> <a href="register.php">Register</a>
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