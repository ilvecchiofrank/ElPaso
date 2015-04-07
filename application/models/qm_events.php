<?php

/**
 *
 * Administra datos para el modulo de actividades y eventos
 *
 * @category    Data
 * @package     Model
 * @version     CVS: $Id:$
 * @version     PHP: 5.x
 * @since       File available since Release 1.0
 * @author      Juan Camilo Martinez Morales <juan.martinez@mggroup.com.co>
 * @link        http://twitter.com/xogost/
 */
class QM_Events extends CI_Model {
    /**
     * Constructor de la Clase
     */
    public function __construct() {
        parent::__construct();
    }
    
    public function getEventTypes(){
       $query = $this->db->query('SELECT *  from actividades_tipos');
       return $query->result();
    }
    
    
    public function insertEvent($arrayData){
       $this->db->query("INSERT INTO actividades(actividadtipoid,dpto,mpo,fechaini,fechafin,horainicio, horafin,sitionombre,actividaddescripcion)
                                    VALUES (
                                            $arrayData[actividadtipoid],
                                            $arrayData[dpto],
                                            $arrayData[mpo],
                                            '$arrayData[fechaini]',
                                            '$arrayData[fechafin]',
                                            '$arrayData[horainicio]',
                                            '$arrayData[horafin]',
                                            '$arrayData[sitionombre]',
                                            '$arrayData[actividaddescripcion]'
                                            )
                                ");
       return true;
    }
    
    public function updateEvent($actividadid, $arrayData){
       $this->db->query("update actividades
                            set
                            actividadtipoid = $arrayData[actividadtipoid],
                            dpto = $arrayData[dpto],
                            mpo = $arrayData[mpo],
                            fechaini = '$arrayData[fechaini]',
                            fechafin = '$arrayData[fechafin]',
                            horainicio = '$arrayData[horainicio]',
                            horafin = '$arrayData[horafin]',
                            sitionombre = '$arrayData[sitionombre]',
                            actividaddescripcion = '$arrayData[actividaddescripcion]'
                         where actividadid = $actividadid
                                ");
       return true;
    }
    
    public function searchEvents(){
        $query = $this->db->query('SELECT a.actividadid, c.a05Nombre AS dpto, d.a06Nombre AS mpo, b.actividadtipodescripcion AS tipoactividad, a.sitionombre AS sitioevento, a.fechaini, a.fechafin FROM actividades a
                                    INNER JOIN actividades_tipos b ON a.actividadtipoid = b.actividadtipoid
                                    INNER JOIN t05web_departamentos c ON a.dpto = c.a05Codigo
                                    INNER JOIN t06web_municipios d ON a.mpo = d.a06Codigo');
        return $query->result();
    }
    
    public function getEvent($id){
        $query = $this->db->query("SELECT * FROM actividades a
                                   where a.actividadid = $id ");
        return $query->result();
    }
}

?>
