<?php 
//written by Sebastian Deslauriers
//Peter Drakulic
    require_once('db_credentials.php');
    require_once('database.php');

    $db = db_connect();
    ?>
            <?php //getss all the movies in the movie table of the database, will make this more specific later
            /* old
            $sql = "SELECT * FROM movie ";
            $sql .= "ORDER BY movieID";
            */
            $sql = "select movie.movieID, title, yearCreated, length, concat(firstname,' ',lastname) as director, ratingName, genre_name from movie 
            left outer join director on movie.directorID = director.directorID 
            left outer join rating on movie.ratingID = rating.ratingID 
            left outer join genre on movie.genreID = genre.genreID
            inner join movieuser on movie.movieID = movieuser.movieID
            where userid = " . $_SESSION["userID"];
            $result_set = mysqli_query($db,$sql); //uses the querry with the databse and store the result
            ?>

            <table>
                <tr class="movierow">
                    <th></th>
                    <th>Title</th>
                    <th>Year of Release</th>
                    <th>Length</th>
                    <th>Director</th>
                    <th>Rating</th>
                    <th>Genre</th>
                <tr>
            <?php while($results = mysqli_fetch_assoc($result_set)) { ?>  <!-- while there are results, write this code -->
                <tr class="movierow">
                    <!-- puts the movieID as the link to the poster so we can use the same numbering sceme for every photo -->
                    <td><img src="../posters/<?php if ($results['movieID'] > 9){echo '10';}else{echo $results['movieID'];} ?>.png"></td> 
                    <td><?php echo $results['title']; ?></td>
                    <td><?php echo $results['yearCreated']; ?></td>
                    <td><?php echo $results['length']; ?> minutes</td>
                    <td><?php echo $results['director']; ?></td>
                    <td><?php echo $results['ratingName']; ?></td>
                    <td><?php echo $results['genre_name']; ?></td>
                </tr>
                       
            <?php } ?>
            </table>