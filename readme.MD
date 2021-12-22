# feder farma channel clone

## Codice

Il codice è disponigile su GitHub all'indirizzo https://github.com/ilmala/federfarmachannel-clone

## Installazione

E' necessario installare le dipendenze di PHP tramite composer, nella directory di root, dove è presente il file composer.json, da terminale usare il comando:

```bash
composer install
```

E' possibile compilare anche il file CSS, prima instalalre le dipendenze di node con npm con il comando:

```bash
npm install
```

Per compilare il file css usare il comando:

```bash
npm run dev
```

## Struttura

```
/app => backend php basato su SlimFramework
/public => punto di partenza del webserver (index.php)
/resources
    /css => sorgenti CSS
    /view => template delle pagine html 
    /dump => dump mysql usato per il lavoro
```