<?php

namespace Outlandish\Wordpress\OowpBoilerplate\Views;

use Outlandish\Wordpress\OowpBoilerplate\PostTypes\Person;

class PersonView extends Layout
{

    function renderContent()
    {
        /** @var $person Person */
        $person = $this->post;
        $nickname = $person->nickname();
        $related = new RelatedItems('Skills', $person->skills());
        ?>
        <h1>Person: <?php echo $person->title() . ($nickname ? ' (' . $nickname . ')' : ''); ?></h1>
        <?php $related->render(); ?>
        <?php
    }
}