@php
    use Illuminate\Support\Facades\DB;
    $cf = $collection->cf; 
    $results = DB::select("SELECT * FROM MNS_APPUNTAMENTI WHERE cf = :cf", ['cf' => $cf]);
@endphp
<h1 style="text-align: center; font-weight: 900; font-size: 35px">Appuntamenti:</h1>
<table>
    <thead>
        <tr>
            <th>ID Appuntamento</th>
            <th>Data Appuntamento</th>
            <th>Tecnico</th>
            <th>Note</th>
            <th>Stato Segnalazione</th>
            <th>Annullato</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $result)
            <tr>
                <td style="text-align: center">{{ $result->idappuntamento }}</td>
                <td style="text-align: center">{{ $result->dataappuntamento }}</td>
                <td style="text-align: center">{{ $result->tecnico }}</td>
                <td style="text-align: center">{{ $result->note }}</td>
                <td style="text-align: center">{{ $result->statosegnalazione }}</td>
                <td style="text-align: center">{{ $result->annullato }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<br>
<br>
<h1 style="text-align: center; font-weight: 900; font-size: 35px">Interventi degli Appuntamenti:</h1>
<table>
<thead>
    <tr>
        <th>ID Appuntamento</th>
        <th>ID ORDINE</th>
        <th>ID INTERVENTO</th>
        <th>TIPO INTERVENTO</th>
        <th>ESITO INTERVENTO</th>
        <th>STATO INTERVENTO</th>
    </tr>
</thead>
<tbody>
        @foreach ($results as $result)
            @php
                $interventions = DB::select("SELECT * FROM MNS_INTERVENTI WHERE idappuntamento = :idappuntamento", ['idappuntamento' => $result->idappuntamento]);
            @endphp
        @foreach ($interventions as $intervention)
            <tr>
                <td style="text-align: center">{{ $intervention->idappuntamento }}</td>
                <td style="text-align: center">{{ $intervention->idordine }}</td>
                <td style="text-align: center">{{ $intervention->idintervento }}</td>
                <td style="text-align: center">{{ $intervention->tipointervento }}</td>
                <td style="text-align: center">{{ $intervention->esitointervento }}</td>
                <td style="text-align: center">{{ $intervention->statointervento }}</td>
            </tr>
        @endforeach
        @endforeach
    </tbody>
</table>
<br>
<br>
<br>
<h1 style="text-align: center; font-weight: 900; font-size: 35px">Prodotti degli Interventi:</h1>
<table>
<thead>
    <tr>
        <th>ID Intervento</th>
        <th>Descrizione</th>
        <th>Tipologia</th>
        <th>Quantità</th>
        <th>Cd_ARGruppo2</th>
    </tr>
</thead>

<tbody>
        @foreach ($interventions as $intervention)
            @php
                $interventionproducts = DB::select("SELECT * FROM MNS_PRODOTTI_INTERVENTI WHERE idintervento = :idintervento", ['idintervento' => $intervention->idintervento]);
            @endphp
            @if (count($interventionproducts)>0)
        @foreach ($interventionproducts as $interventionproduct)
            <tr>
                <td style="text-align: center">{{ $interventionproduct->idintervento }}</td>
                <td style="text-align: center">{{ $interventionproduct->descrizione }}</td>
                <td style="text-align: center">{{ $interventionproduct->tipologia }}</td>
                <td style="text-align: center">{{ $interventionproduct->qta }}</td>
                <td style="text-align: center">{{ $interventionproduct->cd_argruppo2 }}</td>
            </tr>
        @endforeach
        @endif
        @endforeach
    </tbody>
</table>
