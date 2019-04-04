<?php

interface ObjetoInterface
{
    public function dameVolumen();
    public function damePeso();
    public function dameNombre();
    public function mostrar();
}

class Caja implements ObjetoInterface
{
    const TIPO = 'CAJA';
    private $nombre;
    private $peso;
    private $volumen;
    public $contenido = [];
    private $isAbierta = false;
    private $volumenInicial;

    public function __construct($nombre, $peso, $volumen, $contenido)
    {
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->volumen = $volumen;
        $this->contenido = $contenido;
        $this->volumenInicial = $volumen;
    }

    public function dameContenido()
    {
        return $this->contenido;
    }
    public function dameVolumen()
    {
        return $this->volumen;
    }
    public function damePeso()
    {
        return $this->peso;
    }
    public function dameTipo()
    {
        return $this->tipo;
    }
    public function dameNombre()
    {
        return $this->nombre;
    }
    public function mostrar()
    {
        echo 'Soy una '. self::TIPO . ', mi nombre es ' . $this->nombre . ', mi volumen restante es '. $this->volumen .' y mi contenido es: <br>';
        foreach($this->contenido as $k => $v){
            echo $v->dameNombre() . '<br>';
        }
    }
    public function guardar(ObjetoInterface $objeto)
    {
        if($this->isAbierta){
            if($this->volumen > $objeto->dameVolumen()){
                $this->volumen = $this->volumen - $objeto->dameVolumen();
                $this->contenido[] = $objeto;
            }else{
                echo 'El objeto no entra en la caja';
            }
        }else{
            echo 'No se puede guardar el objeto porque la caja está cerrada';
        }
    }
    public function abrir()
    {
        return $this->isAbierta = true;
    }
    public function cerrar()
    {
        return $this->isAbierta = false;
    }
    public function vaciar()
    {
        foreach($this->contenido as $k => $v){
            echo $v->dameNombre() . '<br>';
        }
        $this->volumen = $this->volumenInicial;
        return $this->contenido = [];
    }
    public function sacar(ObjetoInterface &$objeto)
    {
        //var_dump($this->dameContenido());
        //echo $this->dameContenido()[0]->dameNombre();
        if($this->isAbierta){
            foreach($this->contenido as $k =>$objetos){
                if($this->contenido[$k]->dameNombre() == $objeto->dameNombre()){
                    unset($this->contenido[$k]);
                    $this->volumen = $this->volumen + $objeto->dameVolumen();
                }
            }
            $this->contenido = array_values($this->contenido);
            //var_dump($this->dameContenido());
        }else{
            echo 'La caja está cerrada, no se puede sacar el objeto';
        }
        
    }

}

class Bicicleta implements ObjetoInterface
{
    const TIPO = 'BICICLETA';
    private $nombre;
    private $peso;
    private $volumen;

    public function __construct($nombre, $peso, $volumen)
    {
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->volumen = $volumen;
    }
    public function dameVolumen()
    {
        return $this->volumen;
    }
    public function damePeso()
    {
        return $this->peso;
    }
    public function dameTipo()
    {
        return $this->tipo;
    }
    public function dameNombre()
    {
        return $this->nombre;
    }
    public function mostrar()
    {
        echo 'Soy una ' . self::TIPO . ', mi nombre es ' . $this->nombre . ', mi peso ' . $this->peso . 'kg y mi volumen ' . $this->volumen . '<br>';
    }
    
}

class Taza implements ObjetoInterface
{
    const TIPO = 'TAZA';
    private $nombre;
    private $peso;
    private $volumen;

    public function __construct($nombre, $peso, $volumen)
    {
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->volumen = $volumen;
    }
    public function dameVolumen()
    {
        return $this->volumen;
    }
    public function damePeso()
    {
        return $this->peso;
    }
    public function dameTipo()
    {
        return $this->tipo;
    }
    public function dameNombre()
    {
        return $this->nombre;
    }
    public function mostrar()
    {
        echo 'Soy una ' . self::TIPO . ', mi nombre es ' . $this->nombre . ', mi peso ' . $this->peso . 'kg y mi volumen ' . $this->volumen . 'c3<br>';
    }
}
class Lapiz implements ObjetoInterface
{
    const TIPO = 'LAPIZ';
    private $nombre;
    private $peso;
    private $volumen;

    public function __construct($nombre, $peso, $volumen)
    {
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->volumen = $volumen;
    }
    public function dameVolumen()
    {
        return $this->volumen;
    }
    public function damePeso()
    {
        return $this->peso;
    }
    public function dameTipo()
    {
        return $this->tipo;
    }
    public function dameNombre()
    {
        return $this->nombre;
    }
    public function mostrar()
    {
        echo 'Soy un ' . self::TIPO . ', mi nombre es ' . $this->nombre . ', mi peso ' . $this->peso . 'kg y mi volumen ' . $this->volumen . 'c3<br>';
    }
}
class Pelota implements ObjetoInterface
{
    const TIPO = 'PELOTA';
    private $nombre;
    private $peso;
    private $volumen;

    public function __construct($nombre, $peso, $volumen)
    {
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->volumen = $volumen;
    }
    public function dameVolumen()
    {
        return $this->volumen;
    }
    public function damePeso()
    {
        return $this->peso;
    }
    public function dameTipo()
    {
        return $this->tipo;
    }
    public function dameNombre()
    {
        return $this->nombre;
    }
    public function mostrar()
    {
        echo 'Soy una ' . self::TIPO . ', mi nombre es ' . $this->nombre . ', mi peso ' . $this->peso . 'kg y mi volumen ' . $this->volumen . 'c3.<br>';
    }
}

$caja1 = new Caja('caja1', 1, 100, []);
$caja1->abrir();
$taza1 = new Taza('taza1', 1, 10);
$taza2 = new Taza('taza2', 2, 25);
$pelota1 = new Pelota('pelota1', 3, 14);
$pelota1->mostrar();
echo '<br>';
$caja1->guardar($pelota1);
$caja1->guardar($taza1);
$caja1->guardar($taza2);
$caja1->mostrar();
$caja1->sacar($taza1);
echo '<br>';
$caja1->mostrar();