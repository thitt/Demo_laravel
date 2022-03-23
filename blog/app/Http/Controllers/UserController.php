<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\OrderShipped;
use App\Mail\UserInformation;
use App\Observers\UserObserver;
use App\Posts;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
//        $this->middleware('auth');
//        $this->middleware('log')->only('index');
//        $this->middleware('subscribed')->only('store');
//        $this->middleware(function ($request, $next) {
//            // ...
//
//            return $next($request);
//        });

        $this->userRepository = $userRepository;
    }

    public function index()
    {
//        abort_if(!Gate::allows('user'), NOT_FOUND);
        abort_if(Gate::denies('user'), NOT_FOUND);
//        abort_if(Gate::forUser($user)->allows('update-post', $post), NOT_FOUND);


        $listUser = DB::table('users')->paginate(LIMIT_PAGINATE);
//        $listUser->withPath('custom/url');

        $count = DB::table('users')->count();
        $max = DB::table('users')->max('id');
        $avg = DB::table('users')->avg('id');
        $checkExit = DB::table('users')->where('name', 'thi1')->exists();
        $checkDoesNtExit = DB::table('users')->where('name', 'thi1')->doesntExist();
        $selectName = DB::table('users')->select('name', 'email as user_email')->get();
        $distinct = DB::table('users')->select('name')->distinct()->get();

        $addSelect = DB::table('users')->select('name');
        $addSelect = $addSelect->addSelect('first_name')->get();

        $rawExpressions = DB::table('users')->select(DB::raw('count(*) as user_active, active'))
            ->groupBy('active')->get();
        $rawMethod = DB::table('users')
            ->selectRaw('active, ? as test', [2])
            ->get();
        $crossJoin = DB::table('users')->crossJoin('failed_jobs')->get();

        $joinSub = DB::table('users');
        $joinMain = DB::table('failed_jobs')->joinSub($joinSub, 'users', function ($join) {
            $join->on('users.id', 'failed_jobs.id');
        })->toSql();

        $unionFirst = DB::table('users')->where('active', 1);
        $union = DB::table('users')->where('active', 0)
            ->union($unionFirst)
            ->get();

        $whereMulti = DB::table('users')->where([
            ['active', 1],
            ['name', 'thi'],
        ])->get();

        $whereDate = DB::table('users')
            ->whereDate('created_at', '2022-02-17')
            ->get();

        $whereColumn = DB::table('users')
            ->whereColumn('name', 'last_name')
            ->get();

        $whereColumn2 = DB::table('users')
            ->whereColumn([
                ['name', '=', 'last_name'],
                ['updated_at', '>', 'created_at'],
            ])->get();

        $whereExit = DB::table('users')
            ->whereExists(function ($query) {
               $query->select(DB::raw(1))
                   ->from('failed_jobs')
                   ->whereRaw('users.id = failed_jobs.id');
            })->toSql();

        $whereSub = User::where(function ($query) {
            $query->select('id')
                ->from('failed_jobs')
                ->whereColumn('users.id', 'failed_jobs.id')
                ->orderByDesc('id')
                ->limit(1);
        }, 'pro')->get();

//        $whereLanguage = DB::table('users')
//            ->whereJsonContains('name->language', 'en')
//            ->get();

        $latest = DB::table('users')
            ->latest()->first();

        $randomUser = DB::table('users')
            ->inRandomOrder()
            ->first();

        $order = DB::table('users')->orderBy('name');
        $unorderedUsers = $order->reorder('email', 'desc')->get();

        $skipTake = DB::table('users')->skip(0)->take(1)->get();

        $offsetLimit = DB::table('users')
            ->offset(1)
            ->limit(5)
            ->get();

        $role = 'thi';
        $conditional = DB::table('users')
            ->when($role, function ($query, $role) {
                return $query->where('name', $role);
            })
            ->get();

        $conditional2 = DB::table('users')
            ->when($role, function ($query, $role) {
                return $query->where('name', $role);
            }, function ($query) {
                return $query->where('id', 1);
            })->get();

        return view('user.index', [
            'listUser' => $listUser,
            'count' => $count,
        ]);
    }

    public function create(Request $request)
    {
        if ($request->route()->named('createUser1')) {
            dd(1);
        }
        $user = new User;
        $user->fill(['name' => 'Flight 22']);

        return view('user.create');
    }

    public function edit($id)
    {
        $response = Gate::inspect('edit-user');

        if (!$response->allowed()) {
            dd($response->message());
        }

//        $userInfo = DB::table('users')->where('id', $id)->first();
//        $userInfo = Db::table('users')->value('email');
        $userInfo = DB::table('users')->find($id);
//        $arrayName = DB::table('users')->pluck('name', 'id');
//
//        DB::table('users')->orderBy('id')->chunk(100, function ($users) {
//            foreach ($users as $user) {
//                dd($user);
//            }
//        });

//        DB::table('users')->increment('gender');
//        DB::table('users')->decrement('gender');
//        DB::table('users')->increment('gender', 1, ['name' => 'John']);

//        DB::table('users')->where('gender', 1)->sharedLock()->get();
//        DB::table('users')->where('gender', 1)->lockForUpdate()->get();

//        DB::table('users')->where('gender', 1)->dd();
//        DB::table('users')->where('gender', 1)->dump();

//        if (Schema::hasColumn('users', 'email')) {
//            dd(1);
//        }

//        Schema::connection('foo')->create('users', function (Blueprint $table) {
//            $table->id();
//        });

//        $constraints = User::where('active', 1)
//            ->orderBy('name', 'desc')
//            ->first();
//        $constraints->name = 'thitt';
//        $freshUser = $constraints->refresh();

//        $user = DB::table('users');
//        $collection = $user->reject(function ($flight) {
//            return $flight->cancelled;
//        });

//        User::chunk(200, function ($users) {
//            foreach ($users as $user) {
//                dd($user);
//            }
//        });

//        $subQuery = Posts::addSelect(['name' => User::select('name')
//            ->whereColumn('users.id', 'user_id')
//            ->limit(1)
//        ])->get();

//        $model = User::where('active', 2)->firstOrFail();

//        foreach (User::where('active', 1)->cursor() as $users) {
//            dd($users);
//        }

        return view('user.edit', [
            'userInfo' => $userInfo,
        ]);
    }

    public function update(Request $request, $id)
    {
        $params = $request->all();
//        DB::table('users')->where('active', false)
//            ->chunkById(100, function ($users) {
//                foreach ($users as $user) {
//                    DB::table('users')
//                        ->where('id', $user->id)
//                        ->update(['active' => true]);
//                }
//            });

//        $affected = DB::table('users')
//            ->where('id', 1)
//            ->update(['first_name' => 'Thithi']);

        DB::table('users')
            ->updateOrInsert(
                ['email' => $params['email'], 'name' => $params['name']],
                [
                    'membership' => $params['membership'],
                    'first_name' => $params['first_name'],
                    'last_name' => $params['last_name'],
                    'password' => bcrypt($params['password']),
                    'birth_day' => date("Y-m-d H:i:s", strtotime($params['birth_day'])),
                    'address' => $params['address'],
                    'active' => $params['active'],
                ]
            );


        return redirect()->route('listUser');
    }

    public function show($id)
    {
//        $user = User::withoutEvents(function () use ($id) {
//            User::findOrFail($id)->delete();
//
//            return User::find($id);
//        });

        $belongsToMany = User::find($id);
//        dd($belongsToMany->posts()->orderBy('id')->get());
        dd($belongsToMany->posts);
//        foreach ($belongsToMany->posts as $value) {
//            dd($value->category);
//        }


        view('user.profile');
    }

    public function store(Request $request)
    {
        $params = $request->all();
        $data = [
            'name' => $params['name'],
            'membership' => $params['membership'],
            'first_name' => $params['first_name'],
            'last_name' => $params['last_name'],
            'email' => $params['email'],
            'password' => bcrypt($params['password']),
            'birth_day' => date("Y-m-d H:i:s", strtotime($params['birth_day'])),
            'address' => $params['address'],
            'active' => $params['active'],
//            [
//                'name' => $params['name'],
//                'membership' => $params['membership'],
//                'first_name' => $params['first_name'],
//                'last_name' => $params['last_name'],
//                'email' => $params['email'],
//                'password' => bcrypt($params['password']),
//                'birth_day' => date("Y-m-d H:i:s", strtotime($params['birth_day'])),
//                'address' => $params['address'],
//                'active' => $params['active'],
//            ]
        ];

//        $id = DB::table('users')->insertGetId($data);

//        $user = new User;
//        $user->name = $params['name'];
//        $user->membership = $params['membership'];
//        $user->first_name = $params['first_name'];
//        $user->last_name = $params['last_name'];
//        $user->email = $params['email'];
//        $user->password = bcrypt($params['password']);
//        $user->birth_day = date("Y-m-d H:i:s", strtotime($params['birth_day']));
//        $user->address = $params['address'];
//        $user->active = $params['active'];
//        $user->save();

//        $user = User::firstOrCreate($data);
        $user = User::firstOrNew($data);

        return redirect()->route('listUser');
    }

    public function delete($id)
    {
//        DB::table('users')->where('id', $id)->delete();
        User::destroy($id);
//        UserObserver::deleted($id);

        return redirect()->route('listUser');
    }

    public function sendMail($id)
    {
        $when = now()->addMinutes(10);
        $user = User::find($id);
//        Mail::to($user->email)->send(new OrderShipped($user));
//        Mail::to($user->email)->queue(new UserInformation());
        Mail::send(new UserInformation());
        Session::flash('flash_message', 'Send message successfully!');

        return redirect()->route('listUser');

//        return (new UserInformation())->locale('vn')
//            ->render();
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}
