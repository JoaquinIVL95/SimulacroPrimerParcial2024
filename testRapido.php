<?php


include_once 'Cliente.php';
include_once 'Empresa.php';
include_once 'Venta.php';
include_once 'Moto.php';

$objCliente1 = new Cliente ("Jorge" , "Gonzalez" , true , "DNI" , "38892401");
$objCliente2 = new Cliente ("karen" , "Ramirez" , true , "DNI" , "28394921");

$colClientes = [$objCliente1,$objCliente2];

$objMoto1 = new Moto (11, 2230000, 2022 , "Benelli Imperiale 400" , 85 , true);
$objMoto2 = new Moto (12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto (13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

$colMotos = [$objMoto1,$objMoto2,$objMoto3];
$colVentas = [];

$colCodigoMoto = [11,12,13];

$objEmpresa = new Empresa ("Alta Gama", "Av Argenetina 123", $colClientes, $colMotos, $colVentas );


echo $objEmpresa->registrarVenta($colCodigoMoto, $objCliente1) . "\n";
echo $objEmpresa->registrarVenta([0], $objCliente1) . "\n";

echo $objEmpresa->registrarVenta($colCodigoMoto, $objCliente2) . "\n";
echo $objEmpresa->registrarVenta([0], $objCliente2) . "\n";
echo $objEmpresa->registrarVenta([2], $objCliente2) . "\n";

$ejemplo1= $objEmpresa->retornarVentasXCliente( "DNI" , "38892401");
$ejemplo2= $objEmpresa->retornarVentasXCliente( "DNI" , "28394921");
echo "\n--------------------------------------------\n1";

echo $objEmpresa->devolverArreglo($ejemplo1). "\n\n\n2";
echo "\n--------------------------------------------\n3";
echo $objEmpresa->devolverArreglo($ejemplo2). "\n\n\n4";

echo "\n--------------------------------------------\n5";
echo "\n--------------------------------------------\n5";
// echo $objEmpresa->devolverArreglo($objEmpresa->getColClientes());
// echo $objEmpresa->devolverArreglo($objEmpresa->getColMotos());
echo $objEmpresa->toString();
