<?php
namespace App\Htt\Repositories\UserRepositories;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\UserRepostiories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function  __construct(User $model)
    {
        parent::__construct($model);
    }
    public function create($request){
        $this->model->name = $request->name;
        $this->model->email = $request->email;
        $this->model->password = $request->password;

        $this->model->save();
    }
    public function update($requets, $obj){
        $obj->model->name = $requets->name;
        $obj->model->email = $requets->email;
        $obj->model->password = $requets->password;

        $obj->save();
    }
}
