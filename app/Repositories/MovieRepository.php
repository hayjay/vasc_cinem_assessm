<?php

namespace App\Repositories;

use App\Models\Movie;

use App\Repositories\RepositoryInterface;
/**
 * 
 */
class MovieRepository implements RepositoryInterface
{
    protected $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    public function all()
    {
        return $this->movie->orderBy('release_date')->all();
    }

    public function create(array $data)
    {
        return $this->movie->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->movie->destroy($id);
    }

    public function show($id)
    {
        return $this->movie->findOrFail($id);
    }

    public function getModel()
    {
        return $this->movie;
    }

    public function setModel($movie)
    {
        $this->movie = $movie;
        return $this;
    }

    public function with($relations)
    {
        return $this->movie->with($relations);
    }
}