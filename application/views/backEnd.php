<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>
	<div>
		<a href='<?php echo site_url('BackEnd/user')?>'>Users</a> |
		<a href='<?php echo site_url('BackEnd/questionCategory')?>'>Question Category</a> |
		<a href='<?php echo site_url('BackEnd/questions')?>'>Questions</a> |
		<a href='<?php echo site_url('BackEnd/sickness')?>'>Sickness</a> |
		<a href='<?php echo site_url('BackEnd/comment')?>'>Comments</a> |
		<a href='<?php echo site_url('BackEnd/disclaimer')?>'>Disclaimers</a> |
		<a href='<?php echo site_url('BackEnd/homePage')?>'>Home Page </a> |
	<a href='<?php echo site_url('BackEnd/dosageUnit')?>'>Dosage Units </a> |
  	<a href='<?php echo site_url('BackEnd/duration')?>'>Duration </a> |
  	<a href='<?php echo site_url('BackEnd/remedy')?>'>Remedy </a> |
    <a href='<?php echo site_url('BackEnd/availability')?>'>Availability </a> |
    	<a href='<?php echo site_url('BackEnd/reliefType')?>'>Relief Type </a> |
				<a href='<?php echo site_url('BackEnd/testimony')?>'>Testimonies </a> |
        	<a href='<?php echo site_url('BackEnd/article')?>'>Article </a> |
          <a href='<?php echo site_url('BackEnd/articleSuccess')?>'>Article Success</a> |
					<a href='<?php echo site_url('BackEnd/metaTags')?>'>Meta Tags</a> |
          <a href='<?php echo site_url('BackEnd/editor')?>'>Editors</a>
	</div>
	<div style='height:20px;'></div>
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
