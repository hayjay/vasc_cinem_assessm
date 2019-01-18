<?php

namespace App\Repositories;

use App\Models\Cinema;

use App\Repositories\RepositoryInterface;
/**
 * 
 */
class CinemaRepository implements RepositoryInterface
{
    protected $cinema;

    public function __construct(Cinema $cinema)
    {
        $this->cinema = $cinema;
    }

    public function all()
    {
        return $this->cinema->all();
    }

    public function create(array $data)
    {
        return $this->cinema->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->cinema->destroy($id);
    }

    public function show($id)
    {
        return $this->cinema->findOrFail($id);
    }

    public function getModel()
    {
        return $this->cinema;
    }

    public function setModel($cinema)
    {
        $this->cinema = $cinema;
        return $this;
    }

    public function with($relations)
    {
        return $this->cinema->with($relations);
    }
}