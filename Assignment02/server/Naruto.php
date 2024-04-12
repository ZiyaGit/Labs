<?php

session_start();
$anime_id = 8;

$_SESSION['anime_id'] =  $anime_id;


if (!isset($_SESSION['comments'])) {
    $_SESSION['comments'] = [];
}

// Handling comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_comment'], $_POST['anime_id'], $_POST['comment'])) {
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
    $animeId = filter_input(INPUT_POST, 'anime_id', FILTER_SANITIZE_NUMBER_INT);
    
    // Append the comment to the session storage
    if (!isset($_SESSION['comments'][$animeId])) {
        $_SESSION['comments'][$animeId] = [];
    }

    $_SESSION['comments'][$animeId][] = [
        'comment' => $comment
    ];
    
    
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naruto - AniZI</title>
    <link rel="stylesheet" href="../CSS/animeDetails.css">
    <link rel="icon" type="image/x-icon" href="../images/ZiyaIcon.png">
</head>
<body>
<header>
        
        <div class="navbar">
            <div><a href="index.php" style="font-size: 36px">AniZI</a></div>
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
            <!-- Conditionally display Login or Logout -->
            <?php if (isset($_SESSION["user"])): ?>
                <div><a href="logout.php" class="action_btn">Logout</a></div>
            <?php else: ?>
                <a href="login.php" class="action_btn">Login</a>
            <?php endif; ?>
                
                <div class="toggle_btn">
                    <i class='bx bx-menu'></i>
                </div>
                
        </div>
    </header>
    
        <div class="dropdawn_menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="mangaList.php">Manga List</a></li>
            <li><a href="animeList.php">Anime List</a></li> 
            <?php if (isset($_SESSION["user"])): ?>
                <div><a href="logout.php" class="action_btn">Logout</a></div>
            <?php else: ?>
                <a href="login.php" class="action_btn">Login</a>
            <?php endif; ?>
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
    <div class="anime-container">
        <div class="anime-image">
            <img src="../images/Naruto.jpg" alt="Naruto">
            <p>Score: 8.27/10</p>
        </div>
        <div class="anime-info">
            <h1>Naruto</h1>
            <p class="synopsis-title">Synopsis</p>
            <p class="synopsis-text">It has been two and a half years since Naruto Uzumaki left Konohagakure, the Hidden Leaf Village, 
                for intense training following events which fueled his desire to be stronger. Now Akatsuki, the mysterious organization 
                of elite rogue ninja, is closing in on their grand plan which may threaten the safety of the entire shinobi world. 
                Although Naruto is older and sinister events loom on the horizon, he has changed little in personality—still rambunctious
                 and childish—though he is now far more confident and possesses an even greater determination to protect his friends and home.
                  Come whatever may, Naruto will carry on with the fight for what is important to him, even at the expense of his own body,
                   in the continuation of the saga about the boy who wishes to become Hokage.
                </p>
                <p>[Written by MAL Rewrite]</p>
            <p class="anime-details">Ranked #286 | Popularity #16 | Members 2,468,514</p>
        </div>
    </div>
    <?php include 'comment.php';?>
    
</body>
</html>
