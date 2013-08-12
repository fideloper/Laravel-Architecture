<?php namespace Arch\Entity\Article;

use Arch\Validation\AbstractValidator;

class Validator extends AbstractValidator {

    /**
     * Validation rules
     *
     * @var array;
     */
    protected $rules = array(
        'title' => 'required',
        'short_title' => 'required',
        'content' => 'required',
        'tags' => 'collection',
        'created' => 'required|datetime',
        'updated'  => 'required|datetime',
        'deleted' => 'datetime',
    );

}