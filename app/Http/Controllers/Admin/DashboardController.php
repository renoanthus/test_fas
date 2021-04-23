<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
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
        $data['post_count'] = Post::count();
        $data['category_count'] = Category::count();
        return view('cms.dashboard.index', $data);
    }
    public function changePassword(Request $request)
    {
        // return $request->all();

        $rules = [
            'current_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {
            $data = User::where('id', Auth::user()->id)->first();
            // return $request->current_password;
            if ($data->password) {
                $cek = Hash::check($request->current_password, $data->password);
                if ($cek) {
                    $data->update(['password' => Hash::make($request->password)]);
                    Alert::success('Success', 'Password has updated');
                    return redirect()->back();
                } else {
                    Alert::warning('Failed', 'Password confirmation invalid');
                    return redirect()->back();
                }
            } else {
                $data->update(['password' => Hash::make($request->password)]);
                Alert::success('Success', 'Password has updated');
                return redirect()->back();
            }
        }
        // if ($validator->fails()) {
        //     return [
        //         'status'   => false,
        //         'response' => 'Validation Error'
        //     ];
        // } else {
        //     // return $request->all();
        //     $data = User::find(Auth::user()->id);
        //     // return $data->password;
        //     $cek = Hash::check($request->current_password, $data->password);
        //     // return $cek;
        //     if ($cek || $data->password) {
        //         $data->update(['password' => Hash::make($request->password)]);
        //         return [
        //             'status'   => true,
        //             'response' => 'Change password success'
        //         ];
        //     } else {
        //         return [
        //             'status'   => false,
        //             'response' => 'Password confirmation not valid'
        //         ];
        //     }
        // }
    }
}
