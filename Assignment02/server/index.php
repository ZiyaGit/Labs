<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ziya Gurel">
    <link rel="stylesheet" href="../CSS/homeStyles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Assignmnet 2</title>
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



    

    

<!-- /////////////////////////////////////////////////////////////////// -->

    <main>
        <div class="center">
            <div class="row" >
                <div class="col" >
                    <h1>AniZI</h1>
                    <p id="description">
                    <span id="initialText">AniZI is your ultimate gateway to the enchanting world of Anime and Manga. 
                    Explore an extensive catalog of titles, delve into detailed descriptions, 
                    and engage with an active community through comments and recommendations.</span>
                    <span id="moreText" style="display: none;"> Whether you're a lifelong Otaku or new to the scene, AniZI offers
                    a user-friendly platform to discover, discuss, and dive deep into your favorite Anime and Manga series. 
                    Join us and become part of a growing community that shares your passion for Anime and Manga!</span>
                    <button id="showMoreBtn">Show More</button></p>
                    <div class="indexBtn">
                        <a href="animeList.php" class="button" id="button" >Explore</a>
                    </div>

                </div>
                
                
                <div class="col" >
                    <p class="top">Top Anime</p>
                    <a href="Frieren.php" class="card card1">
                        <span class="h2">Frieren</span>
                    </a>
                    <a href="Bleach.php" class="card card2">
                        <span class="h2">Bleach</span>
                    </a>
                    <a href="Attack.php" class="card card3">
                        <span class="h2">Attack on Titan</span>
                    </a>
                    <a href="Naruto.php" class="card card4">
                        <span class="h2">Naruto</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
        
        <script>
            document.addEventListener('DOMContentLoaded', setUpShowMore);
            window.addEventListener('resize', setUpShowMore);

            function setUpShowMore() {
                const moreText = document.getElementById('moreText');
                const initialText = document.getElementById('initialText'); 
                const showMoreBtn = document.getElementById('showMoreBtn');
        
            // Function to toggle text visibility and button text
            function toggleText() {
                if (moreText.style.display === "none" || !moreText.style.display) {
                    moreText.style.display = "inline";
                    showMoreBtn.textContent = "Show Less";
                    initialText.style.display = "inline"; 
                } else {
                    moreText.style.display = "none";
                    showMoreBtn.textContent = "Show More";
                }
            }   
        
            // Initially hide or show moreText based on window width
            if (window.innerWidth < 770) {
                moreText.style.display = "none";
                showMoreBtn.textContent = "Show More";
            } else {
                moreText.style.display = "inline"; 
                showMoreBtn.textContent = "Show Less"; 
            }
            showMoreBtn.onclick = toggleText;
            }
        </script>
    <!-- header script -->
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