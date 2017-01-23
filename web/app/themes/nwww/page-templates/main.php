<?php /**
 * Template name: Main
 */ ?>
<?php get_header(); ?>
<?php global $app; ?>
    <div class="section page__content padded container c__y" id="content" role="main">

        <div class="row">
    <div class="col-sm-6 col-md-8 col-lg-8 posts__loop">
        <div class="c__w container__inner">
        <div class="row">
<?php



    $args = [
            'post_type' => 'post',
        'posts_per_page' => 5,
        'post_status'=> 'publish'
    ];

    $posts = get_posts($args);

    foreach ($posts as $post) {
        setup_postdata($post);
        $app->render('post', [


                'title' => get_the_title($post->ID),
                'content' => get_the_content(),
                'link' => get_post_permalink($post->ID),
                'time' => human_time_diff( get_post_time('U', $post->ID), current_time('timestamp') ) . ' temu'

        ]);
        wp_reset_postdata();
    }

?>
          <div class="col-sm-12">
              <?php echo  get_post_type_archive_link( 'kampanie' );
              $app->render('link', [
                  'link' =>  get_post_type_archive_link( 'post' ),
                  'text' => 'Wszytskie aktualnosci',
                  'classes' => 'micro',
              ]);
              ?>

          </div>

        </div>
        </div>
        </div>
<?php get_template_part('promo-campaign'); ?>
<?php get_template_part('last-actions'); ?>
        </div>

    </div>
    <section class="section padded container c__r">
        <div class="row">
        <div class="col-md-12">
        <div class="c__w padded">
            <h1>Dorzutka? Dzięki!</h1>
            <p class="lead">
                Akcja Demokracja to zarejestrowana formalnie fundacja. Nasze działania nie mają na celu zysku. Jesteśmy po to, żeby razem z Tobą budować ruch ludzi zaangażowanych w ważne dla nich sprawy. Każda kwota się liczy.
                Dzięki nim zespół Akcji Demokracji przygotowuje kampanie, w których biorą udział tysiące osób.
            </p>
            <a href="https://dzialaj.akcjademokracja.pl/campaigns/dorzuc-sie" class="btn-primary btn-lg btn"><span>Dorzuć się</span></a>
         </div>
         </div>
         </div>
    </section>

<?php get_footer(); ?>
