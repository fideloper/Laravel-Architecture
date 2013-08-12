<?php namespace Arch\Repo\Article;

use Arch\Factory\FactoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Pagintor;

class EloquentArticle implements ArticleInterface {

    /**
     * Eloquent model
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $article;

    public function __construct(Model $article, FactoryInterface $factory)
    {
        $this->article = $article;
        $this->factory = $factory;
    }

    /**
     * Get all articles
     * @return \Illuminate\Support\Collection  Collection of Articles
     */
    public function all()
    {
        return $this->factory->collection( $this->article->all() );
    }

    /**
     * Get all articles per page
     * @param  Integer $page Current Page
     * @param  Integer $rpp  Results per page
     * @return \Illuminate\Support\Collection Collection of Articles
     */
    public function page($page=1, $rpp=10)
    {
        $paginator = $this->article->byPage($page);

        return $this->pagination($paginator);
    }

    /**
     * Get all articles per tag
     * @param  string $tag Tag short name
     * @return \Illuminate\Support\Collection  Collection of Articles
     */
    public function byTag($tag, $page=1, $rpp=10)
    {
        $paginator =  $this->article->byTag($tag, $rpp);

        return $this->pagination($paginator);
    }

    /**
     * Get article by ID
     * @param  Integer $id Article ID
     * @return \Arch\Entity\Article     Single article
     */
    public function byId($id)
    {
        return $this->factory->model( $this->article->find($id) );
    }

    /**
     * Get article by Short Name
     * @param  String Article  Short Name
     * @return \Arch\Entity\Article     Single article
     */
    public function byShortTitle($shortTitle)
    {
        return $this->factory->model(  $this->article->byShortTitle($shortTitle) );
    }

    /**
     * Convert Paginator items from Eloquent models to Entities
     * @param  \Illuminate\Pagination\Pagintor  Paginator with Eloquent models
     * @return \Illuminate\Pagination\Pagintor  Paginator with Entites
     */
    protected function pagination(Pagintor $paginator)
    {
        $articles = $this->factory->collection( $paginator->getCollection() );

        $paginator->setItems( $articles );

        return $paginator;
    }

}