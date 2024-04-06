<?php

session_start();
$anime_id = 2;  // Hardcoding anime_id 
// Initialize comments session storage if not already set
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
    
    
    header("Location: " . $_SERVER['PHP_SELF'] . "?anime_id=$animeId"); // Redirect to avoid form resubmission
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fullmetal Alchemist: Brotherhood - AniZI</title>
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
            <img src="../images/Fullmetal.jpg" alt="Fullmetal Alchemist: Brotherhood">
            <p>Score: 9.09/10</p>
        </div>
        <div class="anime-info">
            <h1>Fullmetal Alchemist: Brotherhood</h1>
            <p class="synopsis-title">Synopsis</p>
            <p class="synopsis-text">After a horrific alchemy experiment goes wrong in the Elric household, brothers Edward and Alphonse 
            are left in a catastrophic new reality. Ignoring the alchemical principle banning human transmutation, the boys attempted to 
            bring their recently deceased mother back to life. Instead, they suffered brutal personal loss: Alphonse's body disintegrated 
            while Edward lost a leg and then sacrificed an arm to keep Alphonse's soul in the physical realm by binding it to a hulking 
            suit of armor. The brothers are rescued by their neighbor Pinako Rockbell and her granddaughter Winry. Known as a bio-mechanical 
            engineering prodigy, Winry creates prosthetic limbs for Edward by utilizing "automail," a tough, versatile metal used in robots 
            and combat armor. After years of training, the Elric brothers set off on a quest to restore their bodies by locating the 
            Philosopher's Stone—a powerful gem that allows an alchemist to defy the traditional laws of Equivalent Exchange. As Edward 
            becomes an infamous alchemist and gains the nickname "Fullmetal," the boys' journey embroils them in a growing conspiracy 
            that threatens the fate of the world.</p>
            <p>[Written by MAL Rewrite]</p>
            <p class="anime-details">Ranked #2 | Popularity #3 | Members 3,326,069</p>
        </div>
    </div>
    <?php include 'comment.php';?>
    <?php include 'footer.php';?>
</body>

</html>
