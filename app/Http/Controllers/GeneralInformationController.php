<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use App\Models\GeneralInformation;
use Illuminate\Http\JsonResponse;

class GeneralInformationController extends Controller
{
    /**
     * Retorna todas as informações gerais da barbearia, incluindo os horários de funcionamento.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Carrega as informações gerais junto com os horários de funcionamento e os dias da semana
        $generalInfo = GeneralInformation::with('openHours.weekDay')->first();

        if (!$generalInfo) {
            return response()->json(['message' => 'Informações gerais não encontradas'], 404);
        }

        // Retorna as informações gerais e os horários
        return response()->json($generalInfo);
    }
}
