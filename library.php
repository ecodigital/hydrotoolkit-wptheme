<?php
/*
 * Template name: Library page
 */
?>
<?php get_header(); ?>

<article id="page">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <section id="story-map">
          <iframe frameborder="0" src="http://panda.maps.arcgis.com/apps/MapSeries/index.html?appid=7919d0e1e962438d8824b726c90ab4a6&webmap=e336462261924c2b8a0307d740ebb35d"></iframe>
          <div class="example">
            <p>Example story map</p>
          </div>
        </section>
      </div>
    </div>
  </header>
  <?php
  query_posts('posts_per_page=3');
  if(have_posts()) :
    ?>
    <section id="latest" class="page-section">
      <div class="container">
        <div class="twelve columns">
          <h2 class="section-title"><?php _e('Latest news', 'arp'); ?></h2>
        </div>
      </div>
      <div class="post-list latest-list">
        <div class="container">
          <?php
          while(have_posts()) :
            the_post();
            ?>
            <div class="four columns">
              <article class="post-item">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wide-thumbnail'); ?></a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              </article>
            </div>
            <?php
          endwhile;
          ?>
        </div>
      </div>
    </section>
    <?php
  endif;
  wp_reset_query();
  ?>
  <div class="container">
    <div class="six columns">
      <?php
      query_posts('posts_per_page=3');
      if(have_posts()) :
        ?>
        <section id="publications" class="page-section">
          <h2 class="section-title"><?php _e('Publications', 'arp'); ?></h2>
          <?php
          while(have_posts()) :
            the_post();
            ?>
            <article class="post-item clearfix">
              <div class="three columns">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
              </div>
              <div class="nine columns">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
              </div>
            </article>
            <?php
          endwhile;
          ?>
        </section>
        <?php
      endif;
      wp_reset_query();
      ?>
    </div>
    <div class="two columns">
      <section id="share" class="page-section">
        <h2 class="section-title">Stay tuned</h2>
        <div class="section-box">
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
        </div>
      </section>
      <section id="join" class="page-section">
        <h2 class="section-title">WWF</h2>
        <div class="section-box">
          <p><?php _e('Help stop the degradation of our planet\'s natural environment, and build a future in which people live in harmony with nature.', 'arp'); ?></p>
          <a class="button" href="#">Take action</a>
        </div>
    </div>
    <div class="four columns">
      <?php
      query_posts('posts_per_page=1');
      if(have_posts()) :
        ?>
        <section id="videos" class="page-section">
          <h2 class="section-title"><?php _e('Videos', 'arp'); ?></h2>
          <?php
          while(have_posts()) :
            the_post();
            ?>
            <article class="post-item">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wide-thumbnail'); ?></a>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
            </article>
            <?php
          endwhile;
          ?>
        </section>
        <?php
      endif;
      wp_reset_query();
      ?>
    </div>
  </div>
</article>

<?php get_footer(); ?>