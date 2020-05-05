<?php 
function get_all_quotes($sort) {
global $db;
if ($sort == 'author'){
$orderby = 'V.author';
} else {
$orderby = 'V.category';
}
$query = 'SELECT Q.quoteId, Q.quote_Text, A.author_Name, C. category_Name 
FROM quotes Q 
LEFT JOIN authors A ON Q.authorId = A.authorId 
LEFT JOIN categories C ON Q. categories = C. categoryId  
ORDER BY ' . $orderby . ' DESC';
$statement = $db->prepare($query);
$statement->execute();
$quotes = $statement->fetchAll();
$statement->closeCursor();
return $quotes;
}

function get_quotes($quoteId) {
global $db;
$query = 'SELECT * FROM quotes WHERE quoteId = :quoteId';
$statement = $db->prepare($query);
$statement->bindValue(':quoteId', $quoteId);
$statement->execute();
$vehicle = $statement->fetch();
$statement->closeCursor();
return $quotes;
}

function delete_quote($quoteId) {
global $db;
$query = 'DELETE FROM quotes WHERE quoteId = :quoteId';
$statement = $db->prepare($query);
$statement->bindValue(':quoteId', $quoteId);
$statement->execute();
$statement->closeCursor();
}

function add_quote($authorId, $categoryId) {
global $db;
$query = 'INSERT INTO quotes ($quoteId, $quote_Text, $authorId, $categoryId)
VALUES
(:quoteId, :quote_Text, :authorId, :categoryId)';
$statement = $db->prepare($query);
$statement->bindValue(':quoteId', $quoteId);
$statement->bindValue(':quote_Text', $quote_Text);
$statement->bindValue(':authorId', $authorId);
$statement->bindValue(':categoryId', $categoryId);
$statement->execute();
$statement->closeCursor();
}
?>