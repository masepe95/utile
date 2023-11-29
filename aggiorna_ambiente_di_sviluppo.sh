#!/bin/bash

# script di aggiornamento dell'ambiente di sviluppo
# da eseguire direttamente nella cartella del progetto Laravel (es: /umfs/APP/UTILE/nahmlo70)

rm -rf ./app/Classes/phpgrid ./public/js/phpgrid
mkdir -p ./app/Classes/phpgrid ./public/js/phpgrid
wget -q https://www.gridphp.com/wp-content/uploads/gridphp-free-latest.zip
wget -q http://htmlpurifier.org/releases/htmlpurifier-4.15.0-standalone.zip
unzip -q -o gridphp-free-latest.zip gridphp-free-latest/lib/inc/* -x gridphp-free-latest/lib/inc/htmlpurifier/*
unzip -q -o gridphp-free-latest.zip gridphp-free-latest/lib/js/*
unzip -q -o htmlpurifier-4.15.0-standalone.zip
mv -f ./htmlpurifier-4.15.0-standalone ./gridphp-free-latest/lib/inc/htmlpurifier/
mv -f ./gridphp-free-latest/lib/inc/* ./app/Classes/phpgrid/
mv -f ./gridphp-free-latest/lib/js/* ./public/js/phpgrid/
rm -rf ./gridphp-free-latest
rm gridphp-free-latest.zip*
rm htmlpurifier-4.15.0-standalone.zip*
sed -i "s/error_reporting(E_ALL \& ~E_NOTICE \& ~E_DEPRECATED)/error_reporting(E_ALL \& ~E_NOTICE \& ~E_WARNING \& ~E_DEPRECATED)/" ./app/Classes/phpgrid/jqgrid_dist.php
