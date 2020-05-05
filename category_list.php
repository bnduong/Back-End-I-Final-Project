<?php include 'view/header-admin.php'; ?>
<main>
<h2>Quote Category List</h2>
<section>
<?php if ( sizeof($categories) != 0) { ?>
<table>
<tr>
<th colspan="2">Name</th>
</tr>        
<?php foreach ($categories as $category) : ?>
<tr>
<td><?php echo $category['categoryName']; ?></td>
<td>
<form action="quote-admin.php" method="post">
<input type="hidden" name="action" value="delete_category">
<input type="hidden" name="category"
value="<?php echo $category['categoryId']; ?>"/>
<input type="submit" value="Remove" />
</form>
</td>
</tr>
<?php endforeach; ?>    
</table>
<?php } else { ?>
<p>
There are no quote categories in your database.
</p>
<?php } ?>
</section>
<section>
<h2>Add Quote Category</h2>
<form action="quote-admin.php" method="post" id="add_category_form">
<input type="hidden" name="action" value="add_category">
<label>Name:</label>
<input type="text" name="category_Name" max="20" required><br>
<label id="blankLabel">&nbsp;</label>
<input id="add_category_button" type="submit" value="Add Category"><br>
</form>
</section>
<section class="quotelinks">
<p><a href="quote-admin.php">Back to Admin Quote List</a></p>
<p><a href="quote-admin.php?action=show_add_form">Add a quote to Database</a></p>
<p><a href="quote-admin.php?action=list_author">View/Edit Author List</a></p>
</section>
</main>
