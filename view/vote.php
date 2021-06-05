<!DOCTYPE html>

<html>

    <head>
        <title>CatMash - Vote</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="view/style/common.css" />
        <link rel="stylesheet" href="view/style/vote.css" />
        <link rel="apple-touch-icon" sizes="180x180" href="view/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="view/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="view/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="view/img/favicon/site.webmanifest">
    </head>

    <body>

    	<header>
    		<a href="/">
    			<img src="view/img/CatMash.svg" alt="CatMash logo" id="CatMash_logo"/>
    			<h1>Cat Mash</h1>
    		</a>
            <h2>Quel est le chat le plus mignon ?</h2>
    	</header>

    	<div id="main-div">
    		<form action="index.php" method="post" id="cats_forms">
				<div class="first cat">
					<label>
						<input id="first_cat_button" type="radio" name="chosen_cat" value=1>
						<?php echo('<img src="'.$first_cat_url.'" />');?>
					</label>
					<?php echo('<input type="hidden" name="first_cat_id" value='.$first_cat_id.'>'); ?>
				</div>

				<div class="second cat">
					<label>
						<input id="second_cat_button" type="radio" name="chosen_cat" value=2>
						<?php echo('<img src="'.$second_cat_url.'" />');?>
					</label>
					<?php echo('<input type="hidden" name="second_cat_id" value='.$second_cat_id.'>'); ?>
				</div>
			</form>
    	</div>

    	<footer>
    		<a href="ranking" id="bottom-tab">
    			<h3>Voir les plus beaux chats</h3>
    			<?php echo('<p>'.$number_of_votes.' votes.</p>');?>
    		</a>
    	</footer>

    	<script>
    		var form = document.getElementById("cats_forms");
    		var first_cat_button = document.getElementById("first_cat_button");
    		var second_cat_button = document.getElementById("second_cat_button");

    		first_cat_button.onclick = function() {
    			form.submit();
    		}
    		second_cat_button.onclick = function() {
    			form.submit();
    		}
    	</script>

    </body>


</html>