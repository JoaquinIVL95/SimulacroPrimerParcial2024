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
        $precioCompra = $this->getCostoMoto();
        $anioFab = $this->getAnioFabricacion();
        $anio = 2024 - $anioFab;
        $porcAnual = $this->getPorIncAnual();

        if ($this->getDisponible() == true){
            $venta = $precioCompra + $precioCompra * ($anio * $porcAnual);
        }else{
            $venta = -1;
        }

        return $venta;
    }
    // public function hayStock(){
    //     $disponible = $this->getDisponible();
    //     $valor= -1;
    //     if($disponible == true){
    //         $valor = 
    //     }
    // }

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