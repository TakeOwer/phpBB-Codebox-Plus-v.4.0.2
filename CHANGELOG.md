# Changelog – Codebox Plus

## 4.0.6 (2026-10-14) – Salvo Cortesiano

- **Nuovo – contatore dei download:** nella testata di ogni riquadro, dopo il numero di righe, compare quante volte è stato scaricato quel codice. Conteggio per blocco di codice di ogni messaggio (nuova tabella `cbp_downloads`), aggiornato subito dopo il download e azzerato insieme al contatore totale in ACP. Opzione ACP per nasconderlo.
- **Nuovo – barra di avanzamento:** scaricando un file, al centro della barra compare la percentuale reale di scaricamento; a fine download diventa verde e sparisce.
- **Nuovo – strumenti da editor** (stile Visual Studio Code, disattivabili in ACP): ricerca con `Ctrl+F` (maiuscole/minuscole, parola intera, espressioni regolari, contatore “X di Y”, `Invio`/`F3`), occorrenze di una parola con doppio clic, evidenziazione delle righe con `Maiusc+clic` per gli intervalli, menu con clic destro (evidenzia, aggiunta, rimossa, barrata, copia riga, copia link alla riga, cerca selezione), vai alla riga (`Ctrl+G`), dimensione del testo, posizione del cursore e caratteri selezionati nella barra. Segni e dimensione ricordati dal browser; i link alle righe aprono e fanno lampeggiare la riga.
- Check-up: nuovo controllo della tabella del contatore.
- Nuove stringhe in tutte le lingue; nessuna stringa esistente modificata.

## 4.0.5 (2026-10-14) – Salvo Cortesiano

- **Corretto:** un riquadro ridotto con il pallino rosso tornava aperto ricaricando la pagina. Ora la scelta viene ricordata dal browser per ogni riquadro di ogni messaggio (fino a 500 riquadri) e resta anche cambiando pagina; un altro clic sul pallino rosso lo riapre e cancella la scelta.
- Nessun anello di selezione sul pallino dopo il clic del mouse (alcuni stili lo aggiungevano); resta visibile per chi usa la tastiera.

## 4.0.4 (2026-10-14) – Salvo Cortesiano

- **Corretto:** nell'elenco dei gruppi autorizzati a scaricare, il gruppo speciale `AI_CRAWLERS` (aggiunto da phpBB 3.3.15) compariva con il nome tecnico quando il pacchetto della lingua del forum non è aggiornato. Ora l'estensione ha la sua traduzione di riserva per i gruppi speciali.

## 4.0.3 (2026-10-14) – Salvo Cortesiano

- **Stili scuri:** il tema *Automatico* ora segue i colori dello stile del forum (prima seguiva solo il dispositivo). Con uno stile scuro (es. Subway *Dark*) sono scuri sia i riquadri sia la finestra di scelta del linguaggio; si adatta anche agli stili con interruttore chiaro/scuro.
- **Pulsanti della finestra funzionanti:** rosso = riduci/ripristina il riquadro, giallo = mostra tutto / mostra meno, verde = schermo intero. Simboli al passaggio del mouse, descrizione nei suggerimenti. Nuova opzione ACP per nasconderli.
- **Corretto:** con alcuni stili (es. Subway) i pulsanti dei linguaggi nella finestra di scelta venivano schiacciati.

## 4.0.2 (2026-10-14) – Salvo Cortesiano

- **Nuovo:** in ACP si scelgono i **gruppi autorizzati a scaricare** il codice (nessun gruppo = tutti). Chi non è autorizzato non vede il pulsante *Scarica* e il download diretto viene rifiutato; agli ospiti viene chiesto di accedere.
- **Nuovo:** il pulsante **Mostra tutto il codice / Mostra meno** è ora nella barra in alto, con icona Font Awesome, in colore neutro.
- **Nuovo:** in fondo a ogni riquadro i **crediti** con link cliccabili: autore originale (repository), versione phpBB 3.3 (sito web) e repository GitHub. Disattivabili in ACP; indirizzo del repository impostabile in ACP oppure nei file di lingua (`CBP_CREDITS_*`).
- Check-up: nuovo controllo dei gruppi autorizzati.

## 4.0.1 (2026-10-13) – Salvo Cortesiano

- **Corretto:** il codice che contiene a sua volta i tag `[codebox]` / `[/codebox]` (per esempio il sorgente di questa estensione, di un BBCode o una stringa come `'[/codebox]'`) veniva spezzato in più riquadri e in testo normale. Ora il riquadro esterno si chiude sempre al tag giusto e il codice resta intatto, anche quando si modifica il messaggio o lo si cita.

## 4.0.0 (2026-10-13) – Salvo Cortesiano

Riscrittura completa per phpBB 3.3.x (testata su 3.3.19) e PHP 7.2 – 8.3.

### Correzioni
- BBCode registrato nel formattatore s9e di phpBB 3.3 (il vecchio usava il modificatore `/e`, rimosso da PHP 7).
- `config/routing.yml` non valido (errore YAML fatale) sostituito.
- Il controller non avvia più la sessione nel costruttore e invia il file con una vera risposta HTTP.
- Il contenuto del riquadro non viene più alterato da BBCode, faccine, link automatici e `<br>`.
- Corretti gli avvisi PHP 8 di GeSHi (linguaggi thinbasic e usd) e rimossa l'uscita diretta `echo`.
- Il CAPTCHA ora invia i campi nascosti richiesti (Q&A, reCAPTCHA) e conta davvero i tentativi.
- Query SQL con valori sempre convertiti in intero; nessun accesso diretto a `$_GET`/`$_POST`.

### Novità
- Nuovo riquadro responsive: testata con linguaggio, nome file e righe; barra con Copia, Seleziona, A capo, Numeri di riga, Schermo intero, Scarica.
- Numeri di riga fissi durante lo scorrimento orizzontale, mai copiati; evidenziazione della riga con un clic.
- Codice lungo compresso con barra “Mostra tutto il codice”; altezza configurabile.
- 6 temi: Automatico, Chiaro, Scuro, Monokai, Dracula, Nord.
- Container query: il riquadro si adatta anche quando è stretto (citazioni, colonne).
- Pulsante `</>` nell'editor, nella risposta rapida e nei messaggi privati con finestra di scelta del linguaggio, ricerca, linguaggi più usati, nome del file e anteprima.
- GeSHi aggiornato (master 2024): 259 linguaggi, 35 in più (Rust, Kotlin, Swift, Dart, Julia, Nginx, Sass, Twig, JSON, TypeScript…), alias comuni (`js`, `py`, `sh`, `yml`…).
- Scaricamento protetto da impronta SHA-256 (il codice nascosto non è scaricabile), controllo approvazione, permesso “Può scaricare file” facoltativo, CAPTCHA solo per gli ospiti, validità 30 minuti.
- Scaricamento lato browser nelle anteprime e nei messaggi privati.
- Cache dell'evidenziazione e limite di dimensione.
- ACP con riquadri informativi, anteprima dal vivo, manutenzione con conferma AJAX e scheda Check-up (17 controlli).
- Contatore degli scaricamenti.
- Migrazione automatica dalle impostazioni dell'estensione originale e rimozione del vecchio BBCode.
- Traduzioni complete: italiano, inglese, tedesco, spagnolo, svedese, estone, vietnamita.
- Validazione EPV: 0 errori, 0 avvisi, 0 notifiche.

## 3.0.0 (2014) – o0johntam0o
- Versione originale per phpBB 3.1/3.2: evidenziazione GeSHi, espandi/comprimi, scaricamento del codice.
