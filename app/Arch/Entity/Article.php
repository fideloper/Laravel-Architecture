<?php namespace Arch\Entity;

class Article extends AbstractEntity {

    /**
     * Allowed attributes in Entity
     * @var array
     */
    protected $attributes = array(
        'title',
        'short_title',
        'content',
        'tags',
        'created',
        'updated',
        'deleted',
    );

}