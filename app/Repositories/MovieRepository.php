<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Models\Showtime;

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
        return $this->movie->all()->sortBy('release_date');
    }

    public function create(array $data)
    {

        $movie =  $this->movie->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'release_date' => $data['release_date'],
        ]);
        if (array_key_exists("cinemas", $data)) $movie->cinemas()->attach($data['cinemas']);
        if (array_key_exists("showtimes", $data)) $movie->showtimes()->saveMany(Showtime::whereIn('id', $data['showtimes'])->get());
        return $movie;
    }

    public function update(array $data, $id)
    {
        $record = $this->movie->find($id);
        $record->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'release_date' => $data['release_date'],
        ]);
        if (array_key_exists("cinemas", $data)) $record->cinemas()->attach($data['cinemas']);
        if (array_key_exists("showtimes", $data)) $record->showtimes()->saveMany(Showtime::whereIn('id', $data['showtimes'])->get());
        return $record;
    }

    public function delete($id)
    {
        return $this->movie->destroy($id);
    }

    public function show($id)
    {
        return $this->movie->with('showtimes.cinema')->findOrFail($id);
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