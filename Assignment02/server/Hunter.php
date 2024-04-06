<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hunter x Hunter - AniZI</title>
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
            <img src="../images/Hunter.jpg" alt="Hunter x Hunter">
            <p>Score: 9.4/10</p>
        </div>
        <div class="anime-info">
            <h1>Hunter x Hunter</h1>
            <p class="synopsis-title">Synopsis</p>
            <p class="synopsis-text">Hunters devote themselves to accomplishing hazardous tasks, all from traversing the world's 
                uncharted territories to locating rare items and monsters. Before becoming a Hunter, one must pass the Hunter 
                Examination—a high-risk selection process in which most applicants end up handicapped or worse, deceased. 
                Ambitious participants who challenge the notorious exam carry their own reason. What drives 12-year-old Gon Freecss 
                is finding Ging, his father and a Hunter himself. Believing that he will meet his father by becoming a Hunter, Gon 
                takes the first step to walk the same path. During the Hunter Examination, Gon befriends the medical student Leorio 
                Paladiknight, the vindictive Kurapika, and ex-assassin Killua Zoldyck. While their motives vastly differ from each other,
                they band together for a common goal and begin to venture into a perilous world. 
                </p>
                <p>[Written by MAL Rewrite]</p>
            <p class="anime-details">Ranked #7 | Popularity #9 | Members 2,810,640</p>
        </div>
    </div>
</body>
</html>
