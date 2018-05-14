<?php
class Cds{
    public $titulo;
    public $interprete;
    public $anio;
    public $id;
    public function mostrarDatos()
    {
        return $this->titulo."-".$this->interprete."-".$this->anio."-".$this->id."</br>";
    }
}
try {

    //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASE�A
    $usuario='root';
    $clave='';

    $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);

    $sql=$objetoPDO->prepare('SELECT titel AS titulo , interpret AS interprete , jahr AS anio , id FROM cds WHERE id=:id');
   // FETCH LAZY
   /*  while($aux=$sql->fetch(PDO::FETCH_LAZY))
    {
        echo $aux->titulo."-".$aux->interprete."-".$aux->anio."-".$sql->id;
    } */


   // FETCH INTO
  /*  $sql->setFetchMode(PDO::FETCH_INTO,new Cds);
   $sql->execute();
    foreach ($sql as $aux) {
        echo $sql->titulo;
    } */

   
    // BIND COLUMN
    /* $sql->bindParam(':id',$_POST['id'],PDO::PARAM_INT);
    $sql->bindColumn(1,$idTitulo,PDO::PARAM_STR);
    $sql->bindColumn(2,$idInterprete,PDO::PARAM_STR);
    $sql->bindColumn(3,$idAnio,PDO::PARAM_INT);
    $sql->bindColumn(4,$idId,PDO::PARAM_INT);
    $sql->execute();
    while($sql->fetch(PDO::FETCH_BOUND))
    {
        echo $idTitulo."-".$idInterprete."-".$idAnio."-".$idId."<br>";
    } */
    // BIND PARAM <3
    /* $sql->bindParam(':id',$_POST['id'],PDO::PARAM_INT);
    $sql->execute();

    $fila=$sql->fetch();
    echo $fila[0]."-".$fila[1]."-".$fila[2]."<br>";
    $_POST['id']='hola';
    $sql->execute();
    $fila=$sql->fetch();
    echo $fila[0]."-".$fila[1]."-".$fila[2]."<br>"; */

    // EXECUTE Y PREPARE
    /*  $sql->execute(array('id'=> $_POST['id']));
    
    while($fila=$sql->fetch())
    {
        echo $fila[0]."-".$fila[1]."-".$fila[2]."<br>";
    }

    $sql->execute(array('id'=> 4)); */

    // QUERY CON OBJECT
    /* $sql=$objetoPDO->query('SELECT titel AS titulo , interpret AS interprete , jahr AS anio , id FROM cds');
    while($fila=$sql->fetchObject('Cds'))
    {
        echo $fila->mostrarDatos();
    } */
    /* $result= $sql->fetchAll();
    foreach($result as $fila)
    {
        echo $fila[0]."-".$fila[1]."-".$fila[2]."</br>";
    } */

    
} catch (PDOException $e) {

    echo "Error!!!\n" . $e->getMessage();
}


?>