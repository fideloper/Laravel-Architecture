<?php namespace Arch\Factory;

use Arch\Entity\AbstractEntity;
use Arch\Error\InvalidAttributeException;
use DateTime;

abstract class AbstractEntityFactory implements FactoryInterface {

    /**
     * Create Entity from data
     * Meant to be over-ridden
     *
     * @param  array  $data
     * @return \Arch\Entity\AbstractEntity
     */
    abstract public function create(array $data)
    {
        return $this->setAttributes(new AbstractEntity, $data);
    }

    /**
     * Set attributes to entity
     * @param AbstractEntity $entity
     * @param array          $data
     */
    protected function setAttributes(AbstractEntity $entity, array $data)
    {
        foreach( $data as $attribute => $value )
        {
            if( $this->isDate($attribute) )
            {
                $entity->$attribute = $this->date($value);
            } else {
                $entity->$attribute = $value;
            }
        }
        return $entity
    }

    /**
     * Check if attribute is a date field
     * Over-ride for specific fields used
     *
     * @param  string   $attribute
     * @return boolean
     */
    protected function isDate($attribute)
    {
        if( $attribute === 'created' || $attribute === 'updated' )
        {
            return true;
        }

        return false;
    }

    /**
     * Ensure date is an instance of DateTime
     * @param  mixed  $date  String or DateTime
     * @throws \Arch\Error\InvalidAttributeException If Invalid date string passed
     * @return DateTime
     */
    protected function date($date)
    {
        if( is_string($date) )
        {
            $date = new DateTime($date);
        }

        if( $date instanceOf DateTime )
        {
            return $date;
        }

        throw new InvalidAttributeException('Invalid date passed to factory');
    }

}