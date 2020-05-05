<?php
if ($_SERVER["REQUEST_METHOD"] == "GET"){

    $quoteId = trim(filter_input(INPUT_GET, 'quoteId'));
    $quote_Text = trim(filter_input(INPUT_GET, 'quote_Text'));
    $authorId = trim(filter_input(INPUT_GET, 'authorId'));
    $categoryId = trim(filter_input(INPUT_GET, 'categoryId'));

    $data = array("quoteId"=>$quoteId, "quote_Text"=>$quote_Text, "authorId"=>$authorId, "categoryId"=>$categoryId)
    header('Content-Type: application/json');
    echo json_encode($data);

} else if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (!isset($_SERVER["CONTENT_TYPE"])){
    $data = array("message"=>"Required: Content-Type header");
    header('Content-Type: application/json');
    echo json_encode($data);

} else if ($_SERVER["CONTENT_TYPE"] == "application/json"){
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    header('Content-Type: application/json');
    echo json_encode($data);

} else {
    $quoteId = trim(filter_input(INPUT_POST, 'quoteId'));
    $quote_Text = trim(filter_input(INPUT_POST, 'quote_Text'));
    $authorId = trim(filter_input(INPUT_POST, 'authorId'));
    $categoryId = trim(filter_input(INPUT_POST, 'categoryId'));

    $data = array("quoteId"=>$quoteId, "quote_Text"=>$quote_Text, "authorId"=>$authorId, "categoryId"=>$categoryId)
    header('Content-Type: application/json');
    echo json_encode($data);
  
} else {
    $data = array("message"=>"You did not send a GET or POST request");
    header('Content-Type: application/json');
    echo json_encode($data);

}