<?php

namespace Outlandish\Wordpress\OowpBoilerplate\PostTypes;

use DateTime;
use Outlandish\Wordpress\Oowp\OowpQuery;
use Outlandish\Wordpress\Oowp\PostTypes\WordpressPost;
use Outlandish\Wordpress\Oowp\Util\ArrayHelper;

class Person extends WordpressPost
{
    public static function friendlyNamePlural()
    {
        return 'People';
    }

    public static function onRegistrationComplete()
    {
        if(function_exists("register_field_group"))
        {
            register_field_group(array (
                'id' => 'acf_people',
                'title' => 'People',
                'fields' => array (
                    array (
                        'key' => 'field_58fe168272d0c',
                        'label' => 'Nickname',
                        'name' => 'nickname',
                        'type' => 'text',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_58fe16eb4027a',
                        'label' => 'Date of Birth',
                        'name' => 'dob',
                        'type' => 'date_picker',
                        'required' => 1,
                        'date_format' => 'yymmdd',
                        'display_format' => 'dd/mm/yy',
                        'first_day' => 1,
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'person',
                            'order_no' => 0,
                            'group_no' => 0,
                        ),
                    ),
                ),
                'options' => array (
                    'position' => 'normal',
                    'layout' => 'no_box',
                    'hide_on_screen' => array (
                    ),
                ),
                'menu_order' => 0,
            ));
        }
    }


    static function getRegistrationArgs($defaults) {
        $defaults['menu_icon'] = 'dashicons-groups';
        return parent::getRegistrationArgs($defaults);
    }

    static function addCustomAdminColumns(ArrayHelper $helper)
    {
        $helper->insertAfter('title', 'nickname', 'Nickname');
        $helper->insertAfter('nickname', 'dob', 'Date of Birth');
    }

    function nickname()
    {
        return $this->metadata('nickname');
    }

    function dob()
    {
        $dob = $this->metadata('dob');
        if ($dob) {
            $dob = DateTime::createFromFormat('Ymd', $dob);
            if ($dob) {
                $dob = $dob->format('jS M Y');
            }
        }
        return $dob;
    }

    function getCustomAdminColumnValue($column)
    {
        switch($column) {
            case 'nickname':
                return $this->nickname() ?: '-';
            case 'dob':
                return $this->dob() ?: '-';
            default:
                return parent::getCustomAdminColumnValue($column);
        }
    }

    public static function postTypeParentId()
    {
        return 2;
    }

    /**
     * @return OowpQuery|Skill[]
     */
    public function skills()
    {
        return $this->connected(Skill::postType());
    }

}