<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BandRequest;
use App\Http\Resources\AlbumResource;
use App\Http\Resources\BandResource;
use App\Models\Album;
use App\Models\Band;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;

class BandController extends Controller
{
    public function manage()
    {
        $bands =  Band::latest()->get();

        if (request()->expectsJson()) {
            return Band::latest()->get(['id', 'band_name']);
        }

        return view('admin.band.manage', compact('bands'));

        // Api Response
        return BandResource::collection($bands);
    }

    public function create()
    {
        $genres = Genre::get();

        return view('admin.band.band-create', compact('genres'));
    }

    public function store(BandRequest $request)
    {
        if ($request->file('image')) {
            $bandPoster = $request->file('image')->store('public/images/bands');
        } else {
            $bandPoster = null;
        }

        $band = Band::create([
            'band_name' => request('name'),
            'slug' => Str::slug(request('name')),
            'band_poster' => $bandPoster,
        ]);

        $band->genres()->sync($request->genres);

        return redirect('admin/band/manage')->with('message', 'Created Band ' . $band->band_name . ' Successfully!');

        // Api Response
        return Response::json(['success' => 'true', 'message' => 'Band Created Succesfully', 'created_data' => new BandResource($band)], 200);
    }

    public function detail(Band $band)
    {
        $albums = Album::where('band_id', $band->id)->get();

        return view('admin.band.band-detail', compact('band', 'albums'));

        // Api Response
        return response()->json(['band' => new BandResource($band)], 200);
    }

    public function edit(Band $band)
    {
        $genres = Genre::get();

        return view('admin.band.band-edit', compact('band', 'genres'));
    }

    public function update(BandRequest $request, Band $band)
    {
        $bandPoster = $band->band_poster;

        // Jika ada permintaan kembali image / hashfile
        if ($request->hasFile('image')) {
            Storage::delete($band->band_poster);
            $bandPoster = $request->file('image')->store('public/images/bands');
        }
        $band->update([
            'band_name' => request('name'),
            'slug' => Str::slug(request('name')),
            'band_poster' => $bandPoster
        ]);

        if ($request->genres) {
            $band->genres()->sync($request->genres);
        }

        return redirect('admin/band/manage')->with('message', 'Band ' .$band->band_name. ' Update Succesfully!');

        // Api Response
        return Response::json(['success' => 'true', 'message' => 'Band Updated Successfully!', 'updated_data' => new BandResource($band)],200);
    }

    public function delete(Band $band)
    {
        Storage::delete($band->band_image);
        $band->albums()->delete();
        $band->genres()->detach();
        $band->delete();

        return back();

        // Api Response
        return Response::json(['success' => 'true', 'message' => 'Band ' .$band->band_name. ' Deleted Successfully!', 'deleted_data' => $band->band_name], 200);
    }
}
