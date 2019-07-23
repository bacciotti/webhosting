<?php
  // Register the call to the functions
  add_action('publish_post', 'run_when_post_published');
  add_action('new_to_publish', 'run_when_post_published');
  add_action('draft_to_publish', 'run_when_post_published');
  add_action('pending_to_publish', 'run_when_post_published');
  
  // Function to run when a post is published
  function run_when_post_published() {
      global $post;
      
      // Set your OLD category ID
      $cat_id = 135 // For example
      
      // Set your NEW category ID
      $new_cat_id = 28 // For example
      
      // Get the count of posts on that category
      $category = get_category( $cat_id );
      $count = $category->category_count;

      // This is a business rule, you'll define it as your wish
      if ($count > 7){
          $args = array(
              'posts_per_page' => 1,
              'offset'         => 0,
              'category'       => $cat_id,
              'orderby'        => 'date',
              'order'          => 'ASC',
          );

          $myposts = get_posts( $args );
          foreach ( $myposts as $post ) : setup_postdata( $post );
              // Change the post category with the line below
              // The last parameter is append
              
              wp_set_post_categories( $post->ID, array($new_cat_id), false );
          endforeach;
      }
  }
?>
