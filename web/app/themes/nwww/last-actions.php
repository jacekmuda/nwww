<?php global $app; ?>

<?php

$json = file_get_contents(get_home_url() . '/sample.json');
$r = json_decode($json);

if ($r) :

    ?>
    <div class="last__actions">
        <h3 class="h1">Z ostatniej chwili</h3>
        <div class=" c__y">


            <div class="last__actions__actions swiper-container">
                <?php $app->render('loader'); ?>
                <div class="swiper-wrapper ">
                    <?php foreach ($r as $itm) :

                        $format = '<div class="last__actions__action padded swiper-slide"><div class="nick h4">%s temu</div><p>%s</p></div>';
                        echo sprintf($format, $itm->nick, $itm->content);
                    endforeach; ?>
                </div>
            </div>

        </div>
    </div>

<?php endif; ?>