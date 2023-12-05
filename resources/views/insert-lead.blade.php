<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form di Inserimento Lead</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            font-weight: 600;
        }

        form {
            background-color: #f4f4f4;
            padding: 20px;
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-gap: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group.half-width {
            grid-column: span 3;
            /* occupa metà della larghezza del container */
        }

        .form-group.quarter-width {
            grid-column: span 2;
            /* occupa un quarto della larghezza del container */
        }

        .form-group.full-width {
            grid-column: span 6;
            /* occupa l'intera larghezza del container */
        }

        .form-group.min-width {
            grid-column: span 1;
            /* occupa l'intera larghezza del container */
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        select:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }

        input[type="submit"] {
            margin: 0 auto;
            grid-column: span 6;
            width: 30%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 768px) {
            @media screen and (max-width: 768px) {
                .container {
                    width: 95%;
                    padding: 20px;
                }

                form {
                    grid-template-columns: 1fr;
                    /* Imposta una singola colonna */
                }

                .form-group {
                    grid-column: span 1;
                    /* Assicurati che ogni gruppo di form occupi una singola colonna */
                }

                .form-group.half-width,
                .form-group.quarter-width,
                .form-group.full-width,
                .form-group.min-width {
                    grid-column: span 1;
                    /* Ogni elemento del form deve estendersi sull'intera colonna */
                }

                input[type="submit"] {
                    width: 100%;
                    /* Estendi il pulsante di invio per occupare l'intera larghezza */
                    grid-column: span 1;
                    /* Assicurati che occupi una singola colonna */
                }
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="{{ url('/leads/store') }}" method="POST" id="leadForm">
            @csrf {{-- CSRF Token field --}}

            <div class="form-group half-width">
                <label for="codiceMetanoNord">Codice Agente *</label>
                <input type="text" id="codiceMetanoNord" name="codiceMetanoNord" required>
            </div>

            <div class="form-group half-width">
                <label for="tipo_utenza">Tipologia Anagrafica *</label>
                <select id="tipo_utenza" name="tipo_utenza" required>
                    <option value="1">Residenziale</option>
                    <option value="2">Business</option>
                </select>
            </div>

            <div class="form-group half-width">
                <label for="cognome">Cognome *</label>
                <input type="text" id="cognome" name="cognome" required>
            </div>

            <div class="form-group half-width">
                <label for="nome">Nome *</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group full-width">
                <label for="cf">Codice Fiscale</label>
                <input type="text" id="cf" name="cf" style="width: 50%">
            </div>

            <div class="form-group half-width">
                <label for="ragsoc">Ragione Sociale</label>
                <input type="text" id="ragsoc" name="ragsoc">
            </div>

            <div class="form-group half-width">
                <label for="piva">Partita IVA</label>
                <input type="text" id="piva" name="piva">
            </div>

            <div class="form-group half-width">
                <label for="telefono">Telefono *</label>
                <input type="tel" id="telefono" name="telefono" required>
            </div>

            <div class="form-group half-width">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="form-group half-width">
                <label for="indirizzo">Indirizzo *</label>
                <input type="text" id="indirizzo" name="indirizzo" required>
            </div>

            <div class="form-group min-width">
                <label for="civico">Numero Civico *</label>
                <input type="text" id="civico" name="civico" required>
            </div>

            <div class="form-group min-width">
                <label for="cap">CAP *</label>
                <input type="text" id="cap" name="cap" required>
            </div>

            <div class="form-group half-width">
                <label for="comune">Comune *</label>
                <input type="text" id="comune" name="comune" required>
            </div>

            <div class="form-group min-width">
                <label for="provincia">Provincia *</label>
                <input type="text" id="provincia" name="provincia" required>
            </div>

            <div class="form-group full-width">
                <label for="note">Note</label>
                <textarea id="note" name="note" rows="4"></textarea>
            </div>

            <div class="form-group quarter-width">
                <label for="codiceVenditore">Codice Venditore</label>
                <input type="text" id="codiceVenditore" name="codiceVenditore">
            </div>

            <div class="form-group quarter-width">
                <label for="tipologiaProdotto">Tipologia Prodotto</label>
                <select id="tipologiaProdotto" name="tipologiaProdotto">
                    <option value="Caldaia">Caldaia</option>
                    <option value="Condizionatore">Condizionatore</option>
                    {{-- Aggiungi altre opzioni di prodotto se necessario --}}
                </select>
            </div>

            <div class="form-group quarter-width">
                <label for="tipo_intervento">Tipologia Segnalazione *</label>
                <select id="tipo_intervento" name="tipo_intervento" required>
                    <option value="2">Abbonamento di Servizi</option>
                    <option value="4">Preventivo di Vendita</option>
                    {{-- Aggiungi altre opzioni di prodotto se necessario --}}
                </select>
            </div>

            <input type="submit" value="Invia">
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#leadForm').submit(function(event) {
                event.preventDefault(); // Prevenire l'invio normale del form

                var formData = $(this).serialize(); // Ottenere i dati del form

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {
                        alert(response.message); // Mostra un alert con il messaggio di successo
                    },
                    error: function(xhr) {
                        var errorMessage = 'Si è verificato un errore.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            // Prova a estrarre il messaggio di errore più dettagliato
                            try {
                                var errorResponse = JSON.parse(xhr.responseJSON.message);
                                errorMessage = errorResponse.message || errorMessage;
                            } catch (e) {
                                // Se l'analisi del JSON interno fallisce, usa il messaggio di errore generico dell'API
                                errorMessage = xhr.responseJSON.message;
                            }
                        }
                        alert(errorMessage);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Funzione per ottenere il valore di un parametro dalla query string
            function getParameterByName(name, url = window.location.href) {
                name = name.replace(/[\[\]]/g, '\\$&');
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            }

            // Elenco dei campi del form da precompilare
            var fields = ['codiceMetanoNord', 'tipo_utenza', 'cognome', 'nome', 'cf', 'ragsoc', 'piva', 'telefono',
                'email', 'indirizzo', 'civico', 'cap', 'comune', 'provincia', 'note', 'codiceVenditore',
                'tipologiaProdotto', 'tipo_intervento'
            ];

            // Ciclo sui campi per precompilarli
            fields.forEach(function(field) {
                var value = getParameterByName(field);
                if (value) {
                    $('#' + field).val(value);
                }
            });
        });
    </script>
</body>

</html>
