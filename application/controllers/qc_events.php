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
    public function form($actividadid) {
        $data = array('actividadid' => $actividadid);
        $this->load->vars($data);
        $this->display_page("form", "events");
    }

    public function getEventTypes() {
        $this->load->model("qm_events", "eventsModel", true);
        $html = "<option>Seleccione...</option>";
        $data = $this->eventsModel->getEventTypes();
        foreach ($data as $key => $value) {
            $html .= "<option value='$value->actividadtipoid'>$value->actividadtipodescripcion</option>";
        }
        echo json_encode($html);
    }
    
    public function getTiposSoportes() {
        $this->load->model("qm_events", "eventsModel", true);
        $html = "<option>Seleccione...</option>";
        $data = $this->eventsModel->getTiposSoportes();
        foreach ($data as $key => $value) {
            $html .= "<option value='$value->tiposoporteid'>$value->soportetxt</option>";
        }
        echo json_encode($html);
    }

    public function getEvent() {
        $this->load->model("qm_events", "eventsModel", true);
        $data = $this->eventsModel->getEvent($_POST["actividadid"]);
        $data[0]->municipiosCobertura = $this->eventsModel->getMunicipiosCobertura($_POST["actividadid"]);
        echo json_encode($data);
    }

    public function getDataEvents() {
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];

        $array["actividadtipoid"] = $_POST["actividadtipoid"];
        $array["dpto"] = $_POST["dpto"];
        $array["mpo"] = $_POST["mpo"];
        $array["fechaini"] = $_POST["fechaini"];
        $array["fechafin"] = $_POST["fechafin"];
        $array["sitionombre"] = $_POST["sitionombre"];

        $data = $this->eventsModel->searchEvents($array);

        $htmlTable = "";
        foreach ($data as $key => $value) {
            $htmlTable .= "<tr><td>$value->dpto</td><td>$value->mpo</td><td>$value->tipoactividad</td><td>$value->sitioevento</td><td>$value->fechaini</td><td>$value->fechafin</td><td> <a href='index.php/events/form/$value->actividadid' class='btn btn-warning'>Editar</a> </td></tr>";
        }

        echo $htmlTable;
    }
    
    public function getSoportesByActividad() {
        $this->load->model("qm_events", "eventsModel", true);

        $data = $this->eventsModel->searchSoportesByActividad($_POST["actividadid"]);

        $htmlTable = "";
        foreach ($data as $key => $value) {
            $htmlTable .= "<tr>
                            <td>$value->tiposoporte</td>
                            <td>$value->nombre</td>
                            <td>$value->descripcion</td>
                            <td>
                                <a target='_blank' href='https://s3.amazonaws.com/elp4s0/soportes/$value->linkdescargasoporte' class='btn btn-success'>
                                    <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                                </a> 
                                <input style='margin-top: -0.1em;' type='button' onclick='editRowFile($value->actividadessoportesid, this)' value='Editar' class='btn btn-warning' />
                                <input style='margin-top: -0.1em;' type='button' onclick='deleteSoporte($value->actividadessoportesid)' value='Eliminar' class='btn btn-danger' />
                    ";
        }

        echo $htmlTable;
    }

    public function save() {
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
        $array["municipiosCobertura"] = $_POST["municipiosCobertura"];
        $actividadid = $_POST["actividadid"];
        if ($actividadid != "0") {
            $this->eventsModel->updateEvent($_POST["actividadid"], $array);
        } else {
            $actividadid = $this->eventsModel->insertEvent($array);
        }

        echo $actividadid;
    }

    public function uploadFilesToS3() {
        $this->load->model("qm_events", "eventsModel", true);
        $soportedid = $_POST["soporteid"];
        $nombre = $_POST["nombre"];
        $actividadid = $_POST["actividadid"];
        $descripcion = $_POST["descripcion"];
        $user = $this->session->userdata("inRUserID");
        
        $this->load->library('aws_sdk');
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/' . 'elpaso_test/public/uploads/tmp/';
        $nameFile = date("Y_m_d_His") . basename($_FILES['itemUpload']['name']);
        $uploadfile = $uploaddir . $nameFile;
        if (move_uploaded_file($_FILES['itemUpload']['tmp_name'], $uploadfile)) {
            /* Carga en carpeta temporal */
            $uploadok = $this->aws_sdk->s3_upload($uploadfile, $nameFile, 'elp4s0/soportes');
            if ($uploadok == true) {
                /* Carga exitosa S3 */
                /* Insertar registro en la tabla */
                $ruta = $nameFile;
                $query = "INSERT INTO actividadessoportes (actividadid, tiposoporteid, linkdescargasoporte, descripcion, user, nombre) VALUES ($actividadid,$soportedid, '$ruta', '$descripcion','$user', '$nombre');";
                $this->eventsModel->insertSoporte($query);
                unlink($uploadfile);
                redirect("events/form/" . $actividadid);
            } else {
                /* Carga no exitosa S3 */
            }
        }
    }
    
    public function updateSoporte(){
        $this->load->model("qm_events", "eventsModel", true);
        $actividadessoportesid = $_POST["actividadessoportesid"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        
        $query = "UPDATE actividadessoportes SET descripcion = '$descripcion', nombre = '$nombre' WHERE actividadessoportesid = $actividadessoportesid";
        $this->eventsModel->insertSoporte($query);
        
        echo "ok";
    }
    
    public function disabledSoporte(){
        $this->load->model("qm_events", "eventsModel", true);
        $actividadessoportesid = $_POST["actividadessoportesid"];
        
        $query = "UPDATE actividadessoportes SET estado = 'I' WHERE actividadessoportesid = $actividadessoportesid";
        $this->eventsModel->insertSoporte($query);
        
        echo "ok";
    }

}