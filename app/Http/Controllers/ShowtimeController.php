<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ShowtimeRepository;
use App\Repositories\CinemaRepository;

class ShowtimeController extends Controller
{
    protected $showtime;

    function __construct(ShowtimeRepository $showtime, CinemaRepository $cinema)
    {
        $this->showtime = $showtime;
        $this->cinema = $cinema;
        $this->middleware('auth')->except(['show', 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showtimes = $this->showtime->all();
        return view('showtimes.index', compact('showtimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cinemas = $this->cinema->all();
        return view ('showtimes.create', compact('cinemas'));
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
            'start_time' => 'required'
        ]);

        $showtime =  $this->showtime->create($request->all());
        return back()->with('success', 'Showtime created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showtime =  $this->showtime->show($id);
        return view ('showtimes.show', compact('showtime'));
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
        $showtime =  $this->showtime->show($id);
        return view ('showtimes.edit', compact('cinemas', 'showtime'));
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
            'start_time' => 'required'
        ]);
        $this->showtime->update($request->all(), $id);
        return back()->with('success','Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->showtime->delete($id);
        return redirect(route('showtimes.index'))->with('info', 'Showtime deleted successfully');
    }
}
