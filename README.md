# Codebox Plus 4.0.2 per phpBB 3.3

Riquadri di codice responsive con **evidenziazione della sintassi per 259 linguaggi**, barra degli strumenti (copia, seleziona, a capo, numeri di riga, schermo intero, scarica), temi chiari/scuri e **scaricamento protetto** del codice come file.

- **Autore originale:** Huynh Buu Tam ([o0johntam0o](https://github.com/o0johntam0o)) – Codebox Plus 3.0.0 (2014)
- **Riscrittura per phpBB 3.3 e nuove funzioni:** Salvo Cortesiano – [Le Ombre della Rete 360°](https://www.netshadows.de/ombra/)
- **Motore di evidenziazione:** [GeSHi](https://github.com/GeSHi/geshi-1.0) di Nigel McNie e Benny Baumann
- **Licenza:** GNU GPL 2.0 (`license.txt`)

---

## Indice

1. [Requisiti](#1-requisiti)
2. [Novità rispetto all'estensione originale](#2-novità-rispetto-allestensione-originale)
3. [Installazione](#3-installazione)
4. [Aggiornamento dall'estensione originale o0johntam0o/codeboxplus](#4-aggiornamento-dallestensione-originale-o0johntam0ocodeboxplus)
5. [Come si usa nei messaggi](#5-come-si-usa-nei-messaggi)
6. [La barra degli strumenti del riquadro](#6-la-barra-degli-strumenti-del-riquadro)
7. [Scaricamento del codice e sicurezza](#7-scaricamento-del-codice-e-sicurezza)
8. [Pannello di amministrazione (ACP)](#8-pannello-di-amministrazione-acp)
9. [Check-up](#9-check-up)
10. [Stile ForumUS e altri stili](#10-stile-forumus-e-altri-stili)
11. [Lingue](#11-lingue)
12. [Risoluzione dei problemi](#12-risoluzione-dei-problemi)
13. [Struttura dei file](#13-struttura-dei-file)
14. [Changelog](#14-changelog)

---

## 1. Requisiti

| Componente | Versione |
|---|---|
| phpBB | 3.3.0 o successivo (testata su **3.3.19**) |
| PHP | 7.2 o successivo (testata su PHP 8.2 / 8.3) |
| Moduli PHP | `dom`, `libxml`, `mbstring` (presenti in tutte le installazioni standard) |
| Stili | prosilver, **ForumUS** e qualsiasi stile derivato (i file sono in `styles/all`) |

## 2. Novità rispetto all'estensione originale

L'estensione originale (2014) non funziona più su phpBB 3.3 e PHP 8: il BBCode usava il modificatore `/e` delle espressioni regolari (rimosso da PHP 7), il file `routing.yml` non era valido, il controller avviava la sessione nel costruttore, il download aggirava il sistema di template e il riconoscimento del codice si basava su espressioni regolari fragili. È stata quindi **riscritta da zero**, mantenendo la compatibilità con i messaggi già scritti.

**Correzioni e modernizzazione**

- BBCode registrato direttamente nel formattatore di testo s9e di phpBB 3.3 (niente più riga nella tabella dei BBCode da non toccare).
- Il contenuto del riquadro non viene più alterato: niente BBCode, faccine, link automatici o `<br>` dentro il codice.
- I messaggi scritti con la vecchia estensione (`[Codebox=php file=x.php]...[/Codebox]`) continuano a essere mostrati e scaricati correttamente, anche quelli che contengono ancora faccine o BBCode salvati al loro interno.
- GeSHi aggiornato all'ultima versione (1.0.9.1 master 2024), con correzioni per PHP 8 (nessun avviso o deprecazione su tutti i 259 linguaggi, testati uno per uno).
- 35 linguaggi nuovi: Rust, Kotlin, Swift, Dart, Julia, Nginx, Sass, Twig, VBScript, Windows Batch, Nim, Racket, PostScript, Standard ML, SSH config e altri, più **JSON** e **TypeScript**.
- Alias comodi: `js`, `ts`, `html`, `py`, `sh`, `yml`, `cs`, `kt`, `rs`, `golang`, `bat`, `ps1`, `txt`, `md`… (vedi §5).
- Codice pronto per la validazione EPV di phpBB: **0 errori, 0 avvisi, 0 notifiche**.

**Nuove funzioni**

- Riquadro responsive in stile editor moderno, con nome del linguaggio, nome del file e numero di righe.
- Copia negli appunti con un clic (i numeri di riga non vengono mai copiati).
- Seleziona tutto, a capo automatico, mostra/nascondi numeri di riga, **schermo intero** (Esc per uscire).
- Numeri di riga fissi durante lo scorrimento orizzontale; clic su un numero per evidenziare la riga.
- Codice lungo compresso ad altezza configurabile con la barra “Mostra tutto il codice”.
- **6 temi**: Automatico (chiaro/scuro in base al dispositivo), Chiaro, Scuro, Monokai, Dracula, Nord.
- **Pulsante nell'editor** (messaggi, risposta rapida, messaggi privati) che apre una finestra con ricerca del linguaggio, linguaggi più usati, nome del file e anteprima del BBCode.
- Scaricamento protetto: controllo permessi del forum, messaggi non approvati, bot, accesso obbligatorio, permesso “Può scaricare file”, CAPTCHA con limite di tentativi e **impronta del codice** che impedisce di scaricare codice nascosto (ad esempio dentro `[hide]`).
- Cache dell'evidenziazione e limite di dimensione per non appesantire il server.
- ACP con riquadri informativi, anteprima dal vivo, manutenzione con conferma AJAX e scheda **Check-up**.
- Contatore degli scaricamenti.
- Traduzione completa in italiano, inglese, tedesco, spagnolo, svedese, estone e vietnamita.

## 3. Installazione

1. Scompatta lo zip: otterrai la cartella `salvocortesiano/codeboxplus`.
2. Carica via FTP la cartella in `ext/` del forum, in modo da avere `ext/salvocortesiano/codeboxplus/composer.json`.
3. ACP → **Personalizza** → **Gestione estensioni** → *Codebox Plus* → **Abilita**.
4. Svuota la cache (ACP → Generale → Svuota la cache).
5. Vai in ACP → **Estensioni** → **Codebox Plus** → **Check-up** e controlla che sia tutto verde.

> Da riga di comando (SSH):
> ```bash
> /opt/alt/php82/usr/bin/php bin/phpbbcli.php extension:enable salvocortesiano/codeboxplus
> /opt/alt/php82/usr/bin/php bin/phpbbcli.php cache:purge
> ```

### Aggiornare a una versione successiva

Disabilita l'estensione (senza cancellare i dati), sostituisci i file via FTP, svuota la cache, riabilita l'estensione, poi svuota di nuovo la cache e la cartella `cache/production/twig`.

### Disinstallazione

ACP → Gestione estensioni → **Disabilita**, poi **Cancella dati**. I messaggi restano nel database: il BBCode tornerà a essere mostrato come testo semplice.

## 4. Aggiornamento dall'estensione originale o0johntam0o/codeboxplus

La nuova versione ha il nome `salvocortesiano/codeboxplus` e **non può essere attiva insieme a quella originale** (usano lo stesso BBCode: l'attivazione viene bloccata con un messaggio se la vecchia è attiva).

1. ACP → Gestione estensioni → *Codebox Plus* (originale) → **Disabilita**.
2. *(Facoltativo)* **Cancella dati** della vecchia estensione. Non tocca i messaggi.
3. Elimina la cartella `ext/o0johntam0o/codeboxplus` dal server.
4. Installa la nuova versione come al §3.

Durante l'installazione la nuova versione:

- **importa le impostazioni** della vecchia (evidenziazione, espanso, scaricamento, accesso obbligatorio, blocco bot, tentativi massimi);
- **rimuove la riga `[Codebox=]`** dalla tabella dei BBCode (che altrimenti sarebbe in conflitto);
- rimuove le vecchie impostazioni `codebox_plus_*` se la vecchia estensione non è più installata.

I messaggi già scritti **non vanno modificati**: vengono riconosciuti automaticamente. Se il forum proviene da phpBB 3.0/3.1 e il Check-up segnala messaggi “nel vecchio formato”, eseguire una volta:

```bash
/opt/alt/php82/usr/bin/php bin/phpbbcli.php reparser:reparse post_text
```

## 5. Come si usa nei messaggi

```text
[codebox=php file=index.php]
<?php
echo "Ciao mondo";
[/codebox]
```

| Sintassi | Risultato |
|---|---|
| `[codebox=php file=index.php]...[/codebox]` | PHP, con nome del file (usato anche per lo scaricamento) |
| `[codebox=python]...[/codebox]` | Python, nome file automatico (`codice.py`) |
| `[codebox]...[/codebox]` | Testo semplice |
| `[Codebox=cpp file=test.cpp]...[/Codebox]` | Sintassi della vecchia estensione: funziona ancora |

- Il nome del file può contenere lettere, numeri, spazi e `- + . , _`. Se manca l'estensione viene aggiunta in automatico.
- Il linguaggio è un identificatore GeSHi (`php`, `javascript`, `html5`, `css`, `sql`, `mysql`, `bash`, `cpp`, `csharp`, `java`, `python`, `ruby`, `go`, `rust`, `kotlin`, `json`, `yaml`, `xml`, `ini`, `apache`, `nginx`, `diff`, …). L'elenco completo è nella finestra del pulsante dell'editor.
- **Alias accettati:** `js`→javascript, `ts`→typescript, `html`/`htm`→html5, `xhtml`/`svg`→xml, `py`/`python3`→python, `sh`/`shell`/`zsh`→bash, `yml`→yaml, `cs`→csharp, `kt`→kotlin, `rs`→rust, `golang`→go, `vbs`→vbscript, `bat`/`cmd`→batch, `ps1`→powershell, `c++`→cpp, `htaccess`→apache, `mariadb`→mysql, `scss`/`less`→css, `patch`→diff, `rb`→ruby, `pl`→perl, `txt`/`plain`/`md`/`markdown`→testo semplice.
- Un linguaggio sconosciuto viene mostrato come testo semplice (nessun errore).
- Dentro il riquadro **non** vengono interpretati BBCode, faccine e link: il codice resta esattamente come scritto.
- Il codice può contenere anche i tag `[codebox]` e `[/codebox]` (per esempio il sorgente di un'estensione phpBB o una stringa come `'[/codebox]'`): l'estensione aggiunge da sola un suffisso al riquadro esterno (`[codebox:101=php]...[/codebox:101]`), così il riquadro si chiude sempre al punto giusto. Se lo vedi quando modifichi il messaggio, è normale: non toglierlo.
- Se hai più riquadri nello stesso messaggio e uno di essi contiene un `[codebox]` aperto ma mai chiuso, puoi scrivere tu il suffisso: `[codebox:1=php]...[/codebox:1]`.

### Il pulsante nell'editor

Nella barra dei pulsanti dell'editor (e sopra la casella della risposta rapida) compare il pulsante **`</>`**. Apre una finestra con:

- ricerca istantanea per nome, identificativo o estensione (`py`, `sql`, …);
- i linguaggi più usati (configurabili in ACP) in alto;
- l'elenco completo dei 259 linguaggi;
- il nome del file facoltativo;
- l'anteprima del BBCode che verrà inserito.

Il testo selezionato nell'editor viene racchiuso nel riquadro; senza selezione il cursore viene posizionato dentro il riquadro vuoto. `Invio` inserisce, `Esc` chiude, doppio clic su un linguaggio inserisce subito. L'ultimo linguaggio usato viene ricordato.

## 6. La barra degli strumenti del riquadro

| Pulsante | Funzione |
|---|---|
| **Mostra tutto il codice (N righe)** | Compare a sinistra della barra solo quando il codice è più lungo dell'altezza massima; con un clic diventa **Mostra meno** (icona Font Awesome ⇣/⇡) |
| **Copia** | Copia il codice negli appunti (senza numeri di riga). Mostra “Copiato!” |
| Seleziona tutto | Seleziona il codice |
| A capo automatico | Manda a capo le righe lunghe / torna allo scorrimento orizzontale |
| Numeri di riga | Mostra/nasconde i numeri di riga |
| Schermo intero | Apre il codice a tutto schermo (`Esc` per uscire) |
| **Scarica** | Scarica il codice come file con il nome indicato |

In fondo al riquadro compaiono i **crediti** (disattivabili in ACP): copyright dell'autore originale con link al suo repository, copyright della versione phpBB 3.3 con link al sito web di Salvo Cortesiano e link al repository GitHub.

Altre funzioni: clic su un numero di riga per evidenziarla, numeri di riga fissi durante lo scorrimento orizzontale, stampa pulita (senza pulsanti e senza limite di altezza).

Su smartphone la testata va su due righe e i pulsanti diventano solo icone più grandi; lo stesso succede nei riquadri stretti (citazioni, colonne laterali) grazie alle *container query*.

## 7. Scaricamento del codice e sicurezza

- **Negli argomenti** (e nella revisione dell'argomento durante la risposta) il file viene fornito dal forum tramite l'indirizzo `app.php/codeboxplus/download/{id messaggio}/{impronta}`, dopo questi controlli:
  1. scaricamento attivo;
  2. blocco dei bot (se attivo);
  3. accesso obbligatorio (se attivo) → pagina di accesso di phpBB;
  4. **gruppi autorizzati** (se ne hai scelti in ACP): gli altri utenti registrati non vedono il pulsante e ricevono “Il tuo gruppo utenti non è autorizzato”; agli ospiti viene chiesto di accedere;
  5. il messaggio esiste ed è approvato (i moderatori con `m_approve` possono scaricare anche quelli in attesa);
  6. permesso di **lettura del forum** e, se richiesto, permesso **“Può scaricare file”**;
  7. CAPTCHA anti-spambot (se attivo), con limite di tentativi per sessione; una volta risolto vale 30 minuti;
  8. l'**impronta** (SHA-256) del codice deve corrispondere a un riquadro del messaggio.
- L'impronta viene calcolata sul codice **effettivamente mostrato** all'utente: il codice nascosto da BBCode come `[hide]`, `[hhide]` o `[ghide]` non può quindi essere scaricato da chi non lo vede.
- Nelle **anteprime** e nei **messaggi privati** il file viene creato direttamente dal browser (nessuna richiesta al server).
- Il file viene inviato come `text/plain; charset=UTF-8`, con intestazioni `nosniff`, `no-store` e `noindex`.
- Ogni scaricamento dal forum incrementa il contatore mostrato in ACP.

## 8. Pannello di amministrazione (ACP)

ACP → **Estensioni** → **Codebox Plus**. In cima: riquadri con versione dell'estensione, PHP, phpBB, GeSHi, numero di linguaggi, scaricamenti e licenza. In fondo: i crediti.

### Visualizzazione

| Opzione | Predefinito | Descrizione |
|---|---|---|
| Evidenziazione della sintassi | Sì | Colora il codice con GeSHi |
| Tema dei colori | Automatico | Automatico, Chiaro, Scuro, Monokai, Dracula, Nord |
| Numeri di riga | Sì | Stato iniziale (l'utente può cambiarlo) |
| A capo automatico | No | Stato iniziale (l'utente può cambiarlo) |
| Sempre espanso | No | Se *No*, il codice lungo viene compresso all'altezza massima |
| Altezza massima | 420 px | 120 – 3000 |
| Larghezza della tabulazione | 4 | 1 – 8 |
| Pulsante nell'editor | Sì | Pulsante `</>` nell'editor, risposta rapida e MP |
| Linguaggi più usati | php, javascript, html5, … | Identificativi separati da virgole; quelli non validi vengono segnalati |

### Scaricamento

| Opzione | Predefinito | Descrizione |
|---|---|---|
| Attiva lo scaricamento | Sì | Mostra il pulsante *Scarica* |
| Accesso obbligatorio | No | Gli ospiti devono accedere |
| **Gruppi autorizzati a scaricare** | nessuno = tutti | Selezione multipla dei gruppi (Ctrl/Cmd + clic). Solo i membri dei gruppi scelti possono scaricare; “Deseleziona tutti” torna a “tutti i gruppi” |
| Blocca i bot | Sì | I bot non vedono il pulsante e non possono scaricare |
| Richiedi il permesso “Può scaricare file” | No | Usa il permesso del forum per gli allegati |
| Conferma anti-spambot | No | Usa il CAPTCHA configurato in *Contromisure anti-spambot* |
| Conferma solo per gli ospiti | Sì | I registrati non vedono il CAPTCHA |
| Tentativi massimi | 3 | Errori consentiti per sessione |

### Crediti

| Opzione | Predefinito | Descrizione |
|---|---|---|
| Mostra i crediti | Sì | Riga dei crediti in fondo a ogni riquadro |
| Indirizzo del repository GitHub | vuoto | Il tuo repository; se vuoto si usa `CBP_CREDITS_REPO_URL` dei file di lingua |

Nomi e indirizzi dei crediti sono nei file `language/xx/common.php`, in fondo, sotto il commento *“Crediti in fondo ai riquadri”*:

```php
'CBP_CREDITS_ORIGINAL_NAME' => 'o0johntam0o (Huynh Buu Tam)',
'CBP_CREDITS_ORIGINAL_URL'  => 'https://github.com/o0johntam0o/phpBB-Extension-Codebox-Plus',
'CBP_CREDITS_AUTHOR_NAME'   => 'Salvo Cortesiano',
'CBP_CREDITS_AUTHOR_URL'    => 'https://www.netshadows.de/ombra/',
'CBP_CREDITS_REPO_URL'      => 'https://github.com/YOUR-GITHUB-USERNAME/phpbb-codeboxplus', // indirizzo fittizio: sostituiscilo
```

### Prestazioni

| Opzione | Predefinito | Descrizione |
|---|---|---|
| Limite dell'evidenziazione | 256 KiB | Oltre questa dimensione il codice è mostrato senza colori |
| Cache dell'evidenziazione | 86400 s | 0 = disattivata |

### Anteprima dal vivo e manutenzione

- L'**anteprima** a destra si aggiorna mentre cambi tema, numeri di riga, a capo, altezza e tabulazione.
- **Svuota la cache dell'evidenziazione**, **Azzera il contatore** e **Ripristina le impostazioni predefinite** chiedono conferma con il riquadro AJAX di phpBB e vengono registrati nel log amministratore.

## 9. Check-up

La scheda **Check-up** esegue 18 controlli e li mostra con stato *OK*, *Avviso*, *Errore* o *Info*:

1. versione di PHP;
2. versione di phpBB;
3. moduli PHP (`dom`, `libxml`, `mbstring`);
4. presenza di tutti i file di linguaggio di GeSHi;
5. evidenziazione reale di un codice PHP di prova;
6. registrazione del BBCode `[codebox]` nel formattatore di testo;
7. generazione del riquadro con barra degli strumenti e numeri di riga;
8. coerenza dell'impronta tra codice mostrato e codice salvato (collegamenti di scaricamento);
9. generazione dell'indirizzo di scaricamento;
10. presenza del vecchio BBCode `[Codebox=]` nella tabella dei BBCode (con pulsante **Rimuovilo ora**);
11. estensione originale ancora attiva o cartella ancora presente;
12. lettura/scrittura della cache;
13. gruppi autorizzati a scaricare;
14. disponibilità del plugin CAPTCHA (se la conferma è attiva);
15. file di lingua per le lingue installate nel forum;
16. file dello stile (CSS, JavaScript, template);
17. numero di messaggi che contengono riquadri di codice;
18. messaggi ancora salvati nel vecchio formato phpBB 3.0/3.1.

## 10. Stile ForumUS e altri stili

- Tutti i file grafici sono in `styles/all`, quindi valgono per **ForumUS**, prosilver e qualsiasi altro stile senza copie aggiuntive.
- Il CSS usa classi proprie con prefisso `cbp-` e selettori specifici, così le regole di ForumUS su `pre`, `code`, `button`, `ol` e `li` non deformano il riquadro.
- Il pulsante dell'editor viene inserito nella barra standard (`posting_editor_buttons_custom_tags_before`). Se uno stile o un'estensione (es. ABBC3) sostituisce o nasconde quella barra, lo script aggiunge automaticamente un pulsante **Codice** sopra la casella di testo.
- Il tema **Automatico** segue la modalità chiara/scura del dispositivo. Se usi una variante scura di ForumUS, scegli il tema **Scuro**, **Monokai**, **Dracula** o **Nord** in ACP.

## 11. Lingue

| Lingua | Interfaccia | ACP | Nomi dei linguaggi |
|---|---|---|---|
| Italiano | ✔ | ✔ | ✔ |
| Inglese | ✔ | ✔ | ✔ |
| Tedesco | ✔ | ✔ | ✔ |
| Spagnolo | ✔ | ✔ | ✔ |
| Svedese | ✔ | ✔ | ✔ |
| Estone | ✔ | ✔ | ✔ |
| Vietnamita | ✔ | ✔ | ✔ |

Tutti i testi stanno nei file `language/xx/`: `common.php` (riquadro, editor, scaricamento), `syntax.php` (nomi dei 259 linguaggi), `info_acp_codeboxplus.php` (moduli e log) e `acp_codeboxplus.php` (pannello).

## 12. Risoluzione dei problemi

| Problema | Soluzione |
|---|---|
| Il BBCode appare come testo `[codebox=...]` | Svuota la cache del forum; controlla il Check-up (punto 6) |
| “There are no registered paths for namespace salvocortesiano_codeboxplus” dopo aver disattivato l'estensione | Svuota la cache e cancella `cache/production/twig` |
| Un messaggio scritto con la 4.0.0 che conteneva `[codebox]` nel codice è ancora spezzato | Modifica il messaggio e salvalo di nuovo, oppure esegui `bin/phpbbcli.php reparser:reparse post_text` |
| Lo scaricamento risponde “codice non trovato” | Il messaggio è stato modificato dopo il caricamento della pagina: ricarica l'argomento |
| I colori non cambiano dopo aver modificato il tema | Ricarica la pagina con Ctrl+F5 (cache del browser) |
| Codice enorme lento da mostrare | Riduci il *Limite dell'evidenziazione* o lascia attiva la cache |
| Il pulsante Copia non funziona | Su HTTP non protetto alcuni browser bloccano gli appunti: viene usato un metodo alternativo; in ogni caso resta “Seleziona tutto” |
| Il CAPTCHA non compare | Verifica *Contromisure anti-spambot* e il Check-up (punto 13) |

## 13. Struttura dei file

```text
salvocortesiano/codeboxplus/
├── composer.json            metadati, versione, autori
├── ext.php                  requisiti e blocco se l'estensione originale è attiva
├── license.txt              GPL 2.0
├── README.md                questa guida
├── CHANGELOG.md
├── acp/                     modulo ACP (Impostazioni, Check-up)
├── adm/style/               template, CSS e JS dell'ACP
├── config/                  services.yml, routing.yml
├── controller/
│   ├── acp_controller.php   impostazioni, manutenzione, check-up
│   └── download.php         scaricamento protetto (permessi, bot, CAPTCHA)
├── core/
│   ├── access.php           chi può scaricare (bot, accesso, gruppi)
│   ├── catalog.php          259 linguaggi, alias, estensioni dei file
│   ├── highlighter.php      GeSHi + cache
│   ├── box_renderer.php     costruzione del riquadro e della barra
│   └── code_helper.php      normalizzazione, estrazione dal messaggio, impronta
├── event/main_listener.php  BBCode, rendering, link di scaricamento, editor
├── includes/geshi/          GeSHi 1.0.9.1 adattato a PHP 8
├── language/{it,en,de,es,sv,et,vi}/
├── migrations/v400_install.php
└── styles/all/
    ├── template/            eventi, pagina di scaricamento, js/codeboxplus.js
    └── theme/codeboxplus.css
```

## 14. Changelog

# Changelog – Codebox Plus

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

---

**Codebox Plus** – sviluppata da Huynh Buu Tam (o0johntam0o) · riscritta e potenziata per phpBB 3.3 da Salvo Cortesiano · motore di evidenziazione GeSHi di Nigel McNie & Benny Baumann.
