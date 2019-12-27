<?php require('dbcon.php'); ?>

<?php
// Checking if everything is submited
 if (isset($_POST['name']) && isset($_POST['comment']) && isset($_POST['post-id'])) {
     //VALIDATION for CREATING COMMENT
     if (!empty($_POST['comment']) && !empty($_POST['name'])) {
         $date = date('Y-m-d H:i:s');
try{
    // Create prepared statement
    $sql = "INSERT INTO comments (author, text, post_id, created_at) VALUES (:author, :text, :post_id, :created_at)";

    $stmt = $connection->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':author', $_POST['name']);
    $stmt->bindParam(':text', $_POST['comment']);
    $stmt->bindParam(':post_id', $_POST['post-id']);
    $stmt->bindParam(':created_at', $date);
    
    // Execute the prepared statement
    $stmt->execute();

    
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
} //Returning on single-post.php if everything is fine with valid =  true

    header('Location: single-post.php?posts_id=' . $_POST['post-id'] . '&is_valid=true');

} else {  // vracanje sa valid false ako nije zadovoljena validacija

    header('Location: single-post.php?posts_id=' . $_POST['post-id'] . '&is_valid=false');

}}
?>