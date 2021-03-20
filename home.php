<?php get_header() ?>
<main>
  <section class="slide">

    <?php
    $the_query = new WP_Query('page_id=181');
    while  ($the_query->have_posts() ){
      $the_query->the_post();
      the_post_thumbnail('full');
    }
    wp_reset_postdata();
    ?>
    <div class="slide-img-grd"></div>
    <div class="center-block">
      <h1><?php bloginfo('name'); ?></h1>
      <p><?php bloginfo('description');  ?></p>
      <div class="slide-button-block">
        <a href="https://renatgrishin.ru/%d0%bf%d0%be%d1%80%d1%82%d1%84%d0%be%d0%bb%d0%b8%d0%be/" class="button">ПОРТФОЛИО</a>
        <a href="https://renatgrishin.ru/%d1%80%d0%b5%d0%b7%d1%8e%d0%bc%d0%b5/" class="button">РЕЗЮМЕ</a>
      </div>
    </div>
  </section>
  <section class="news">

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
  <section class="other-news">
  <h2>Прочие статьи</h2>

  <?php
  $wp_query = new WP_Query( array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    'cat' => 20,
    'orderby'=> 'date'
  ));
  ?>
  <?php if ( have_posts() ){
    while ( have_posts() ){
    the_post();
      echo '<article>
              <a href="'.get_permalink().'"><h3>';
                 echo the_title().'</h3>';
      if(get_the_post_thumbnail_url()){
        echo the_post_thumbnail('thumbnail');
      }

      echo  '</a>
                            </article>';
    }
  }
  wp_reset_query(); // очищаем запрос ?>
  </section>
  <nav class="page-nav">
    <?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?>
  </nav>
</main>
<?php get_footer() ?>