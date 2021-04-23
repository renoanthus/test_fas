<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $path = "images/post/";
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['categories'] = Category::get();
        return view('cms.post.index', $data);
    }
    public function data()
    {
        $data = Post::with('category');
        return datatables()->of($data)
            ->addColumn('action', function ($d) {
                return '
                    <button class="btn btn-xs btn-icon waves-effect waves-light btn-info" onclick="editData(' . $d->id . ')"  data-toggle="tooltip" data-placement="left" title="Edit Data"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-xs btn-icon waves-effect waves-light btn-danger" onclick="deleteData(' . $d->id . ')" data-toggle="tooltip" data-placement="right" title="Delete Data"><i class="fa fa-trash"></i></button>';
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
    public function detail($id)
    {
        $data = Post::find($id);
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        $data['content'] = str_replace('contenteditable="true"', '', $data['content']);
        $data['content'] = str_replace('<input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"', '', $data['content']);
        $data['content'] = str_replace('><a class="ql-action"></a><a class="ql-remove"></a></div>', '', $data['content']);
        if ($request->image) {
            $fileName = $data['slug'] . '-' . time() . '.jpg';
            $image = $request->file('image');
            Image::make($image)->encode('jpg', 20)->save(public_path($this->path) . $fileName, 30);
            $data['image'] = $this->path . $fileName;
            Image::make($image)->resize(320, 240)->encode('jpg', 20)->save(public_path($this->path . 'thumbnail-') . $fileName, 30);
            $data['thumbnail'] = $this->path . 'thumbnail-' . $fileName;
        }
        if (!$request->id) {
            Post::create($data);
            return [
                'status'   => true,
                'response' => 'Success Created Data'
            ];
        } else {
            $post = Post::find($data['id']);
            if ($request->image) {
                if (file_exists($post->image)) {
                    unlink($post->image);
                    unlink($post->thumbnail);
                }
            }
            $post->update($data);
            return [
                'status'   => true,
                'response' => 'Success Updated Data'
            ];
        }
    }
    public function delete(Request $request)
    {
        $post = Post::find($request->id);
        if (file_exists($post->image)) {
            unlink($post->image);
            unlink($post->thumbnail);
        }
        $post->delete();
        return [
            'status' => true,
            'response' => 'Success Deleted Data',
        ];
    }
}
