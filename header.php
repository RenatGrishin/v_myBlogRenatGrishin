<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?php echo wp_get_document_title(); ?></title>
  <?php wp_head();
  ?>

</head>
<body>
<header class="main-header">
  <div class="center-block main-header-flex">
    <div class="logo-block">
        <?php echo get_custom_logo( $blog_id ); ?>
    </div>
    <nav class="main-nav">
    <?php wp_nav_menu($args); ?>
    </nav>
    <div class="header-menu"><input onClick={showNavigation()} type="submit" value="Menu" /></div>
  </div>
  <div id="mobile-nav" class="mobile-nav-none">
    <input onClick={closeNavigation()} type="submit" value="Close" />
    <?php wp_nav_menu($args); ?>
  </div>
  <script>
    function showNavigation (){
      let navMenu = document.getElementById('mobile-nav');
      navMenu.classList.remove('mobile-nav-none');
      navMenu.classList.add('mobile-nav-show');
    }
    function closeNavigation (){
      let navMenu = document.getElementById('mobile-nav');
      navMenu.classList.remove('mobile-nav-show');
      navMenu.classList.add('mobile-nav-none');
    }
  </script>
</header>