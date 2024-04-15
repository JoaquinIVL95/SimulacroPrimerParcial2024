<?php


Class Cliente{
    
    private $nombreCliente;
    private $apellidoCliente;
    private $altaCliente;
    private $tipoDoc;
    private $numDoc;

    public function __construct($nombre , $apellido, $esCliente , $docTipo , $docNum){
        $this->nombreCliente = $nombre;
        $this->apellidoCliente = $apellido;
        $this->altaCliente = $esCliente;
        $this->tipoDoc = $docTipo;
        $this->numDoc = $docNum;
    }


    public function getNombreCliente(){
        return $this->nombreCliente;
    }
    public function setNombreCliente($nombreNuevo){
        $this->nombreCliente = $nombreNuevo;
    }

    public function getApellidoCliente(){
        return $this->apellidoCliente;
    }
    public function setApellidoCliente($apelliedoNuevo){
        $this->apellidoCliente = $apelliedoNuevo;
    }    

    public function getAltaCliente(){
        return $this->altaCliente;
    }
    public function setAltaCliente($esCliente){
        $this->altaCliente = $esCliente;
    }

    public function getTipoDoc(){
        return $this->tipoDoc;
    }
    public function setTipoDoc($nuevoTipoDoc){
        $this->tipoDoc = $nuevoTipoDoc;
    }

    public function getNumDoc(){
        return $this->numDoc;
    }
    public function setNumDoc($nuevoNumDoc){
        $this->numDoc = $nuevoNumDoc;
    }





    public function __toString()
    {
        return "El nombre del cliente es : ". $this->getNombreCliente()." y su apellido es: ". $this->getApellidoCliente(). "\n".
        "Su tipo y numero de DNI es " . $this->getTipoDoc() . ": " . $this->getNumDoc(); 
    }
}