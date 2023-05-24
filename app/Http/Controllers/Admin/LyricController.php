<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LyricRequest;
use App\Http\Resources\LyricResource;
use App\Models\Album;
use App\Models\Band;
use App\Models\Lyric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class LyricController extends Controller
{
    public function manage()
    {
        $lyrics = Lyric::all();

        return view('admin.lyric.manage', compact('lyrics'));

        // Api Response
        return LyricResource::collection($lyrics);
    }

    public function create()
    {
        $bands = Band::get();
        $albums = Album::get();

        return view('admin.lyric.lyric-create', compact('bands', 'albums'));
    }

    public function store(LyricRequest $request)
    {
        $band = Band::find($request->band);

        $band->lyrics()->create([
            'album_id' => request('album'),
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'lyric_body' => request('body')
        ]);

        return response()->json(['message', 'lyric ' .$band->band_name. ' berhasil di tambahkan'], 200);
    }

    public function show(Lyric $lyric)
    {
        return view('admin.lyric.lyric-show', compact('lyric'));
    }

    public function edit(Lyric $lyric)
    {
        return view('admin.lyric.lyric-edit', compact('lyric'));
    }

    public function update(Request $request, Lyric $lyric)
    {
        $lyric->update([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'lyric_body' => request('body'),
        ]);

        return redirect('admin/lyric/manage');

        return Response::json(['success' => 'true', 'message' => 'Lyric Updated Successfully!', 'updated_data' => new LyricResource($lyric)], 200);
    }

    public function delete(Lyric $lyric)
    {
        $lyric->delete();

        return back();

        // Api Response
        return response()->json(['message' => 'lyric ' .$lyric->title. ' Deleted Successfully!'], 200);
    }

}
