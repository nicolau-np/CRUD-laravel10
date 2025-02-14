<?php

namespace App\Repositories;

use App\Interfaces\CRUDInterface;
use App\Models\Estudante;

class EstudanteRepository implements CRUDInterface
{
    protected $model;

    public function __construct(Estudante $estudante)
    {
        $this->model = $estudante;
    }

    public function findAll()
    {
        return $this->model->all();
    }
    public function findOrFail(string $id)
    {
        return $this->model->findOrFail($id);
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update(array $data, string $id)
    {
        $this->model->findOrFail($id)->update($data);
    }
    public function delete(string $id)
    {
        $this->model->findOrFail($id)->delete();
    }
}
