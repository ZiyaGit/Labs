<?php
// Frieren.php
session_start();
$anime_id = 1;

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
    
    
    header("Location: " . $_SERVER['PHP_SELF'] . "?anime_id=$animeId"); // Redirect to avoid form resubmission
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frieren: Beyond Journey's End - AniZI</title>
    <link rel="stylesheet" href="../CSS/animeDetails.css">
    <link rel="icon" type="image/x-icon" href="../images/ZiyaIcon.png">
</head>
<body>
<header>
    <div class="center" >
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



    

    
    <div class="anime-container">
        <div class="anime-image">
            <img src="../images/Frieren.jpg" alt="Frieren: Beyond Journey's End">
            <p>Score: 9.39/10</p>
        </div>
        <div class="anime-info">
            <h1>Frieren: Beyond Journey's End</h1>
            <p class="synopsis-title">Synopsis</p>
            <p class="synopsis-text">During their decade-long quest to defeat the Demon King, the members of the hero's party—Himmel himself, 
                the priest Heiter, the dwarf warrior Eisen, and the elven mage Frieren—forge bonds through adventures and battles, creating 
                unforgettable precious memories for most of them. However, the time that Frieren spends with her comrades is equivalent to 
                merely a fraction of her life, which has lasted over a thousand years. When the party disbands after their victory, Frieren 
                casually returns to her "usual" routine of collecting spells across the continent. Due to her different sense of time, she 
                seemingly holds no strong feelings toward the experiences she went through. As the years pass, Frieren gradually realizes 
                how her days in the hero's party truly impacted her. Witnessing the deaths of two of her former companions, Frieren begins 
                to regret having taken their presence for granted; she vows to better understand humans and create real personal connections. 
                Although the story of that once memorable journey has long ended, a new tale is about to begin. 
                </p>
                <p>[Written by MAL Rewrite]</p>
            <p class="anime-details">Ranked #1 | Popularity #323 | Members 645,866</p>
        </div>
    </div>
    </div>
    <script>
        const toggleBTN = document.querySelector('.toggle_btn')
        const toggleBtnIcon = document.querySelector('.toggle_btn i')
        const dropdawnMenu = document.querySelector('.dropdawn_menu')
        const centerDiv = document.querySelector('.center');
        toggleBTN.onclick = function() {
            dropdawnMenu.classList.toggle('open')
            if (dropdawnMenu.classList.contains('open')) {
            const dropdawnMenuHeight = dropdawnMenu.offsetHeight;
            centerDiv.style.marginTop = dropdawnMenuHeight + 'px'; 
        } else {
            centerDiv.style.marginTop = '0';
        }
        }
        
    </script>
    <?php include 'comment.php';?>
    
</body>
</html>



    
