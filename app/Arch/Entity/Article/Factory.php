<?php namespace Arch\Entity\Article;

use Arch\Entity\Article;
use Arch\Factory\AbstractEntityFactory;

class Factory extends AbstractEntityFactory {

    /**
     * Create Entity from data
     *
     * @param  array  $data
     * @return \Arch\Entity\Article
     */
    public function create(array $data)
    {
        return $this->setAttributes(new Article, $data);
    }

}