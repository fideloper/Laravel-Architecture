<?php namespace Arch\Validation;

use Arch\Entity\AbstractEntity;

interface ValidableInterface {

    /**
     * Bind entity to validation class
     * @param  AbstractEntity $entity
     * @return \Arch\Validation\ValidableInterface  $entity  For chainability
     */
    public function bind(AbstractEntity $entity);

    /**
     * If validation passes
     * @return Boolean
     */
    public function valid();

}