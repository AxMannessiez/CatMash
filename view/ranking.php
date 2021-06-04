<!DOCTYPE html>

<html>

    <head>
        <title>CatMash - Ranking</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="view/style/common.css" />
        <link rel="stylesheet" href="view/style/ranking.css" />
    </head>

    <body>

    	<header>
    		<a href="index.php">
    			<img src="view/img/CatMash.svg" alt="CatMash logo" id="CatMash_logo"/>
    			<h1>Cat Mash</h1>
    		</a>
    	</header>

    	<div id="main-div">

            <h2>Classement</h2>

            <div id="cats-div">
                <?php
                for ($i=0; $i < count($top); $i++) { 
                    $url = $top[$i]['url'];
                    echo('<div class="cat">');
                    echo('<a href="'.$url.'"><img src="'.$url.'" /></a>');
                    echo('<p>'.(int)($start_index+$i).'</p>');
                    echo('</div>');
                }
                ?>
            </div>

            <?php
                if ($max_page > 1) {
                    echo ('<div id="pages-nav">');
                        DiplayNavBar ('ranking', $page, $max_page);
                    echo('</div>');
                }
            ?>

    	</div>

    	<footer>
    		<a href="index" id="bottom-tab">
    			<h3>Voter pour le plus beau chat</h3>
    			<?php echo('<p>Il y a '.$cat_number.' chats à départager.</p>');?>
    		</a>
    	</footer>

    </body>


</html>