<?php 
    class evaluacion{
        //atributo
        public $conexion;
        //metodo constructor
        public function __construct($conexion) {
            $this->conexion =$conexion;
        }
     public function consulta(){
            $con = "SELECT * FROM evaluacion ORDER BY Formulario";
            $res = mysqli_query($this->conexion, $con);
            $vec =[];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
        }
            return $vec;
        
    }
    public function eliminar($id){
        $del = "DELETE FROM evaluacion WHERE id_evaluacion = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec ['resultado']= "OK";
        $vec ['mensaje']= "se borro con exito";
        return $vec;
    }
   
    public function insertar($params){
        $ins = "INSERT INTO evaluacion(id_evaluacion, fo_usuario, Formulario, Resultado, Fecha) VALUES('$params->id_evaluacion','$params->fo_usuario','$params->Formulario','$params->Resultado','$params->Fecha')";
        mysqli_query($this->conexion,$ins);
        $vec = [];
        $vec ['resultado']= "OK";
        $vec ['mensaje']= "se actualizo la evalucion";
        return $vec;
    }
   
    public function editar($id,$params){
        $editar = "UPDATE evaluacion SET Formulario ='$params->Formulario', Resultado ='$params->Resultado', Fecha = '$params->Fecha' WHERE id_usuario= $id";
        mysqli_query($this->conexion,$editar);
        $vec = [];
        $vec ['resultado']= "OK";
        $vec ['mensaje']= "La evalaucion se edito ";
        return $vec;
    }
    public function filtro($valor){
        $filtro = "SELET * FROM evaluacion WHERE Formulario LIKE'%valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];
        
        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;
    }
}
?>
