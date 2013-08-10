<?php namespace Arch\Validation;

use Arch\Entity\AbstractEntity;
use Illuminate\Validation\Factory;

abstract class AbstractValidator implements ValidableInterface {

    /**
     * Entity to validate against
     * @var \Arch\Entity\AbstractEntity
     */
    protected $entity;

    /**
     * Validator
     * @var \Illuminate\Validation\Factory
     */
    protected $validator;

    /**
     * Validation errors
     *
     * @var array;
     */
    protected $errors = array();

    /**
     * Validation rules
     *
     * @var array;
     */
    protected $rules = array();

    /**
     * Validation errors
     *
     * @var array;
     */
    protected $errors = array();


    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }


    /**
     * Bind entity to validation class
     * @param  AbstractEntity $entity
     * @return \Arch\Validation\ValidableInterface  $entity  For chainability
     */
    public function bind(AbstractEntity $entity)
    {
        $this->entity = $entity;
    }


    /**
     * If validation passes
     * @return Boolean
     */
    public function valid()
    {
        $validator = $this->validator->make($this->data, $this->rules);

        if( $validator->fails() )
        {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }

    /**
     * Return errors, if any
     *
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }

}