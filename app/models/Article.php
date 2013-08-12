<?php

class Article extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * Indicates if the model should soft delete.
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * Use limit (and implicit offset) for paginated results
     * @param  Integer $take SQL Limit
     * @return \Illuminate\Pagination\Paginator
     */
    public function byPage($take)
    {
        return $this->orderBy('created_at', 'desc')->paginate($take);
    }

    public function byTag($tag, $take)
    {
        return $this->join('articles_tags', 'articles.id', '=', 'articles_tags.article_id')
                    ->where('articles_tags.tag_id', $foundTag->id)
                    ->orderBy('articles.created_at', 'desc')
                    ->paginate($take);
    }

    /**
     * Return article by short_title
     * @param  String URL/Short title
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function byShortTitle($shortTitle)
    {
        return $this->where('short_title', $shortName)->first();
    }

}