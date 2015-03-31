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
}