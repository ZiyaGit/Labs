<?php
    # Written by Peter Drakulic
    // Modified by Sebastian Deslauriers 

if(!empty($_POST['lstBox1']))
{
    #connect to database
    include 'connectToDb.php';
    $conn = OpenCon();
    echo "Connected Successfully";
    session_start();

    $currentUser = $_SESSION["myuser"];
  echo "<br>ACTION = " . $_SESSION["myaction"];
    # describe wether we are adding or removing from userlist
    #$currentAction = $_SESSION["action"];

    # control message - remove
    echo "<br>" . $currentUser . "  " . $_SESSION["myaction"] . "  " . $_SESSION["userID"];

    # adding to userlist
    if ( $_SESSION["myaction"] == "ADD")
    {
        # variable that holds part of sql insert statement 
        $insertPart = "";

        # accumalate movie ids that need to be added to userlist
        for ($i=0; $i < count($_POST['lstBox1']);$i++) 
        {
            if ( $i > 0)
            {
                $insertPart = $insertPart . ",";
            }
            $insertPart = $insertPart . "(" . $_POST['lstBox1'][$i] . "," . $_SESSION["userID"] . ")";
        }

        
        # finish assembling sql insert statement
        $sql = "REPLACE INTO movieuser (movieid,userid) VALUES " . $insertPart;
        echo "sql = " . $sql;

        # execute sql
        $result = $conn->query($sql);

        # check result of execution
        if (!$result) 
        {
            # control statement needs to be replaced with better message
            echo "Error: " . $conn->error;
        } else 
        {
            //Redirects user to their list
            header("location: UserList.php");
        }
    }

    # removing from userlist
    else if ( $_SESSION["myaction"] == "REMOVE")
    {
        # control statement needs to be removed
        echo "<br><br>REMOVING...";

            
        # accumalate movie ids that need to be removed from userlist
        $deletePart = "";
        for ($i=0; $i < count($_POST['lstBox1']);$i++) 
        {
            if ( $i > 0)
            {
                $deletePart = $deletePart . " OR ";
            }
            $deletePart = $deletePart . "(userid='" . $_SESSION["userID"] . "'" . " and movieid=" . $_POST['lstBox1'][$i] . ")" ;
        }

         # finish assembling sql delete statement
        $sql = "delete from movieuser where " . $deletePart;

        # control statement needs to be removed
        echo "<br>" . $sql;

        # execute sql
        $result = $conn->query($sql);
    
        # check result of execution
        if (!$result) 
        {
             # control statement needs to be replaced with better message
            echo "Error: " . $conn->error;
        } else 
        {
            //redirects user to their list
            header("location: UserList.php");
            
        }

    }   
}

# selects updated userlist of movies and displayes it as listbox 
function displayMovies(&$result, $currentUser, $conn)
{
    #prepare sql select statement
    $sql = "select movie.movieID, title, yearCreated, length, concat(firstname,' ',lastname) as director, ratingName, genre_name from movie 
    left outer join director on movie.directorID = director.directorID 
    left outer join rating on movie.ratingID = rating.ratingID 
    left outer join genre on movie.genreID = genre.genreID
    inner join movieuser on movie.movieID = movieuser.movieID
    where userid = " . $_SESSION["userID"];

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
        echo "<form action='SaveSelections.php' method='post'>";

        #  if any records returned, create listbox
        if ($result->num_rows > 0) {
            # header - replace if necessary
            echo "<h1> $_SESSION[myuser]'s Movie list</h1>";

            # declare listbox as multi select
            echo "<select multiple='multiple' name='lstBox1[]' id='lstBox1' class='form-control'>";

            # loop through returned records and generate items for listbox 
            while ($row = $result->fetch_assoc()) {
                echo "<option value={$row['movieID']}>{$row['title']} ({$row['yearCreated']}) - Directed by {$row['director']}, Length: {$row['length']} minutes, Genre: {$row['genre_name']}, Rating: {$row['ratingName']}</option>";
            }
            echo "</select>";

            # on submit the same page will be called with updated listbox and action being remove
            $_SESSION["myaction"] = "REMOVE";

            #button
            echo "<br><input value='Remove Movies' type='Submit' id='removebutt' />";

            
        } else {

            # lets user know there aren't any movies in their list
            echo "<h2>You Havent Added Any Movies Yet</h2>";
            echo "<br><a href='Index.php'>Go Back</a>";
        }

        # end of form
        echo "</form>";
    }
}
?>
