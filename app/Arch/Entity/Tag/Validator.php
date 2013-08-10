<?php namespace Arch\Entity\Tag;

use Arch\Validation\AbstractValidator;

class Validator extends AbstractValidator {

    /**
     * Validation rules
     *
     * @var array;
     */
    protected $rules = array(
        'name' => 'required',
        'short_name' => 'required',
        'articles' => 'collection',
    );

}