<?php

namespace Outlandish\Wordpress\OowpBoilerplate\Views;

use Outlandish\Wordpress\OowpBoilerplate\PostTypes\Skill;

class SkillView extends Layout
{
    function renderContent()
    {
        /** @var $skill Skill */
        $skill = $this->post;
        $related = new RelatedItems('People', $skill->people());
        ?>
        <h1>Skill: <?php echo $skill->title(); ?></h1>
        <?php $related->render(); ?>
        <?php
    }
}