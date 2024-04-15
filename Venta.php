<?php


Class Venta{

    private $numVenta;
    private $fechaVenta;
    private $refClienteVenta;
    private $colMotos= [];
    private $precioFinal;

    public function __construct($ventaNumero , $ventaFecha , $ventaClienteRef, $motosCol , $precioVenta)
    {
        $this->numVenta = $ventaNumero;
        $this->fechaVenta = $ventaFecha ;
        $this->refClienteVenta = $ventaClienteRef;
        $this->colMotos = $motosCol;
        $this->precioFinal = $precioVenta;
    }

    public function getNumVenta(){
        return $this->numVenta;
    }

    public function getFechaVenta(){
        return $this->fechaVenta;
    }
    public function getRefClienteVenta(){
        return $this->refClienteVenta;
    }
    public function getColMotos(){
        return $this->colMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    //seters

    public function setNumVenta($nuevoNumVenta){
        $this->numVenta = $nuevoNumVenta;
    }
    public function setFechaVenta($nuevaFecha){
        $this->fechaVenta = $nuevaFecha;
    }
    public function setRefClienteVenta($nuevaRef){
        $this->refClienteVenta = $nuevaRef;

    }
    public function setColMotos($nuevaColMotos){
        $this->colMotos = $nuevaColMotos; 
    }
    public function setPrecioFinal($nuevoPrecio){
        $this->precioFinal=$nuevoPrecio;
    }
    
    private function devolverArreglo($arreglo){
        $cadena = "";
        foreach($arreglo as $elemento){
            $cadena = $cadena . "\n" . $elemento;
        }

        return $cadena;
    }

    public function incorporarMoto(Moto $objMoto){
        $clienteActivo = $this->getRefClienteVenta()->getAltaCliente();
        $motoDips = $objMoto->getDisponible();
        $colMotos = $this->getColMotos();
        $precioVenta = 0;
        if ($motoDips && $clienteActivo ){
            array_push($colMotos, $objMoto);
            $this->setColMotos($colMotos);

            $precioVenta = $objMoto->darPrecioVenta();
            
            $this->setPrecioFinal($precioVenta + $this->getPrecioFinal());
        }
        
        
    }
    

   

    public function __toString()
    {
        return  "Número de venta: ". $this->getNumVenta(). "\n".
                "Fecha de venta: ". $this->getFechaVenta() ."\n".
                "Referencia del cliente: ". $this->getRefClienteVenta(). "\n".
                "Coleccion de motos para comprar: " . $this->devolverArreglo($this->getColMotos()) . 
                "Precio de venta final: " . $this->getPrecioFinal();
    }
    


}