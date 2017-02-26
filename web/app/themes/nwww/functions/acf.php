<?php

if (function_exists('acf_add_local_field_group')):

    global $post;


    acf_add_local_field_group(array(
        'key' => 'group_58b3460d3c657',
        'title' => 'Przerywnik',
        'fields' => array(
            array(
                'key' => 'field_58b346199da97',
                'label' => 'Przerywnik',
                'name' => 'przerywnik',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 4,
                'max' => 6,
                'layout' => 'table',
                'button_label' => 'Dodaj wiersz',
                'sub_fields' => array(
                    array(
                        'key' => 'field_58b3462b9da98',
                        'label' => 'Tekst',
                        'name' => 'content',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'the_content',
        ),
        'active' => 1,
        'description' => '',
    ));

endif;

?>