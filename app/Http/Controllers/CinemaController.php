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
        return view('cinemas.index', compact('cinemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cinemas.create');
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
            'address' => 'required'
        ]);

        $cinema =  $this->cinema->create($request->all());
        return back()->with('success', 'Cinema created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cinema =  $this->cinema->showWithRelations($id, 'movies.showtimes');
        return view ('cinemas.show', compact('cinema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cinema =  $this->cinema->show($id);
        return view ('cinemas.edit', compact('cinema'));
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
            'address' => 'required'
        ]);
        $this->cinema->update($request->all(), $id);
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
        $this->cinema->delete($id);
        return redirect(route('cinemas.index'))->with('info', 'Cineme deleted successfully');
    }
}
