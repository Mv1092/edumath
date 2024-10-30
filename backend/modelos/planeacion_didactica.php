<?php 
    class Planeacion_didactica{
        //atributo
        public $conexion;
        //metodo constructor
        public function __construct($conexion) {
            $this->conexion =$conexion;
        }
     public function consulta(){
            $con = "SELECT * FROM planeacion_didactica ORDER BY tema";
            $res = mysqli_query($this->conexion, $con);
            $vec =[];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
        }
            return $vec;
        
    }
    public function eliminar($id){
        $del = "DELETE FROM planeacion_didactica  WHERE id_planeacion= $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec ['resultado']= "OK";
        $vec ['mensaje']= "se borro con exito";
        return $vec;
    }
   
    public function insertar($params){
        $ins = "INSERT INTO planeacion_didactica(fo_usuario, tema, fecha, contenido_clase, Ejercitacion, resultados) VALUES('$params->fo_usuario','$params->tema','$params->fecha','$params->contenido_clase','$params->Ejercitacion','$params->resultados')";
        mysqli_query($this->conexion,$ins);
        $vec = [];
        $vec ['resultado']= "OK";
        $vec ['mensaje']= "se actualizaron los datos";
        return $vec;
    }
   
    public function editar($id, $params){
        $editar = "UPDATE planeacion_didactica  SET tema ='$params->tema', id_planeacion = '$params->id_planeacion', fecha =$params->fecha, contenido_clase ='$params->contenido_clase', resultados='$params->resultados', Ejercitacion= '$params->Ejercitacion' WHERE id_planeacion = $id";
        mysqli_query($this->conexion,$editar);
        $vec = [];
        $vec ['resultado']= "OK";
        $vec ['mensaje']= "se edito la informacion ";
        return $vec;
    }
    public function filtro($valor){
        $filtro = "SELET * FROM planeacion_didactica WHERE tema LIKE'%valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];
        
        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
    }
}

?>
