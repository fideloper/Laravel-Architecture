<?php namespace Arch\Entity;

class Author extends AbstractEntity {

    /**
     * Allowed attributes in Entity
     * @var array
     */
    protected $attributes = array(
        'name',
        'password',
        'created',
        'updated',
        'deleted',
    );

}