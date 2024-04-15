<?php

Class Empresa{

    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;

    public function __construct($nombreEmpresa , $dircec , $arregloCliente, $arregloMotos , $arregloVentas)
    {
     $this->denominacion = $nombreEmpresa;
     $this->direccion = $dircec;
     $this->colClientes = $arregloCliente;
     $this->colMotos = $arregloMotos;
     $this->colVentas = $arregloVentas;  
    }

        public function getDenominacion() {
            return $this->denominacion;
        }
    
        
        public function setDenominacion($denominacion) {
            $this->denominacion = $denominacion;
        }
    
        
        public function getDireccion() {
            return $this->direccion;
        }
    
        
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
    
        
        public function getColClientes() {
            return $this->colClientes;
        }
    
        
        public function setColClientes($colClientes) {
            $this->colClientes = $colClientes;
        }
    
        
        public function getColMotos() {
            return $this->colMotos;
        }
    
        
        public function setColMotos($colMotos) {
            $this->colMotos = $colMotos;
        }
    
        
        public function getColVentas() {
            return $this->colVentas;
        }
    
        
        public function setColVentas($colVentas) {
            $this->colVentas = $colVentas;
        }

       
        
        public function retornarMoto($codigoMoto){
            $colMotosEmp = $this->getColMotos();
            $cantMotos = count($colMotosEmp);
            $i = 0;
            $encontrada = false;
            $moto = null;
            while ($i < $cantMotos && !$encontrada){
                $moto = $colMotosEmp[$i];
                
                if ($moto->getCodigoMoto() == $codigoMoto){
                    $encontrada = true;
                    
                }
                $i++;
            }
            return $moto;
        }

        public function registrarVenta($colCodigoMoto ,Cliente $objCliente){
            $precioFinal = 0;
            $numeroVenta = null;
            $colMotoVenta = [];
            
            $objVenta = new Venta($numeroVenta, date("Y"), $objCliente, $colMotoVenta , $precioFinal) ;

            foreach($colCodigoMoto as $codigo){
                $moto = $this->retornarMoto($codigo);
                $objVenta->incorporarMoto($moto);
            }

            $precioFinal = $objVenta->getPrecioFinal();
            if($precioFinal > 0 ){
                $colVentas = $this->getColVentas();
                array_push($colVentas, $objVenta);
                $this->setColVentas($colVentas);
                
            }            
            return $precioFinal;
        }
        
        
        public function retornarVentasXCliente($tipo,$numDoc){
            $ventasCliente = []; 
            $ventas = $this->getColVentas();
            foreach ($ventas as $venta) {
                $clienteVenta = $venta->getRefClienteVenta();
                if ($clienteVenta->getTipoDoc() === $tipo &&  $clienteVenta->getNumDoc() === $numDoc ) {
                    
                    $ventasCliente[] = $venta;
                }
            }
            return $ventasCliente;
        }

        public function devolverArreglo($arreglo){
            $cadena = "";
            foreach($arreglo as $elemento){
                $cadena .= $elemento . "\n";
            }
    
            return $cadena;
        }

        
        public function toString(){

            $colClientes  = $this->devolverArreglo($this->getColClientes());
            $colMotos = $this->devolverArreglo($this->getColMotos());
            $colVentas = $this->devolverArreglo($this->getColVentas());
            
            return  "Nombre empresa: ". $this->getDenominacion() . "ubicada en: " . $this->getDireccion(). "\n".
             $colClientes. "\n".
            $colMotos."\n".
            $colVentas."\n";
        }
}