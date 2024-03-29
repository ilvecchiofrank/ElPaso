<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * Modulo de reportes
 *
 * @category    Application
 * @package     Controllers
 * @version     CVS: $Id:$
 * @version     PHP: 5.x
 * @since       File available since Release 1.0
 * @author      Pedro Cruz <pedro.cruz@mggroup.com.co>
 * @link        http://twitter.com/decilantro/
 */
class QC_Reports extends QC_Controller {

    /** Funcion index redirecciona a reporte general de actividades */
    public function index() {
        $this->activityReport();
        return;
    }

    /* Exportar reporte general */
    public function report_toExcel($depto, $mpo)
    {
        if ($this->session->userdata("isLoggedIn")) {

            $this->load->model("qm_reports", "reports", true);
            $arrLPageData = array();

            //Validar diligenciamiento
            if ($depto == 0 && $mpo == 0) {
                //Sin filtros
                $arrLPageData["arrHeader"] = $this->reports->get_report_header_empty();
                $arrLPageData["arrResume"] = $this->reports->get_report_resume();
                $arrLPageData["arrContent"] = $this->reports->get_report_details();
            } else {
                if ($mpo == 0) {
                    //Departamento
                    $arrLPageData["arrHeader"] = $this->reports->get_report_header_by_dpto($depto);
                }else{
                    //Municipio
                    $arrLPageData["arrHeader"] = $this->reports->get_report_header_by_mpo($mpo);
                }

                $arrLPageData["arrResume"] = $this->reports->get_filtered_report_resume($depto, $mpo);
                $arrLPageData["arrContent"] = $this->reports->get_filtered_report_details($depto, $mpo);
            }

            $this->load->vars($arrLPageData);
            $this->display_page("export_report", "reports", true);
          return;
        }
        redirect("/");
    }

    /* Exportar reporte detallado */
    public function detailed_report_toExcel($reporteid)
    {
        if ($this->session->userdata("isLoggedIn")) {

            $this->load->model("qm_reports", "reports", true);
            $arrLPageData = array();

            if ($reporteid == 0) {
                //Sin informacion
                $this->display_page("activityreport", "reports");
            }else{
                //Con informacion
                $arrLPageData["arrResume"] = $this->reports->get_report_by_id($reporteid);
                $arrLPageData["arrDetails"] = $this->reports->get_cobertura_by_id($reporteid);
                $arrLPageData["arrSupport"] = $this->reports->get_soporte_by_id($reporteid);
                $arrLPageData["arrAssistant"] = $this->reports->get_personas_by_id($reporteid);
                $arrLPageData["arrTotalAssistant"] = $this->reports->get_total_personas_by_id($reporteid);
                $arrLPageData["arrQuestion"] = $this->reports->get_questions_by_id($reporteid);
                $arrLPageData["arrTotalQuestion"] = $this->reports->get_total_questions_by_id($reporteid);
                $this->load->vars($arrLPageData);
                $this->display_page("export_detailed_report", "reports", true);
            }

          return;
        }
        redirect("/");
    }

    /* Cargar reporte general de actividades */
    public function activityReport() {
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("activityreport", "reports");
            return;
        }
        redirect("/");
    }

    /* Cargar reporte detallado de actividades */
    public function activityDetailedReport() {
        if ($this->session->userdata("isLoggedIn")) {
            $this->display_page("activitydetailedreport", "reports");
            return;
        }
        redirect("/");
    }

    /* Obtener departamentos de las actividades*/
    public function get_Activity_Dpto(){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_activity_dpto());
    }

    /* Obtener municipios de las actividades*/
    public function get_Activity_Mpo($departamento){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_activity_mpo($departamento));
    }

    /* Obtener resumen de reporte general*/
    public function get_Report_Resume(){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_report_resume());
    }

    /* Obtener detalles de reporte general*/
    public function get_Report_Details(){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_report_details());
    }

    /* Obtener resumen de reporte general filtrado por ubicacion*/
    public function get_Filtered_Report_Resume($depto, $mpo){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_filtered_report_resume($depto, $mpo));
    }

    /* Obtener detalles de reporte general filtrado por ubicacion*/
    public function get_Filtered_Report_Details($depto, $mpo){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_filtered_report_details($depto, $mpo));
    }

    /* Obtener reporte por ID*/
    public function get_Report_By_Id($id){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_report_by_id($id));
    }

    /* Obtener cobertura por ID*/
    public function get_Cobertura_By_Id($id){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_cobertura_by_id($id));
    }

    /* Obtener soportes por ID*/
    public function get_Soporte_By_Id($id){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_soporte_by_id($id));
    }

    /* Obtener personas por ID*/
    public function get_Personas_By_Id($id){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_personas_by_id($id));
    }

    /* Obtener total personas por ID*/
    public function get_Total_Personas_By_Id($id){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_total_personas_by_id($id));
    }

    /* Obtener preguntas por ID*/
    public function get_Questions_By_Id($id){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_questions_by_id($id));
    }

    /* Obtener total preguntas por ID*/
    public function get_Total_Questions_By_Id($id){
        $this->load->model("qm_reports", "reports", true);
        echo json_encode($this->reports->get_total_questions_by_id($id));
    }

}