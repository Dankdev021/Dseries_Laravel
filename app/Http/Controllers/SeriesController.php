<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;
use App\Services\CriadorDeSeries;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSeries $criadorDeSerie)
    {

        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );


        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->nome} e suas temporadas e episódios criados com sucesso"
            );

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request)
    {
        $serie = Serie::find($request->id);
        $nomeSerie = $serie->nome;
        $serie->temporadas->each(function ($temporada){

            $temporada->episodios->each(function ($episodios){
                $episodios->delete();
            });
            $temporada->delete();
        });
        $serie->delete();
        Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "A Série $nomeSerie removida com sucesso"
            );
        return redirect()->route('listar_series');
    }
}
