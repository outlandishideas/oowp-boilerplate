<?php

namespace Outlandish\Wordpress\OowpBoilerplate\Views;

use Outlandish\Wordpress\Oowp\PostTypes\OowpPage;
use Outlandish\Wordpress\Oowp\Util\StringUtils;
use Outlandish\Wordpress\Oowp\Views\PostMenuItem;
use Outlandish\Wordpress\Oowp\Views\PostView;
use Outlandish\Wordpress\Oowp\Views\SimplePost;

class Layout extends PostView
{
    public function render($args = [])
    {
        ?>
        <!DOCTYPE html>
        <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="utf-8" />
            <title><?php echo $this->post->title(); ?></title>

            <?php wp_head(); ?>
        </head>
        <body class="<?php echo $this->bodyClass(); ?>">

        <header>
            <ul class="menu">
                <?php $this->renderMenu(); ?>
            </ul>
        </header>

        <div id="main">
            <?php $this->renderContent(); ?>
        </div>

        <footer>
            <?php wp_footer(); ?>
        </footer>

        </body>
        </html>
        <?php
    }

    function bodyClass()
    {
        $class = static::class;
        return StringUtils::fromCamelCase(substr($class, strrpos($class, '\\')+1));
    }

    function renderMenu()
    {
        $pages = OowpPage::fetchAll();
        $view = new PostMenuItem();
        foreach ($pages as $page) {
            $view->post = $page;
            $view->render();
        }
    }

    function renderContent()
    {
        $view = new SimplePost();
        $view->render();
    }
}