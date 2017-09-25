<?php

namespace App\Http\Controllers;

use App\Track;
use Illuminate\Http\Request;

class TracksController extends Controller
{
    public function __construct()
    {
        $this->middleware('access_token');
    }

    public function index(Request $request)
    {
        $tracks = Track::whereHas('channel', function ($query) use ($request) {
            $query->where('user_id', $request->user()->id);
        })->with('channel')->orderBy('created_at', 'desc')->paginate(20);

        return view('tracks.index', [
            'tracks' => $tracks,
        ]);
    }
}