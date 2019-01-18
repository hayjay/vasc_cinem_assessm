<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ShowtimeRepository;

class ShowtimesController extends Controller
{
    protected $showtime;

    function __construct(ShowtimeRepository $showtime)
    {
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
        return view ('showtimes.create')
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
            'title' => 'required|alpha|max:180'
            'start_time' => 'required|time'
        ]);

        $showtime =  $this->showtime->create($request->all());
        return back()->with('Showtime created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showtime =  $this->showtime->show($id)->with('movies');
        return view ('showtimes.show', compact('showtimes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view ('showtimes.edit')
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
            'title' => 'required|alpha|max:180'
            'start_time' => 'required|time'
        ]);
        $this->showtime->update($request->all(), $id);
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
        $this->showtime->delete($id);
        return redirect('/showtime');
    }
}
