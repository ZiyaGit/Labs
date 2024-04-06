<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gintama - AniZI</title>
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
            <img src="../images/Gintama.jpg" alt="Gintama">
            <p>Score: 9.06/10</p>
        </div>
        <div class="anime-info">
            <h1>Gintama</h1>
            <p class="synopsis-title">Synopsis</p>
            <p class="synopsis-text">Gintoki, Shinpachi, and Kagura return as the fun-loving but broke members of the Yorozuya team! 
                Living in an alternate-reality Edo, where swords are prohibited and alien overlords have conquered Japan, they try to 
                thrive on doing whatever work they can get their hands on. However, Shinpachi and Kagura still haven't been paid... 
                Does Gin-chan really spend all that cash playing pachinko?Meanwhile, when Gintoki drunkenly staggers home one night, 
                an alien spaceship crashes nearby. A fatally injured crew member emerges from the ship and gives Gintoki a strange, 
                clock-shaped device, warning him that it is incredibly powerful and must be safeguarded. Mistaking it for his alarm 
                clock, Gintoki proceeds to smash the device the next morning and suddenly discovers that the world outside his apartment 
                has come to a standstill. With Kagura and Shinpachi at his side, he sets off to get the device fixed; though, as usual,
                 nothing is ever that simple for the Yorozuya team. Filled with tongue-in-cheek humor and moments of heartfelt emotion, 
                 Gintama's fourth season finds Gintoki and his friends facing both their most hilarious misadventures and most dangerous 
                 crises yet.</p>
            <p>[Written by MAL Rewrite]</p>
            <p class="anime-details">Ranked #4 | Popularity #341 | Members 627,026</p>
        </div>
    </div>
</body>
</html>
