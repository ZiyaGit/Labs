<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize comments session storage if not already set
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

    // Get user's name from the session if logged in
    $fullName = isset($_SESSION['user']['full_name']) ? $_SESSION['user']['full_name'] : 'Anonymous';

    $_SESSION['comments'][$animeId][] = [
        'full_name' => $fullName, 
        'comment' => $comment
    ];
    
    header("Location: " . $_SERVER['PHP_SELF'] . "?anime_id=$animeId"); 
    exit;
}

// Handling comment deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_comment'], $_POST['delete_comment_key'], $_POST['anime_id'])) {
    $animeId = filter_input(INPUT_POST, 'anime_id', FILTER_SANITIZE_NUMBER_INT);
    $commentKey = filter_input(INPUT_POST, 'delete_comment_key', FILTER_SANITIZE_NUMBER_INT);
    
    if (isset($_SESSION['comments'][$animeId][$commentKey])) {
        unset($_SESSION['comments'][$animeId][$commentKey]);
    }
    
    header("Location: " . $_SERVER['PHP_SELF'] . "?anime_id=$animeId");
    exit;
}
?>
<style>
    .comments-container {
        margin-top: 20px;
        border-top: 1px solid #ccc;
        padding-top: 20px;
    }

    .comment {
        margin-bottom: 15px;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
        position: relative;
    }

    .comment strong {
        color: #333;
    }

    .delete-btn {
        background-color: #ff4d4d;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        cursor: pointer;
        position: absolute;
        top: 5px;
        right: 5px;
    }

    .comment-form {
        margin-top: 20px;
    }

    .comment-form textarea {
        width: 96%;
        padding: 10px;
        border: 2px solid #ccc; 
        border-radius: 5px;
        resize: vertical;
    }

    .comment-form button {
        background-color: #4caf50;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 3px;
        cursor: pointer;
    }
</style>

<div class="comments-container">
    <?php

    if (isset($_POST["anime_id"])) { 
        $anime_id = $_POST["anime_id"];
    }
    if (isset($_POST["user_id"])) { 
        $user_id = $_POST["user_id"];
    }

    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "assignment02"; 
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM comments WHERE anime_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $anime_id); 
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    $comment_strings = array();

    // Process results
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $comment) {
            if (isset($comment['comment'])) {

                $query = "SELECT full_name FROM users WHERE user_id = ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("i", $comment['user_id']); 
                $stmt->execute();
                $result = $stmt->get_result();
            
                if (!empty($result) && isset($result)) {
                        foreach ($result as $name) {
                        $user_name = $name['full_name'];
                    }   
                } else {
                    $user_name = 'Anonymous';
                }

                $name = array();
                $comment_strings[] = array (
                    'comment' => $comment['comment'],
                    'users_name' => $user_name,
                    'user_id' => $comment['user_id']
            );
            } else {
                $none = "No comments.";
            }
        }
    }

    


    foreach ($comment_strings as $comment) {
        echo "<div class='comment'>";
        echo "<strong>{$comment['users_name']}</strong>: {$comment['comment']}";
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['user_id'] === $comment['user_id']) {
                echo "<form action='commentDelete.php' method='post'>";
                echo "<input type='hidden' name='comment_id' value='{$comment['comment']}'>";
                echo "<input type='hidden' name='anime_id' value='{$_GET['anime_id']}'>";
                echo "<button type='submit' name='delete_comment' class='delete-btn'>Delete</button>";
                echo "</form>";
            }
        }

        echo "</div>";

    }

    ?>
</div>

<?php if (isset($_SESSION["user"])) : ?>
    <div class="comment-form">
        <form action="comment-inc.php" method="post">
            <textarea name="comment" placeholder="Leave a comment..." rows="6"></textarea> <!-- Adjust rows attribute for text area -->

            <input type="hidden" name="anime_id" value="<?php echo $_SESSION['anime_id'];?>">
            <button type="submit" name="submit_comment">Submit Comment</button>
        </form>
    </div>
<?php else : ?>
    <p>Please <a href="login.php">login</a> to leave a comment.</p>
<?php endif; ?>
