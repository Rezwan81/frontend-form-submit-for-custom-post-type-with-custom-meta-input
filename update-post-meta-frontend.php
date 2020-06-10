/* I’m able to update post meta without ajax, with page reload using below code.
*  this code are correct
*/
<?php

global $post;
if( isset($_POST['submit_meta']) ) {
    if( ! empty($_POST['change_meta']) ) {
       update_post_meta($post->ID, 'shorturl', $_POST['change_meta']);
    }
    /*here we can add multiple input field for validation and update post meta, so now in dashboard fronrend custom meta will be show automatically  within custom post type meta box input field and now we can show this output on frontend by get_post_meta by id with pagination. And we can add data from frontend and dashboard both and we can display data in frontend and dashboard both */
}
echo $_POST[ 'change_meta' ];

?>

<form method="post" action="" id="shortform">
<input style="/*display:none;*/" id="shortUrlInfo2" type="text" name="change_meta" value="<?php echo get_post_meta( get_the_ID(), 'shorturl', true ); ?>">
<input id="btn_url" type="submit" name="submit_meta" value="Confirm" />
</form>

==================================================================================================
/*this is for only check our if condition is working or not*/
<?php

if ( isset( $_POST['submit'] ) )
{
    echo "We've gotten into the $_POST conditional!"
    exit;
}
?>

<form method="post" action="">
   <input type='text' name='doors' value='<?php echo $doors ?>' />
   <input type='submit' value='save' />
</form>

================================================================================================
/*Here is another example. So we can update the post meta. update_post_meta mean save in databasse and echo $doors mean data show on dashboard  CPT custom field meta or metabbox */
<?php
    global $post;

    if ( isset( $_POST['submit'] ) )
    {   
        if( ! isset( $post ) ) {
            echo 'Error: Post Object Not Set';
            die();
        }
        else if( ! isset( $_POST['doors'] ) && ! empty( $_POST['doors'] ) ){
            echo 'Error: Doors Not Set';
            die();
        }

        update_post_meta( $post->ID, 'doors', sanitize_text_field( $_POST['doors'] ) );
    }

    $doors = get_post_meta($post->ID, 'doors', true);

    echo $doors;
?>

    <form method="post" action="">
       <input type='text' name='doors' value='<?php echo isset($doors) ? $doors : ''; ?>' />
       <input type='submit' value='save' />
    </form>

==================================================================================================
/*This is the meta box working system, add meta, update/save meta, show meta. its like CRUD.*/

<?php

add_post_meta($post_id, $meta_key, $meta_value, $unique);
 
update_post_meta($post_id, $meta_key, $meta_value, $prev_value);



$meta_values = get_post_meta( $post_id, $key, $single );

echo $meta_values;
?>

<input type='text' name='doors' value='<?php echo isset($doors) ? $doors : ''; ?>' />


==================================================================================================

/*How to submit custom post type in wordpress from the frontend*/
/*its form action path page action="/movie.php" or it can be within form html form one page and if action will blank then it mean function.php or plugin main .php file*/
<?php

if( isset( $_POST['title'] ) ) {
	//echo $_POST['title']; // print title variable valus
	//create post object

	$my_post = array(
		    //before equel key is database field name and after equel key is form field name
			'post_type'    => 'movie',
			'post_title'   => $_POST['title'],
			'post_content' => $_POST['description'],
			'post_status'  => 'publish' //and more status like publish, draft, privet   
	    );

	//I'm use wordpress predefine function

	wp_insert_post( $my_post );

	die;  // stop script after form submit
}

?>

==================================================================================================
// its form page/template or within one page php file or it will be can within shortcoe to display form in any place
// its form.php page

<form method="post" action="/mypost.php" id="shortform">
	<input id="shortUrlInfo2" type="text" name="meta_one" value="<?php echo get_post_meta( get_the_ID(), 'shorturl', true ); ?>">
	<input type="text" class="form-control" id="title" name="title">
	<textarea class="form-control" name="description"></textarea>
	<input id="btn_url" type="submit" name="submit_meta" value="Confirm" />
</form>


// its form action url page mypost.php
<?php

if( isset($_POST['submit_meta']) ) {
    if( ! empty($_POST['meta_one']) ) {
       update_post_meta($post->ID, 'shorturl', $_POST['meta_one']);
    }
    // here we can add more if if condition for validate and update post meta
    if( isset( $_POST['title'] ) ) {
	//echo $_POST['title']; // print title variable valus
	//create post object
    	$my_post = array(
		    //before equel key is database field name and after equel key is form field name
			'post_type'    => 'movie',
			'post_title'   => $_POST['title'],
			'post_content' => $_POST['description'],
			'meta_one'     => $_POST['meta_one'] ,
			'post_status'  => 'publish' //and more status like publish, draft, privet  
	    );
	    //I'm use wordpress predefine function

	     wp_insert_post( $my_post );

	     die;  // stop script after form submit
	}     
}
// echo $_POST[ 'meta_one' ];

?>

=============================================================================================