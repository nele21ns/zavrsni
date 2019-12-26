<?php
    // ako su mysql username/password i ime baze na vasim racunarima drugaciji
    // obavezno ih ovde zamenite
    // moguce da je password "vivify"
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>

<?php

 if (isset($_POST['submit'])) {
     $author = $_POST['name'];
     $text = $_POST['comment'];
     echo $author;
     echo $text;

     
    // Attempt insert query execution
try{
    // Create prepared statement
    $sql = "INSERT INTO comments (auhor, text) VALUES (:author, :text)";
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':author', $_POST['author']);
    $stmt->bindParam(':text', $_POST['text']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "Records inserted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);

echo "submit je setovan";

 } else {

    header('Location: home.php');
 };


?>





<!DOCTYPE html>

<head>
<title> create-comment</title>
</head>
<body>
<p>ja sam create-comment.php</p>




</body>
</html>