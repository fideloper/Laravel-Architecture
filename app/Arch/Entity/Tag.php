<?php namespace Arch\Entity;

class Tag extends AbstractEntity {

    /**
     * Allowed attributes in Entity
     * @var array
     */
    protected $attributes = array(
        'name',
        'short_name'
    );

}