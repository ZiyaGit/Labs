<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attack on Titan - AniZI</title>
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
            <img src="../images/Attack.jpg" alt="Attack on Titan">
            <p>Score: 9.05/10</p>
        </div>
        <div class="anime-info">
            <h1>Attack on Titan</h1>
            <p class="synopsis-title">Synopsis</p>
            <p class="synopsis-text">Seeking to restore humanity's diminishing hope, the Survey Corps embark on a mission to retake 
                Wall Maria, where the battle against the merciless "Titans" takes the stage once again. Returning to the tattered 
                Shiganshina District that was once his home, Eren Yeager and the Corps find the town oddly unoccupied by Titans. 
                Even after the outer gate is plugged, they strangely encounter no opposition. The mission progresses smoothly until 
                Armin Arlert, highly suspicious of the enemy's absence, discovers distressing signs of a potential scheme against them.
                Shingeki no Kyojin Season 3 Part 2 follows Eren as he vows to take back everything that was once his. Alongside him, 
                the Survey Corps strive—through countless sacrifices—to carve a path towards victory and uncover the secrets locked 
                away in the Yeager family's basement.</p>
            <p>[Written by MAL Rewrite]</p>
            <p class="anime-details">Ranked #3 | Popularity #21 | Members 2,258,155</p>
        </div>
    </div>
</body>
</html>
