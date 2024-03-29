<?php

namespace App\Services;
use App\Serie;

class CriadorDeSeries
{
    public function criarSerie(string $nomeSerie, int $qtdTemporada, int $epPorTemporada) : Serie
    {
        $serie = Serie::create(['nome' => $nomeSerie]);
        $qtdTemporadas = $qtdTemporada;
        for ($i = 0; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
    
            for ($j = 1; $j <= $epPorTemporada; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
    
        return $serie;
    
    }
}