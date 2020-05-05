<?php 
function get_authors() {
global $db;
$query = 'SELECT * FROM authors ORDER BY authorId';
$statement = $db->prepare($query);
$statement->execute();
$authors = $statement->fetchAll();
$statement->closeCursor();
return $authors;
}

function get_author_name($authorId) {
if ($authorId == NULL || $authorId == FALSE) {
return NULL;
}
global $db;
$query = 'SELECT * FROM authors WHERE authorId = :authorId';
$statement = $db->prepare($query);
$statement->bindValue(':authorId', $authorId);
$statement->execute();
$authors = $statement->fetch();
$statement->closeCursor();
$author_Name = $author['authorName'];
return $author_Name;
}

function delete_author($authorId) {
global $db;
$query = 'DELETE FROM authors WHERE authorId = :authorId';
$statement = $db->prepare($query);
$statement->bindValue(':authorId', $authorId);
$statement->execute();
$statement->closeCursor();
}

function add_author($author_Name) {
global $db;
$query = 'INSERT INTO authors (authorName)
VALUES
(:authorName)';
$statement = $db->prepare($query);
$statement->bindValue(':authorName', $author_Name);
$statement->execute();
$statement->closeCursor();
}
?>