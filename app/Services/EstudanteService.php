<?php

namespace App\Services;

use App\Repositories\EstudanteRepository;
use App\Repositories\PessoaRepository;
use Illuminate\Support\Facades\DB;

class EstudanteService
{

    protected $estudanteRepository;
    protected $pessoaRepository;

    public function __construct(
        EstudanteRepository $estudanteRepository,
        PessoaRepository $pessoaRepository
    ) {
        $this->estudanteRepository = $estudanteRepository;
        $this->pessoaRepository = $pessoaRepository;
    }


    public function getInfoForIndexView()
    {
        $estudantes = $this->estudanteRepository->findAll();

        $title = "Estudante";
        $menu = "Estudante";
        $submenu = "Listar";
        $type = "estudantes";

        return compact('title', 'menu', 'submenu', 'type', 'estudantes');
    }

    public function getInfoForCreateView()
    {
        $title = "Estudante";
        $menu = "Estudante";
        $submenu = "Novo";
        $type = "estudantes";

        return compact('title', 'menu', 'submenu', 'type');
    }

    public function getInfoForShowView(string $id)
    {
        $estudante = $this->estudanteRepository->findOrFail($id);

        $title = "Estudante";
        $menu = "Estudante";
        $submenu = "Detalhes";
        $type = "estudantes";

        return compact('title', 'menu', 'submenu', 'type', 'estudante');
    }

    public function getInfoForEditView(string $id)
    {
        $estudante = $this->estudanteRepository->findOrFail($id);

        $title = "Estudante";
        $menu = "Estudante";
        $submenu = "Editar";
        $type = "estudantes";

        return compact('title', 'menu', 'submenu', 'type', 'estudante');
    }

    public function store(array $data)
    {
        $pessoaData = [
            'nome' => $data['nome'],
            'data_de_nascimento' => $data['data_de_nascimento'],
        ];

        $estudanteData = [
            'pessoa_id' => null,
            'turma' => $data['turma'],
        ];

        return DB::transaction(function () use ($pessoaData, $estudanteData) {
            $pessoa = $this->pessoaRepository->create($pessoaData);
            $estudanteData['pessoa_id'] = $pessoa->id;
            $this->estudanteRepository->create($estudanteData);
        });
    }

    public function update(array $data, string $id)
    {
        $estudante = $this->estudanteRepository->findOrFail($id);

        $pessoaData = [
            'nome' => $data['nome'],
            'data_de_nascimento' => $data['data_de_nascimento'],
        ];

        $estudanteData = [
            'turma' => $data['turma'],
        ];

        return DB::transaction(function () use ($pessoaData, $estudanteData, $estudante) {
            $this->pessoaRepository->update($pessoaData, $estudante->pessoa_id);
            $this->estudanteRepository->update($estudanteData, $estudante->id);

            return true;
        });
    }

    public function destroy(string $id)
    {
        $estudante = $this->estudanteRepository->findOrFail($id);

        return DB::transaction(function () use ($estudante) {
            $this->estudanteRepository->delete($estudante->id);
            $this->pessoaRepository->delete($estudante->pessoa_id);

            return true;
        });
    }
}
