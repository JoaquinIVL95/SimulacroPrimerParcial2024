<?php


include_once 'Cliente.php';
include_once 'Empresa.php';
include_once 'Venta.php';
include_once 'Moto.php';

$objCliente1 = new Cliente ("Jorge" , "Gonzalez" , true , "DNI" , "38892401");
$objMoto = new Moto (11, 2230000, 2022 , "Benelli Imperiale 400" , 85 , true);

echo $objCliente1;
echo $objCliente1->esCliente();

echo "\n\n";

echo $objMoto . "\n\n" ;

echo $objMoto->darPrecioVenta();


