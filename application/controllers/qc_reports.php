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

}