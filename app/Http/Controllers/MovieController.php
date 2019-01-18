<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\MovieRepository;

class MoviesController extends Controller
{
    protected $movie;

    function __construct(MovieRepository $movie)
    {
        $this->movie = $movie;
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
        return view('movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('movie.create')
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
            'name' => 'required|alpha|max:180'
        ]);

        $movie =  $this->movie->create($request->all());
        return back()->with('Movie created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie =  $this->movie->show($id)->with('showtimes.cinema');
        return view ('movie.show', compact('movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('movie.edit')
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
            'name' => 'required|alpha|max:180'
        ]);
        $this->movie->update($request->all(), $id);
        return back()->with('Update successfully!');
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
        return redirect('/movie');
    }
}
