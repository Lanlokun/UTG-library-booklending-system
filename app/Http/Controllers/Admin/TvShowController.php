<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\TvShow;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Inertia\Inertia;

use Request;

class TvShowController extends Controller
{
    public function index()
    {

        return Inertia::render('TvShows/Index', [
            'tv_shows' => TvShow::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public function store()
    {


        $tv_show = TvShow::where('tmdb_id', Request::input('tvShowTMDBId'))->first();
        if ($tv_show) {
            return redirect(route('admin.tv-shows.index'))->with('flash.banner', 'Tv Show Exists');

        }
        $tmdb_tv_show = Http::asJson()->get(config('services.tmdb.endpoint') . 'tv/' . Request::input('tvShowTMDBId') . '?api_key=' . config('services.tmdb.secret') . '&language=en-US
                        ');

        if ($tmdb_tv_show->successful()) {
            TvShow::create([
                'tmdb_id' => $tmdb_tv_show['id'],
                'name' => $tmdb_tv_show['name'],
                'poster_path' => $tmdb_tv_show['poster_path'],
                'created_year' => $tmdb_tv_show['first_air_date']

            ]);
            return redirect(route('admin.tv-shows.index'))->with('flash.banner', 'Tv Show Created');

        }
    }

    public function  edit(TvShow $tvShow)
    {
        return Inertia::render("TvShows/Edit", ['tvShow' => $tvShow]);
    }

    public function update(TvShow $tvShow)
    {
        $validated = Request::validate([
            'name' => 'required | string',
            'poster_path' => 'required | string',
        ]);

        $tvShow->update($validated);

        return redirect()->route('admin.tv-shows.index')->with('flash.banner', 'Tv Show Updated')->with('flashBannerStyle', 'success');
    }

    public function destroy(TvShow $tvShow)
    {

        $tvShow->delete();
        return redirect()->route('admin.tv-shows.index')->with('flash.banner', 'Tv Show Deleted')->with('flash.bannerStyle', 'danger');

    }
}
