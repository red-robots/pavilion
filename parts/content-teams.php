<?php  
global $post;
$pageId = $post->ID;
$current_url = get_permalink();
// $featteam = get_field("featured_team",$pageId);
// $featId = ( isset($featteam->ID) && $featteam->ID ) ? $featteam->ID:'';

$exclude_teams = get_field("exclude_from_the_list",$pageId);

  /* Team Posts */
  $taxonomy = 'team-groups';
  $posttype = 'team';
  $currentCat = ( isset($_GET['cat']) && $_GET['cat'] ) ? $_GET['cat'] : ''; 
  $args = array(
      'posts_per_page'=> -1,
      'post_type'     => $posttype,
      'post_status'   => 'publish',
  );

  /* EXCLUDE CEO / PRESIDENT */
  if($exclude_teams) {
  	$args['post__not_in'] = $exclude_teams;
  }

  if($currentCat && is_numeric($currentCat)) {
		$args['tax_query'][] = array(
      'taxonomy'=>$taxonomy,
      'field'=>'term_id',
      'terms'=>array($currentCat)
    );
	}

	$terms = get_terms( array(
	  'taxonomy' => $taxonomy,
	  'hide_empty' => true,
	));

	$teams = new WP_Query($args);
  if ( $teams->have_posts() ) {  ?>   

  <section class="team-posts fw-left">
		<?php if ($terms) { ?>
      <div class="team-categories">
      	<div class="wrapper">
          <div class="wrap categories-tabs">
              <a href="<?php echo $current_url ?>" class="<?php echo (empty($currentCat)) ? 'all active':'all'?>"><span>All</span></a>
              <?php foreach ($terms as $term) { 
              $term_id = $term->term_id;
              $term_slug = $term->slug;
              $term_name = $term->name;
              //$term_link = get_term_link($term,$taxonomy);
              $term_link = $current_url . '?cat=' . $term_id;
              $is_active = ( ($currentCat) && $term_id==$currentCat ) ? ' active':'';
              ?>
              <a href="<?php echo $term_link ?>" class="cat-<?php echo $term_slug . $is_active ?>"><span><?php echo $term_name ?></span></a>
              <?php } ?>
          </div>
        </div>
      </div>  
      <div class="cat-tabs-mobile"><div class="cattabs"></div></div>
      <?php } ?>

      <div class="team-list fw-left">
      	<div class="wrapper team-data">
					<div class="flexwrap">
		      <?php $i=1; while ( $teams->have_posts() ) : $teams->the_post(); 
		      		$name = get_the_title(); 
		          $image = get_field('photo'); 
		          $jobtitle = get_field('jobtitle');
		          $alt = $image['alt'];
		          $caption = $image['caption'];
		          $link = get_permalink();
		          $placeholder = get_bloginfo("template_url") . "/images/square.png";
		          $imageURL = ($image) ? "'".$image['url']."'" : '';
		          $style = ($image) ? ' style="background-image:url('.$imageURL.')"':'';
		          ?>
		          <div class="teamInfo animated fadeIn">
		          	<div class="wrap cf">
		              <a href="<?php echo $link ?>" class="info staff-page-info">
	                  <span class="photo <?php echo ($image) ? 'yes':'no'; ?>"<?php echo $style ?>>
	                    <img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" />
	                  </span>
	                  <span class="text">
                      <span class="team-name"><?php echo $name ?></span>
                      <?php if ($jobtitle) { ?>
                      <span class="team-title"><?php echo $jobtitle ?></span>
                      <?php } ?>
	                  </span>
		              </a>
		            </div>
		          </div>
		      <?php $i++; endwhile; wp_reset_postdata(); ?>
		      </div>
	      </div>
      </div>

  </section>

  <?php } ?>