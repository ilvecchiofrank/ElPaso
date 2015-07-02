<?php

class QM_Reports extends CI_Model {

    /**
     * Metodo get_activity_dpto
     *
     * Método que trae los departamentos existentes en la tabla de actividades
     *
     * @return array
     */
    public function get_activity_dpto(){
      try {
        $query = $this->db->query("SELECT DISTINCT(a.dpto) AS codigo, wd.a05Nombre AS departamento FROM actividades a JOIN t05web_departamentos wd ON a.dpto = wd.a05Codigo ORDER BY departamento");
        $dataArray = $query->result();

        $html = "<option value=''>Seleccione...</option>";
        foreach ($dataArray as $departamento => $objDepto) {
          $html .= "<option value='$objDepto->codigo'>$objDepto->departamento</option>";
        }

        return $html;

      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
    }

    /**
     * Metodo get_activity_mpo
     *
     * Metodo que trae los municipios existentes en la tabla de actividades filtrado por municipio
     */
    public function get_activity_mpo($departamento){
      try {
        $query = $this->db->query("SELECT DISTINCT(a.mpo) AS codigo, wm.a06Nombre AS municipio FROM actividades a JOIN t06web_municipios wm ON a.mpo = wm.a06Codigo WHERE a.dpto = $departamento ORDER BY municipio");
        $dataArray = $query->result();

        $html = "<option value=''>Seleccione...</option>";
        foreach ($dataArray as $municipio => $objMpo) {
          $html .= "<option value='$objMpo->codigo'>$objMpo->municipio</option>";
        }

        return $html;

      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
    }

    /**
     * Metodo get_report_resume
     *
     * Metodo que trae el resumen del reporte general
     */
    public function get_report_resume(){
      try {

        $html = "<table><thead><tr><td>Actividades</td><td>Personas</td><td>Participaciones</td><td>Participantes con inquietudes</td><td>Total inquietudes</td><td>Inquietudes respondidas</td></tr></thead><tbody>";

        $query = $this->db->query("SELECT COUNT(*) as conteo FROM actividades");
        $dataArray = $query->result();

        $html .= "<tr><td>" . $dataArray[0]->conteo . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT personaid) as conteo FROM actividadpersona");
        $dataArray = $query->result();

        $html .= "<td>" . $dataArray[0]->conteo . "</td>";

        $query = $this->db->query("SELECT COUNT(personaid) as conteo FROM actividadpersona");
        $dataArray = $query->result();

        $html .= "<td>" . $dataArray[0]->conteo . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT actividadpersona_id) as conteo FROM actividadpersona_preguntas");
        $dataArray = $query->result();

        $html .= "<td>" . $dataArray[0]->conteo . "</td>";

        $query = $this->db->query("SELECT COUNT(*) as conteo FROM actividadpersona_preguntas");
        $dataArray = $query->result();

        $html .= "<td>" . $dataArray[0]->conteo . "</td>";

        $query = $this->db->query("SELECT COUNT(*) AS conteo FROM actividadpersona_preguntas WHERE respuesta_txt IS NOT NULL AND respuesta_txt <> ''");
        $dataArray = $query->result();

        $html .= "<td>" . $dataArray[0]->conteo . "</td></tr></tbody></table>";

        return $html;

      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
    }

    /**
     * Metodo get_report_by_id
     *
     * Metodo que trae los datos del reporte por id
     */
    public function get_report_by_id($id){
        try {
            $query = $this->db->query("SELECT act.actividadtipodescripcion AS act_tipo, wd.a05Nombre AS dpto, wm.a06Nombre AS mpo, a.fechafin, a.fechaini, a.horafin, a.horainicio, a.sitionombre, a.actividaddescripcion FROM actividades a JOIN actividades_tipos act ON a.actividadtipoid = act.actividadtipoid JOIN t05web_departamentos wd ON a.dpto = wd.a05Codigo JOIN t06web_municipios wm ON a.mpo = wm.a06Codigo WHERE a.actividadid = $id");
            $dataArray = $query->result();

            return $dataArray;
        } catch (Exception $e) {
            $e->getTraceAsString();
        }
    }

    /**
     * Metodo get_cobertura_by_id
     *
     * Metodo que trae los municipios de cobertura por id
     */
    public function get_cobertura_by_id($id){
        try {
            $query = $this->db->query("SELECT wd.a05Nombre AS depto, wm.a06Nombre AS mpo FROM municipioscobertura_actividades mca  JOIN t05web_departamentos wd ON mca.deptoid = wd.a05Codigo JOIN t06web_municipios wm ON mca.mpoid = wm.a06Codigo WHERE mca.actividadid = $id");
            $dataArray = $query->result();

            return $dataArray;
        } catch (Exception $e) {
            $e->getTraceAsString();
        }
    }

    /**
     * Metodo get_report_details
     *
     * Metodo que trae los detalles del reporte general
     */
    public function get_report_details(){
      try {
        $html = "<table><thead><tr><td>Departamento</td><td>Municipio</td><td>Fecha inicio</td><td>Fecha fin</td><td>Hora inicio</td><td>Hora fin</td><td>Lugar</td><td></td></tr></thead><tbody>";

        $query = $this->db->query("SELECT a.actividadid, wd.a05Nombre, wm.a06Nombre, a.fechaini, a.fechafin, a.horainicio, a.horafin, a.sitionombre FROM actividades a JOIN t05web_departamentos wd ON a.dpto = wd.a05Codigo JOIN t06web_municipios wm ON a.mpo = wm.a06Codigo");
        $dataArray = $query->result();

        foreach ($dataArray as $registro => $value) {
          $html .= "<tr><td>" . $value->a05Nombre . "</td><td>" . $value->a06Nombre . "</td><td>" . $value->fechaini . "</td><td>" . $value->fechafin . "</td><td>" . $value->horainicio . "</td><td>" . $value->horafin . "</td><td>" . $value->sitionombre . "</td><td>" . "<a id='btnCert' href='index.php/reports/activityDetailedReport/" . $value->actividadid . "' class='btn btn-success btn-md'>Detalle</a>" . "</td></tr>";
        }

        $html .= "</tbody></table>";

        return $html;

      } catch (Exception $e) {
        $e->getTraceAsString();
      }
    }
}