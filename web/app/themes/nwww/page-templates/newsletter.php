<?php
/**
 * Template name: Newsletter
 */

get_header();

if (have_posts()) while (have_posts()) : the_post(); ?>
    <section class="section post__content padded container c__y" id="content" role="main">
<div class="padded c__w">
        <div class="row ">

            <div class="col-md-12">
                <h1 class="side__title"><?php the_title(); ?></h1>
            </div>
            <div class="col-md-6">

                <div class="lead">
                <?php the_content(); ?>
                </div>
                <p>Zapisując się akceptujesz obowiązującą politykę prywatności</p>
            </div>
            <div class="col-md-6">

                <form class="">
                    <div class="form__row">

                        <label class="sr-only" for="inlineFormInput">Name</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Imię">

                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Nazwisko">

                            <label class="sr-only" for="inlineFormInput">Name</label>
                            <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Kod pocztowy">

                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                            <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="E-mail">
<div class="text-right">
    <button type="submit" class="btn btn-primary">Zapisz</button>

</div>




                    </div>
                </form>




        </div>
        </div></div>
    </section>


<?php endwhile;


get_footer();
