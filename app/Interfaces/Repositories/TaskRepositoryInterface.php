<?php

namespace App\Interfaces\Repositories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public function getByUser(User $user):Collection;

    public function getAll():Collection;

    public function get(int $id):?Task;

    public function add(array $data):?Task;

    public function update(int $id, array $data):?Task;

    public function delete(int $id):bool;
}
