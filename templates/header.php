<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/assets/css/my.css" rel="stylesheet" type="text/css"media="all">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Shop</title>
</head>
<header>
    <?php
       $error = splashMessage();
    ?>

    <div class="<?=$error['class']?>" role="alert">
    <p align="center"><?=$error['data'];?></p>
    </div>
</header>