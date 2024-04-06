<!DOCTYPE html>
<html>
<head >
    <meta charset="utf-8">
    <title>Saved</title>    
    <link rel="stylesheet" href="css/styles1.css"/>
</head>
<body>
    <?php 
    include 'headerM.php'; 
    ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $genre = $_POST["genre"];
    $subject = $_POST["subject"];
    $star = $_POST["Star"];
    $year = $_POST["year"];
    $production = $_POST["Production"];
    
    $data = "Title: $title\nDescription: $description\nGenre: $genre\nSubject: 
        $subject\nStar: $star\nYear: $year\nProduction: $production\n\n";
    
    file_put_contents("data.txt", $data, FILE_APPEND | LOCK_EX);
    
    echo "<h2>Movie Information Saved</h2>";
    echo "<p>Title: $title</p>";
    echo "<p>Description: $description</p>";
    echo "<p>Genre: $genre</p>";
    echo "<p>Subject: $subject</p>";
    echo "<p>Star: $star</p>";
    echo "<p>Year: $year</p>";
    echo "<p>Production: $production</p>";
}
?>
<?php 
include 'footerM.php'; 
?>
</body>
</html>