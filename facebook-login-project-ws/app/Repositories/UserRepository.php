<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 27/03/2017
 * Time: 12:35
 */

namespace app\Repositories;


use Illuminate\Support\Facades\DB;

class UserRepository
{
    protected $TABLE = 'users';

    public function getById($user_id){
        return $this->basicQuery()
            ->where('id', '=', $user_id)
            ->first();
    }
    private function basicQuery(){
        return DB::table($this->TABLE);
    }
}