<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
<form action="#"  enctype="multipart/form-data" method="POST">	
<input type="file" min="1" max="9999" name="file[]" multiple="true" /> <!--будет передан массив файлов -->
<input type="submit" name="load_files" value="Go" />
</form>
<?php print_r($file_data); ?>
</body>
</html>