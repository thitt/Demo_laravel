<?php

namespace App\Http\Controllers;

use App\Category;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $posts_trash = Posts::withTrashed()
            ->get();

//        $posts = Posts::all();
//        $collection = $posts->reject(function ($user) {
//            return $user->active === 0;
//        })
//        ->map(function ($posts) {
//            return $posts->name;
//        });

//        $contains = $posts->contains(5);
//        $diff = $posts->diff(Posts::where('id', 1)->get());
//        $except = $posts->except(2);
//        $fresh = $posts->fresh();
//        $intersect = $posts->intersect(Posts::whereIn('id', [1, 2, 3])->get());
//        $load = $posts->load('categories');
//        $modelKeys = $posts->modelKeys();
//        $makeVisible = $posts->makeVisible(['name']);
//        $makeHidden = $posts->makeHidden(['name']);
//        $only = $posts->only([1]);

//        $toQuery = $posts->toQuery()->update([
//            'name' => 'Administrator',
//        ]);;

//        $unique = $posts->unique();
//        $test = $posts->newCollection();

//        $belongTo = Posts::find(1)->category;
//        $oneToOne = Category::find(1)->posts;
        $hasMany = Category::find(1)->posts->first();
        $crypt = Crypt::encryptString('1234');
        $hash = Hash::make('1234');
        $crypt_helper = bcrypt('1234');
        $hashed = Hash::make('password', [
            'memory' => 1024,
            'time' => 2,
            'threads' => 2,
        ]);

        $posts = Posts::where('active', ACTIVE)->paginate(LIMIT_PAGINATE);

        return view('posts.index')->with([
            'listPosts' => $posts,
        ]);
    }

    public function create()
    {
        DB::transaction(function () {
            $posts = DB::table('posts')->findOrFail(200);
            $posts->update(['name' => 'abac']);
        });
//        $posts = Posts::where('user_id', 1);
//
//        $posts = $posts->replicate()->fill([
//            'user_id' => 2
//        ]);
//
//        $posts->save();

    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, $id)
    {
//        $request->session()->put('key', 'value');
        session(['key' => 'value']);
        $request->session()->push('user.teams', 'developers');
//        $pull = $request->session()->pull('key', 'default');

        $request->session()->flash('message', 'Task was successful!');
        $request->session()->reflash();
        $request->session()->keep(['message']);

        $value = $request->session()->get('key');
//        $value_2 = $request->session()->get('key', 'default');
//        $value_3 = session('key');
//        $value_4 = session('key', 'default');
//        $value_5 = session(['key' => 'value']);
//        $check_exit = $request->session()->has('users');
//        $check_exit_2 = $request->session()->exists('users');
//        dd($request->session()->get('message'));

//        $request->session()->forget('key');
//        $request->session()->flush();
//        $request->session()->regenerate();



        return redirect()->route('listPosts');
    }

    public function edit($id)
    {
//        $comparing = Posts::find($id);
//        $comparing1 = Posts::find(3);
//        if ($comparing->is($comparing1)) {
//            dd(1);
//        }

        $post = Posts::find($id);
        $user = Auth::user();

        abort_if(!$post, NOT_FOUND);
//        abort_if(!Gate::forUser($user)->allows('update-post', $post), NOT_FOUND);
//        abort_if(!Gate::any(['update-post'], $post), NOT_FOUND);
//        dd($user->can('update-post', $post));
        Gate::authorize('update-post', $post);


        return view('posts.edit')->with([
            'posts' => $post,
        ]);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $post = Posts::withTrashed()->find($id);
//        if ($post->trashed()) {
//            dd(1);
//        }

        //Xoa
//        Posts::destroy($id);

        //Huy xoa
//        $post->restore($id);

        $post->forceDelete();
    }
}
