<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('cms.category.index');
    }
    public function data()
    {
        $data = Category::orderBy('created_at', 'desc');
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
        $data = Category::find($id);
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);
        if (!$request->id) {
            Category::create($data);
            return [
                'status'   => true,
                'response' => 'Success Created Data'
            ];
        } else {
            Category::find($data['id'])->update($data);
            return [
                'status'   => true,
                'response' => 'Success Updated Data'
            ];
        }
    }
    public function delete(Request $request)
    {
        Category::find($request->id)->delete();
        return [
            'status' => true,
            'response' => 'Success Deleted Data',
        ];
    }
}
