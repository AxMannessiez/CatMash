<?php

// Functions to help with the paging computing and display

/**
 * Check if the given parameter for the page is possible, if not put 1 default
 * @param string $asked_page
 * @param int $max_page
 * @return int
 */
function GetRealPage (string $asked_page, int $max_page) : int {
	// If it's a positive number
	if (is_numeric ($asked_page) && intval($asked_page)>0) {
		if ($asked_page <= $max_page){
			return intval($asked_page);
		} 
		else {
			return 1;
		}
	}
	else {
		return 1;
	}
} 

/**
 * Display the navigation bar
 * @param string $page_link  
 * @param int $actual_page
 * @param int $max_page
 */
function DiplayNavBar (string $page_link, int $actual_page, int $max_page) {
	
	// Creation of the list containing the pages
	$pages_list = array();
	// If there is less than 5 pages it displays all of them
	if ($max_page<=5) {
		for ($i=1; $i <= $max_page ; $i++) { 
			$pages_list[]=$i;
		}
	}
	// If we are in the first 3 pages
	else if ($actual_page<=3) {
		for ($i=1; $i <=5 ; $i++) { 
			$pages_list[]=$i;
		}
	}
	// If we are in the last 3 pages
	else if ($actual_page>$max_page-3) {
		for ($i=$max_page-4; $i <= $max_page ; $i++) { 
			$pages_list[]=$i;
		}
	}
	// Else we add 2 pages before and 2 after
	else {
		for ($i=$actual_page-2; $i <= $actual_page+2 ; $i++) { 
			$pages_list[]=$i;
		}
	}

	// Display
	if ($actual_page == 1) {
		echo '<a class="desac">&#60; Précédent</a>';
	}
	else {
		echo '<a href="'.$page_link.'-p'.($actual_page-1).'">&#60; Précédent</a>';
	}
	
	foreach ($pages_list as $page) {
		if ($page == $actual_page) {
			echo '<a class="active">'.$page.'</a>';
		}
		else {
			echo '<a href="'.$page_link.'-p'.($page).'">'.$page.'</a>';
		}   
	}

	if ($actual_page == $max_page) {
		echo '<a class="desac">Suivant &#62;</a>';
	}
	else {
		echo '<a href="'.$page_link.'-p'.($actual_page+1).'">Suivant &#62;</a>';
	}
	
}