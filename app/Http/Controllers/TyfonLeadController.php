<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TyfonLead;
use App\Models\TyfonUser;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class TyfonLeadController extends Controller
{
    /**
     * Store a new lead in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        App::setLocale('it');

        // Valida i dati del form

        $validatedData = $request->validate([
            'codiceMetanoNord' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'cf' => 'nullable|string|max:16',
            'ragsoc' => 'nullable|string|max:255',
            'piva' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'indirizzo' => 'required|string|max:255',
            'civico' => 'required|string|max:255',
            'cap' => 'required|string|max:5',
            'comune' => 'required|string|max:255',
            'provincia' => 'required|string|max:2',
            'codiceVenditore' => 'nullable|string|max:255',
            'tipologiaProdotto' => 'required|string|max:255',
            'tipo_intervento' => 'required|string|max:255',
            'tipo_utenza' => 'required|string|max:255',
            'note' => 'nullable|string|max:255'

        ]);

        // Prepara l'URL e le credenziali per l'API
        $apiUrl = 'http://tyfon.io/leads/insertLeadMetanoNordService';
        $username = 'MetanoNord'; // Sostituisci con il tuo username
        $password = 'ty_HKSmAeCEhWwhI3Yl37NaoE3O22Ty2oQ3K2'; // Sostituisci con la tua password

        // Invia i dati all'API
        $response = Http::withBasicAuth($username, $password)->asForm()->post($apiUrl, $validatedData);

        // Gestisci la risposta
        if ($response->successful()) {
            TyfonLead::create($validatedData);
            $leadId = $response->json()['idLead'] ?? null;

            if ($leadId) {
                // Aggiungi l'id_lead ai dati validati
                $userData = array_merge($validatedData, ['id_lead' => $leadId]);

                // Crea un nuovo TyfonUser con i dati validati e l'id_lead
                TyfonUser::create($userData);

                return response()->json([
                    'success' => true,
                    'message' => 'Lead salvato con successo!',
                    'leadId' => $leadId
                ]);
            } else {
                // Ottieni l'array della risposta JSON dell'API
                $errorInfo = $response->json();

                // Estrai il messaggio di errore
                $errorMessage = $errorInfo['message'] ?? 'Errore sconosciuto nell\'invio dei dati';

                return response()->json(['success' => false, 'message' => $errorMessage]);
            }
        }
    }
}
