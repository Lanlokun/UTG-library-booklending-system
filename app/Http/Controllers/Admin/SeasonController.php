<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Season;
use App\Models\TvShow;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Request;
use Inertia\Inertia;

class SeasonController extends Controller
{
    public function index(TvShow $tvShow)
    {
        return Inertia::render('TvShows/Seasons/Index', [
            'seasons' => Season::query()->where('tv_show_id', $tvShow->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage']), 'tvShow' => $tvShow
        ]);
    }

    public function store(TvShow $tvShow)
    {
        $season = $tvShow->seasons()->where('season_number', Request::input('seasonNumber'))->exists();
        if ($season) {
            return Redirect::back()->with('flash.banner', 'Season Exists');

        }
        $tmdb_season = Http::asJson()->get(config('services.tmdb.endpoint') . 'tv/' .$tvShow->tmdb_id . '/season/' . Request::input('seasonNumber') . '?api_key=' . config('services.tmdb.secret') . '&language=en-US
                        ');

        if ($tmdb_season->successful()) {
            Season::create([
                'tv_show_id' => $tvShow->id,
                'tmdb_id' => $tmdb_season['id'],
                'name' => $tmdb_season['name'],
                'poster_path' => $tmdb_season['poster_path'],
                'season_number' => $tmdb_season['season_number']

            ]);
            return Redirect::back()->with('flash.banner', 'Season Created');

        }
        return Redirect::back()->with('flash.banner', 'Api Error');

    }

    public function edit(TvShow $tvShow, Season $season)
    {
        return Inertia::render('TvShows/Seasons/Edit', [
            'tvShow' => $tvShow,
            'season' => $season
        ]);
    }

    public function update(TvShow $tvShow, Season $season)
    {
        $validated = Request::validate([
            'name' => 'required | string',
            'poster_path' => 'required | string',
        ]);

        $season->update($validated);

        return redirect()->route('admin.seasons.index', $tvShow->id)->with('flash.banner', 'Season Updated')->with('flashBannerStyle', 'success');
    }

    public function destroy(TvShow $tvShow, Season $season)
    {

        $season->delete();
        return Redirect::back()->with('flash.banner', 'Season Deleted')->with('flash.bannerStyle', 'danger');

    }
}
