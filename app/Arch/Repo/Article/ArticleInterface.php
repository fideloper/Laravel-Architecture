<?php namespace Arch\Repo\Article;

interface ArticleInterface {

    /**
     * Get all articles
     * @return \Illuminate\Support\Collection  Collection of Articles
     */
    public function all();

    /**
     * Get all articles per page
     * @param  Integer $page Current Page
     * @param  Integer $rpp  Results per page
     * @return \Illuminate\Support\Collection  Collection of Articles
     */
    public function page($page=1, $rpp=10);

    /**
     * Get all articles per tag
     * @param  string $tag Tag short name
     * @return \Illuminate\Support\Collection  Collection of Articles
     */
    public function byTag($tag, $page=1, $rpp=10);

    /**
     * Get article by ID
     * @param  Integer $id Article ID
     * @return \Arch\Entity\Article     Single article
     */
    public function byId($id);

    /**
     * Get article by Short Name
     * @param  String Article  Short Name
     * @return \Arch\Entity\Article     Single article
     */
    public function byShortTitle($shortName);

}