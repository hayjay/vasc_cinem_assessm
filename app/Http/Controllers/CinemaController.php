<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CinemaRepository;

class CinemaController extends Controller
{
    protected $cinema;

    function __construct(CinemaRepository $cinema)
    {
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
        $cinemas = $this->cinema->all();
        return view('cinema.index', compact('cinemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cinema.create');
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
            'name' => 'required|alpha|max:180',
            'address' => 'required'
        ]);

        $cinema =  $this->cinema->create($request->all());
        return back()->with('Cinema created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cinema =  $this->cinema->show($id)->with('movies.showtimes');
        return view ('cinema.show', compact('movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('cinema.edit');
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
            'name' => 'required|alpha|max:180',
            'address' => 'required'
        ]);
        $this->cinema->update($request->all(), $id);
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
        $this->cinema->delete($id);
        return redirect('/cinema');
    }
}
