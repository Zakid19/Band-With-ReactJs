<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function manage()
    {
        $genres = Genre::limit(10)->latest()->get();

        return view('admin.genre.manage', compact('genres'));
        return GenreResource::collection($genres);
    }

    public function create()
    {
        return view('admin.genre.genre-create');
    }

    public function store(GenreRequest $request)
    {
        $genre = Genre::create([
            'genre_name' => request('name'),
            'slug' => Str::slug(request('name'))
        ]);

        return redirect('admin/genre/manage')->with('message', 'New Genre Add Successfully!');

        return Response::json(['success' => 'true', 'message' => 'Genre ' .$genre->genre_name. ' Added Successfully!', 'created_data' => new GenreResource($genre)], 200);
    }

    public function detail(Genre $genre)
    {
        return view('admin.genre.genre-detail', compact('genre'));
        return new GenreResource($genre);
    }

    public function edit(Genre $genre)
    {
        return view('admin.genre.genre-edit', compact('genre'));
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update([
            'genre_name' => request('name'),
            'slug' => Str::slug(request('name')),
        ]);

        // return redirect('admin/genre/manage')->with('message', 'Genre Updated Successfully');

        return Response::json(['success' => 'true', 'message' => 'Genre ' .$genre->genre_name. ' Updated Successfully!', 'updated_data' => new GenreResource($genre)], 200);
    }

    public function delete(Genre $genre)
    {
        $genre->delete();

        return back()->with('message', 'Genre Deleted Successfully!');
    }
}
