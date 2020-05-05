<?php include 'view/header-admin.php'; ?>
<main>
<nav>
<form action="quote-admin.php" method="get" id="make_selection">
<section id="dropmenus">
<?php if ( sizeof($authors) != 0) { ?>
<label>Authors:</label>
<select name="authorId">
<option value="0">View All Authors</option>
<?php foreach ($authors as $author) : ?>
<option value="<?php echo $author['authorId']; ?>" <?php echo ($author_Name == $author['authorName'] ? "selected" : false)?>>
<?php echo $author['author_Name']; ?>
</option>
<?php endforeach; ?>
</select> 
<?php } ?>

<?php if ( sizeof($categories) != 0) { ?>
<label>Category:</label>
<select name="categoryId">
<option value="0">View All Authors</option>
<?php foreach ($categories as $category) : ?>
<option value="<?php echo $category['categoryId']; ?>" <?php echo ($category_Name == $category['category_Name'] ? "selected" : false)?>>
<?php echo $category['category_Name']; ?>
</option>
<?php endforeach; ?>
</select> 
<?php } ?>
</section>
<section id="sortBy">
<div>
<span>Sort by: </span>
<input type="radio" id="sortByAuthor" name="sort" value="author" <?php echo ($sort == "author" ? "checked" : false)?>>
<label for="sortByAuthor">Author</label> 
<input type="radio" id="sortByCategory" name="sort" value="category" <?php echo ($sort == "category" ? "checked" : false)?>>
<label for="sortByCategory">Category</label>
<input type="submit" value="Search">
<input id="resetQuoteListForm" type="reset">
</div>
</section>
</form>
</nav>
<section>
<?php if( sizeof($quotes) != 0 ) { ?>
<div id="table-overflow">
<table>
<thead>
<tr>
<th>Quote</th>
<th>Author</th>
<th>Category</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<?php foreach ($quotes as $quote) : ?>
<tr>
<td><?php echo $quote['author']; ?></td>
<td><?php echo $quote['category']; ?></td>
<?php if ($quote['author_Name'] == null || $quote['author_Name'] == false) { ?>
<td>None</td>
<?php } else { ?>
<td><?php echo $quote['author_Name']; ?></td>
<?php } ?>
<?php if ($quote['category_Name'] == null || $quote['category_Name'] == false) { ?>
<td>None</td>
<?php } else { ?>
<td><?php echo $quote['category_Name']; ?></td>
<?php } ?>
<td>
<form action="quote-admin.php" method="post">
<input type="hidden" name="action" value="delete_quote">
<input type="hidden" name="quoteId"
value="<?php echo $quote['quoteId']; ?>">
<input type="submit" value="Remove">
</form>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>  
<?php } else { ?>
<p>
There are no matching quotes in your database.
</p>     
<?php } ?>
</section>
<?php include 'view/quote-links.php'; ?>
</main>
<script defer src="view/js/main.js" type="text/javascript"></script>