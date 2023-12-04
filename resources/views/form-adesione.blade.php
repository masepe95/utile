<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form di Sottoscrizione Completo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type=submit] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #5cb85c;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type=submit]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Form di Sottoscrizione</h2>
        <form action="https://api.fastsign.it/submissions" method="post">
            <!-- Sezione Informazioni Personali -->
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="data[submission][nome]" value="Andrea" required>

            <label for="cognome">Cognome:</label>
            <input type="text" id="cognome" name="data[submission][cognome]" value="Gasloli" required>

            <label for="data_nascita">Data di Nascita:</label>
            <input type="text" id="data_nascita" name="data[submission][data_nascita]" value="16/12/1987" required>

            <!-- Assumendo che il luogo di nascita sia selezionato da un'opzione esistente -->
            <!-- Aggiungere le opzioni appropriate nel tag select -->
            <label for="luogo_nascita">Luogo di Nascita:</label>
            <select id="luogo_nascita" name="data[submission][luogo_nascita][id]">
                <option value="7626">SOAVE</option>
                <!-- Altre opzioni -->
            </select>

            <label for="genere">Genere:</label>
            <select id="genere" name="data[submission][genere]">
                <option value="M">Maschio</option>
                <!-- Altra opzione per Femmina se necessario -->
            </select>

            <label for="codice_fiscale">Codice Fiscale:</label>
            <input type="text" id="codice_fiscale" name="data[submission][codice_fiscale]" value="GSLNDR84A29L682E"
                required>

            <label for="cellulare">Cellulare:</label>
            <input type="tel" id="cellulare" name="data[submission][cellulare_intestatario]" value="3387337023"
                required>

            <!-- Sezione Contatti -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="data[submission][telefono_intestatario]"
                value="andrea.gasloli@gmail.com" required>

            <!-- Sezione Dettagli Contratto -->
            <label for="tipo_documento">Tipo di Documento:</label>
            <select id="tipo_documento" name="data[submission][tipo_documento][id]">
                <option value="1">ALTRO DOCUMENTO</option>
                <!-- Altre opzioni -->
            </select>

            <label for="numero_documento">Numero Documento:</label>
            <input type="text" id="numero_documento" name="data[submission][numero_documento]" value="123"
                required>

            <!-- Continuare con altri campi del form come sopra -->

            <input type="submit" value="Conferma e Continua">
        </form>
    </div>

</body>

</html>
