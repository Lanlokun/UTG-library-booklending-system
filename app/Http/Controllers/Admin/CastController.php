<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Tag;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Request;
class CastController extends Controller
{
    public function index()
    {
        return Inertia::render('Cast/Index', [
            'casts' => Cast::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public function store(){

        $cast = Cast::where('tmdb_id', Request::input('castTMDBId'))->first();
        if($cast){
            return redirect(route('admin.casts.index'))->with('flash.banner', 'Cast Exists');

        }
        $tmdb_cast = Http::asJson()->get(config('services.tmdb.endpoint').'person/'. Request::input('castTMDBId') . '?api_key='. config('services.tmdb.secret') . '&language=en-US');

        if ($tmdb_cast->successful()) {
            Cast::create([
                'tmdb_id' => $tmdb_cast['id'],
                'name'    => $tmdb_cast['name'],
                'slug'    => Str::slug($tmdb_cast['name']),
                'poster_path' => $tmdb_cast['poster_path'],
            ]);
            return redirect(route('admin.casts.index'))->with('flash.banner', 'Cast Created');

        }
        else {
            return redirect(route('admin.casts.index'))->with('flash.banner', 'Api Error ');
        }
    }

    public function edit(Cast $cast)
    {
        return Inertia::render('Cast/Edit', ['cast' => $cast]);
    }

    public function update(Cast $cast)
    {
        $validated = Request::validate([
            'name' => 'required | string',
            'poster_path' => 'required | string'
    ]);
        $cast->update($validated);

        return Redirect::route('admin.casts.index')->with('flash.banner', 'Cast Updated');
    }

    public function destroy(Cast $cast)
    {
        $cast->delete();

        return Redirect::back()->with('flash.banner', 'Cast Deleted')->with('flash.bannerStyle', 'danger');;
    }
}
