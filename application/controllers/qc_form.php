<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Archivo de la Clase QC_Pages
 *
 * Controla el Aspecto Visual de las Paginas
 *
 * @category    Application
 * @package     Controllers
 * @version     CVS: $Id:$
 * @version     PHP: 5.x
 * @since       File available since Release 1.0
 * @author      Alvaro Montenegro <arthvrian@yahoo.com>
 * @link        http://www.arthvrian.org/
 */
/**
 * Asigna las Opciones del Módulo y Despliega la Vista
 *
 * @category    Application
 * @package     Controllers
 * @version     CVS: $Id:$
 * @version     PHP: 5.x
 * @since       Class available since Release 1.0
 * @author      Alvaro Montenegro <arthvrian@yahoo.com>
 * @link        http://www.arthvrian.org/
 */
class QC_Form extends QC_Controller {

    /**
     * Metodo index
     *
     * Método que Muestra la Pagina de Usuario solicitada
     */
    public function index() {
        if ($this->session->userdata("isLoggedIn")) {
            redirect("form/search");

            return;
        }

        redirect("/");
    }

    /* Formulario para consultar certificaciones*/
    public function files(){
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("files", "form");
            return;
        }

        redirect("/");
    }

    /* Formulario para consultar certificaciones*/
    public function j_actions(){
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("j_actions", "form");
            return;
        }

        redirect("/");
    }

    /* Formulario para consultar cruces BD*/
    public function dbmatch(){
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("dbmatch", "form");
            return;
        }

        redirect("/");
    }

    /* Formulario para consultar concepto comite expertos */
    public function cce(){
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("cce", "form");
            return;
        }

        redirect("/");
    }

    /* Formulario para consultar el dash por estados */
    public function dash_filter(){
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("dash_filter", "form");
            return;
        }

        redirect("/");
    }

    /* Formulario para consultar concepto comite expertos */
    public function supp_con(){
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("supp_con", "form");
            return;
        }

        redirect("/");
    }

    /* Dashboard*/
    public function dash(){
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("dash", "form");
            return;
        }

        redirect("/");
    }

    /* Formulario para consultar cartas de respuesta */
    public function pre_letter(){
        if($this->session->userdata("isLoggedIn")) {
            $this->display_page("pre_letter", "form");
            return;
        }
        redirect("/");
    }

    /* Formulario para consultar cruces BD*/
    public function tutelas(){
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("tutelas", "form");
            return;
        }

        redirect("/");
    }

    /* Formulario de redaccion de cartas*/
    public function create_letter(){
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("create_letter", "form");
            return;
        }

        redirect("/");
    }

    /*Formulario de impresion de cartas*/
    public function print_letter($formulario, $id_respuesta){
        if($this->session->userdata("isLoggedIn")){
            $this->load->model("qm_form", "form", true);
            $arrLPageData = array();
            $arrLPageData["arrPrintData"] = $this->form->get_letter_header($formulario);
            $arrLPageData["arrLetterContent"] = $this->form->get_letter_contents($id_respuesta);
            $arrLPageData["arrTipol"] = $this->form->get_cat_info($formulario);
            $arrLPageData["usr_Red"] = $this->form->get_user_init($arrLPageData["arrLetterContent"][0]->usuario_redactor);
            $arrLPageData["usr_Con"] = $this->form->get_user_init($arrLPageData["arrLetterContent"][0]->usuario_consultor);
            $arrLPageData["usr_Jur"] = $this->form->get_user_init($arrLPageData["arrLetterContent"][0]->usuario_juridico);
            $this->load->vars($arrLPageData);
            $this->display_page("print_letter", "form", true);
            return;
        }

        redirect("/");
    }

    /**
     * Metodo search
     *
     * Método que Muestra la Pagina de Busqueda
     */
    public function search() {
        if ($this->session->userdata("isLoggedIn")) {
            $this->session->unset_userdata("inRSearch");
            $this->session->unset_userdata("bolRSearch");
            $this->session->unset_userdata("inRFormID");
            $this->session->unset_userdata("stRFormID");
            $this->display_page("search", "form");

            return;
        }

        redirect("/");
    }
    /**
     * Metodo start
     *
     * Método que Muestra la Pagina de Inicio de Registro
     */
    public function start() {
        if ($this->session->userdata("isLoggedIn")) {
            if (!$this->session->userdata("bolRSearch")) {
                redirect("form/search");
            }

            $this->load->model("qm_api", "api", true);
            $this->session->unset_userdata("inRSearch");
            $this->session->unset_userdata("inRFormID");
            $this->session->unset_userdata("stRFormID");
            $arrLPageData = array();

            $arrLPageData["arrRStates"] = $this->api->get_states(true);

            $this->load->vars($arrLPageData);
            $this->display_page("start", "form");

            return;
        }

        redirect("/");
    }
    /**
     * Metodo chapter
     *
     * Método que Muestra el Capitulo a ingresar
     */
    public function chapter($stRChapter = null, $inRSearch = null) {
        if ($this->session->userdata("isLoggedIn")) {
            $this->load->model("qm_api", "api", true);
            $this->load->model("qm_form", "form", true);
            $arrLPageData = array();
            $arrLPageData["arrRSearch"] = $this->form->get_form();
            $arrLPageData["arrRTowns"] = $this->api->get_towns(13, false);

            if (is_null($stRChapter) ||
                    (is_null($inRSearch) && !$this->session->userdata("inRFormID"))) {
                redirect("form/search");
            }
            if (!is_null($inRSearch)) {
                $this->session->set_userdata("inRSearch", $inRSearch);
                $arrLSearch = $this->form->get_search();

                if ($arrLSearch) {
                    $arrLPageData["arrRSearch"] = $arrLSearch;
//                    $arrLPageData["arrRTowns"] = $this->api->get_towns($arrLSearch["a08AP09O02"], false);
                }
                else {
                    redirect("form/search");
                }
            }

            $arrLPageData["arrRCountries"] = $this->api->get_countries();
            $arrLPageData["arrRStates"] = $this->api->get_states();
            $arrLPageData["arrRChapters"] = $this->form->get_chapters();
            $arrLPageData["arrRChapter"] = $this->form->get_chapters($stRChapter);
            $arrLPageData["stRPageTitle"] = $stRChapter;
            $arrLPageData["inRSearch"] = $inRSearch;

            $this->load->vars($arrLPageData);
            $this->display_page("chapter", "form");

            return;
        }

        redirect("/");
    }
    /**
     * Metodo done
     *
     * Método que Muestra la Pagina de Finalizacion
     */
    public function done($inRSearch = null) {
        if ($this->session->userdata("isLoggedIn")) {
            if (!is_null($inRSearch)) {
                $this->session->set_userdata("inRFormID", $inRSearch);
            }
            if ($this->session->userdata("inRFormID")) {
                $this->load->model("qm_form", "form", true);
                $arrLPageData = array();

                $arrLForm = $this->form->get_form();
                $arrLPageData["arrRForm"] = $arrLForm;

                $this->load->vars($arrLPageData);
                $this->display_page("done", "form");

                return;
            }
        }

        redirect("/");
    }
    /**
     * Metodo print_form
     *
     * Método que Muestra la Pagina de Impresion
     */
    public function print_form($inRSearch = null, $stRType = null) {
        if ($this->session->userdata("isLoggedIn")) {
            if (!is_null($inRSearch)) {
                $this->session->set_userdata("inRFormID", $inRSearch);
            }
            if ($this->session->userdata("inRFormID")) {
                $this->load->model("qm_form", "form", true);
                $this->load->model("qm_user", "user", true);
                $arrLPageData = array();

                $arrLForm = $this->form->get_form();
                $arrLPageData["arrRForm"] = $arrLForm;
                $arrLPageData["arrRChapter"] = $this->form->get_chapters("A");
                $arrLPageData["arrRAnswers"] = $this->user->get_answers();
                $arrLPageData["stRType"] = $stRType;

                $this->load->vars($arrLPageData);
                $this->display_page("print", "form", true);

                return;
            }
        }

        redirect("/");
    }

    /* Metodo full_form
        metodo que muestra la pagina alternativa de impresion*/
        public function print_full($inRSearch = null, $stRType = null){

            if ($this->session->userdata("isLoggedIn")) {

                if (!is_null($inRSearch)){
                    $this->session->set_userdata("inRFormID", $inRSearch);
                }

                if ($this->session->userdata("inRFormID")){

                    $this->load->model("qm_form", "form", true);
                    $this->load->model("qm_user", "user", true);
                    $arrLPageData = array();

                    /*Obtener los datos del formulario*/
                    $arrLForm = $this->form->get_form();
                    $arrLPageData["arrRForm"] = $arrLForm;
                    $arrLPageData["arrRChapter"] = $this->form->get_chapters("A");
                    $arrLPageData["arrRAnswers"] = $this->user->get_answers();
                    $arrLPageData["arrRChapterB"] = $this->form->get_chapterb($inRSearch);
                    $arrLPageData["arrRChapterC"] = $this->form->get_chapterc($inRSearch);
                    $arrLPageData["arrCoordB"] = $this->form->get_coordb($inRSearch);
                    $arrLPageData["arrCoordC"] = $this->form->get_coordc($inRSearch);
                    $arrLPageData["arrNActB"] = $this->form->get_n_act_b($inRSearch);
                    $arrLPageData["arrNActC"] = $this->form->get_n_act_c($inRSearch);
                    $arrLPageData["arrProg"] = $this->form->get_programs($inRSearch);
                    $arrLPageData["arrFamiliar"] = $this->form->get_familiar($inRSearch);
                    $arrLPageData["arrFiles"] = $this->form->get_form_docs($inRSearch);
                    $arrLPageData["stRType"] = $stRType;
                    $this->load->vars($arrLPageData);
                    $this->display_page("print_full", "form", true);
                    return;

                }

            }

            redirect("/");

        }

    /**
     * Metodo view
     *
     * Método que Muestra el formulario seleccionado
     */
    public function view($stRFormID = null) {
        if ($this->session->userdata("isLoggedIn") && !is_null($stRFormID)) {
            $this->load->model("qm_form", "form", true);
            $arrLPageData = array();

            $arrLPageData["arrRForm"] = $this->form->get_form($stRFormID);

            $this->load->vars($arrLPageData);
            $this->display_page("view", "form");

            return;
        }

        redirect("/");
    }
    /**
     * Método sync
     *
     * Método que Sincroniza los Formularios
     */
    public function sync() {
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("sync", "form");

            return;
        }

        redirect("/");
    }
    /**
     * Método upload
     *
     * Método que Sube los documentos del Formulario
     */
    public function upload($stRFormID = null) {
        if ($this->session->userdata("isLoggedIn") && $this->session->userdata("inRUserType") == 3) {
            $arrLPageData["stRFormID"] = $stRFormID;
            $this->load->vars($arrLPageData);

            $this->display_page("upload", "form");

            return;
        }

        redirect("/");
    }

    /**
     * Método do_search
     *
     * Método que Busca los Datos del Formulario y persona
     */
    public function do_search() {
        $arrLResponse = array();
        $this->load->model("qm_form", "form", true);

        $arrLFormData = $this->input->post();

        foreach ($arrLFormData as $stLKey => $stLData) {
            if (!is_array($arrLFormData[$stLKey])) {
                $arrLFormData[$stLKey] = trim($stLData);

                if (empty($arrLFormData[$stLKey])) {
                    $arrLFormData[$stLKey] = null;
                }
            }
        }

        $arrLSearch = $this->form->do_search($arrLFormData);
        $this->session->set_userdata("bolRSearch", true);

        if ($arrLSearch["found"]) {
            $arrLResponse["inRUserType"] = $this->session->userdata("inRUserType");
            $arrLResponse["TxtSuccessForm"] = true;
            $arrLResponse["TxtTitle"] = "Encontrado!";
            $arrLResponse["TxtSuccess"] = "Mostrando la lista de resultados ...";
            $arrLResponse["arrRResults"] = $arrLSearch["results"];
        }
        else {
            $arrLResponse["TxtErrorForm"] = true;
            $arrLResponse["TxtError"] = "Error NO se encontraron datos";
            $arrLResponse["TxtRedirect"] = true;
            $arrLResponse["TxtChapter"] = "chapter/A";
        }

        echo json_encode($arrLResponse);
    }
    /**
     * Método do_form
     *
     * Método que Guarda los Datos del Formulario
     */
    public function do_form() {
        $arrLResponse = array();
        $this->load->model("qm_form", "form", true);

        $arrLFormData = $this->input->post();

        if ($this->form->do_form($arrLFormData)) {
            $arrLResponse["TxtSuccessForm"] = true;
            $arrLResponse["TxtTitle"] = "Guardado!";
            $arrLResponse["TxtSuccess"] = "Preparando el primer capitulo ...";
            $arrLResponse["TxtRedirect"] = true;
            $arrLResponse["TxtIsChapter"] = true;
            $arrLResponse["TxtChapter"] = "chapter/A";
        }
        else {
            $arrLResponse["TxtErrorForm"] = true;
            $arrLResponse["TxtError"] = "Error Guardando el formulario";
        }

        echo json_encode($arrLResponse);
    }
    /**
     * Método do_chapter
     *
     * Método que Guarda los Datos del Capitulo
     */
    public function do_chapter() {
        $arrLResponse = array();
        $this->load->model("qm_form", "form", true);

        $arrLFormData = $this->input->post();

        foreach ($arrLFormData as $stLKey => $stLData) {
            if (!is_array($arrLFormData[$stLKey])) {
                $arrLFormData[$stLKey] = trim($stLData);

                if (!is_numeric($arrLFormData[$stLKey]) && empty($arrLFormData[$stLKey])) {
                    $arrLFormData[$stLKey] = null;
                }
            }
        }

        if ($this->form->do_chapter($arrLFormData)) {
            $this->load->model("qm_form", "form", true);

            $arrLResponse["TxtSuccessForm"] = true;
            $arrLResponse["TxtTitle"] = "Guardado!";
            $arrLResponse["TxtSuccess"] = "Preparando el siguiente capitulo ...";
            $arrLResponse["TxtRedirect"] = true;

            $stLNextChapter = $this->form->get_next_chapter($arrLFormData["TxtChapter"]);

            if (!is_null($stLNextChapter)) {
                $stLNextChapter = "chapter/".$stLNextChapter;
            }

            if (is_null($stLNextChapter) || $arrLFormData["TxtAction"] == "T") {
                $stLNextChapter = "done";
                $arrLResponse["TxtSuccess"] = "Preparando el cierre del formulario ...";
            }

            $arrLResponse["TxtChapter"] = $stLNextChapter;
        }
        else {
            $arrLResponse["TxtErrorForm"] = true;
            $arrLResponse["TxtError"] = "Error Guardando el formulario";
        }

        echo json_encode($arrLResponse);
    }
    /**
     * Método do_finish
     *
     * Método que Guarda la captura del formulario
     */
    public function do_finish() {
        $this->load->model("qm_form", "form", true);
        $inRFormID = $this->session->userdata("inRFormID");
        $arrLFormData = $this->input->post();
        $arrLResponse = array();

        if (isset($_FILES["TxtFormImage"])) {
            $this->load->library("upload");
            $config["upload_path"] = "public/uploads";
            $config["allowed_types"] = "gif|jpg|png|pdf";
            $config["overwrite"] = true;

            $stLFile = $_FILES["TxtFormImage"]["name"];
            $stLFileName = reset(explode(".", $stLFile));
            $stLFileExt = end(explode(".", $stLFile));
            $stLFileName = strtolower($stLFileName);

            $config["file_name"] = $inRFormID.".".$stLFileName.".".$stLFileExt;
            $arrLFormData["TxtFormImage"] = $inRFormID.".".$_FILES["TxtFormImage"]["name"];
            $this->upload->initialize($config);

            if (!$this->upload->do_upload("TxtFormImage")) {
                $arrLResponse["TxtErrorForm"] = true;
                $arrLResponse["TxtError"] = "Error guardando la imagen";

                echo json_encode($arrLResponse);
                return;
            }
        }
        if (isset($_FILES["TxtFormVideo"])) {
            $this->load->library("upload");
            $config["upload_path"] = "public/uploads";
            $config["allowed_types"] = "*";
            $config["overwrite"] = true;

            $stLFile = $_FILES["TxtFormVideo"]["name"];
            $stLFileName = reset(explode(".", $stLFile));
            $stLFileExt = end(explode(".", $stLFile));
            $stLFileName = strtolower($stLFileName);

            $config["file_name"] = $inRFormID.".".$stLFileName.".".$stLFileExt;
            $arrLFormData["TxtFormVideo"] = $inRFormID.".".$_FILES["TxtFormVideo"]["name"];
            $this->upload->initialize($config);

            if (!$this->upload->do_upload("TxtFormVideo")) {
                $arrLResponse["TxtErrorForm"] = true;
                $arrLResponse["TxtError"] = "Error guardando el video";

                echo json_encode($arrLResponse);
                return;
            }
        }

        if ($this->form->do_finish($arrLFormData)) {
            $arrLResponse["TxtSuccessForm"] = true;
            $arrLResponse["TxtTitle"] = "Guardado!";
            $arrLResponse["TxtSuccess"] = "Iniciando un nuevo formulario ...";
            $arrLResponse["TxtRedirect"] = true;
            $arrLResponse["TxtChapter"] = "";
            $this->session->unset_userdata("inRFormID");
        }
        else {
            $arrLResponse["TxtErrorForm"] = true;
            $arrLResponse["TxtError"] = "Error Guardando el formulario";
        }

        echo json_encode($arrLResponse);
    }

    /* Obtener listado de archivos por certificacion*/
    public function get_FilesN($code) {
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_CertFiles($code));
    }

    /* Obtener listado de tutelas por numero de cedula*/
    public function get_Tutelas($cedula){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_tutelas($cedula));
    }

    /* Obtener categorias y tipologias agrupadas */
    public function get_Cat_Info($codeForm){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_cat_info($codeForm));
    }

    /* Obtener conceptos comite expertos */
    public function get_Cce(){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_cce());
    }

    /* Obtener conceptos de soporte */
    public function get_Supp_con(){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_supp_con());
    }

    /*Metodo para traer los nombresd de los usuarios asignados a una carta*/
    public function get_Asigned_Users($redactor = 0, $consultor = 0, $juridico = 0, $gerente= 0){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_asigned_users($redactor, $consultor, $juridico, $gerente));
    }

	/* Obtener actividades para el dashboard del usuario actual*/
	public function get_Dash_Works($userId, $rol){
		$this->load->model("qm_form", "form", true);
		echo json_encode($this->form->get_dash_works($userId, $rol));
	}

    /* Obtener infor general dashboard */
    public function get_Dash_Status($userId, $rol){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_dash_status($userId, $rol));
    }

    /* Obtener dashboard filtrado por estado */
    public function get_Dash_Filtered($userId, $statusId, $rol){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_dash_filtered($userId, $statusId, $rol));
    }

    /* Obetener dashboard para impresion */
    public function get_Dash_Finished(){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_dash_finished());
    }

    /*Obtener listado de pqr por numero de cedula*/
    public function get_Pqr($cedula){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_pqr($cedula));
    }

    /*Obtener listado de entrevistas por numero de cedula*/
    public function get_Entrev($cedula){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_entrev($cedula));
    }

    /*Cargar Info Empleo*/
    public function get_Empleo($cedula){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_empleo($cedula));
    }

    /*Cargar Info Transportadores*/
    public function get_Transp($cedula){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_transp($cedula));
    }

    /*Cargar Info Pescadores*/
    public function get_Pesca($cedula){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_pesca($cedula));
    }

    /*Cargar Info Electrohuila*/
    public function get_Electro($cedula){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_electro($cedula));
    }

    /*Cargar departamentos*/
    public function get_Dpto(){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_dpto());
    }

    /*Cargar municipios*/
    public function get_Mpo($depto){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_mpo($depto));
    }

    /*Cargar listado de actividades economicas*/
    public function get_Act_Prin(){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_act_prin());
    }

    /*Cargar detalles de tutela*/
    public function get_Tutela_Info($tutelaId){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_tutela_info($tutelaId));
    }

    /*Cargar informacion de cartas fase1*/
    public function get_Letter_Info($letterId){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_letter_info($letterId));
    }

    /*Cargar detalles de accion de tutela*/
    public function get_Tutela_Info_2($tutelaId){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_tutela_info_2($tutelaId));
    }

    /*Consultar si la tutela ya tiene acciones juridicas*/
    public function get_Tutela_Exist($tutelaId){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_tutela_exist($tutelaId));
    }

    /*Consultar si la carta existe y esta en un estado diferente a finalizado*/
    public function get_Letter_Exist($cedula){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_letter_exist($cedula));
    }

    /*Metodo que precarga el encabezado de la respuesta de tutela*/
    public function get_Tut_Answ_Header($cedula){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_tut_answ_header($cedula));
    }

    /*Metodo que consulta las cartas de respuestas a las tutelas*/
    public function get_Letters($cedula){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_letters($cedula));
    }

    /*Metodo que carga las categorias de las cartas de respuesta a las tutelas*/
    public function get_Categorias($id_cat){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_categorias($id_cat));
    }

    /*Metodo que carga las tipologias de las cartas de respuestas a las tutelas*/
    public function get_Tipologias($id_tip){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_tipologias($id_tip));
    }

    /*Metodo que carga el listado de categorias*/
    public function get_Categorias_List($id_tip){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_categorias_list($id_tip));
    }

    /*Metodo que carga el listado de tipologias*/
    public function get_Tipologias_List(){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_tipologias_list());
    }

    /*Metodo que carga la tabla de cce filtrada por tipologia y categoria*/
    public function get_Filtered_Cce($tipologia, $categoria){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_filtered_cce($tipologia, $categoria));
    }

    /*Metodo que guarda la carta de respuesta a las tutelas*/
    public function do_SaveLetter(){
        $this->load->model("qm_form", "form", true);
        $arrayData = array();
        if(!empty($_POST["dataForm"])){
            $arrayDataFromView = json_decode($_POST["dataForm"]);
            foreach ($arrayDataFromView as $itemKey => $itemValue) {
                $arrayData[$itemValue->name] = $itemValue->value;
            }
        }

        $arrayData["cedula"] = $_POST["cedula"];
        $arrayData["categoria"] = $_POST["categoria"];
        $arrayData["tipologia"] = $_POST["tipologia"];
        $arrayData["formulario"] = $_POST["formulario"];
        $arrayData["cuerpo_mensaje"] = $_POST["cuerpo_mensaje"];
        $this->form->do_setLetterProps($arrayData);
        $resultInsert = $this->form->do_createLetter();

        if ($resultInsert > 0)
            echo "ok";
        else
            echo $resultInsert;
    }

    /*Metodo que guarda la captura de la accion de tutela*/
    public function do_saveJAction(){
        $this->load->model("qm_form", "form", true);
        $arrayData = array();

        if(!empty($_POST["dataForm"])){
            $arrayDataFromView = json_decode($_POST["dataForm"]);
            foreach ($arrayDataFromView as $itemKey => $itemValue) {
                $arrayData[$itemValue->name] = $itemValue->value;
            }
        }

        $arrayData["id_tutela"] = $_POST["id_tutela"];
        $this->form->do_setJActionProps($arrayData);
        $resultInsert = $this->form->do_createAction();

        if ($resultInsert > 0)
            echo "ok";
        else
            echo $resultInsert;
    }

    /*Metodo que Finaliza la carta de respuesta a tutelas*/
    public function do_finishLetters($letterId){
        $this->load->model("qm_form", "form", true);
        $arrayData = array();

        if(!empty($_POST["dataForm"])){
            $arrayDataFromView = json_decode($_POST["dataForm"]);
            foreach ($arrayDataFromView as $itemKey => $itemValue) {
                $arrayData[$itemValue->name] = $itemValue->value;
            }
        }

        /*Asignar estado finalizado*/
        $arrayData["estado"] = '8';
        $arrayData["finalizada"] = '1';
        $arrayData["cuerpo_mensaje"] = $_POST["cuerpo_mensaje"];

        $this->form->do_setLetterProps($arrayData);
        $resultInsert = $this->form->do_updateLetter($letterId);

        if ($resultInsert == true){
            echo "ok";
        }else{
            echo $resultInsert;
        }

    }

    /*Metodo que actualiza la carta de respuesta a las tutelas*/
    public function do_updateLetters($letterId){
        $this->load->model("qm_form", "form", true);
        $arrayData = array();

        if(!empty($_POST["dataForm"])){
            $arrayDataFromView = json_decode($_POST["dataForm"]);
            foreach ($arrayDataFromView as $itemKey => $itemValue) {
                $arrayData[$itemValue->name] = $itemValue->value;
            }
        }

        $arrayData["id_respuestas"] = $letterId;
		$arrayData["cedula"] = $_POST["cedula"];
        $arrayData["categoria"] = $_POST["categoria"];
        $arrayData["tipologia"] = $_POST["tipologia"];
		$arrayData["estado"] = $_POST["estado"];
		$arrayData["modulo_actual"] = $_POST["modulo_actual"];
        $arrayData["formulario"] = $_POST["formulario"];
        $arrayData["cuerpo_mensaje"] = $_POST["cuerpo_mensaje"];
        $this->form->do_setLetterProps($arrayData);
        $resultInsert = $this->form->do_updateLetter($letterId);

        if($resultInsert == true){
            //Validar el estado para crear registro nuevo en estado cerrado

            if($_POST["estado"] == 3){
                //Se crea el nuevo registro para el historico de las cartas
                $arrayCreateData = $arrayName = array();

                if (!empty($_POST["dataForm"])) {
                    $arrayDataFromView = json_decode($_POST["dataForm"]);
                    foreach ($arrayDataFromView as $itemKey => $itemValue) {
                        $arrayCreateData[$itemValue->name] = $itemValue->value;
                    }
                }

                //Switch para determinar el nuevo modulo actual
                switch ($_POST["modulo_actual"]) {
                    case '5':
                        $arrayCreateData["modulo_actual"] = '7';
                        break;

                    case '7':
                        $arrayCreateData["modulo_actual"] = '6';
                        break;

                    case '6':
                        $arrayCreateData["modulo_actual"] = '8';
                        break;

                    default:
                        break;
                }

                $arrayCreateData["estado"] = '1';
                $arrayCreateData["cedula"] = $_POST["cedula"];
                $arrayCreateData["categoria"] = $_POST["categoria"];
                $arrayCreateData["tipologia"] = $_POST["tipologia"];
                $arrayCreateData["formulario"] = $_POST["formulario"];
                $arrayCreateData["cuerpo_mensaje"] = $_POST["cuerpo_mensaje"];

                //Se traen los datos de usuarios del registro anterior
                $arrayAnterior = $this->form->get_letter_info($letterId);
                $arrayCreateData["fec_carta"] = $arrayAnterior[0]->fec_carta;
                $arrayCreateData["rad_emgesa"] = $arrayAnterior[0]->rad_emgesa;
                $arrayCreateData["vulnerable"] = $arrayAnterior[0]->vulnerable;
                $arrayCreateData["usuario_redactor"] = $arrayAnterior[0]->usuario_redactor;
                $arrayCreateData["usuario_consultor"] = $arrayAnterior[0]->usuario_consultor;
                $arrayCreateData["usuario_juridico"] = $arrayAnterior[0]->usuario_juridico;
                $arrayCreateData["usuario_gerente"] = $arrayAnterior[0]->usuario_gerente;
                $this->form->do_setLetterProps($arrayCreateData);
                $resultInsert = $this->form->do_createLetter();

                if ($resultInsert > 0) {
                    echo "ok";
                }
                else
                {
                    echo $resultInsert;
                }

            }
        }
        else{
            echo $resultInsert;
        }
    }

    /*Metodo para devolver una carta de respuesta*/
    public function do_getBackLetter($letterId){
        $this->load->model("qm_form", "form", true);
        $arrayData = array();

        if(!empty($_POST["dataForm"])){
            $arrayDataFromView = json_decode($_POST["dataForm"]);
            foreach ($arrayDataFromView as $itemKey => $itemValue) {
                $arrayData[$itemValue->name] = $itemValue->value;
            }
        }

        /*Colocar la carta actual en estdo historico*/
        $arrayData["id_respuestas"] = $letterId;
        $arrayData["cedula"] = $_POST["cedula"];
        $arrayData["categoria"] = $_POST["categoria"];
        $arrayData["tipologia"] = $_POST["tipologia"];
        $arrayData["estado"] = '7';
        $arrayData["modulo_actual"] = $_POST["modulo_actual"];
        $arrayData["formulario"] = $_POST["formulario"];
        $arrayData["cuerpo_mensaje"] = $_POST["cuerpo_mensaje"];

        $this->form->do_setLetterProps($arrayData);
        $resultInsert = $this->form->do_updateLetter($letterId);

        /*Crear registro nuevo*/
        if($resultInsert == true){
            $arrayCreateData = array();

            if(!empty($_POST["dataForm"])){
                $arrayDataFromView = json_decode($_POST["dataForm"]);
                foreach ($arrayDataFromView as $itemKey => $itemValue) {
                    $arrayCreateData[$itemValue->name] = $itemValue->value;
                }
            }

            //Se traen los datos de usuarios del registro anterior
            $arrayAnterior = $this->form->get_letter_info($letterId);
            $arrayCreateData["fec_carta"] = $arrayAnterior[0]->fec_carta;
            $arrayCreateData["rad_emgesa"] = $arrayAnterior[0]->rad_emgesa;
            $arrayCreateData["vulnerable"] = $arrayAnterior[0]->vulnerable;
            $arrayCreateData["usuario_redactor"] = $arrayAnterior[0]->usuario_redactor;
            $arrayCreateData["usuario_consultor"] = $arrayAnterior[0]->usuario_consultor;
            $arrayCreateData["usuario_juridico"] = $arrayAnterior[0]->usuario_juridico;
            $arrayCreateData["usuario_gerente"] = $arrayAnterior[0]->usuario_gerente;
            #Estado 4 = Devuelto
            $arrayCreateData["estado"] = '4';
            $arrayCreateData["cedula"] = $_POST["cedula"];
            $arrayCreateData["categoria"] = $_POST["categoria"];
            $arrayCreateData["tipologia"] = $_POST["tipologia"];

                //Switch para determinar el nuevo modulo actual
                switch ($_POST["modulo_actual"]) {
                    case '6':
                        $arrayCreateData["modulo_actual"] = '7';
                        break;

                    case '7':
                        $arrayCreateData["modulo_actual"] = '5';
                        break;

                    case '8':
                        $arrayCreateData["modulo_actual"] = '6';
                        break;

                    default:
                        break;
                }

            $arrayCreateData["formulario"] = $_POST["formulario"];
            $arrayCreateData["cuerpo_mensaje"] = $_POST["cuerpo_mensaje"];
            $this->form->do_setLetterProps($arrayCreateData);
            $resultInsert = $this->form->do_createLetter();

            if($resultInsert > 0){
                echo "ok";
            }
            else{
                echo $resultInsert;
            }

        }

    }

	/*Metodo para recategorizar una carta de respuesta*/
	public function do_recatLetters($letterId){
		$this->load->model("qm_form", "form", true);
		$arrayData = array();

		if(!empty($_POST["dataForm"])){
			$arrayDataFromView = json_decode($_POST["dataForm"]);
			foreach ($arrayDataFromView as $itemKey => $itemValue){
				$arrayData[$itemValue->name] = $itemValue->value;
			}
		}

		//$arrayData["id_respuestas"] = $letterId;
		$arrayData["cedula"] = $_POST["cedula"];
		$arrayData["categoria"] = $_POST["categoria"];
		$arrayData["tipologia"] = $_POST["tipologia"];
		$arrayData["estado"] = $_POST["estado"];
		$arrayData["modulo_actual"] = $_POST["modulo_actual"];
		$arrayData["formulario"] = $_POST["formulario"];
		$arrayData["cuerpo_mensaje"] = $_POST["cuerpo_mensaje"];
		$arrayData["usuario_consultor"] = "2437d92d-d402-11e3-8578-0019to58485l";
		$this->form->do_setLetterProps($arrayData);
		$resultInsert = $this->form->do_updateLetter($letterId);

		/*Crear registro nuevo*/
		if($resultInsert == true){
			$arrayCreateData = array();

			if(!empty($_POST["dataForm"])){
				$arrayDataFromView = json_decode($_POST["dataForm"]);
				foreach ($arrayDataFromView as $itemKey => $itemValue) {
					$arrayCreateData[$itemValue->name] = $itemValue->value;
				}
			}

            //Se traen los datos de usuarios del registro anterior
            $arrayAnterior = $this->form->get_letter_info($letterId);
            $arrayCreateData["fec_carta"] = $arrayAnterior[0]->fec_carta;
            $arrayCreateData["rad_emgesa"] = $arrayAnterior[0]->rad_emgesa;
            $arrayCreateData["vulnerable"] = $arrayAnterior[0]->vulnerable;
            $arrayCreateData["usuario_redactor"] = $arrayAnterior[0]->usuario_redactor;
            $arrayCreateData["usuario_juridico"] = $arrayAnterior[0]->usuario_juridico;
            $arrayCreateData["usuario_gerente"] = $arrayAnterior[0]->usuario_gerente;
			$arrayCreateData["estado"] = '1';
			$arrayCreateData["modulo_actual"] = 6;
			$arrayCreateData["cedula"] = $_POST["cedula"];
			$arrayCreateData["categoria"] = $_POST["categoria"];
			$arrayCreateData["tipologia"] = $_POST["tipologia"];
			$arrayCreateData["formulario"] = $_POST["formulario"];
			$arrayCreateData["cuerpo_mensaje"] = $_POST["cuerpo_mensaje"];
			$arrayCreateData["usuario_consultor"] = "2437d92d-d402-11e3-8578-0019to58485l";

			$this->form->do_setLetterProps($arrayCreateData);
			$resultInsert = $this->form->do_createLetter();

			if ($resultInsert > 0)
				echo "ok";
			else
				echo $resultInsert;

		}
	}

    /*Metodo que actualiza la captura de la accion de tutela*/
    public function do_updateJAction(){
        $this->load->model("qm_form", "form", true);
        $arrayData = array();

        if(!empty($_POST["dataForm"])){
            $arrayDataFromView = json_decode($_POST["dataForm"]);
            foreach ($arrayDataFromView as $itemKey => $itemValue) {
                $arrayData[$itemValue->name] = $itemValue->value;
            }
        }

        $arrayData["id_tutela"] = $_POST["id_tutela"];
        $this->form->do_setJActionProps($arrayData);
        $resultInsert = $this->form->do_updateAction($_POST["id_tutela"]);

        if($resultInsert == true)
            echo "ok";
        else
            echo $resultInsert;

    }

    /**
     * Método do_finish
     *
     * Método que Guarda la captura del formulario
     */
    public function do_uploads() {
        $this->load->model("qm_form", "form", true);

        $arrLFormData = $this->input->post();
        $inRFormID = $arrLFormData["TxtFormID"];
        $arrLResponse = array();

        $this->load->library("upload");
        $config["upload_path"] = "public/uploads/".$inRFormID;
        $config["allowed_types"] = "*";
        $config["overwrite"] = true;
        $arrLFiles = array();
        $inLCount = 0;

        $this->upload->initialize($config);

        if (!file_exists(FCPATH."/public/uploads/".$inRFormID)
                && !is_dir(FCPATH."public/uploads/".$inRFormID)) {
            mkdir(FCPATH."/public/uploads/".$inRFormID, 0755, true);
        }

        foreach($_FILES as $stLKey => $arrLFile) {
            if ($this->upload->do_upload($stLKey)) {
                $inLKey = str_replace("File", "", $stLKey);

                $tipo = substr($inLKey, -2);

                $arrLFileData = $this->upload->data();
                $arrLFileInfo = array( 	"a13Identificador" => $inRFormID,
                                        //"a13Tipo" => ++$inLCount,
                                        "a13Tipo" => (int)$tipo,
                                        "a13Documento" => utf8_encode($arrLFileData["file_name"]),
                                        "a13Folios" => $arrLFormData[$inLKey],
                                        "a13Fecha" => date("Y-m-d H:i:s"),
                                        "a13Estado" => "P");

                array_push($arrLFiles, $arrLFileInfo);
            }
        }

        $bolLDocs = $this->form->do_uploads($arrLFiles);

        if ($bolLDocs) {
            $arrLResponse["TxtSuccessForm"] = true;
            $arrLResponse["TxtTitle"] = "Guardado!";
            $arrLResponse["TxtSuccess"] = "Se han guardado correctamente los documentos ...";
            $arrLResponse["TxtReload"] = true;
        }
        else {
            $arrLResponse["TxtErrorForm"] = true;
            $arrLResponse["TxtError"] = "NO se han podido guardar los documentos";
        }

        $this->output->set_content_type("application/json");
        echo json_encode($arrLResponse);
    }

    /**
     * Método do_getFilesPath
     *
     * Método que Obtiene la ruta de los archivos cargados por codifo de formulario
     */

    function do_getFilesPath($codeForm){
        $this->load->model("qm_form", "form", true);
        echo json_encode($this->form->get_files($codeForm));
    }
}