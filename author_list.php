<?php include 'view/header-admin.php'; ?>
<main>
<h2>Quote Author List</h2>
<section>
<?php if ( sizeof($authors) != 0) { ?>
<table>
<tr>
<th colspan="2">Name</th>
</tr>        
<?php foreach ($authors as $author) : ?>
<tr>
<td><?php echo $author['authorName']; ?></td>
<td>
<form action="quote-admin.php" method="post">
<input type="hidden" name="action" value="delete_author">
<input type="hidden" name="authorId"
value="<?php echo $author['authorId']; ?>"/>
<input type="submit" value="Remove" />
</form>
</td>
</tr>
<?php endforeach; ?>    
</table>
<?php } else { ?>
<p>
There are no authors in your database.
</p>
<?php } ?>
</section>
<section>
<h2>Add Author</h2>
<form action="quote-admin.php" method="post" id="add_author_form">
<input type="hidden" name="action" value="add_author">
<label>Name:</label>
<input type="text" name="author_Name" max="20" required><br>
<label id="blankLabel">&nbsp;</label>
<input id="add_author_button" type="submit" value="Add Author"><br>
</form>
</section>
<section class="quotelinks">
<p><a href="quote-admin.php">Back to Admin Quote List</a></p>
<p><a href="quote-admin.php?action=show_add_form">Add a quote to Database</a></p>
<p><a href="quote-admin.php?action=list_category">View/Edit Category</a></p>
</section>
</main>