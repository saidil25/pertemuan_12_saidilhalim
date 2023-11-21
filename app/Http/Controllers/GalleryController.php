<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
     /**
     * @OA\Get(
     *     path="/api/gallery",
     *     tags={"gallery"},
     *     summary="Mengambil data gallery untuk API",
     *     description="Endpoint untuk mendapatkan data gallery dalam format JSON",
     *     @OA\Response(response="200", description="Sukses"),
     * )
     */
    public function getApiGallery()
    {
        $galleries = Post::where('picture', '!=', '')->whereNotNull('picture')->orderBy('created_at', 'desc')->paginate(30);
        return response()->json($galleries, 200);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = array(
            'id' => "posts",
            'menu' => 'Gallery',
            'galleries' => Post::where('picture', '!=',
           '')->whereNotNull('picture')->orderBy('created_at', 'desc')->paginate(30)
            );
            return view('gallery.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);
        
        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);
        } else {
            $filenameSimpan = 'noimage.png';
        }
        
        $post = new Post;
        $post->picture = $filenameSimpan;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();
        
        return redirect('gallery')->with('success', 'Berhasil menambahkan data baru');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Post::find($id);
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $this->validate($request, [
        'title' => 'required|max:255',
        'description' => 'required',
        'picture' => 'image|nullable|max:1999'
    ]);

    $gallery = Post::find($id);

    if ($request->hasFile('picture')) {
        $filenameWithExt = $request->file('picture')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('picture')->getClientOriginalExtension();
        $basename = uniqid() . time();
        $smallFilename = "small_{$basename}.{$extension}";
        $mediumFilename = "medium_{$basename}.{$extension}";
        $largeFilename = "large_{$basename}.{$extension}";
        $filenameSimpan = "{$basename}.{$extension}";
        $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);
    } else {
        $filenameSimpan = 'noimage.png';
    }

    $gallery->picture = $filenameSimpan;
    $gallery->title = $request->input('title');
    $gallery->description = $request->input('description');
    $gallery->save();

    return redirect('gallery')->with('success', 'Berhasil memperbarui data.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Post::find($id);
    
    $gallery->delete();

    return redirect('gallery')->with('success', 'Gambar telah dihapus.');
    }
}
