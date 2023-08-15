<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified'])->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//liste des albums de l'utilisateur connecté
    {
        //recupere les albums ainsi que leurs photos active comme non active 
        // $albums = auth()->user()->albums()->with('photos',function($query){
        //     $query->withoutGlobalScope('active')->orderByDesc('created_at');
        // })->orderByDesc('updated_at')->paginate();

        //ecriture simplifier 
        $albums = auth()->user()->albums()->with('photos',fn($query) =>$query->withoutGlobalScope('active')
        ->orderByDesc('created_at'))->orderByDesc('updated_at')->paginate();
        $data = [
            'title' => $description = 'Mes albums',
            'albums' => $albums,
            'heading' => $description 
        ];
        return view('albums.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
