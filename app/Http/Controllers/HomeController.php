<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Auth::logout();
        // Auth::login(User::first());
        //cette partie du code permet de créer les caches en prenant en compte la 
        //la pagination
        $currentPage = request()->query('page',1);
        $photos = Cache::rememberForever('photos_'.$currentPage , function () {
            return Photo::with('album.user')->orderByDesc('created_at')->paginate();
        });
        //fin
        $data = [
            'title' =>'Photos libres de droit - '. config('app.name'),
            'description' =>'',
            'heading' => config('app.name'),
            'photos' => $photos
        ];
        return view('home.index',$data);
    }
}
