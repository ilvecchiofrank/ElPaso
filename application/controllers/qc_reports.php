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
class QC_Reports extends QC_Controller {

    /** Funcion index redirecciona a dash */
    public function index() {
        $this->dash();
    }

    /* Cargar Dashboard*/
    public function dash() {
        $this->display_page("dash", "events");
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