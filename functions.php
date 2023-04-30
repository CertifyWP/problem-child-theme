<?php
function certifywp_test_action() {
	$content = '<p style="background-color: lightgrey; text-align: center;">CertifyWP Problem Child is working!</p>';
	return $content;
}
add_action( 'wp_footer', 'certifywp_test_action' );

function certifywp_pig_latin_content_filter( string $content ) {
	if ( ! is_single() ) {
		return $content;
	}
    // Split the content into words
    $words = explode( ' ', $content );

    // Define an array of vowels
    $vowels = array( 'a', 'e', 'i', 'o', 'u' );

    // Loop through each word and convert to Pig Latin
    foreach ( $words as $key => $word ) {
        // Check if the word starts with a vowel
        if ( in_array( strtolower( $word[0] ), $vowels ) ) {
            // Add 'way' to the end of the word
            $words[$key] = $word . 'way';
        } else {
            // Move the first letter to the end and add 'ay'
            $words[$key] = substr( $word, 1 ) . $word[0] . 'ay';
        }
    }

    // Convert the array of words back into a string
    $pig_latin_content = implode( ' ', $words );

    // Return the transformed content
    return $pig_latin_content;
}

/**
 * Filters the post content and formats it as a grid.
 *
 * The purpose of the grid_content_filter() function is to format the
 * post content as a grid. The function accomplishes this by removing
 * any HTML tags from the content, splitting it into individual characters,
 * and adding each character to a 2D array in a grid pattern. The resulting
 * grid is then converted back into a string and returned as the filtered
 * content.
 *
 * @param string $content The content of the post.
 * @return string The formatted content as a grid.
 */
function certifywp_grid_content_filter( string $content ) {
    /**
     * Remove any HTML tags from the content
     * I used the strip_tags() function in the grid_content_filter()
     * function to remove any HTML tags from the input $content string. The
     * reason for doing this is that the function is designed to work with
     * plain text content, and adding HTML tags to the content could
     * interfere with the grid pattern created by the function.
     *
     * If the input $content string contains HTML tags, such as <p> or <a>,
     * the str_split() function used later in the function would split the
     * tags into individual characters, resulting in an incorrect grid
     * pattern. Additionally, if the content is displayed on a web page, the
     * presence of HTML tags could interfere with the page layout and styling.
     *
     * By using strip_tags() to remove any HTML tags from the input $content
     * string, the function ensures that it works correctly with plain text
     * content, and avoids any potential issues caused by HTML tags.
     */
    $content = trim( strip_tags( $content ) );

    // Bail out if we have no content at this point
    if ( empty( $content ) ) {
    	return $content;
    }

    // Split the content into individual characters
    $chars = str_split( $content );

    // Remove extraneous whitespace, this also gets rid of linebreaks which throw off the formatting
    $chars = array_map( 'trim', $chars );

    // Define the number of rows and columns in the grid
    $rows = $cols = ceil( sqrt( count( $chars ) ) );

    // Create an empty 2D array to hold the grid
    $grid = array_fill( 0, $rows, array_fill( 0, $cols, '' ) );

    // Define the starting row and column
    $row = $col = 0;

    // Loop through each character and add it to the grid in a grid pattern
    foreach ( $chars as $char ) {
    	// Don't start with an empty space
    	if ( empty( $char ) && 0 === $col ) {
    		continue;
    	}

        $grid[$row][$col] = $char;
        $col++;
        if ( $col >= $cols ) {
        	$row++
        	$col = 0;
        }
    }

    // Convert the 2D array into a string and return it
    $grid_content = '';
    for ( $i = 0; $i < $rows; $i++ ) {
        for ( $j = 0; $j < $cols; $j++ ) {
            $grid_content .= $grid[$i][$j] . ' ';
        }
        // Add a newline character after each row
        $grid_content .= PHP_EOL;
    }
    return '<pre>' . $grid_content . '</pre>';
}
add_filter( 'the_content', 'certifywp_grid_content_filter' );
