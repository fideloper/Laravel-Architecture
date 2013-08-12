<?php namespace Arch\Entity\Author;

use Arch\Validation\AbstractValidator;

class Validator extends AbstractValidator {

    /**
     * Validation rules
     *
     * @var array;
     */
    protected $rules = array(
        'name' => 'required',
        'password' => 'required',
        'created' => 'required|datetime',
        'updated' => 'required|datetime',
        'deleted' => 'datetime'
    );

}