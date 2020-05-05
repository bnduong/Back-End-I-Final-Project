<?php include 'view/header-admin.php'; ?>
<main>
<h2>Add Quotes</h2>
<form action="quote-admin.php" method="post" id="add_quote_form">
<input type="hidden" name="action" value="add_quote">
<label>Author:</label>
<select name="authorId">
<?php foreach ($authors as $author) : ?>
<option value="<?php echo $author['authorId']; ?>">
<?php echo $author['authorName']; ?>
</option>
<?php endforeach; ?>
</select><br>
<label>Category:</label>
<select name="categoryId">
<?php foreach ($categories as $category) : ?>
<option value="<?php echo $category['categoryId']; ?>">
<?php echo $category['categoryName']; ?>
</option>
<?php endforeach; ?>
</select><br>
<label for="quote">Quote ID:</label>
<input type="text" name="quote" min="1920" max="2100" maxlength="4" pattern="[0-9]{1,5}" required><br>
<label for="quote_Text">Quote_Text:</label>
<input type="text" name="quote_Text" maxlength="50" required><br>
<label for="author">Author:</label>
<input type="text" name="author" maxlength="50" required><br>
<label for="category">Category:</label>
<input type="number" name="category" required><br>
<label id="blankLabel">&nbsp;</label>
<input type="submit" value="Add Quote"><br>
</form>
<section class="quotelinks">
<p><a href="quote-admin.php">Back to Admin Quote List</a></p>
<p><a href="quote-admin.php?action=list_author">View/Edit Quote Authors</a></p>
<p><a href="quote-admin.php?action=list_classes">View/Edit Quote Categories</a></p>
</section>
</main>
