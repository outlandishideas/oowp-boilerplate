<?php

namespace Outlandish\Wordpress\OowpBoilerplate\Views;

use Outlandish\Wordpress\Oowp\OowpQuery;
use Outlandish\Wordpress\Oowp\Views\OowpView;

class RelatedItems extends OowpView
{
    protected $title;
    protected $items;

    /**
     * RelatedItems constructor.
     * @param string $title
     * @param OowpQuery $items
     */
    public function __construct($title, $items)
    {
        parent::__construct();
        $this->title = $title;
        $this->items = $items;
    }

    public function render($args = [])
    {
        ?>
        <p><?php echo $this->title; ?>:</p>
        <ul>
            <?php foreach ($this->items as $item) : ?>
                <li><?php echo $item->htmlLink(); ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
}