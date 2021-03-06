<?php
include_once('database.php');

$isAddition = filter_input(INPUT_POST, "isAddition");
$bookTitle = filter_input(INPUT_POST, "TitleTextField");
$bookAuthor = filter_input(INPUT_POST, "AuthorTextField");
$bookPrice = filter_input(INPUT_POST, "PriceTextField");
$bookGenre = filter_input(INPUT_POST, "GenreTextField");

// check if user is Adding a New Book
if($isAddition == "1") {
    {
        $query = "INSERT INTO books (Name, Price) VALUES (:book_name, :book_price)";
        $statement = $db->prepare($query); // encapsulate the sql statement
    }

/*//////////////////////*/
/* FIX THIS MYSQL QUERY */
/*//////////////////////*/

$query = "";
$statement = $db->prepare($query); // encapsulate the sql statement
}
// else if user is Updating an Existing Book
else {
$bookID = filter_input(INPUT_POST, "IDTextField");
    $query = "UPDATE books SET Name = :book_name, Price = :book_price WHERE Id = :book_id "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':book_id', $bookID);
/*//////////////////////*/
/* FIX THIS MYSQL QUERY */
/*//////////////////////*/



}

$statement->bindValue(':book_title', $bookTitle);
$statement->bindValue(':book_author', $bookAuthor);
$statement->bindValue(':book_price', $bookPrice);
$statement->bindValue(':book_genre', $bookGenre);
$statement->execute(); // run on the db server
$statement->closeCursor(); // close the connection

// redirect to index page
header('Location: index.php');
?>
