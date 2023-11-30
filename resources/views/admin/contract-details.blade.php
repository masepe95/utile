@php
    use Illuminate\Support\Facades\DB;
    $cf = $collection->cf; // Assicurati che questa stringa sia pulita e sicura
    $results = DB::select("SELECT * FROM MNS_CONTRATTI WHERE cf = :cf", ['cf' => $cf]);
@endphp
<h1 style="text-align: center; font-weight: 900; font-size: 35px">Contratti:</h1>
<table>
    <thead>
        <tr>
            <th>ID CONTRATTO</th>
            <th>Stato Segnalazione</th>
            <th>Tipologia Prodotto</th>
            <th>Data Stipula</th>
            <th>Data Attivazione</th>
            <th>Data Ultima Manutenzione</th>
            <th>Data Prossima Manutenzione</th>
            <th>Data Chiusura Contratto</th>
            <!-- Altre intestazioni di colonna -->
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $result)
            <tr>
                <td style="text-align: center">{{ $result->idcontratto }}</td>
                <td style="text-align: center">{{ $result->statosegnalazione }}</td>
                <td style="text-align: center">{{ $result->tipologiaprodotto }}</td>
                <td style="text-align: center">{{ $result->datastipula }}</td>
                <td style="text-align: center">{{ $result->dataattivazione }}</td>
                <td style="text-align: center">{{ $result->dataultimamanutenzione }}</td>
                <td style="text-align: center">{{ $result->dataprossimamanutenzione }}</td>
                <td style="text-align: center">{{ $result->datachiusuracontratto }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<br>
<br>
<h1 style="text-align: center; font-weight: 900; font-size: 35px">Prodotti del Contratto:</h1>
<table>
<table>
    <thead>
        <tr>
            <th>ID Contratto</th>
            <th>ATTRIBUTO</th>
            <th>DESCRIZIONE</th>
            <th>MODELLO</th>
            <th>MARCA</th>
            <th>TIPO</th>
            <th>IMPORTO</th>
            <!-- Altre intestazioni di colonna -->
        </tr>
    </thead>

<tbody>
        @foreach ($results as $result)
            @php
                $contractproducts = DB::select("SELECT * FROM MNS_PRODOTTI_CONTRATTI WHERE idcontratto = :idcontratto", ['idcontratto' => $result->idcontratto]);
            @endphp
        @foreach ($contractproducts as $contractproduct)
            <tr>
                <td style="text-align: center">{{ $contractproduct->idcontratto }}</td>
                <td style="text-align: center">{{ $contractproduct->attributo }}</td>
                <td style="text-align: center">{{ $contractproduct->descarticolo }}</td>
                <td style="text-align: center">{{ $contractproduct->modello }}</td>
                <td style="text-align: center">{{ $contractproduct->marca }}</td>
                <td style="text-align: center">{{ $contractproduct->tipoapparecchio }}</td>
                <td style="text-align: center">{{ $contractproduct->importo }}</td>
            </tr>
        @endforeach
        @endforeach
    </tbody>
</table>
