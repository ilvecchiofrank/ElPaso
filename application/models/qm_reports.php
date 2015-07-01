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

        $html = "<table class='table'><thead><tr><td>Actividades</td><td>Participantes</td><td>Personas con inquietudes</td><td>Total inquietudes</td><td>Inquietudes respondidas</td></tr></thead><tbody>";

        $query = $this->db->query("SELECT COUNT(*) as conteo FROM actividades");
        $dataArray = $query->result();

        $html .= "<tr><td>" . $dataArray[0]->conteo . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT personaid) as conteo FROM actividadpersona");
        $dataArray = $query->result();

        $html .= "<td>" . $dataArray[0]->conteo . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT actividadpersona_id) as conteo FROM actividadpersona_preguntas");
        $dataArray = $query->result();

        $html .= "<td>" . $dataArray[0]->conteo . "</td>";

        $query = $this->db->query("SELECT COUNT(*) as conteo FROM actividadpersona_preguntas");
        $dataArray = $query->result();

        $html .= "<td>" . $dataArray[0]->conteo . "</td>";

        $query = $this->db->query("SELECT COUNT(*) as conteo FROM actividadpersona_preguntas WHERE respuesta_txt IS NOT NULL");
        $dataArray = $query->result();

        $html .= "<td>" . $dataArray[0]->conteo . "</td></tr></tbody></table>";

        return $html;

      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
    }

}