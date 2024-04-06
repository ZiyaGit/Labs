<?php
    # Written by Peter Drakulic
    // Modified by Sebastian Deslauriers 
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (strpos($url,'popularmovies.php') !== false) {
        session_start();
    };
    # connect
    include 'connectToDb.php';
    $conn = OpenCon();

    # control statement needs to be removed
    //echo "Connected Successfully";


    # the only action availible from this screen is ADD
    $_SESSION["myaction"] = "ADD";
   
    //if usre is logged in set current user to their username
    if(isset($_SESSION["myuser"])){
        $currentUser = $_SESSION["myuser"];
    } else {
        $currentUser = "";
    }
    
    //gets the userID, used on other pages for displaying what movies user added to their list
    if(isset($_SESSION["userID"])){
        $_SESSION["userID"];
    } else {
        
    }
    //if user is on popularmovies.php it will display a webpage, if this is included on another webpage it will not show this
    if (strpos($url,'popularmovies.php') !== false) {
        echo '<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Search</title>
                <!--css used-->
                <link rel="stylesheet" href="../styles/style.css">
                <link rel="stylesheet" href="../styles/styleList.css"> 
            </head>
            <body>
            <header>
            
            
            <p id="sitename"><a href="Index.php">My Movie List</a></p>
            <div class="sidebutton">
                <p id="ulist"><a href="UserList.php">';  if (isset($_SESSION["myuser"])) 
                //if user is logged in it will display their name in the "my movie list" button
                { 
                    echo $_SESSION["myuser"];
                    echo "'s ";
                } else {
                    //if user is not logged in it will just show 'my movie list'
                    echo 'My ';
                }; 
                echo 'Movie List</a></p>'; 
                echo '<p id="signbutt"><a href="SignIn.php">';
                if (isset($_SESSION["myuser"])) {//if user is logged in the sign in button changes to sign out
                    echo "Sign out" ;
                } else {
                    echo "Sign in";
                }
                echo '</a></p>
            </div>
        </header>
            
            <form method="POST">
        <div id="contentwrap"> 
        </form>';
            
    } else {
    };
    $searchParam = "";
        if ( isset($_POST['searchbar']))
        {

                echo "<BR><h2>Searching for  " . $_POST['searchbar'] . "</h2>";
                $searchParam  = $_POST['searchbar'];
                $_SESSION["search"] = $searchParam;
        }
        else
        {
            echo "<br><h2>Search:</h2>";
        }

echo "<form action='popularmovies.php' id='two' method='post'>";
echo "<div id='searchbar'>
<input type='text' placeholder='Search:' id='search' name='searchbar' size='60' value='" . $searchParam . "'></div>";
echo "<input name='action' value='🔍' type='Submit' id='searchbutt'/>";

echo "</form>";

        


    displayMovies($result, $currentUser, $conn, $searchParam);
    
    CloseCon($conn);

    # selects updated userlist of movies and displayes it as listbox 
    function displayMovies(&$result, $currentUser, $conn, $searchParam)
    {
        #prepare sql select statement
        $sql = "select movie.movieID, title, yearCreated, length, concat(firstname,' ',lastname) as director, ratingName, genre_name from movie 
        left outer join director on movie.directorID = director.directorID 
        left outer join rating on movie.ratingID = rating.ratingID 
        left outer join genre on movie.genreID = genre.genreID";
        if ( $searchParam != "" )
        {
            $sql = $sql . " where title like '%" . $searchParam . "%'";
        }

        # execute sql
        $result = $conn->query($sql);

        # check result of execution
        if (!$result) 
        {
            # control statement needs to be replaced with better message
            echo "Error: " . $conn->error;
        } else 
        {
            # declaring form with action and creating listbox
            echo "<form action='SaveSelections.php' id='one' method='post'>";
           
#   /#/?search=something
            #  if any records returned, create listbox
            if ($result->num_rows > 0) {
                //the code from search.html
                
                # header - replace if necessary
                $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                if (strpos($url,'popularmovies.php') !== false) {
                    echo "<h1>Search Results</h1>";
                } else {
                    echo "<h1>Popular Movies Right Now!</h1>";
                };

                # declare listbox as multi select
                echo "<select multiple='multiple' name='lstBox1[]' id='lstBox1' class='form-control'>";

                # loop through returned records and generate items for listbox 
                while ($row = $result->fetch_assoc()) {
                    echo "<option value={$row['movieID']}>{$row['title']} ({$row['yearCreated']}) - Directed by {$row['director']}, Length: {$row['length']} minutes, Genre: {$row['genre_name']}, Rating: {$row['ratingName']}</option>";
                }
                echo "</select>";

                #button
                if(isset($_SESSION["userID"])){
                    echo "<br><input value='Add Movies' type='Submit' id='moviebutt'/>";
                }
                else {//wont let user add movies to a list if they're not logged in
                    echo "<br><h2 style='color: #E50000;' >please sign in to add movies to your list</h2>";
                }
                // if on popularmovies.php, display the search results as a table
                if (strpos($url,'popularmovies.php') !== false) {
                include 'searchtable.php';
                }
                
                
                
            } else {

                // tells user that what they searched for isnt available
                echo "<h2>No movies match that search term</h2>";
                echo "<p style='text-decoration: underline;' style='font-weight: bold;'>
                <a href='Missing.php'>Don't have the movie you're looking for?</a></p>";
            }

            # end of form
            echo "</form>";
        }
    }
?>
