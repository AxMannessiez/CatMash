<!DOCTYPE html>

<html>

    <head>
        <title>CatMash - Vote</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="view/style/common.css" />
        <link rel="stylesheet" href="view/style/vote.css" />
    </head>

    <body>

    	<header>
    		<a href="index.php">
    			<img src="view/img/CatMash.svg" alt="CatMash logo" id="CatMash_logo"/>
    			<h1>Cat Mash</h1>
    		</a>
    	</header>

    	<div id="main-div">
			<div class="first cat">
				<?php echo('<img src="'.$first_cat_url.'" />');?>
			</div>

			<div class="second cat">
				<?php echo('<img src="'.$second_cat_url.'" />');?>
			</div>
    	</div>

    	<footer>
    		<a href="index.php" id="bottom-tab">
    			<h3>Voir les plus beaux chats</h3>
    			<?php echo('<p>'.$number_of_votes.' votes.</p>');?>
    		</a>
    	</footer>

    </body>


</html>