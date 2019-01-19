<?php

namespace App\Repositories;

use App\Models\Showtime;

use App\Repositories\RepositoryInterface;
/**
 * 
 */
class ShowtimeRepository implements RepositoryInterface
{
    protected $showtime;

    public function __construct(Showtime $showtime)
    {
        $this->showtime = $showtime;
    }

    public function all()
    {
        return $this->showtime->all();
    }

    public function create(array $data)
    {
        return $this->showtime->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->showtime->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->showtime->destroy($id);
    }

    public function show($id)
    {
        return $this->showtime->findOrFail($id);
    }

    public function getModel()
    {
        return $this->showtime;
    }

    public function setModel($showtime)
    {
        $this->showtime = $showtime;
        return $this;
    }

    public function with($relations)
    {
        return $this->showtime->with($relations);
    }
}