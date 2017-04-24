<?php

namespace Outlandish\Wordpress\OowpBoilerplate\PostTypes;

use DateTime;
use Outlandish\Wordpress\Oowp\OowpQuery;
use Outlandish\Wordpress\Oowp\PostTypes\WordpressPost;
use Outlandish\Wordpress\Oowp\Util\ArrayHelper;

class Skill extends WordpressPost
{
    static function getRegistrationArgs($defaults) {
        $defaults['menu_icon'] = 'dashicons-admin-tools';
        return parent::getRegistrationArgs($defaults);
    }

    public static function onRegistrationComplete()
    {
        parent::onRegistrationComplete();
        self::registerConnection(Person::postType());
    }

    public static function postTypeParentId()
    {
        return 2;
    }

    /**
     * @return OowpQuery|Person[]
     */
    public function people()
    {
        return $this->connected(Person::postType());
    }
}