<main>
<nav>
<form action="." method="get" id="make_selection">
<section id="dropmenus">
<?php if ( sizeof($authors) != 0) { ?>
<label>Authors:</label>
<select name="authorId">
<option value="0">View All Authors</option>
<?php foreach ($authors as $author) : ?>
<option value="<?php echo $author['authorId']; ?>" <?php echo ($author_Name == $author['authorName'] ? "selected" : false)?>>
<?php echo $author['authorName']; ?>
</option>
<?php endforeach; ?>
</select> 
<?php } ?>
<?php if ( sizeof($categories) != 0) { ?>
<label>Caterories:</label>
<select name="categoryId">
<option value="0">View All Categories</option>
<?php foreach ($categories as $category) : ?>
<option value="<?php echo $category['categoryId']; ?>" <?php echo ($category_Name == $category['categoryName'] ? "selected" : false)?>>
<?php echo $category['categoryName']; ?>
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
<input id="resetQuoteForm" type="reset">
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
<th>Author</th>
<th>Category</th>
</tr>
</thead>
<tbody>
<?php foreach ($quotes as $quote) : ?>
<tr>
<td><?php echo $quotes['Author']; ?></td>
<td><?php echo $quotes['Category']; ?></td>
<?php if ($quotes['authorName'] == null || $quotes['authorName'] == false) { ?>
<td>None</td>
<?php } else { ?>
<td><?php echo $quotes['authorName']; ?></td>
<?php } ?>
<?php if ($quotes['categoryName'] == null || $quotes['categoryName'] == false) { ?>
<td>None</td>
<?php } else { ?>
<td><?php echo $quotes['categoryName']; ?></td>
<?php } ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>  
<?php } else { ?>
<p>
There are no matching quotes in Quote Database. 
</p>     
<?php } ?>
</section>
</main>
<script defer src="view/js/main.js" type="text/javascript"></script>