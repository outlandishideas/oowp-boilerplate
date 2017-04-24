<?php

namespace Outlandish\Wordpress\OowpBoilerplate\Views;

use Outlandish\Wordpress\OowpBoilerplate\PostTypes\Person;

class HomeView extends Layout
{
    function renderContent()
    {
        /** @var Person[] $people */
        $people = Person::fetchAll();
        ?>

        <h1>Oowp Boilerplate Theme</h1>
        <div class="people">
        <?php foreach ($people as $person) : ?>
            <div class="person">
                <h2><?php echo $person->htmlLink(); ?></h2>
                <div class="skills">
                <?php foreach ($person->skills() as $skill) : ?>
                    <a href="<?php echo $skill->permalink(); ?>" class="skill">
                        <?php echo $skill->title(); ?>
                    </a>
                <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        </div>

        <?php
    }

}