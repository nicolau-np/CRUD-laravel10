<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudanteStoreRequest;
use App\Http\Requests\EstudanteUpdateRequest;
use App\Services\EstudanteService;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{

    private $estudanteService;

    public function __construct(EstudanteService $estudanteService)
    {
        $this->estudanteService = $estudanteService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infoForView = $this->estudanteService->getInfoForIndexView();

        return view('estudante.index', $infoForView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $infoForView = $this->estudanteService->getInfoForCreateView();

        return view('estudante.create', $infoForView);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstudanteStoreRequest $estudanteStoreRequest)
    {
        dd($estudanteStoreRequest->all());
        $response = $this->estudanteService->store($estudanteStoreRequest->all());
        if ($response) {
            return back()->with('success', "feito com sucesso");
        }
        return back()->with('error', "nao foi possivel");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $infoForView = $this->estudanteService->getInfoForShowView($id);

        return view('estudante.show', $infoForView);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $infoForView = $this->estudanteService->getInfoForEditView($id);

        return view('estudante.edit', $infoForView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstudanteUpdateRequest $estudanteUpdateRequest, string $id)
    {
        $response = $this->estudanteService->store($estudanteUpdateRequest->all(), $id);
        if ($response) {
            return back()->with('success', "feito com sucesso");
        }
        return back()->with('error', "nao foi possivel");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->estudanteService->destroy($id);
        if ($response) {
            return back()->with('success', "feito com sucesso");
        }
        return back()->with('error', "nao foi possivel");
    }
}
