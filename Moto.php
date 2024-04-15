<?php


Class Moto {


    private $codigoMoto;
    private $costoMoto;
    private $anioFabricacion;
    private $descripcion;
    private $porcIncreAnual;
    private $disponible;

    public function __construct($codigo, $costo, $anoFabricado, $caracteristicas, $increAnual, $activa) {
        $this->codigoMoto = $codigo;
        $this->costoMoto = $costo;
        $this->anioFabricacion = $anoFabricado;
        $this->descripcion = $caracteristicas;
        $this->porcIncreAnual = $increAnual;
        $this->disponible = $activa;
    }

    public function getCodigoMoto(){
        return $this->codigoMoto;
    }
    public function setCodigoMoto($codigoNuevo){
        $this->codigoMoto = $codigoNuevo;
    }

    public function getCostoMoto(){
        return $this->costoMoto;
    }
    public function setCostoMoto($costoMotoNuevo){
        $this->costoMoto = $costoMotoNuevo;
    }    

    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }
    public function setAnioFabricacion($nuevoAnioFab){
        $this->anioFabricacion = $nuevoAnioFab;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($nuevaDescripcion){
        $this->descripcion = $nuevaDescripcion;
    }

    public function getPorIncAnual(){
        return $this->porcIncreAnual;
    }
    public function setPorcIncAnual($nuevaIncAnual){
        $this->porcIncreAnual = $nuevaIncAnual;
    }

    public function getDisponible(){
        return $this->disponible;
    }
    public function setDisponible($stock){
        $this->disponible = $stock;
    }


    public function darPrecioVenta(){
        $valida = $this->getDisponible();
        $_venta = 0;
        $_compra = $this->getCostoMoto();
        $anio = date("Y") - $this->getAnioFabricacion();
        $por_inc_anual = $this->getPorIncAnual();
        if($valida == true ){
            $_venta = $_compra + $_compra * ($anio * $por_inc_anual);
        }else{
            $_venta = -1;
        }
        return $_venta;

    }



    public function __toString()
    {
        return "Codigo de la moto: " . $this->getCodigoMoto()."\n" .
        "Costo de la moto: " . $this->getCostoMoto() . "\n" .
        "Año de fabricación: " . $this->getAnioFabricacion() . "\n" .
        "Sus caracteristicas Son: " . $this->getDescripcion() ."\n" .
        "Su valor aumenta un " . $this->getPorIncAnual() . "% " . "\n" . 
        "Disponible?: " . $this->getDisponible( ) . "\n";
        
    }



}