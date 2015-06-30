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

    /** Funcion index redirecciona a dash */
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

}