<?php namespace Arch\Entity;

use Arch\Error\InvalidAttributeException;
use Illuminate\Support\Contracts\ArrayableInterface;
use Illuminate\Support\Contracts\JsonableInterface;

abstract class AbstractEntity implements ArrayableInterface, JsonableInterface {

    /**
     * Allowed attributes in Entity
     * @var array
     */
    protected $attributes = array();

    /**
     * Attributes values
     * @var array
     */
    protected $data = array();

    public function __construct(array $data=null)
    {
        if( is_array($data) )
        {
            $this->build($data);
        }
    }

    /**
     * Build attribute values from an array
     * @param  array  $data
     * @throws \Arch\Error\InvalidAttributeException If attribute is invalid
     * @return Arch\Entity\AbstractEntity  $this  This class, for chainability
     */
    public function build(array $data)
    {
        foreach( $data as $attribute => $value )
        {
            $this->__set($attribute, $value);
        }

        return $this;
    }

    /**
     * Setter Magic Method
     * @param  string  $attribute  Entity attribute
     * @param  mixed   $value  Attribute value
     * @throws \Arch\Error\InvalidAttributeException If attribute is invalid
     * @return void
     */
    public function __set($attribute, $value)
    {
        if( in_array($attribute, $this->attributes) )
        {
            $this->data[$attribute] = $value;
        }
        else
        {
            throw new InvalidAttributeException('Invalid attribute passed to Entity')
        }
    }

    /**
     * Getter magic method
     * @param  string  $attribute  Entity attribute
     * @throws \Arch\Error\InvalidAttributeException If attribute is invalid
     * @return mixed   Entity attribute value, or NULL
     */
    public function __get($attribute)
    {
        if( in_array($attribute, $this->attributes) )
        {
            return $this->data[$attribute];
        }

        throw new InvalidAttributeException('Invalid attribute retrieved')
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->data, $options);
    }

}