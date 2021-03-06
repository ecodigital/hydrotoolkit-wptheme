<?php
/*
 * Template name: Home
 */
?>
<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()) : the_post(); ?>

  <section id="welcome">
    <div class="container">
      <div class="six columns offset-by-three">
        <div class="welcome-content">
          <h2><?php echo arp_get_headline(); ?></h2>
          <p><?php echo arp_get_headline_description(); ?></p>
          <p><a class="button" href="<?php echo arp_get_headline_url(); ?>"><?php _e('Learn more', 'arp'); ?></a></p>
        </div>
      </div>
    </div>
    <?php
    $header = get_custom_header();
    $image = get_post($header->attachment_id);
    ?>
    <div class="bg-caption"><?php echo apply_filters('the_content', $image->post_excerpt); ?></div>
  </section>
  <div class="container">
    <div class="nine columns">
      <?php
      query_posts('post_type=carousel&posts_per_page=-1');
      if(have_posts()) :
        ?>
        <section id="carousel">
          <nav class="carousel-nav">
            <?php
            while(have_posts()) : the_post();
              ?>
              <a href="#" data-postid="<?php the_ID(); ?>"></a>
              <?php
            endwhile;
            ?>
          </nav>
          <div class="carousel-items">
            <?php
            while(have_posts()) : the_post();
              ?>
              <article class="carousel-item" data-postid="<?php the_ID(); ?>">
                <a href="<?php the_field('url'); ?>" <?php if(get_field('target_blank')) echo 'target="_blank"'; ?>><?php the_post_thumbnail('highlight'); ?></a>
                <div class="carousel-item-meta">
                  <h2><a href="<?php the_field('url'); ?>" <?php if(get_field('target_blank')) echo 'target="_blank"'; ?>><?php the_title(); ?></a></h2>
                  <?php the_excerpt(); ?>
                </div>
              </article>
              <?php
            endwhile;
            ?>
          </div>
        </section>
        <?php
      endif;
      wp_reset_query();
      ?>
    </div>
    <div class="three columns">
      <section id="social">
        <div class="social-bg"></div>
        <div class="social-content">
          <h2><?php _e('Connect with us', 'arp'); ?></h2>
          <?php
          $fb = get_field('site_options_facebook', 'option');
          $tw = get_field('site_options_twitter', 'option');
          $yt = get_field('site_options_youtube', 'option');
          ?>
          <?php if($fb) : ?>
            <a class="fa fa-facebook" href="<?php echo $fb; ?>" target="_blank" rel="extenal" title="Facebook"></a>
          <?php endif; ?>
          <?php if($yt) : ?>
            <a class="fa fa-youtube" href="<?php echo $yt; ?>" target="_blank" rel="external" title="YouTube"></a>
          <?php endif; ?>
          <?php if($tw) : ?>
            <a class="fa fa-twitter" href="<?php echo $tw; ?>" target="_blank" rel="external" title="Twitter"></a>
          <?php endif; ?>
        </div>
      </section>
      <section id="latest" class="page-section clean">
        <h2 class="section-title"><?php _e('Latest news', 'arp'); ?></h2>
        <?php
        query_posts('posts_per_page=3');
        if(have_posts()) :
          while(have_posts()) :
            the_post();
            ?>
            <article class="post-item small clearfix">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </article>
            <?php
          endwhile;
        endif;
        wp_reset_query();
        ?>
      </section>
    </div>
  </div>
  <div id="home-map-info">
    <div class="container">
      <div class="twelve columns">
        <h2><?php _e('Amazon River Basins', 'arp'); ?></h2>
      </div>
    </div>
  </div>
  <section id="map">
    <div class="arp-map">
      <?php echo arp_get_home_map(); ?>
    </div>
  </section>

  <?php get_template_part('parts/basins', 'section'); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
