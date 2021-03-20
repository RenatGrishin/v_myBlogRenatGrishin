<?php get_header() ?>
<main>
  <section class="filter article-width">
  <h1><?php single_cat_title(); ?></h1>
  <?php
  		if ( have_posts() ){
  			while ( have_posts() ){
  				the_post();
          echo '<article class="article-mini">';
          if(get_the_post_thumbnail_url()){
            echo '<a href="'.get_permalink().'" class="miniature">';
            echo the_post_thumbnail('large');
            echo '</a>';
          }
           echo'<a href="'.get_permalink().'"><h2>'.get_the_title().'</h2></a>
                                 <data value="'.get_the_date().'">'.get_the_date().'</data> <span>';
                      echo get_the_category_list().'</span>';
          echo the_excerpt();
          echo '</article>';
  			}
  			if ( function_exists( 'pgntn_display_pagination' ) ) pgntn_display_pagination( 'multipage' );
  		}
  		// елси записей не найдено
  		else{
  			echo ' <p>Записей нет...</p>';
  		}
  ?>
  </section>
  <nav class="page-nav">
    <?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?>
  </nav>
</main>
<?php get_footer() ?>