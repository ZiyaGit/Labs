<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Steins;Gate - AniZI</title>
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
            <img src="../images/Steins.jpg" alt="Steins;Gate">
            <p>Score: 9.07/10</p>
        </div>
        <div class="anime-info">
            <h1>Steins;Gate</h1>
            <p class="synopsis-title">Synopsis</p>
            <p class="synopsis-text">Eccentric scientist Rintarou Okabe has a never-ending thirst for scientific exploration. 
                Together with his ditzy but well-meaning friend Mayuri Shiina and his roommate Itaru Hashida, Okabe founds the Future 
                Gadget Laboratory in the hopes of creating technological innovations that baffle the human psyche. Despite claims of grandeur,
                 the only notable "gadget" the trio have created is a microwave that has the mystifying power to turn bananas into green goo.
                 However, when Okabe attends a conference on time travel, he experiences a series of strange events that lead him to believe 
                 that there is more to the "Phone Microwave" gadget than meets the eye. Apparently able to send text messages into the past 
                 using the microwave, Okabe dabbles further with the "time machine," attracting the ire and attention of the mysterious 
                 organization SERN.Due to the novel discovery, Okabe and his friends find themselves in an ever-present danger. 
                 As he works to mitigate the damage his invention has caused to the timeline, Okabe fights a battle to not only save his
                 loved ones but also to preserve his degrading sanity.</p>
            <p>[Written by MAL Rewrite]</p>
            <p class="anime-details">Ranked #3 | Popularity #13 | Members 2,549,665</p>
        </div>
    </div>
    <?php include 'comment.php';?>
    
</body>
</html>
