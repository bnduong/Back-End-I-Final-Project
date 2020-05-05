<?php 
function get_categories() {
global $db;
$query = 'SELECT * FROM categories ORDER BY categoryId';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
return $categories;
}

function get_category_name($categoryId) {
if ($categoryId == NULL || $categoryId == FALSE) {
return NULL;
}
global $db;
$query = 'SELECT * FROM categories WHERE categoryId = :categoryId';
$statement = $db->prepare($query);
$statement->bindValue(':categotyId', $categoryId);
$statement->execute();
$category = $statement->fetch();
$statement->closeCursor();
$category_Name = $category['category_Name'];
return $category_Name;
}

function delete_category($categoryId) {
global $db;
$query = 'DELETE FROM categories WHERE categoryId = :categoryId';
$statement = $db->prepare($query);
$statement->bindValue(':categoryId', '$categoryId');
$statement->execute();
$statement->closeCursor();
}

function add_category($categoryId) {
global $db;
$query = 'INSERT INTO categories (categoryName)
VALUES
(:categoryName)';
$statement = $db->prepare($query);
$statement->bindValue(':categoryName', $categoryName);
$statement->execute();
$statement->closeCursor();
}
?>