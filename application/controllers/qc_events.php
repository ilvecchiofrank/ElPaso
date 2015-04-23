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
    
    public function people($actividadid) {
        $this->load->model("qm_events", "eventsModel", true);
        $dataMiga = $this->eventsModel->getMigaParticipantes($actividadid);
        
        $htmlMiga = "
                    <li class='active'>" . $dataMiga[0]->dpto . "</li>
                    <li class='active'>" . $dataMiga[0]->mpo . "</li>
                    <li class='active'>" . $dataMiga[0]->fechaini . "</li>
                    <li class='active'>" . $dataMiga[0]->sitioevento . "</li>
                    <li class='active'>" . $dataMiga[0]->descripcion . "</li>
                    ";
        
        $data = array('actividadid' => $actividadid, 'htmlMiga' => $htmlMiga);
        $this->load->vars($data);
        $this->display_page("people", "events");
    }
    
    public function questions($actividadid, $personaid) {
        $this->load->model("qm_events", "eventsModel", true);
        $dataMiga = $this->eventsModel->getMigaActividadParticipantes($actividadid, $personaid);
        
        $htmlMiga = "
                    <li class='active'>" . $dataMiga[0]->dpto . "</li>
                    <li class='active'>" . $dataMiga[0]->mpo . "</li>
                    <li class='active'>" . $dataMiga[0]->fechaini . "</li>
                    <li class='active'>" . $dataMiga[0]->sitioevento . "</li>
                    <li class='active'>" . $dataMiga[0]->descripcion . "</li>
                    <li class='active'>" . $dataMiga[0]->persona . "</li>
                    ";
        
        $data = array('actividadid' => $actividadid, 'personaid' => $personaid, 'htmlMiga' => $htmlMiga);
        $this->load->vars($data);
        $this->display_page("questions", "events");
    }
    
    public function questionsCategorised() {
        $this->load->model("qm_events", "eventsModel", true);
        $this->display_page("questionsCategorised", "events");
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
    
    public function getPreguntasCategorias() {
        $this->load->model("qm_events", "eventsModel", true);
        $html = "<option>Seleccione...</option>";
        $data = $this->eventsModel->getPreguntasCategorias();
        foreach ($data as $key => $value) {
            $html .= "<option value='$value->preguntacategoriaid'>$value->preguntadescripciontxt</option>";
        }
        echo json_encode($html);
    }
    
    public function getSexo() {
        $this->load->model("qm_events", "eventsModel", true);
        $html = "<option>Seleccione...</option>";
        $data = $this->eventsModel->getSexo();
        foreach ($data as $key => $value) {
            $html .= "<option value='$value->sexoid'>$value->sexo</option>";
        }
        echo json_encode($html);
    }
    
    public function getTiposDocumento() {
        $this->load->model("qm_events", "eventsModel", true);
        $html = "<option>Seleccione...</option>";
        $data = $this->eventsModel->getTiposDocumento();
        foreach ($data as $key => $value) {
            $html .= "<option value='$value->tipo_documento_id'>$value->tipo_documento</option>";
        }
        echo json_encode($html);
    }

    public function getEvent() {
        $this->load->model("qm_events", "eventsModel", true);
        $data = $this->eventsModel->getEvent($_POST["actividadid"]);
        $data[0]->municipiosCobertura = $this->eventsModel->getMunicipiosCobertura($_POST["actividadid"]);
        echo json_encode($data);
    }
    
    public function getPersona() {
        $this->load->model("qm_events", "eventsModel", true);
        $data = $this->eventsModel->getPersona($_POST["personaid"]);        
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
    
    public function getPeople() {
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];

        $array["nombres"] = $_POST["nombres"];
        $array["apellidos"] = $_POST["apellidos"];
        $array["documento"] = $_POST["documento"];

        $data = $this->eventsModel->searchPeople($array);

        $htmlTable = "";
        foreach ($data as $key => $value) {
            $htmlTable .= "<tr>
                                <td>$value->nombres</td>
                                <td>$value->apellidos</td>
                                <td>$value->sexo</td>
                                <td>$value->nodocumento</td>
                                <td>$value->dpto</td>
                                <td>$value->mpo</td>
                                <td>$value->telefono</td>
                                <td>$value->celular</td>
                                <td> 
                                    <button class='btn btn-warning' onclick='personaid = $value->personaid; getData();'>Editar</button>
                                    <button class='btn btn-success' onclick='agregarActividadPersona($value->personaid);'>Agregar</button>
                                 </td>
                            </tr>";
        }

        echo $htmlTable;
    }
    
    public function getPreguntasParticipantes() {
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];

        $array["actividadid"] = $_POST["actividadid"];
        $array["personaid"] = $_POST["personaid"];

        $data = $this->eventsModel->searchPreguntasParticipantes($array);

        $htmlTable = "";
        foreach ($data as $key => $value) {
            $htmlTable .= "<tr>
                                <td>$value->categoriatxt</td>
                                <td>$value->inquietud</td>
                                <td> 
                                    <button class='btn btn-warning' onclick='updateQuestion($value->id, $value->categoria,\"$value->inquietud\");'>Editar</button>
                                    <button class='btn btn-danger' onclick='deletePreguntasParticipantes($value->id);'>Eliminar</button>
                                 </td>
                            </tr>";
        }

        echo $htmlTable;
    }
    
    public function getPreguntasCategorizadas() {
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];

        $data = $this->eventsModel->searchPreguntasCategorizadas();

        $htmlTable = "";
        foreach ($data as $key => $value) {
            $htmlTable .= "<tr>
                                <td>$value->pregunta_categorizada_id</td>
                                <td>$value->pregunta_categorizadatxt</td>
                                <td> 
                                    <button class='btn btn-warning' onclick='updateQuestionCategorised($value->pregunta_categorizada_id, \"$value->pregunta_categorizadatxt\");'>Editar</button>
                                    <button class='btn btn-danger' onclick='deletePreguntasCategorizadas($value->pregunta_categorizada_id);'>Eliminar</button>
                                 </td>
                            </tr>";
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
    
    public function saveParticipantePregunta() {
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];
        $array["personaid"] = $_POST["personaid"];
        $array["inquietud"] = $_POST["inquietud"];
        $array["preguntasCategoriaId"] = $_POST["preguntasCategoriaId"];
        $array["actividadid"] = $_POST["actividadid"];
        $actividadpersona_pregunta_id = $_POST["actividadpersona_pregunta_id"];
        
        if ($actividadpersona_pregunta_id != "0") {
            $this->eventsModel->updateParticipantePregunta($_POST["actividadpersona_pregunta_id"], $array);
        } else {
            $actividadpersona_pregunta_id = $this->eventsModel->insertParticipantePregunta($array);
        }

        echo $actividadpersona_pregunta_id;
    }
    
    public function saveParticipanteCategorizada() {
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];
        $array["inquietudid"] = $_POST["inquietudid"];
        $array["inquietud"] = $_POST["inquietud"];
        $inquietudid = $array["inquietudid"];
        
        if ($inquietudid != "0") {
            $this->eventsModel->updatePreguntaCategorizada($inquietudid, $array);
        } else {
            $inquietudid = $this->eventsModel->insertPreguntaCategorizada($array);
        }

        echo $inquietudid;
    }
    
    public function savePersona() {
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];
        $array["personaid"] = $_POST["personaid"];
        $array["dpto"] = $_POST["dpto"];
        $array["mpo"] = $_POST["mpo"];
        $array["nombres"] = $_POST["nombres"];
        $array["apellidos"] = $_POST["apellidos"];
        $array["tipo_documento_id"] = $_POST["tipo_documento_id"];
        $array["documento"] = $_POST["documento"];
        $array["sexo"] = $_POST["sexo"];
        $array["direccion"] = $_POST["direccion"];
        $array["telefono"] = $_POST["telefono"];
        $array["celular"] = $_POST["celular"];
        $array["cargo"] = $_POST["cargo"];
        $array["entidad"] = $_POST["entidad"];
        $array["fechanac"] = $_POST["fechanac"];
        
        $personaid = $_POST["personaid"];
        if ($personaid != "0") {
            $personaid = $this->eventsModel->updatePersona($_POST["personaid"], $array);
        } else {
            $personaid = $this->eventsModel->insertPersona($array);
        }
        
        echo $personaid;
    }
    
    public function setPersonaActividad() {
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];
        $array["personaid"] = $_POST["personaid"];
        $array["actividadid"] = $_POST["actividadid"];
       
        echo  $this->eventsModel->setPersonaActividad($array);
        
        
    }
    
    public function removePersonaActividad() {
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];
        $array["personaid"] = $_POST["personaid"];
        $array["actividadid"] = $_POST["actividadid"];
       
        echo  $this->eventsModel->removePersonaActividad($array);
        
        
    }
    
    public function deletePreguntasParticipantes() {
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];
        $array["id"] = $_POST["id"];
       
        echo  $this->eventsModel->deletePreguntasParticipantes($array);
    }
    
    public function deletePreguntasCategorizadas() {
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];
        $array["id"] = $_POST["id"];
       
        echo  $this->eventsModel->deletePreguntasCategorizadas($array);
    }
    
    public function getPersonasActividad(){ 
        $this->load->model("qm_events", "eventsModel", true);
        $array = [];
        $array["actividadid"] = $_POST["actividadid"];
       
        $data =  $this->eventsModel->getPersonaActividad($array);
        
        $htmlTable = "";
        foreach ($data as $key => $value) {
            $htmlTable .= "<tr>
                                <td>$value->nombres</td>
                                <td>$value->apellidos</td>
                                <td>$value->sexo</td>
                                <td>$value->nodocumento</td>
                                <td>$value->dpto</td>
                                <td>$value->mpo</td>
                                <td>$value->telefono</td>
                                <td>$value->celular</td>
                                <td> 
                                    <button class='btn btn-danger' onclick='eliminarActividadPersona($value->personaid);'>Desvincular</button>
                                    <button class='btn btn-warning' onclick='window.location = \"index.php/events/questions/$_POST[actividadid]/$value->personaid\"'>Inquietudes</button>
                                 </td>
                            </tr>";
        }

        echo $htmlTable;
    }

    public function uploadFilesToS3() {
        $this->load->model("qm_events", "eventsModel", true);
        $soportedid = $_POST["soporteid"];
        $nombre = $_POST["nombre"];
        $actividadid = $_POST["actividadid"];
        $descripcion = $_POST["descripcion"];
        $user = $this->session->userdata("inRUserID");
        
        $this->load->library('aws_sdk');
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/' . $this->config->item('app_dir') . '/public/uploads/tmp/';
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