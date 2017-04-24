<?php

use Outlandish\Wordpress\Oowp\PostTypeManager;
use Outlandish\Wordpress\OowpBoilerplate\PostTypes\Person;
use Outlandish\Wordpress\OowpBoilerplate\PostTypes\Skill;

add_action('init', function() {
    PostTypeManager::get()->registerPostTypes([
        Person::class,
        Skill::class
    ]);

    wp_enqueue_style('oowp-boilerplate', get_template_directory_uri() . '/style.css');
});
