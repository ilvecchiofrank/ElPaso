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

    public function getEventTypes() {
        $query = $this->db->query('SELECT *  from actividades_tipos');
        return $query->result();
    }

    public function insertEvent($arrayData) {
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
        $data = $this->db->query("SELECT MAX(actividadid) as id FROM actividades");
        $data = $data->result();
        $this->setMunicipiosCobertura($data[0]->id, $arrayData["municipiosCobertura"]);
        return true;
    }

    public function updateEvent($actividadid, $arrayData) {
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
        
        $this->setMunicipiosCobertura($actividadid, $arrayData["municipiosCobertura"]);
        
        return true;
    }

    public function setMunicipiosCobertura($actividadid, $stringArray) {
        $data = json_decode($stringArray);
        $this->db->query("delete from municipioscobertura_actividades where actividadid = $actividadid");
        foreach ($data as $key => $value) {
            $this->db->query("INSERT INTO municipioscobertura_actividades (actividadid, mpoid, deptoid)
                              VALUES 
                              ($actividadid,$value->municipioid,$value->departamentoid)");
        }
        return true;
    }

    public function searchEvents($parameters) {
        $query = "SELECT a.actividadid, c.a05Nombre AS dpto, d.a06Nombre AS mpo, b.actividadtipodescripcion AS tipoactividad, a.sitionombre AS sitioevento, a.fechaini, a.fechafin FROM actividades a
                                    INNER JOIN actividades_tipos b ON a.actividadtipoid = b.actividadtipoid
                                    INNER JOIN t05web_departamentos c ON a.dpto = c.a05Codigo
                                    INNER JOIN t06web_municipios d ON a.mpo = d.a06Codigo";
        $filter = false;
        $filterQuery = "";

        if (trim($parameters['dpto']) != "Seleccione..." && trim($parameters['dpto']) != "") {
            $filterQuery .= " a.dpto = $parameters[dpto]";
            $filter = true;
        }
        if (trim($parameters['mpo']) != "Seleccione..." && trim($parameters['mpo']) != "") {
            if ($filter) {
                $filterQuery .= " AND ";
            }
            $filterQuery .= " a.mpo = $parameters[mpo]";
            $filter = true;
        }
        if (trim($parameters['actividadtipoid']) != "Seleccione..." && trim($parameters['actividadtipoid']) != "") {
            if ($filter) {
                $filterQuery .= " AND ";
            }
            $filterQuery .= " a.actividadtipoid = $parameters[actividadtipoid]";
            $filter = true;
        }
        if (trim($parameters['sitionombre']) != "") {
            if ($filter) {
                $filterQuery .= " AND ";
            }
            $filterQuery .= " a.sitionombre like '%$parameters[sitionombre]%'";
            $filter = true;
        }

        if (trim($parameters['fechaini']) != "" && trim($parameters['fechafin']) == "") {
            if ($filter) {
                $filterQuery .= " AND ";
            }
            $filterQuery .= " a.fechaini >= '$parameters[fechaini]'";
            $filter = true;
        }

        if (trim($parameters['fechaini']) == "" && trim($parameters['fechafin']) != "") {
            if ($filter) {
                $filterQuery .= " AND ";
            }
            $filterQuery .= " a.fechafin <= '$parameters[fechafin]'";
            $filter = true;
        }

        if (trim($parameters['fechaini']) != "" && trim($parameters['fechafin']) != "") {
            if ($filter) {
                $filterQuery .= " AND ";
            }
            $filterQuery .= "a.fechafin between '$parameters[fechaini]' and '$parameters[fechafin]' AND a.fechaini between '$parameters[fechaini]' and '$parameters[fechafin]'";
            $filter = true;
        }

        if ($filter) {
            $query .= " WHERE " . $filterQuery;
        }

        $query = $this->db->query($query);
        return $query->result();
    }

    public function getEvent($id) {
        $query = $this->db->query("SELECT *, NULL as municipiosCobertura FROM actividades a
                                   where a.actividadid = $id ");
        return $query->result();
    }
    
    public function getMunicipiosCobertura($id) {
        $query = $this->db->query("SELECT a.mpoid AS municipioid, c.a06Nombre AS municipio, a.deptoid AS departamentoid, b.a05Nombre AS departamento FROM municipioscobertura_actividades a
                                    INNER JOIN t05web_departamentos b ON a.deptoid = b.a05Codigo
                                    INNER JOIN t06web_municipios c ON a.mpoid = c.a06Codigo
                                    WHERE a.actividadid = $id ");
        return $query->result();
    }

}

?>
