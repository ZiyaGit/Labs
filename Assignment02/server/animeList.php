<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/animeList.css">
    <link rel="icon" type="image/x-icon" href="../images/ZiyaIcon.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>AniZI - Anime List</title>
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


    <main class="center">
        <div class="search-container" >
            <!-- <select style="width: 72px;height: 35px;" name="search-option" id="search-option" onchange="change_type();">
                <option value="0">Filter</option>
                <option value="ANIME">Anime</option>
                <option value="MANGA">Manga</option>
                <option value="character">Character</option>
            </select> -->
            <input type="text" name="" class="home-search" id="home-search" placeholder="🔍 Search..." oninput="onhomesearch_input();">
            
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('home-search');

                searchInput.addEventListener('input', function() {
                    const query = this.value.toLowerCase();
                    const animeItems = document.querySelectorAll('.anime-item'); // Assuming you have these items

                    animeItems.forEach(item => {
                        const title = item.textContent.toLowerCase();
                        if (title.includes(query)) {
                            item.style.display = ''; // Show item if it matches
                        } else {
                            item.style.display = 'none'; // Hide item if it doesn't match
                        }
                    });
                });
            });
            </script>

        </div>
        <div class="anime-grid">
            <!-- Anime Item 1 -->
            <a href="Frieren.php" class="anime-item">
                <img src="../images/Frieren.jpg" alt="Anime">
                <span>Frieren: Beyond Journey's End</span>
            </a>
            <!-- Add more anime items similarly -->
            <!-- Anime Item 2 -->
            <a href="Fullmetal.php" class="anime-item">
                <img src="../images/Fullmetal.jpg" alt="Anime">
                <span>Fullmetal Alchemist: Brotherhood</span>
            </a>
            <!-- Anime Item 3 -->
            <a href="Steins.php" class="anime-item">
                <img src="../images/Steins.jpg" alt="Anime">
                <span>Steins;Gate</span>
            </a>
            <!-- Anime Item 4 -->
            <a href="Gintama.php" class="anime-item">
                <img src="../images/Gintama.jpg" alt="Anime">
                <span>Gintama</span>
            </a>
            <!-- Anime Item 5 -->
            <a href="Attack.php" class="anime-item">
                <img src="../images/Attack.jpg" alt="Anime">
                <span>Attack on Titan</span>
            </a>
            <!-- Anime Item 6 -->
            <a href="Hunter.php" class="anime-item">
                <img src="../images/Hunter.jpg" alt="Anime">
                <span>Hunter x Hunter</span>
            </a>
            <!-- Anime Item 7 -->
            <a href="Bleach.php" class="anime-item">
                <img src="../images/Bleach.jpg" alt="Anime">
                <span>Bleach: Thousand-Year Blood War</span>
            </a>
            <!-- Anime Item 8 -->
            <a href="Naruto.php" class="anime-item">
                <img src="../images/Naruto.jpg" alt="Anime">
                <span>Naruto: Shippuuden</span>
            </a>
            
        </div>

    </main>
</body>
</html>