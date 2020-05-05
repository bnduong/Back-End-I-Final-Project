<?php
require('model/database.php');
require('model/quote_db.php');
require('model/author_db.php');
require('model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
$action = 'list_quotes';
}
} else {
$action = 'list_quotes';
}
if ($action == 'list_quotes') {
$authorId = filter_input(INPUT_GET, 'authorId', FILTER_VALIDATE_INT);
$categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_VALIDATE_INT);
$quoteId = filter_input(INPUT_GET, 'quoteId', FILTER_VALIDATE_INT);
$quote_Text = filter_input(INPUT_GET, 'quote_Text', FILTER_VALIDATE_INT);
$sort = filter_input(INPUT_GET, 'sort');
$sort = ($sort == "author") ? "author" : "category";
$category_Name = get_category_name($categoryId);
$author_Name = get_author_name($authorId);

$quotes = get_all_quotes($sort);
if ($authorId != NULL && $authorId != FALSE) {
$quotes = array_filter($quotes, function($array) use ($author_Name) {
return $array["authorName"] == $author_Name;
});
}
if (categoryId != NULL && $categoryId != FALSE) {
$quotes = array_filter($quotes, function($array) use ($category_Name) {
return $array["categoryName"] == $category_Name;
});
}
$authors = get_authors();
$categories = get_categories();
include('view/header.php');
include('quote-admin.php');
include('quote_list.php');
include('view/footer.php');
}
?> 

   
