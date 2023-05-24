<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function manage()
    {
        $albums = Album::all();

        return view('admin.album.manage', compact('albums'));

        // Api Response
        return AlbumResource::collection($albums);
    }

    public function getALbumByBandId(Band $band)
    {
        return $band->albums;
    }

    public function create()
    {
        $bands = Band::get();

        return view('admin.album.album-create', compact('bands'));
    }

    public function store(AlbumRequest $request)
    {

        if ($request->file('image')) {
            $albumPoster = $request->file('image')->store('public/images/albums');
        } else {
            $albumPoster = null;
        }

        $album = Album::create([
            'band_id' => request('band'),
            'album_name' => request('name'),
            'slug' => Str::slug(request('name')),
            'album_year' => request('year'),
            'album_poster' => $albumPoster,
        ]);

        return redirect('admin/album/manage')->with('message', 'Album ' . $album->album_name . ' Created Succesfully!' );

        // Api Response
        return Response::json(['success' => 'true', 'message' => 'Created Album ' .$album->album_name. ' Successfully!', 'created_data' => new AlbumResource($album)], 200);
    }

    public function detail(Album $album)
    {
        $band = Band::findOrfail($album->band_id);

        return view('admin.album.album-detail', compact('album', 'band'));

        // Api Response
        return new AlbumResource($album);
    }

    public function edit(Album $album)
    {
        $bands = Band::get();

        return view('admin.album.album-edit', compact('album', 'bands'));
    }

    public function update(AlbumRequest $request, Album $album)
    {
        $albumPoster = $album->album_poster;

        if ($request->hasFile('image')) {
            Storage::delete($album->album_poster);
            $albumPoster = $request->file('image')->store('public/images/albums');
        }

        $album->update([
            'band_id' => request('band'),
            'album_name' => request('name'),
            'slug' => Str::slug(request('name')),
            'album_year' => request('year'),
            'album_poster' => $albumPoster,
        ]);

        return redirect('admin/album/manage')->with('message', 'Album ' .$album->album_name. 'Updated Succesfully!');

        // Api Response
        return Response::json(['success' => 'true', 'message' => 'Updated Album ' .$album->album_name. ' Successfullly!', 'updated_data' => new AlbumResource($album)], 200);
    }

    public function delete(Album $album)
    {
        Storage::delete($album->album_poster);
        $album->delete();

        return back();

        // Api Response
        return Response::json(['success' => 'true', 'message' => 'Album ' .$album->album_name. ' Deleted', 'deleted_data' => $album->album_name], 200);
    }
}
