<?php

interface ObjetoInterface
{
    public function dameVolumen();
    public function damePeso();
    public function dameNombre();
    public function mostrar();
}

interface ProductoInterface
{
    public function dameNombre();
    public function damePrecio();
}

interface CuentaBancariaInterface
{
    public function dameBanco();
    public function dameNumero();
    public function debitar($monto);
    public function acreditar($monto);
    public function dameSaldo();
    public function mostrarSaldo($entidad);
}

interface ClienteInterface
{
    public function dameNombre();
    public function dameCodigoCliente();
    public function dameCuenta();
    public function comprar($almacen, $producto);
    
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
        echo 'Soy una '. self::TIPO . ', mi nombre es ' . $this->nombre . ', mi volumen disponible es '. $this->volumen .' y mi contenido es: <br>';
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
                echo 'El objeto ' . $objeto->dameNombre() . ' ha sido guardado en ' . $this->nombre . '<br>';
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
    public function sacar(ObjetoInterface $objeto)
    {
        //var_dump($this->dameContenido());
        //echo $this->dameContenido()[0]->dameNombre();
        if($this->isAbierta){
            foreach($this->contenido as $k =>$objetos){
                if($this->contenido[$k]->dameNombre() == $objeto->dameNombre()){
                    unset($this->contenido[$k]);
                    $this->volumen = $this->volumen + $objeto->dameVolumen();
                    echo 'El objeto ' . $objeto->dameNombre() . ' ha sido sacado de ' . $this->nombre . '<br>';
                }
            }
            $this->contenido = array_values($this->contenido);
            //var_dump($this->dameContenido());
            
        }else{
            echo 'La caja está cerrada, no se puede sacar el objeto <br>';
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

class CuentaBancaria implements CuentaBancariaInterface
{
    private $banco;
    private $numero;
    private $saldo;

    public function __construct($banco, $numero, $saldoInicial)
    {
        $this->banco = $banco;
        $this->numero = $numero;
        $this->saldo = $saldoInicial;
    }
    public function dameBanco()
    {
        return $this->banco;
    }
    public function dameNumero()
    {
        return $this->numero;
    }
    public function debitar($monto)
    {
        $this->saldo -= $monto;
    }
    public function acreditar($monto)
    {
        $this->saldo += $monto;
    }
    public function dameSaldo()
    {
        return $this->saldo;
    } 
    public function mostrarSaldo($entidad)
    {
        echo 'Saldo perteneciente a: '. $entidad->dameNombre() .'. Banco: ' . $this->banco . ' .Numero de cuenta: ' . $this->numero . '. Saldo: $' . $this->saldo . '<br>';
    }
}

class Producto implements ProductoInterface
{
    private $nombre;
    private $precio;

    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
    public function dameNombre()
    {
        return $this->nombre;
    }
    public function damePrecio()
    {
        return $this->precio;
    }
}

class Cliente implements ClienteInterface
{
    private $nombre;
    private $codigoCliente;
    private $cuenta;

    public function __construct($nombre, $codigoCliente, CuentaBancariaInterface $cuenta)
    {
        $this->nombre = $nombre;
        $this->codigoCliente = $codigoCliente;
        $this->cuenta = $cuenta;
    }
    public function dameNombre()
    {
        return $this->nombre;
    }
    public function dameCodigoCliente()
    {
        return $this->codigoCliente;
    }
    public function dameCuenta()
    {
        return $this->cuenta;
    }
    public function comprar($almacen, $producto)
    {
        if($this->cuenta->dameSaldo() >= $producto->damePrecio()){
            $this->cuenta->debitar($producto->damePrecio());
            $almacen->dameCuenta()->acreditar($producto->damePrecio());
            $almacen->sacarProducto($producto);
            echo 'Se ha comprado el producto: ' . $producto->dameNombre() . ' $'. $producto->damePrecio() .'<br>';
        }else{
            echo 'Saldo insuficiente';
        }
        
    }
    
}

class Almacen
{
    private $nombre;
    private $productos = [];
    private $cuenta;

    public function __construct($nombre, CuentaBancariaInterface $cuenta , array $productos)
    {
        $this->nombre = $nombre;
        $this->productos = $productos;
        $this->cuenta = $cuenta;
    }
    public function dameNombre()
    {
        return $this->nombre;
    }
    public function dameProductos()
    {
        return $this->productos;
    }
    public function dameCuenta()
    {
        return $this->cuenta;
    }
    public function sacarProducto($item)
    {   
        foreach($this->productos as $k => $producto){
            if($this->productos[$k]->dameNombre() == $item->dameNombre()){
                unset($this->productos[$k]);
            }
        }
        $this->productos = array_values($this->productos);
    }
    public function mostrarProductos()
    {
        echo 'Estos son los productos de '. $this->nombre .':<br><br>';
        foreach($this->productos as $k => $producto){
            echo  $producto->dameNombre() . '  $' . $producto->damePrecio() .'<br>'; 
        } 
    }
    public function agregarProducto(ProductoInterface $producto)
    {
        $this->productos[] = $producto;
    }

}
 
$caja1 = new Caja('caja1', 1, 100, []);
$caja1->abrir();
//$pelota1->mostrar();
echo '<br>';
// Si instancio el objeto cuando lo guardo queda dentro de la caja
$caja1->guardar($pelota1 = new Pelota('pelota1', 3, 14));
$caja1->guardar($taza1 = new Taza('taza1', 1, 10));
$caja1->guardar($taza2 = new Taza('taza2', 2, 25));
echo '<br>';
$caja1->mostrar();
echo '<br>';
$caja1->sacar($pelota1);
echo '<br>';
$caja1->mostrar();
$cuenta1 = new CuentaBancaria('Banco Caca', 23213213, 500);
$cuenta2 = new CuentaBancaria('Banco Pedo', 23214323, 1500);
$cuenta1->acreditar(100);
//echo $cuenta1->dameSaldo();
echo '<br>';
$cliente1 = new Cliente('Carlitos', 11111, $cuenta1);
//echo $cliente1->dameNombre() . ' ' . $cliente1->dameCuenta()->dameSaldo();
$producto1 = new Producto('Coca', 90);
$producto2 = new Producto('Birra', 190);
$producto3 = new Producto('Yerba', 70);
$almacen1 = new Almacen('El viejo almacén', $cuenta2, []);
$almacen1->agregarProducto($producto1);
$almacen1->agregarProducto($producto2);
$almacen1->agregarProducto($producto3);
$almacen1->mostrarProductos();
echo '<br>';
$cliente1->dameCuenta()->mostrarSaldo($cliente1) .'<br>';
$almacen1->dameCuenta()->mostrarSaldo($almacen1) .'<br>';
$cliente1->comprar($almacen1, $producto2);
echo '<br>';
$cliente1->dameCuenta()->mostrarSaldo($cliente1) .'<br>';
$almacen1->dameCuenta()->mostrarSaldo($almacen1) .'<br>';
echo '<br>';
$almacen1->mostrarProductos();


// tablero y juego son dos entidades (tiene las reglas)
// detectar ganadores solo con tres horizontales y validar que sea una posicion valida

// tateti le esta preguntando al tablero cada cosa

// jugar en una posiscion pueden jugar cualqueir tipo cruz circulo sorete

// dibujar uml