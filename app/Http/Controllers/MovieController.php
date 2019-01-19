<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MovieRepository;
use App\Repositories\ShowtimeRepository;
use App\Repositories\CinemaRepository;

class MovieController extends Controller
{
    protected $movie;

    function __construct(MovieRepository $movie, ShowtimeRepository $showtime, CinemaRepository $cinema)
    {
        $this->movie = $movie;
        $this->cinema = $cinema;
        $this->showtime = $showtime;
        $this->middleware('auth')->except(['show', 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = $this->movie->all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cinemas = $this->cinema->all();
        $showtimes = $this->showtime->all();
        return view ('movies.create', compact('cinemas', 'showtimes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'release_date' => 'required'
        ]);

        $movie =  $this->movie->create($request->all());
        return back()->with('success', 'Movie created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie =  $this->movie->show($id);
        return view ('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cinemas = $this->cinema->all();
        $showtimes = $this->showtime->all();
        $movie =  $this->movie->show($id);
        return view ('movies.edit', compact('movie', 'cinemas', 'showtimes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'release_date' => 'required'
        ]);
        $this->movie->update($request->all(), $id);
        return back()->with('success', 'Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->movie->delete($id);
        return redirect(route('movies.index'))->with('info', 'Movie successfully deleted!');
    }
}
