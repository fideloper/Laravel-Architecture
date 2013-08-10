<?php namespace Arch\Entity\Author;

use Arch\Entity\Author;
use Arch\Factory\AbstractEntityFactory;

class Factory extends AbstractEntityFactory {

    /**
     * Create Entity from data
     *
     * @param  array  $data
     * @return \Arch\Entity\Author
     */
    public function create(array $data)
    {
        return $this->setAttributes(new Author, $data);
    }

}