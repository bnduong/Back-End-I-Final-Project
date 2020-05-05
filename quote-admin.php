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
}

if ($action == 'list_quotes') {
$authorId = filter_input(INPUT_GET, 'authorId', FILTER_VALIDATE_INT);
$categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_VALIDATE_INT);
$sort = filter_input(INPUT_GET, 'sort');

$sort = ($sort == "author") ? "author" : "author";

$category_Name = get_category_name($categoryId);
$author_Name = get_author_name($authorId);

$quotes = get_all_quotes($sort);
if ($authorId != NULL && $authorId != FALSE) {
$quotes = array_filter($quotes, function($array) use ($author_Name) {
return $array["authorName"] == $author_Name;
});
} 
if ($categoryId != NULL && $categoryId != FALSE) {
$quotes = array_filter($quotes, function($array) use ($category_Name) {
return $array["categoryName"] == $category_Name;
});
}
$authors = get_authors();
$categories = get_categories();
include('famous_quote_list.php');
include('view/footer.php');
} else if ($action == 'list_author') {
$authors = get_authors();
include('author_list.php');
include('view/footer.php');
} else if ($action == 'list_category') {
$categories = get_categories();
include('category_list.php');
include('view/footer.php');
} else if ($action == 'delete_quotes') {
$quoteId = filter_input(INPUT_POST, 'quoteId', FILTER_VALIDATE_INT);
if ($quoteId == NULL || $quoteId == FALSE) {
$error = "Missing or incorrect quote id.";
include('errors/error.php');
} else {
delete_quote($quoteId);
header("Location: quote-admin.php"); 
}
} else if ($action == 'delete_author') {
$authorId = filter_input(INPUT_POST, 'authorId', FILTER_VALIDATE_INT);
if ($authorId == NULL || $authorId == FALSE) {
$error = "Missing or incorrect author id.";
include('errors/error.php');
} else {
delete_author($authorId);
header("Location: quote-admin.php?action=list_authors");
}
} else if ($action == 'delete_category') {
$categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_VALIDATE_INT);
if ($categoryId == NULL || $categoryId == FALSE) {
$error = "Missing or incorrect category id.";
include('errors/error.php');
} else {
delete_category($categoryId);
header("Location: quote-admin.php?action=list_categories");
} else if ($action == 'show_add_form') {
$categories = get_categories();
$authors = get_authors();
include('quote-api.php');
include('add_quote_form.php');
include('view/footer.php');
} else if ($action == 'add_quote') {
$authorId = filter_input(INPUT_POST, 'authorId', FILTER_VALIDATE_INT);
$categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_VALIDATE_INT);
$quoteId = filter_input(INPUT_POST, 'quoteId', FILTER_VALIDATE_INT);
$quote_Text = filter_input(INPUT_POST, 'quote_Text', FILTER_VALIDATE_INT);
if ($authorId == NULL || $authorId == FALSE || $categoryId == NULL || $categoryId == FALSE || $quoteId == NULL || $quote_Text == NULL) {
$error = "Invalid quote data. Check all fields and try again.";
include('errors/error.php');
} else {
add_quote($authorId, $categoryId, $quoteId, $quote_Text);
header("Location: quote-admin.php");
}
} else if ($action == 'add_author') {
$author_Name = filter_input(INPUT_POST, 'author_Name');
add_author($author_Name);
header("Location: quote-admin.php?action=list_authors");
} else if ($action == 'add_category') {
$category_Name = filter_input(INPUT_POST, 'category_Name');
add_category($category_Name);
header("Location: quote-admin.php?action=list_categories");
}
?> 

   