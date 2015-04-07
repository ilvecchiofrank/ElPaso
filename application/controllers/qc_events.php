<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * Administra modulo de eventos y actividades
 *
 * @category    Application
 * @package     Controllers
 * @version     CVS: $Id:$
 * @version     PHP: 5.x
 * @since       File available since Release 1.0
 * @author      Juan Camilo Martinez Morales <juan.martinez@mggroup.com.co>
 * @link        http://twitter.com/xogost/
 */
class QC_Events extends QC_Controller {

    /**
     * Function index
     *
     * Show admin page
     */
    public function index() {
        $this->dash();
    }

    /**
     * Function dash
     *
     * Show dash page
     */
    public function dash() {
        $this->display_page("dash", "events");
    }
    
    /**
     * Function dash
     *
     * Show dash page
     */
    public function form() {
        $this->display_page("form", "events");
    }
    
    public function getEventTypes(){
        $this->load->model("qm_events", "eventsModel", true);
        $html = "<option>Seleccione...</option>";
        $data = $this->eventsModel->getEventTypes();
        foreach ($data as $key => $value) {
            $html .= "<option value='$value->actividadtipoid'>$value->actividadtipodescripcion</option>";
        }
        echo json_encode($html);
    }
    
    public function save(){
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];
        $array["actividadtipoid"] = $_POST["actividadtipoid"];
        $array["dpto"] = $_POST["dpto"];
        $array["mpo"] = $_POST["mpo"];
        $array["fechaini"] = $_POST["fechaini"];
        $array["fechafin"] = $_POST["fechafin"];
        $array["horainicio"] = $_POST["horainicio"];
        $array["horafin"] = $_POST["horafin"];
        $array["sitionombre"] = $_POST["sitionombre"];
        $array["actividaddescripcion"] = $_POST["actividaddescripcion"];
        
        if($_POST["actividadid"] != "0"){
            $this->eventsModel->updateEvent($_POST["actividadid"], $array);
        }else{
            $this->eventsModel->insertEvent($array);
        }
        
        echo "true";
    }
}