<?php global $app; ?>

<?php

$json = file_get_contents(get_home_url() . '/sample.json');
$r = json_decode($json);

if ($r) :

    ?>
    <div class=" c__g  last__actions">
        <div class="padded ">
            <h3 class="side__title t__y h5 micro">Ostatnie akcje</h3>

            <div class="last__actions__actions swiper-container">
                <?php $app->render('loader'); ?>
                <div class="swiper-wrapper t__w">
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