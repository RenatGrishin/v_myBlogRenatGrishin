<?php get_header() ?>
<main>
<section class="filter article-width">
  <?php
    if ( have_posts() ){
    	while ( have_posts() ){
    	  the_post();
    	  //проверка на миниатюру
        if(get_the_post_thumbnail_url()){
          echo '<section class="slide">
                  <img src="'.get_the_post_thumbnail_url(null, 'full').'">
                  <div class="slide-img-grd"></div>
                  <div class="center-block">
                    <h1>'.get_the_title().'</h1>
                  </div>
                </section>';
        }else{
          echo '<section class="single-page-title-no-slide">
                              <h1>'.get_the_title().'</h1>
                          </section>';
        }
        echo '<section class="article-width single-page">';
        echo the_content();
        echo '</section>';
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