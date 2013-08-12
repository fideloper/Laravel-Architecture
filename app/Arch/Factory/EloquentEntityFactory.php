<?php namespace Arch\Factory;

use Arch\Entity\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EloquentEntityFactory extends AbstractEntityFactory {

    /**
     * Create Article Entity from data
     *
     * @param  array  $data
     * @return \Arch\Entity\Article
     */
    public function create(array $data)
    {
        return $this->setAttributes(new Article, $data);
    }

    /**
     * Create Article Entity from Eloquent model
     *
     * @param  \Illuminate\Database\Eloquent\Model
     * @return \Arch\Entity\Article
     */
    public function model(Model $model)
    {
        $data = $model->toArray();

        if( isset($data['deleted_at']) )
        {
            $data['deleted'] = $data['deleted_at'];
            unset($data['deleted_at']);
        }

        if( isset($data['updated_at']) )
        {
            $data['updated'] = $data['updated_at'];
            unset($data['updated_at']);
        }

        if( isset($data['created_at']) )
        {
            $data['created'] = $data['created_at'];
            unset($data['created_at']);
        }

        return $this->create($data);
    }

    /**
     * Create Collection of Article Entity from Eloquent Collection
     *
     * @param  \Illuminate\Database\Eloquent\Collection
     * @return \Illuminate\Support\Collection
     */
    public function collection(Collection $collection)
    {
        $items = array();

        $collection->each(function($model) use ($items)
        {
            $items[] = $this->model($model);
        });

        return new Collection($items);
    }

}