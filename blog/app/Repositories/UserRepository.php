<?php


namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class UserRepository
{

    public function __invoke()
    {
        DB::table('users')->update(['active' => NOT_ACTIVE]);
    }
}
