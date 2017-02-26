<?php global $app; ?>

<?php

$json = file_get_contents(get_home_url() . '/sample.json');
$r = json_decode($json);

if ($r) :

    ?>
    <div class="last__actions">
        <h3 class="h1">Z ostatniej chwili</h3>
        <div class="padded c__y">


            <div class="last__actions__actions swiper-container">
                <?php $app->render('loader'); ?>
                <div class="swiper-wrapper ">
                    <?php foreach ($r as $itm) :
                        $time = strtotime($itm->timestamp);
                        $format = '<div class="last__actions__action swiper-slide"><p>%s</p><time class="h5">%s temu</time></div>';
                        echo sprintf($format, $itm->content, human_time_diff($time));
                    endforeach; ?>
                </div>
            </div>

        </div>
    </div>

<?php endif; ?>