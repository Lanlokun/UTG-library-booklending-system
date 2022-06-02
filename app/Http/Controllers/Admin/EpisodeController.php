<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Season;
use App\Models\TvShow;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Request;
use Inertia\Inertia;

class EpisodeController extends Controller
{
    public function index(TvShow $tvShow, Season $season)
    {
        return Inertia::render('TvShows/Seasons/Episodes/Index', [
            'episodes' => Episode::query()->where('season_id', $season->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage']),
            'tvShow' => $tvShow,
            'season' => $season
        ]);
    }

    public function store(TvShow $tvShow, Season $season)
    {
        $episode = $season->episode()->where('episode_number', Request::input('episodeNumber'))->exists();
        if($episode){
            return Redirect::back()->with('flash.banner', 'Episode exists');
        }

        $tmdb_episode= Http::asJson()->get(config('services.tmdb.endpoint') . 'tv/' .$tvShow->tmdb_id . '/season/' . $season->season_number . '/episode/' . Request::input('episodeNumber') .   Request::input('seasonNumber') . '?api_key=' . config('services.tmdb.secret') . '&language=en-US
                        ');
        if ($tmdb_episode->successful()) {
            Episode::create([
                'season_id' => $season->id,
                'tmdb_id' => $tmdb_episode['id'],
                'name' => $tmdb_episode['name'],
                'episode_number' => $tmdb_episode['episode_number'],
                'overview' => $tmdb_episode['overview'],
                'is_public' => false,
                'visits' => 1

            ]);
            return Redirect::back()->with('flash.banner', 'Episode Created');

        }
        return Redirect::back()->with('flash.banner', 'Api Error');

    }

    public function edit(TvShow $tvShow, Season $season, Episode $episode)
    {
        return Inertia::render('TvShows/Seasons/Episodes/Edit', [
            'tvShow' => $tvShow,
            'season' => $season,
            'episode' => $episode
        ]);
    }

    public function update(TvShow $tvShow, Season $season, Episode $episode)
    {
        $validated = Request::validate([
            'name' => 'required',
            'overview' => 'string',
            'is_public' => 'required'

        ]);

        $episode->update($validated);

        return Redirect::back()->with('flash.banner', 'Episode Updated');
    }

    public function destroy(TvShow $tvShow, Season $season, Episode $episode)
    {

        $episode->delete();
        return Redirect::back()->with('flash.banner', 'Episode Deleted')->with('flash.bannerStyle', 'danger');

    }
}
