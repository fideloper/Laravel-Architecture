<?php namespace Arch\Entity\Tag;

use Arch\Entity\Tag;
use Arch\Factory\AbstractEntityFactory;

class Factory extends AbstractEntityFactory {

    /**
     * Create Entity from data
     *
     * @param  array  $data
     * @return \Arch\Entity\Tag
     */
    public function create(array $data)
    {
        return $this->setAttributes(new Tag, $data);
    }

}