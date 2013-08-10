<?php namespace Arch\Factory;

interface FactoryInterface {

    /**
     * Create Entity from data
     * @param  array  $data
     * @return \Arch\Entity\AbstractEntity
     */
    public function create(array $data);

}