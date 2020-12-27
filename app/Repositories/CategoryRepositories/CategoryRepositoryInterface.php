<?php
namespace App\Http\Repositories\CategoryRepositories;

use App\Http\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function create($request);

    public function update($request, $obj);
}
