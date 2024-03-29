<?php
/**
 * Archivo de la Clase QM_Form
 *
 * Recupera Datos de la Base de Datos
 *
 * @category    Application
 * @package     Models
 * @version     CVS: $Id:$
 * @version     PHP: 5.x
 * @since       File available since Release 1.0
 * @author      Alvaro Montenegro <arthvrian@yahoo.com>
 * @link        http://www.arthvrian.org/
 */
/**
 * Realiza las labores de Consulta de los
 * a la Base de Datos
 *
 * @category    Application
 * @package     Models
 * @version     CVS: $Id:$
 * @version     PHP: 5.x
 * @since       Class available since Release 1.0
 * @author      Alvaro Montenegro <arthvrian@yahoo.com>
 * @link        http://www.arthvrian.org/
 */
class QM_Form extends CI_Model {

    private $arrayJActionProps = array();
    private $arrayJActionPropsChild = array();

    /**
     * Constructor de la Clase
     */
    public function __construct() {
        parent::__construct();
    }
    /**
     * Metodo get_form
     *
     * Método que Obtiene los Datos del formulario
     *
     * @return string
     */
    public function get_form($inRFormID = null) {
        if (is_null($inRFormID)) {
            $inRFormID = $this->session->userdata("inRFormID");
        }

        $this->db->where("a07Codigo", $inRFormID);
        $this->db->join("t05web_departamentos", "a07Departamento = a05Codigo");
        $this->db->join("t06web_municipios", "a07Municipio = a06Codigo");
        $this->db->join("t08web_usuario_respuestas", "a07Codigo = a08Formulario", "LEFT");
        $SQLResult = $this->db->get("t07web_formularios");

        if ($SQLResult->num_rows() == 1) {
            $arrLForms = $SQLResult->row_array();
            $this->db->where("a09Formulario", $inRFormID);
            $this->db->where("a09Pregunta", "CP019");
            $this->db->select_sum("a09O02", "a07Folios");
            $SQLResult = $this->db->get("t09web_usuario_respuestasn");
            $arrLDocs = $SQLResult->row_array();

            if (is_null($arrLDocs["a07Folios"])) {
                $arrLDocs["a07Folios"] = 0;
            }

            $arrLForms["a07Folios"] = $arrLDocs["a07Folios"];

            $this->db->where("a09Formulario", $inRFormID);
            $SQLResult = $this->db->get("t09web_usuario_respuestasn");
            $arrLAnswersN = $SQLResult->result_array();
/*
            foreach ($arrLAnswersN as $inLKey => $arrLAnswerN) {
                $arrLForms["a08".$arrLAnswerN["a09Pregunta"]."O01"] = $arrLAnswerN["a09O01"];
                $arrLForms["a08".$arrLAnswerN["a09Pregunta"]."O02"] = $arrLAnswerN["a09O02"];
                $arrLForms["a08".$arrLAnswerN["a09Pregunta"]."O03"] = $arrLAnswerN["a09O03"];
                $arrLForms["a08".$arrLAnswerN["a09Pregunta"]."O04"] = $arrLAnswerN["a09O04"];
                $arrLForms["a08".$arrLAnswerN["a09Pregunta"]."O05"] = $arrLAnswerN["a09O05"];
                $arrLForms["a08".$arrLAnswerN["a09Pregunta"]."O06"] = $arrLAnswerN["a09O06"];
            }
*/
            return $arrLForms;
        }

        return false;
    }
    /**
     * Metodo get_chapters
     *
     * Método que Obtiene los Capitulos del Formulario
     *
     * @param string $stRChapter Letra del Capitulo
     * @return array
     */
    public function get_chapters($stRChapter = null) {
        if (!is_null($stRChapter)) {
            $this->db->where("a02Letra", $stRChapter);
        }

        $SQLResult = $this->db->get("t02web_capitulos");

        if (!is_null($stRChapter)) {
            $arrLChapter = $SQLResult->row_array();
            $arrLChapter["a02Siguiente"] = $this->get_next_chapter($arrLChapter["a02Codigo"]);
            $arrLChapter["arrRQuestions"] = $this->get_questions($stRChapter, $arrLChapter["a02Codigo"]);

            return $arrLChapter;
        }

        return $SQLResult->result_array();
    }

    /*Metodo que obtiene el listado de cartas de respuesta para el documento solicitado*/
    public function get_letters($cedula){
      try {
        $query = $this->db->query("SELECT estado, finalizada, fecha_creacion FROM t49web_respuestas_tutelas WHERE cedula = $cedula");
        $dataArray = $query->result();
        return $dataArray;

      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Obtener listado de departamentos*/
    public function get_dpto(){
      try {
        $query = $this->db->query("SELECT a05Codigo, a05Nombre FROM t05web_departamentos ORDER BY a05Nombre");
        $dataArray = $query->result();

        $html = "<option value=''>Seleccione...</option>";
        foreach ($dataArray as $departamento => $objDepto) {
          $html .= "<option value='$objDepto->a05Codigo'>$objDepto->a05Nombre</option>";
        }

        return $html;
      } catch (Exception $exc) {
         echo $exc->getTraceAsString();
      }
    }
    
    /*Obtener listado de departamentos*/
    public function get_dptoCobertura(){
      try {
        $query = $this->db->query("SELECT a05Codigo, a05Nombre FROM t05web_departamentos WHERE a05Cobertura = 'A' ORDER BY a05Nombre");
        $dataArray = $query->result();

        $html = "<option value=''>Seleccione...</option>";
        foreach ($dataArray as $departamento => $objDepto) {
          $html .= "<option value='$objDepto->a05Codigo'>$objDepto->a05Nombre</option>";
        }

        return $html;
      } catch (Exception $exc) {
         echo $exc->getTraceAsString();
      }
    }
    
    /*Obtener listado de departamentos*/
    public function get_dptoEvento(){
      try {
        $query = $this->db->query("SELECT a05Codigo, a05Nombre FROM t05web_departamentos WHERE a05Evento = 'A' ORDER BY a05Nombre");
        $dataArray = $query->result();

        $html = "<option value=''>Seleccione...</option>";
        foreach ($dataArray as $departamento => $objDepto) {
          $html .= "<option value='$objDepto->a05Codigo'>$objDepto->a05Nombre</option>";
        }

        return $html;
      } catch (Exception $exc) {
         echo $exc->getTraceAsString();
      }
    }

    /*Obtener listado de municipios*/
    public function get_mpo($depto){
      try {
        $query = $this->db->query("SELECT a06codigo, a06Nombre FROM t06web_municipios WHERE a06Departamento = $depto ORDER BY a06Nombre");
        $dataArray = $query->result();

        $html = "<option value=''>Seleccione...</option>";
        foreach ($dataArray as $municipio => $objMpo) {
          $html .= "<option value='$objMpo->a06codigo'>$objMpo->a06Nombre</option>";
        }

        return $html;
      } catch (Exception $exc) {
         echo $exc->getTraceAsString();
      }
    }
    
    /*Obtener listado de municipios*/
    public function get_mpoEvento($depto){
      try {
        $query = $this->db->query("SELECT a06codigo, a06Nombre FROM t06web_municipios WHERE a06Departamento = $depto AND a06Evento = 'A' ORDER BY a06Nombre ");
        $dataArray = $query->result();

        $html = "<option value=''>Seleccione...</option>";
        foreach ($dataArray as $municipio => $objMpo) {
          $html .= "<option value='$objMpo->a06codigo'>$objMpo->a06Nombre</option>";
        }

        return $html;
      } catch (Exception $exc) {
         echo $exc->getTraceAsString();
      }
    }
    
    /*Obtener listado de municipios*/
    public function get_mpoCobertura($depto){
      try {
        $query = $this->db->query("SELECT a06codigo, a06Nombre FROM t06web_municipios WHERE a06Departamento = $depto AND a06Cobertura = 'A' ORDER BY a06Nombre ");
        $dataArray = $query->result();

        $html = "<option value=''>Seleccione...</option>";
        foreach ($dataArray as $municipio => $objMpo) {
          $html .= "<option value='$objMpo->a06codigo'>$objMpo->a06Nombre</option>";
        }

        return $html;
      } catch (Exception $exc) {
         echo $exc->getTraceAsString();
      }
    }

    /*Obtener listado de Actividad economica principal*/
    public function get_act_prin(){
      try {
        $query = $this->db->query("SELECT t46oficiodescr, t44nivel01desc, t45nivel02desc, t46nivel03desc, t46nivel04desc, t46codigo FROM v08web_oficios");
        $dataArray = $query->result();
        $oficio = "";

        $html = "<option value=''>Seleccione...</option>";
        foreach ($dataArray as $actividad => $objActividad) {
          $oficio .= $objActividad->t46oficiodescr . " (" . $objActividad->t44nivel01desc . " - " . $objActividad->t45nivel02desc . " - " . $objActividad->t46nivel03desc . " - " . $objActividad->t46nivel04desc . ")";
          $html .= "<option value='$objActividad->t46codigo'>" . $oficio . "</option>";
          $oficio = null;
        }

        return $html;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Obtener nombre de tipologia*/
    public function get_tipologias($id_tip){
      try {
        $query = $this->db->query("SELECT nombre_tipologia FROM t54web_tipologias WHERE id_tipologias = $id_tip");
        $dataArray = $query->result();

        // $html = "<option value=''>Seleccione...</option>";
        // foreach ($dataArray as $tipologia => $objTipologia) {
        //   $html .= "<option value='$objTipologia->id_tipologias'>" . $objTipologia->nombre_tipologia . "</option>";
        // }

        return $dataArray;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Obtener nombre de categoria*/
    public function get_categorias($id_cat){
      try {
        $query = $this->db->query("SELECT nombre_categoria FROM t53web_categorias WHERE id_categoria = $id_cat");
        $dataArray = $query->result();

        // $html = "<option value=''>Seleccione...</option>";
        // foreach ($dataArray as $categoria => $objCategoria) {
        //   $html .= "<option value='$objCategoria->id_categoria'>" . $objCategoria->nombre_categoria . "</option>";
        // }

        return $dataArray;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Obtener listado de tipologias*/
    public function get_tipologias_list(){
      try {
        $query = $this->db->query("SELECT * FROM t54web_tipologias");
        $dataArray = $query->result();

        $html = "<option value=''>Seleccione...</option>";
        foreach ($dataArray as $tipologia => $objTipologia) {
          $html .= "<option value='$objTipologia->id_tipologias'>" . $objTipologia->nombre_tipologia . "</option>";
        }

        return $html;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Obtener listado de categorias*/
    public function get_categorias_list($id_tip){
      try {
        $query = $this->db->query("SELECT * FROM t53web_categorias WHERE tipologia_id = $id_tip");
        $dataArray = $query->result();

        $html = "<option value=''>Seleccione...</option>";
        foreach ($dataArray as $categoria => $objCategoria) {
          $html .= "<option value='$objCategoria->id_categoria'>" . $objCategoria->nombre_categoria . "</option>";
        }

        return $html;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Obtener informacion relacionada de la tutela capitulo A*/
    public function get_tutela_info($tutelaId){
        $query = $this->db->query("SELECT cedula, demandante, numero_proceso, juzgado, abogado_asig, depto, ciudad, termino, fecha_auto_admisorio, temas, sentencia, impugnacion, REPLACE(path,'Q:emgesaTutelas','https://s3.amazonaws.com/emgesa/Tutelas/') as path FROM t19web_tutelas WHERE tutela_id = $tutelaId");
        $dataArray = $query->result();

        return $dataArray;
    }

    public function get_filtered_cce($tipologia, $categoria){
      try {
        $query = $this->db->query("SELECT * FROM t56web_concepto_comite_expertos WHERE tipologia_id = $tipologia AND categoria_id = $categoria");
        $dataArray = $query->result();

        return $dataArray;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Obtener informacion relacionada de la tutela capitulo B y C*/
    public function get_tutela_info_2($tutelaId){
        $query = $this->db->query("SELECT * FROM t42web_accion_juridica aj JOIN t43web_accion_detalles ad ON aj.id_accion_juridica = ad.id_accion_juridica WHERE aj.id_tutela = $tutelaId");
        $dataArray = $query->result();

        return $dataArray;
    }

    /*Obtener informacion de una carta especifica*/
    public function get_letter_info($letterId){
      //$query = $this->db->query("SELECT cuerpo_mensaje, fec_carta, rad_emgesa, txt_Devolver, estado, usuario_redactor, usuario_consultor, usuario_juridico, usuario_gerente, fec_carta, rad_emgesa, vulnerable FROM t49web_respuestas_tutelas WHERE id_respuesta = $letterId");
      $query = $this->db->query("SELECT * FROM t49web_respuestas_tutelas WHERE id_respuesta = $letterId");
      $dataArray = $query->result();

      $dataArray["0"]->cuerpo_mensaje = str_replace('\"', "'", $dataArray["0"]->cuerpo_mensaje);

      return $dataArray;
    }

    /*Obtener tipos de comunicaciones adicionales*/
    public function get_comad_list(){
      $query = $this->db->query("SELECT tip_comunic_id, CONCAT(orden, ' - ', descripcion) AS elemento FROM (SELECT * FROM t80web_tipo_comunic ORDER BY orden ASC) AS tabla");
      $dataArray = $query->result();

      $html = "<option value=''>Seleccione...</option>";
      foreach ($dataArray as $comad => $objComad) {
        $html .= "<option value='$objComad->tip_comunic_id'>" . $objComad->elemento . "</option>";
      }

      return $html;
    }

    /*Obtener comunicaciones adicionales*/
    public function get_comad($formulario){
      $query = $this->db->query("SELECT tipo_comunic, fecha, observaciones FROM t79web_comunic_adic WHERE formulario = '$formulario'");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Obtener los bloques de las cartas*/
    public function get_letter_blocks(){
      $query = $this->db->query("SELECT Cuerpo_txt FROM t51web_bloque_contenido ORDER BY Ordenamiento");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Consultar si la tutela ya tiene acciones juridicas*/
    public function get_tutela_exist($tutelaId){
      $query = $this->db->query("SELECT id_tutela FROM t42web_accion_juridica WHERE id_tutela = $tutelaId");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Consultar si existe alguna carta en estado pendiente o proceso*/
    public function get_letter_exist($cedula){
      $query = $this->db->query("SELECT id_respuesta FROM t49web_respuestas_tutelas WHERE estado != 3 AND cedula = $cedula");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Consultar los usuarios asignados a la carta*/
    public function get_asigned_users($redactor, $consultor, $juridico, $gerente){
      $query = $this->db->query("SELECT a01codigo, a01Nombres, a01Tipo FROM `t01web_usuarios` WHERE `a01Codigo` IN('$redactor', '$consultor', '$juridico', '$gerente')");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Precargar el encabezado de la respuesta de tutela*/
    public function get_tut_answ_header($cedula){
      $query = $this->db->query("SELECT ur.a08AP01 AS nombre, ur.a08AP02 AS apellido, ur.a08AP04 AS direccion, ur.a08AP05 AS barrio, ur.a08AP06 AS telefono, d.a05Nombre AS depto, m.a06Nombre AS mpo, pr.a04Respuesta AS genero FROM t08web_usuario_respuestas ur JOIN t05web_departamentos d ON ur.a08AP03O01 = d.a05Codigo JOIN t06web_municipios m ON ur.a08AP03O02 = m.a06Codigo JOIN t04web_pregunta_respuestas pr ON ur.a08AP013 = pr.a04Codigo WHERE a08AP08O02 = '$cedula'");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Precargar encabezado impresion de cartas*/
    public function get_letter_header($formulario){
      $query = $this->db->query("SELECT ur.a08AP01 AS nombre, ur.a08AP02 AS apellido, ur.a08AP04 AS direccion, ur.a08AP05 AS barrio, ur.a08AP06 AS telefono, ur.a08AP07 AS telefono2, d.a05Nombre AS depto, m.a06Nombre AS mpo, pr.a04Respuesta AS genero, ur.a08Formulario AS formulario FROM t08web_usuario_respuestas ur JOIN t05web_departamentos d ON ur.a08AP03O01 = d.a05Codigo JOIN t06web_municipios m ON ur.a08AP03O02 = m.a06Codigo JOIN t04web_pregunta_respuestas pr ON ur.a08AP013 = pr.a04Codigo WHERE a08Formulario = '$formulario'");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Precargar contenido de carata para impresion*/
    public function get_letter_contents($id_respuesta){
      $query = $this->db->query("SELECT rt.firma, rt.tipologia, rt.cuerpo_mensaje, rt.usuario_redactor, rt.usuario_juridico, rt.usuario_consultor, rt.usuario_gerente, rt.rad_emgesa, rt.rad_stick, rt.fec_carta FROM t49web_respuestas_tutelas rt WHERE rt.id_respuesta = $id_respuesta");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Consultar iniciales del usuario*/
    public function get_user_init($usuario_id){
      $query = $this->db->query("SELECT a01Inicial FROM t01web_usuarios WHERE a01codigo = '$usuario_id'");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener pendientes del dashboard */
    public function get_dash_works($usuario, $rol){
      //$query = $this->db->query("SELECT rt.id_respuesta, rt.formulario, rt.cedula, wec.nombre_estado_carta AS estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, wr.a01Nombre AS modulo_actual, rt.tipologia AS tip_id, rt.categoria AS cat_id FROM t49web_respuestas_tutelas rt JOIN t00web_roles wr ON rt.modulo_actual = wr.a01Codigo JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria WHERE rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' ORDER BY tip_id, cat_id");
      //$query = $this->db->query("SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, rt.vulnerable FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' GROUP BY rt.cedula ORDER BY CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) DESC");
      //$query = $this->db->query("SELECT * FROM (SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, rt.vulnerable, rt.estado FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' GROUP BY rt.cedula ORDER BY CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) DESC) AS tabla WHERE estado IN (1,2)");
      //$query = $this->db->query("SELECT * FROM (SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' GROUP BY rt.cedula ORDER BY CAST(tip_id AS DECIMAL) ASC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id DESC, rt.estado ASC, rt.cedula ASC) AS tabla WHERE estado IN (1,2,4)");
      //$query = $this->db->query("SELECT * FROM (SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' ORDER BY CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id ASC, rt.estado ASC, rt.cedula ASC) AS tabla WHERE estado IN (1,2,4)");
      //$query = $this->db->query("SELECT * FROM (SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado, rt.modulo_actual, max(rt.id_respuesta) as YO FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' GROUP BY rt.cedula ORDER BY CAST(tip_id AS DECIMAL) ASC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id DESC, rt.estado ASC, rt.cedula ASC) AS tabla WHERE estado IN (1,2,4) and modulo_actual in (5,7,6,9)");
      //$query = $this->db->query("SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado, rt.modulo_actual FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE (rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' ) AND modulo_actual = $rol AND estado IN (1, 2, 4) ORDER BY CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id ASC, rt.estado ASC, rt.cedula ASC;");
      //$query = $this->db->query("SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, wu.a01nombres AS E, wu3.a01nombres AS R, wu2.a01nombres AS V, CASE   WHEN rt.vulnerable = 0    THEN 'No'    ELSE 'Si'  END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado, rt.modulo_actual FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec    ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt    ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc    ON rt.categoria = wc.id_categoria JOIN tmp_base tb    ON rt.cedula = tb.cc JOIN `t01web_usuarios` wu   ON rt.usuario_redactor = wu.a01Codigo JOIN `t01web_usuarios` wu2   ON (rt.`usuario_juridico` = wu2.`a01Codigo`) JOIN `t01web_usuarios` wu3  ON (rt.`usuario_consultor` = wu3.`a01Codigo`) WHERE (rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario') AND modulo_actual = $rol AND estado IN (1, 2, 4) ORDER BY CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id ASC, rt.estado ASC, rt.cedula ASC ;");
      //vulnerables//$query = $this->db->query("SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, wu.a01nombres AS E, wu3.a01nombres AS R, wu2.a01nombres AS V, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, DATE(fc.Fecha) as Fecha, rt.estado, rt.modulo_actual FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc JOIN `t01web_usuarios` wu ON rt.usuario_redactor = wu.a01Codigo JOIN `t01web_usuarios` wu2 ON (rt.`usuario_juridico` = wu2.`a01Codigo`) JOIN `t01web_usuarios` wu3 ON (rt.`usuario_consultor` = wu3.`a01Codigo`) LEFT JOIN tmp_fecha_inicial fc ON rt.`formulario` = fc.formulario WHERE (rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' OR rt.usuario_documental = '$usuario') AND modulo_actual = $rol AND estado IN (1, 2, 4) ORDER BY fc.Fecha DESC, CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) ASC, rt.estado ASC, rt.cedula ASC;");
      $query = $this->db->query("SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, wu.a01nombres AS E, wu3.a01nombres AS R, wu2.a01nombres AS V, CASE WHEN rt.anexos_pqr = 0 THEN 'No' ELSE 'Si' END AS anexos_pqr, rt.anexos_pqr AS anexos_pqr_id, DATE(fc.Fecha) as Fecha, rt.estado, rt.modulo_actual FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc JOIN `t01web_usuarios` wu ON rt.usuario_redactor = wu.a01Codigo JOIN `t01web_usuarios` wu2 ON (rt.`usuario_juridico` = wu2.`a01Codigo`) JOIN `t01web_usuarios` wu3 ON (rt.`usuario_consultor` = wu3.`a01Codigo`) LEFT JOIN tmp_fecha_inicial fc ON rt.`formulario` = fc.formulario WHERE (rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' OR rt.usuario_documental = '$usuario') AND modulo_actual = $rol AND estado IN (1, 2, 4) ORDER BY fc.Fecha DESC, CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) ASC, rt.estado ASC, rt.cedula ASC;");
      $dataArray = $query->result();
      return $dataArray;
    }

    /* Obtener pendientes del dashboard filtrados por estado*/
    public function get_dash_filtered($usuario, $estado, $rol){
      //$query = $this->db->query("SELECT rt.id_respuesta, rt.formulario, rt.cedula, wec.nombre_estado_carta AS estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, wr.a01Nombre AS modulo_actual, rt.tipologia AS tip_id, rt.categoria AS cat_id FROM t49web_respuestas_tutelas rt JOIN t00web_roles wr ON rt.modulo_actual = wr.a01Codigo JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria WHERE rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' ORDER BY tip_id, cat_id");
      //$query = $this->db->query("SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, rt.vulnerable FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' GROUP BY rt.cedula ORDER BY CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) DESC");
      //$query = $this->db->query("SELECT * FROM (SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, rt.vulnerable, rt.estado FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' GROUP BY rt.cedula ORDER BY CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) DESC) AS tabla WHERE estado IN (1,2)");
      //$query = $this->db->query("SELECT * FROM (SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' GROUP BY rt.cedula ORDER BY CAST(tip_id AS DECIMAL) ASC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id DESC, rt.estado ASC, rt.cedula ASC) AS tabla WHERE estado = $estado");
      //$query = $this->db->query("SELECT * FROM (SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE (rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario') ORDER BY CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id ASC, rt.estado ASC, rt.cedula ASC) AS tabla WHERE estado = $estado");

      //Switch para filtrar por estado
      switch ($estado) {
        case '3':
          //Cerrado
          $query = $this->db->query("SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado, rt.modulo_actual, DATE(rt.ult_actualizacion) AS ult_actualizacion FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE (rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' OR rt.usuario_documental = '$usuario' ) AND modulo_actual = $rol AND estado = $estado ORDER BY rt.ult_actualizacion ASC, CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id ASC, rt.estado ASC, rt.cedula;");
          break;

        case '8':
          //Finalizado
          $query = $this->db->query("SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado, rt.modulo_actual, DATE(rt.ult_actualizacion) AS ult_actualizacion FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE (rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' OR rt.usuario_documental = '$usuario' ) AND modulo_actual = $rol AND estado = $estado ORDER BY rt.ult_actualizacion ASC, CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id ASC, rt.estado ASC, rt.cedula;");
          break;

        case '10':
          //Imprimir
          $query = $this->db->query("SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado, rt.modulo_actual, DATE(rt.ult_actualizacion) AS ult_actualizacion FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE (rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' OR rt.usuario_documental = '$usuario' ) AND modulo_actual = 10 AND estado = 8 ORDER BY rt.ult_actualizacion ASC, CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id ASC, rt.estado ASC, rt.cedula;");
          break;

        default:
          //Los demas
          $query = $this->db->query("SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado, rt.modulo_actual FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE (rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario'  OR rt.usuario_documental = '$usuario' ) AND modulo_actual = $rol AND estado = $estado ORDER BY CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id ASC, rt.estado ASC, rt.cedula ASC;");
          break;
      }

      $dataArray = $query->result();

      return $dataArray;
    }

    /*Fix para dash de usuario documental*/
    public function get_fix_dash_docum($usuario){
      $query = $this->db->query("SELECT rt.estado, wec.nombre_estado_carta, COUNT(rt.estado) AS conteo FROM  t49web_respuestas_tutelas rt  JOIN t59web_estados_carta wec  ON rt.estado = wec.id_estado_carta WHERE (rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' OR rt.usuario_documental = '$usuario') AND rt.`modulo_actual` = 10 AND estado = 8 GROUP BY rt.estado, wec.nombre_estado_carta;");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener listado de cartas listas para imprimir*/
    public function get_dash_finished(){
      $query = $this->db->query("SELECT rt.id_respuesta, tb.nombresapellidos, rt.formulario, rt.cedula, wec.nombre_estado_carta AS texto_estado, wt.nombre_tipologia AS tipologia, wc.nombre_categoria AS categoria, rt.tipologia AS tip_id, rt.categoria AS cat_id, CASE WHEN rt.vulnerable = 0 THEN 'No' ELSE 'Si' END AS vulnerable, rt.vulnerable AS vulnerable_id, rt.estado, rt.modulo_actual FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t54web_tipologias wt ON rt.tipologia = wt.id_tipologias JOIN t53web_categorias wc ON rt.categoria = wc.id_categoria JOIN tmp_base tb ON rt.cedula = tb.cc WHERE rt.finalizada = 1 ORDER BY CAST(tip_id AS DECIMAL) DESC, CAST(cat_id AS DECIMAL) ASC, vulnerable_id ASC, rt.estado ASC, rt.cedula ASC;");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener info general del dashboard del usuario */
    public function get_dash_status($usuario, $rol){
      $query = $this->db->query("SELECT rt.estado, wec.nombre_estado_carta, COUNT(rt.estado) AS conteo  FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta  WHERE (rt.usuario_redactor = '$usuario' OR rt.usuario_consultor = '$usuario' OR rt.usuario_juridico = '$usuario' OR rt.usuario_gerente = '$usuario' OR rt.usuario_documental = '$usuario' ) AND rt.`modulo_actual` = $rol GROUP BY rt.estado, wec.nombre_estado_carta;");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener reporte general */
    public function get_report_general(){

      try {
        $html="";
        $query = $this->db->query("SELECT DISTINCT (SELECT COUNT(formulario) FROM `t49web_respuestas_tutelas` rt1 WHERE rt1.modulo_actual=5 AND rt1.`estado` IN (1,2,4)) + (SELECT COUNT(formulario) FROM `t49web_respuestas_tutelas` rt2 WHERE rt2.`modulo_actual`=6 AND rt2.`usuario_consultor`='2437d92d-d402-11e3-8578-0019fe78698h' AND rt2.`estado` IN (1,2,4)) AS REDACTORES FROM `t49web_respuestas_tutelas` rt;");
        $dataArray = $query->result();

        //Pendientes Redactor
        $html .= "<tr><td>" . $dataArray[0]->REDACTORES . "</td>";

        $query = $this->db->query("SELECT DISTINCT (SELECT COUNT(DISTINCT formulario) FROM `t49web_respuestas_tutelas` rt1 WHERE rt1.modulo_actual=5 AND rt1.`estado` IN (3)) + (SELECT COUNT(DISTINCT formulario) FROM `t49web_respuestas_tutelas` rt2 WHERE rt2.`modulo_actual`=6 AND rt2.`usuario_consultor`='2437d92d-d402-11e3-8578-0019fe78698h' AND rt2.`estado` IN (3)) AS REDACTORES FROM `t49web_respuestas_tutelas` rt;");
        $dataArray = $query->result();

        //Cerrados Redactor
        $html .= "<td>" . $dataArray[0]->REDACTORES . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT formulario) AS COORDINADORES FROM `t49web_respuestas_tutelas` rt WHERE rt.modulo_actual=6 AND rt.`estado` IN (1,2,4) AND rt.`usuario_consultor`<>'2437d92d-d402-11e3-8578-0019fe78698h';");
        $dataArray = $query->result();

        //Pendientes Coordinador
        $html .= "<td>" . $dataArray[0]->COORDINADORES . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT formulario) AS COORDINADORES FROM `t49web_respuestas_tutelas` rt WHERE rt.modulo_actual=6 AND rt.`estado` IN (3) AND rt.`usuario_consultor`<>'2437d92d-d402-11e3-8578-0019fe78698h';");
        $dataArray = $query->result();

        //Cerrados Coordinador
        $html .= "<td>" . $dataArray[0]->COORDINADORES . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT formulario) AS JURIDICOS FROM `t49web_respuestas_tutelas` rt WHERE rt.modulo_actual=7 AND rt.`estado` IN (1,2,4)");
        $dataArray = $query->result();

        //Pendientes Juridico
        $html .= "<td>" . $dataArray[0]->JURIDICOS . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT formulario) AS JURIDICOS FROM `t49web_respuestas_tutelas` rt WHERE rt.modulo_actual=7 AND rt.`estado` IN (3)");
        $dataArray = $query->result();

        //Cerrados Juridico
        $html .= "<td>" . $dataArray[0]->JURIDICOS . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT formulario) AS GERENTES FROM `t49web_respuestas_tutelas` rt WHERE rt.modulo_actual=8 AND rt.`estado` IN (1,2,4)");
        $dataArray = $query->result();

        //Pendientes Gerente
        $html .= "<td>" . $dataArray[0]->GERENTES . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT formulario) AS GERENTES FROM `t49web_respuestas_tutelas` rt WHERE rt.modulo_actual=8 AND rt.`estado` IN (8)");
        $dataArray = $query->result();

        //Cerrados Gerente
        $html .= "<td>" . $dataArray[0]->GERENTES . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT formulario) as TERMINADOS FROM `t49web_respuestas_tutelas` rt WHERE rt.`cartas_enviadas`=1;");
        $dataArray = $query->result();

        //Terminados
        $html .= "<td>" . $dataArray[0]->TERMINADOS . "</td>";

        $query = $this->db->query("SELECT COUNT(DISTINCT formulario) as NOASIG FROM `t49web_respuestas_tutelas` rt WHERE rt.`cartas_enviadas`=0 AND rt.`modulo_actual`=0;");
        $dataArray = $query->result();

        //Sin asignar
        $html .= "<td>" . $dataArray[0]->NOASIG . "</td>";

        //Fin fila
        $html .= "</tr>";

        return $html;


      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }

    }

    /*Obtener reporte redactores*/
    public function get_report_redactor(){
      $query = $this->db->query("SELECT  r.`a01Nombres`, GROUP_CONCAT(r.nombre_estado_carta ,r.conteo  SEPARATOR ' - ') ESTADO, SUM(r.conteo) AS TOTAL FROM redactor r GROUP BY r.`a01Nombres`");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Obtener totales redactores*/
    public function get_report_total_redactor(){
      $query = $this->db->query("SELECT tab.nombre_estado_carta, SUM(tab.conteo) AS TOTAL FROM redactor tab GROUP BY tab.nombre_estado_carta ORDER BY tab.`estado`");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Obtener totales consultores*/
    public function get_report_total_consultor(){
      $query = $this->db->query("SELECT tab.nombre_estado_carta, SUM(tab.conteo) AS TOTAL FROM consultor tab GROUP BY tab.nombre_estado_carta ORDER BY tab.`estado`");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Obtener totales juridicos*/
    public function get_report_total_juridico(){
      $query = $this->db->query("SELECT tab.nombre_estado_carta, SUM(tab.conteo) AS TOTAL FROM juridico tab GROUP BY tab.nombre_estado_carta ORDER BY tab.`estado`");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Obtener reporte consultores*/
    public function get_report_consultor(){
      $query = $this->db->query("SELECT  r.`a01Nombres`, GROUP_CONCAT(r.nombre_estado_carta ,r.conteo  SEPARATOR ' - ') ESTADO, SUM(r.conteo) AS TOTAL FROM consultor r GROUP BY r.`a01Nombres` ");
      $dataArray = $query->result();

      return $dataArray;
    }

    /*Obtener reporte juridicos*/
    public function get_report_juridico(){
      $query = $this->db->query("SELECT  r.`a01Nombres`, GROUP_CONCAT(r.nombre_estado_carta ,r.conteo  SEPARATOR ' - ') ESTADO, SUM(r.conteo) AS TOTAL FROM juridico r GROUP BY r.`a01Nombres` ");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener reporte general gerente */
    public function get_report_gerente(){
      $query = $this->db->query("SELECT u.`a01Nombres` ,rt.estado, wec.nombre_estado_carta,  COUNT(DISTINCT formulario) AS conteo FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta  JOIN `t01web_usuarios` u ON u.`a01Codigo`=rt.`usuario_gerente` WHERE rt.`modulo_actual` = 8 GROUP BY u.`a01Nombres` , rt.estado, wec.nombre_estado_carta;");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener reporte tipologias redactor */
    public function get_report_tip_redactor(){
      $query = $this->db->query("SELECT rt.estado, wec.nombre_estado_carta, rt.tipologia, COUNT(DISTINCT formulario) AS conteo FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t01web_usuarios u ON u.a01Codigo=rt.usuario_redactor WHERE rt.modulo_actual = 5 OR rt.usuario_consultor='2437d92d-d402-11e3-8578-0019fe78698h' GROUP BY rt.estado, wec.nombre_estado_carta, rt.tipologia;");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener reporte categorias redactor */
    public function get_report_cat_redactor(){
      $query = $this->db->query("SELECT rt.estado, wec.nombre_estado_carta, rt.categoria, COUNT(DISTINCT formulario) AS conteo FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t01web_usuarios u ON u.a01Codigo=rt.usuario_redactor WHERE rt.modulo_actual = 5 OR rt.usuario_consultor='2437d92d-d402-11e3-8578-0019fe78698h' GROUP BY rt.estado, wec.nombre_estado_carta, rt.categoria;");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener reporte tipologias juridico */
    public function get_report_tip_juridico(){
      $query = $this->db->query("SELECT rt.estado, wec.nombre_estado_carta, rt.tipologia, COUNT(DISTINCT formulario) AS conteo FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t01web_usuarios u ON u.a01Codigo=rt.usuario_redactor WHERE rt.modulo_actual = 7 GROUP BY rt.estado, wec.nombre_estado_carta, rt.tipologia;");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener reporte categorias juridico */
    public function get_report_cat_juridico(){
      $query = $this->db->query("SELECT rt.estado, wec.nombre_estado_carta, rt.categoria, COUNT(DISTINCT formulario) AS conteo FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t01web_usuarios u ON u.a01Codigo=rt.usuario_redactor WHERE rt.modulo_actual = 7 GROUP BY rt.estado, wec.nombre_estado_carta, rt.categoria;");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener reporte tipologias gerente */
    public function get_report_tip_gerente(){
      $query = $this->db->query("SELECT rt.estado, wec.nombre_estado_carta, rt.tipologia, COUNT(DISTINCT formulario) AS conteo FROM t49web_respuestas_tutelas rt JOIN t59web_estados_carta wec ON rt.estado = wec.id_estado_carta JOIN t01web_usuarios u ON u.a01Codigo=rt.usuario_redactor WHERE rt.modulo_actual = 8 GROUP BY rt.estado, wec.nombre_estado_carta, rt.tipologia;");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener reporte tipologias general*/
    public function get_report_tip_general(){
      $query = $this->db->query("CALL proc_ReporteTip ()");
      $query = $this->db->query("SELECT * FROM t78web_report_tipologias");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener conceptos de soporte */
    public function get_supp_con(){
      $query = $this->db->query("SELECT * FROM t61web_conceptos_soporte");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener datos firmante */
    public function get_letter_signature($id_respuesta){
      $query = $this->db->query("SELECT CASE WHEN firma = 2 THEN '<hr><span style=\"font-weight: bold;\">JOHN JAIRO HUERTAS AMADOR</span><br/>Coordinador Jurídico General Proyecto Hidroeléctrico El Quimbo<br/>Gerencia Jurídica.' WHEN firma = 1 THEN '<hr><span style=\"font-weight: bold;\">ANTONIO SARMIENTO G</span><br/>Director Proyecto<br/>Proyecto Hidroeléctrico El Quimbo' ELSE '' END AS firma FROM t49web_respuestas_tutelas WHERE id_respuesta = $id_respuesta");
      $dataArray = $query->result();

      return $dataArray;
    }

    /* Obtener archivos relacionados con la certificacion - Censo 2014*/
    public function get_CertFiles($code){
        try {
            //Generamos el query
            $query = $this->db->query("SELECT * FROM t18web_scanner WHERE a18codigo = '$code'  AND a18TipoArchivo_consecutivo = 1  ORDER BY a18TipoArchivo DESC" );
            $dataArray = $query->result();
            return $dataArray;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

    }

    /* Obtener archivos relacionados con la certificacion - Entrevistas antes del censo*/
    public function get_CertFilesBefore($code){
        try {
            //Generamos el query
            $query = $this->db->query("SELECT * FROM t18web_scanner WHERE a18codigo = '$code'  AND a18TipoArchivo_consecutivo = 2  ORDER BY a18TipoArchivo DESC" );
            $dataArray = $query->result();
            return $dataArray;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

    }

    /*Busqueda alternativa para rol abogado*/
    public function do_alt_search($formulario, $cedula, $nombre, $tipo){
      try {
        //Switch para el query
        switch ($tipo) {
          case 'form':
            $query = $this->db->query("SELECT tb.cc, tb.form, tb.nombresapellidos, MAX(rt.id_respuesta) AS id_respuesta, rt.finalizada FROM t49web_respuestas_tutelas rt LEFT JOIN tmp_base tb ON rt.formulario = tb.form WHERE rt.finalizada = 1 AND tb.form = '$formulario' GROUP BY tb.cc, tb.form, tb.nombresapellidos UNION SELECT tb.cc, tb.form, tb.nombresapellidos, MAX(rt.id_respuesta) AS id_respuesta, rt.finalizada FROM t49web_respuestas_tutelas rt RIGHT JOIN tmp_base tb ON rt.formulario = tb.form WHERE rt.finalizada = 1 AND tb.form = '$formulario' GROUP BY tb.cc, tb.form, tb.nombresapellidos");
            break;

          case 'cedula':
            $query = $this->db->query("SELECT tb.cc, tb.form, tb.nombresapellidos, MAX(rt.id_respuesta) AS id_respuesta, rt.finalizada FROM t49web_respuestas_tutelas rt LEFT JOIN tmp_base tb ON rt.formulario = tb.form WHERE rt.finalizada = 1 AND tb.cc = $cedula GROUP BY tb.cc, tb.form, tb.nombresapellidos UNION SELECT tb.cc, tb.form, tb.nombresapellidos, MAX(rt.id_respuesta) AS id_respuesta, rt.finalizada FROM t49web_respuestas_tutelas rt RIGHT JOIN tmp_base tb ON rt.formulario = tb.form WHERE rt.finalizada = 1 AND tb.cc = $cedula GROUP BY tb.cc, tb.form, tb.nombresapellidos");
            break;

          case 'nombre':
            $query = $this->db->query("SELECT tb.cc, tb.form, tb.nombresapellidos, MAX(rt.id_respuesta) AS id_respuesta, rt.finalizada FROM t49web_respuestas_tutelas rt LEFT JOIN tmp_base tb ON rt.formulario = tb.form WHERE rt.finalizada = 1 AND tb.nombresapellidos LIKE '%$nombre%' GROUP BY tb.cc, tb.form, tb.nombresapellidos UNION SELECT tb.cc, tb.form, tb.nombresapellidos, MAX(rt.id_respuesta) AS id_respuesta, rt.finalizada FROM t49web_respuestas_tutelas rt RIGHT JOIN tmp_base tb ON rt.formulario = tb.form WHERE rt.finalizada = 1 AND tb.nombresapellidos LIKE '%$nombre%'GROUP BY tb.cc, tb.form, tb.nombresapellidos");
            break;

          default:
            $query = $this->db->query("SELECT tb.cc, tb.form, tb.nombresapellidos, MAX(rt.id_respuesta) AS id_respuesta, rt.finalizada FROM t49web_respuestas_tutelas rt LEFT JOIN tmp_base tb ON rt.formulario = tb.form WHERE rt.finalizada = 1 GROUP BY tb.cc, tb.form, tb.nombresapellidos UNION SELECT tb.cc, tb.form, tb.nombresapellidos, MAX(rt.id_respuesta) AS id_respuesta, rt.finalizada FROM t49web_respuestas_tutelas rt RIGHT JOIN tmp_base tb ON rt.formulario = tb.form WHERE rt.finalizada = 1 GROUP BY tb.cc, tb.form, tb.nombresapellidos");
            break;
        }

        $dataArray = $query->result();
        return $dataArray;

      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
    }

    /*Establecer las propiedades de la respuesta a la tutela en un array*/
    public function do_setLetterProps($arrayDataFromView){

      $this->arrayLetterProps = array(
        'cedula'=> (isset($arrayDataFromView['cedula'])) ? $arrayDataFromView['cedula'] : null,
        'categoria'=> (isset($arrayDataFromView['categoria'])) ? $arrayDataFromView['categoria'] : null,
        'tipologia'=> (isset($arrayDataFromView['tipologia'])) ? $arrayDataFromView['tipologia'] : null,
        'formulario'=> (isset($arrayDataFromView['formulario'])) ? $arrayDataFromView['formulario'] : null,
        'estado'=> (isset($arrayDataFromView['estado'])) ? $arrayDataFromView['estado'] : null,
        'tipologia'=> (isset($arrayDataFromView['tipologia'])) ? $arrayDataFromView['tipologia'] : null,
        'categoria'=> (isset($arrayDataFromView['categoria'])) ? $arrayDataFromView['categoria'] : null,
        'finalizada'=> (isset($arrayDataFromView['finalizada'])) ? $arrayDataFromView['finalizada'] : 0,
        'cuerpo_mensaje'=> (isset($arrayDataFromView['cuerpo_mensaje'])) ? $arrayDataFromView['cuerpo_mensaje'] : null,
        'fec_carta'=> (isset($arrayDataFromView['fec_carta'])) ? $arrayDataFromView['fec_carta'] : null,
        'rad_emgesa'=> (isset($arrayDataFromView['rad_emgesa'])) ? $arrayDataFromView['rad_emgesa'] : null,
        'rad_stick'=> (isset($arrayDataFromView['rad_stick'])) ? $arrayDataFromView['rad_stick'] : 0,
        'txt_Devolver'=> (isset($arrayDataFromView['txt_Devolver'])) ? $arrayDataFromView['txt_Devolver'] : null,
        'usuario_redactor'=> (isset($arrayDataFromView['usuario_redactor'])) ? $arrayDataFromView['usuario_redactor'] : null,
        'usuario_consultor'=> (isset($arrayDataFromView['usuario_consultor'])) ? $arrayDataFromView['usuario_consultor'] : null,
        'usuario_juridico'=> (isset($arrayDataFromView['usuario_juridico'])) ? $arrayDataFromView['usuario_juridico'] : null,
        'usuario_gerente'=> (isset($arrayDataFromView['usuario_gerente'])) ? $arrayDataFromView['usuario_gerente'] : null,
        'usuario_documental'=> (isset($arrayDataFromView['usuario_documental'])) ? $arrayDataFromView['usuario_documental'] : null,
        'modulo_actual'=> (isset($arrayDataFromView['modulo_actual'])) ? $arrayDataFromView['modulo_actual'] : null,
        'vulnerable'=> (isset($arrayDataFromView['vulnerable'])) ? $arrayDataFromView['vulnerable'] : 0,
        'firma'=> (isset($arrayDataFromView['firma'])) ? $arrayDataFromView['firma'] : 0,
        'fecha_creacion' => date("Y-m-d H:i:s")
        );

      $this->arrayLetterPropsUpd = array(
        'cedula'=> (isset($arrayDataFromView['cedula'])) ? $arrayDataFromView['cedula'] : null,
        'categoria'=> (isset($arrayDataFromView['categoria'])) ? $arrayDataFromView['categoria'] : null,
        'tipologia'=> (isset($arrayDataFromView['tipologia'])) ? $arrayDataFromView['tipologia'] : null,
        'formulario'=> (isset($arrayDataFromView['formulario'])) ? $arrayDataFromView['formulario'] : null,
        'estado'=> (isset($arrayDataFromView['estado'])) ? $arrayDataFromView['estado'] : null,
        'tipologia'=> (isset($arrayDataFromView['tipologia'])) ? $arrayDataFromView['tipologia'] : null,
        'categoria'=> (isset($arrayDataFromView['categoria'])) ? $arrayDataFromView['categoria'] : null,
        'finalizada'=> (isset($arrayDataFromView['finalizada'])) ? $arrayDataFromView['finalizada'] : 0,
        'cuerpo_mensaje'=> (isset($arrayDataFromView['cuerpo_mensaje'])) ? $arrayDataFromView['cuerpo_mensaje'] : null,
        'fec_carta'=> (isset($arrayDataFromView['fec_carta'])) ? $arrayDataFromView['fec_carta'] : null,
        'rad_emgesa'=> (isset($arrayDataFromView['rad_emgesa'])) ? $arrayDataFromView['rad_emgesa'] : null,
        'rad_stick'=> (isset($arrayDataFromView['rad_stick'])) ? $arrayDataFromView['rad_stick'] : 0,
        'txt_Devolver'=> (isset($arrayDataFromView['txt_Devolver'])) ? $arrayDataFromView['txt_Devolver'] : null,
        'usuario_redactor'=> (isset($arrayDataFromView['usuario_redactor'])) ? $arrayDataFromView['usuario_redactor'] : null,
        'usuario_consultor'=> (isset($arrayDataFromView['usuario_consultor'])) ? $arrayDataFromView['usuario_consultor'] : null,
        'usuario_juridico'=> (isset($arrayDataFromView['usuario_juridico'])) ? $arrayDataFromView['usuario_juridico'] : null,
        'usuario_gerente'=> (isset($arrayDataFromView['usuario_gerente'])) ? $arrayDataFromView['usuario_gerente'] : null,
        'usuario_documental'=> (isset($arrayDataFromView['usuario_documental'])) ? $arrayDataFromView['usuario_documental'] : null,
        'vulnerable'=> (isset($arrayDataFromView['vulnerable'])) ? $arrayDataFromView['vulnerable'] : 0,
        'modulo_actual'=> (isset($arrayDataFromView['modulo_actual'])) ? $arrayDataFromView['modulo_actual'] : null,
        'firma'=> (isset($arrayDataFromView['firma'])) ? $arrayDataFromView['firma'] : 0
        );

    }

    /*Establecer las propiedades de la accion de tutela en un array*/
    public function do_setJActionProps($arrayDataFromView){
      $this->arrayJActionProps = array(
        'id_tutela' => (isset($arrayDataFromView['id_tutela'])) ? $arrayDataFromView['id_tutela'] : null,
        'dir_contacto' => (isset($arrayDataFromView['dir_contacto'])) ? $arrayDataFromView['dir_contacto'] : null,
        'departamento' => (isset($arrayDataFromView['departamento'])) ? $arrayDataFromView['departamento'] : null,
        'municipio' => (isset($arrayDataFromView['municipio'])) ? $arrayDataFromView['municipio'] : null,
        'estado_civ' => (isset($arrayDataFromView['estado_civ'])) ? $arrayDataFromView['estado_civ'] : null,
        'sexo' => (isset($arrayDataFromView['sexo'])) ? $arrayDataFromView['sexo'] : null,
        'fec_nacimiento' => (isset($arrayDataFromView['fec_nacimiento'])) ? $arrayDataFromView['fec_nacimiento'] : null,
        'act_principal' => (isset($arrayDataFromView['act_principal'])) ? $arrayDataFromView['act_principal'] : null,
        'processtype' => (isset($arrayDataFromView['processtype'])) ? $arrayDataFromView['processtype'] : null,
        'prim_instancia' => (isset($arrayDataFromView['prim_instancia'])) ? $arrayDataFromView['prim_instancia'] : null,
        'ordenes_pi' => (isset($arrayDataFromView['ordenes_pi'])) ? $arrayDataFromView['ordenes_pi'] : null,
        'argumento_pi' => (isset($arrayDataFromView['argumento_pi'])) ? $arrayDataFromView['argumento_pi'] : null,
        'seg_instancia' => (isset($arrayDataFromView['seg_instancia'])) ? $arrayDataFromView['seg_instancia'] : null,
        'ordenes_si' => (isset($arrayDataFromView['ordenes_si'])) ? $arrayDataFromView['ordenes_si'] : null,
        'argumento_si' => (isset($arrayDataFromView['argumento_si'])) ? $arrayDataFromView['argumento_si'] : null,
        'fecha_creacion' => date("Y-m-d H:i:s")
        );

      $this->arrayJActionPropsUpd = array(
        'id_tutela' => (isset($arrayDataFromView['id_tutela'])) ? $arrayDataFromView['id_tutela'] : null,
        'dir_contacto' => (isset($arrayDataFromView['dir_contacto'])) ? $arrayDataFromView['dir_contacto'] : null,
        'departamento' => (isset($arrayDataFromView['departamento'])) ? $arrayDataFromView['departamento'] : null,
        'municipio' => (isset($arrayDataFromView['municipio'])) ? $arrayDataFromView['municipio'] : null,
        'estado_civ' => (isset($arrayDataFromView['estado_civ'])) ? $arrayDataFromView['estado_civ'] : null,
        'sexo' => (isset($arrayDataFromView['sexo'])) ? $arrayDataFromView['sexo'] : null,
        'fec_nacimiento' => (isset($arrayDataFromView['fec_nacimiento'])) ? $arrayDataFromView['fec_nacimiento'] : null,
        'act_principal' => (isset($arrayDataFromView['act_principal'])) ? $arrayDataFromView['act_principal'] : null,

        'processtype' => (isset($arrayDataFromView['processtype'])) ? $arrayDataFromView['processtype'] : null,
        'prim_instancia' => (isset($arrayDataFromView['prim_instancia'])) ? $arrayDataFromView['prim_instancia'] : null,
        'ordenes_pi' => (isset($arrayDataFromView['ordenes_pi'])) ? $arrayDataFromView['ordenes_pi'] : null,
        'argumento_pi' => (isset($arrayDataFromView['argumento_pi'])) ? $arrayDataFromView['argumento_pi'] : null,
        'seg_instancia' => (isset($arrayDataFromView['seg_instancia'])) ? $arrayDataFromView['seg_instancia'] : null,
        'ordenes_si' => (isset($arrayDataFromView['ordenes_si'])) ? $arrayDataFromView['ordenes_si'] : null,
        'argumento_si' => (isset($arrayDataFromView['argumento_si'])) ? $arrayDataFromView['argumento_si'] : null
        );

    $this->arrayJActionPropsChild = array(
        'trabajo' => (isset($arrayDataFromView['trabajo'])) ? true : false,
        'minimo_vital' => (isset($arrayDataFromView['minimo_vital'])) ? true : false,
        'igualdad' => (isset($arrayDataFromView['igualdad'])) ? true : false,
        'medio_ambiente' => (isset($arrayDataFromView['medio_ambiente'])) ? true : false,
        'debido_proceso' => (isset($arrayDataFromView['debido_proceso'])) ? true : false,
        'integridad_fisica' => (isset($arrayDataFromView['integridad_fisica'])) ? true : false,
        'participacionA' => (isset($arrayDataFromView['participacionA'])) ? true : false,
        'otro' => (isset($arrayDataFromView['otro'])) ? true : false,
        'participacion' => (isset($arrayDataFromView['participacion'])) ? true : false,
        'casacion' => (isset($arrayDataFromView['casacion'])) ? true : false,
        'desacato' => (isset($arrayDataFromView['desacato'])) ? true : false,
        'selecRevision' => (isset($arrayDataFromView['selecRevision'])) ? true : false,
      );
    }

    /*insertar la accion de tutela*/
    public function do_createAction(){
      try {
        $this->db->insert('t42web_accion_juridica', $this->arrayJActionProps);
        $query = $this->db->query('SELECT max(id_accion_juridica) as id from t42web_accion_juridica');
        $row = $query->row_array();
        $this->arrayJActionPropsChild['id_accion_juridica'] = $row['id'];
        $this->db->insert('t43web_accion_detalles', $this->arrayJActionPropsChild);
        return $row['id'];
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Actualizar la accion de tutela*/
    public function do_updateAction($idTutela){
      try {
        $this->db->where("id_tutela", $idTutela);
        $this->db->update('t42web_accion_juridica', $this->arrayJActionPropsUpd);
        $query = $this->db->query('SELECT id_accion_juridica as id FROM t42web_accion_juridica WHERE id_tutela = ' . $idTutela);
        $row = $query->row_array();
        $this->arrayJActionPropsChild['id_accion_juridica'] = $row['id'];
        $this->db->where("id_accion_juridica", $row['id']);
        $this->db->update('t43web_accion_detalles', $this->arrayJActionPropsChild);
        return true;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Insertar la carta de respuesta*/
    public function do_createLetter(){
      try {
        $this->db->insert('t49web_respuestas_tutelas', $this->arrayLetterProps);
        $query = $this->db->query('SELECT max(id_respuesta) as id from t49web_respuestas_tutelas');
        $row = $query->row_array();
        return $row['id'];
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Actualizar la carta de respuesta*/
    public function do_updateLetter($idLetter){
      try {
        $this->db->where("id_respuesta", $idLetter);

        //$this->db->update('t49web_respuestas_tutelas', $this->arrayLetterPropsUpd);
        foreach ($this->arrayLetterPropsUpd as $key => $value) {
          if ($value != null){
            if($key == "fecha_creacion" && $value == "0000-00-00 00:00:00"){
              $query = $this->db->query("update t49web_respuestas_tutelas set fecha_creacion = now() WHERE id_respuesta = $idLetter");
            }else{
              $query = $this->db->query("update t49web_respuestas_tutelas set $key = '$value' WHERE id_respuesta = $idLetter");
            }

          }
        }
        return true;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Finalizar carta desde dashboard*/
    public function do_finish_dash($idLetter){
      try {
        $query = $this->db->query("UPDATE t49web_respuestas_tutelas SET estado = 8, finalizada = 1 WHERE id_respuesta = $idLetter");
        return true;
      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
    }

    /*Guardar y cerrar carta desde dashboard*/
    public function do_finish_close_dash($idLetter){
      try {
        $query = $this->db->query("UPDATE t49web_respuestas_tutelas SET estado = 3 WHERE id_respuesta = $idLetter");
        return true;
      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
    }

    /**
     * Metodo get_next_chapter
     *
     * Método que Obtiene el Proximo Capitulo
     *
     * @param string $inRChapter ID del Capitulo
     * @return string
     */
    public function get_next_chapter($inRChapter) {
        if (is_numeric($inRChapter)) {
            $this->db->where("a02Codigo", ++$inRChapter);
        }
        else {
            $this->db->where("a02Letra", ++$inRChapter);
        }

        $SQLResult = $this->db->get("t02web_capitulos");
        $arrLNextChapter = $SQLResult->row_array();

        if ($SQLResult->num_rows() == 1) {
            return $arrLNextChapter["a02Letra"];
        }
    }
    /**
     * Metodo get_search
     *
     * Método que Obtiene los datos de la busqueda
     *
     * @return array|boolean
     */
    public function get_search() {
        $inRSearch = $this->session->userdata("inRSearch");

        if (is_numeric($inRSearch)) {
            $this->db->where("a11Codigo", $inRSearch);
            $SQLResult = $this->db->get("t11web_busqueda");

            if ($SQLResult->num_rows() == 1) {
                $arrLSearch = $SQLResult->row_array();

                print_r($arrLSearch);

                $arrLResult["a08AP01"] = $arrLSearch["a11Nombres"];
                $arrLResult["a08AP02"] = $arrLSearch["a11Apellidos"];
                $arrLResult["a08AP03O02"] = $arrLSearch["a11Lugar"];
                $arrLResult["a08AP04"] = $arrLSearch["a11Direccion"];
                $arrLResult["a08AP06"] = $arrLSearch["a11Telefono"];
                $arrLResult["a08AP08O01"] = $arrLSearch["a11TipoDoc"];
                $arrLResult["a08AP08O02"] = $arrLSearch["a11NoDoc"];
                $arrLResult["a08AP013"] = $arrLSearch["a11Sexo"];
                $arrLResult["a08AP014O01"] = $arrLSearch["a11EstadoCivil"];
                $arrLResult["a08Formulario"] = $arrLSearch["a08Formulario"];

                return $arrLResult;
            }
        }
        else {
            $this->session->set_userdata("bolRIsNewFormat", true);
            $this->session->set_userdata("inRFormID", $inRSearch);
            return $this->get_form($inRSearch);
        }

        return false;
    }
    /**
     * Metodo get_next_chapter
     *
     * Método que Obtiene las Preguntas del Capitulo
     *
     * @param string $inRChapter ID del Capitulo
     * @return string
     */
    public function get_questions($stRChapter, $inRChapter) {
        $arrLQuestions = array();
        $this->db->order_by("a03Numero, a03Posicion");
        $this->db->where("a03Capitulo", $inRChapter);
        $SQLResult = $this->db->get("t03web_capitulo_preguntas");
        $arrLAllQuestions = $SQLResult->result_array();

        foreach ($arrLAllQuestions as $inLKey => $arrLQuestion) {
            $stLInput = "TxtForm".$stRChapter."P0".$arrLQuestion["a03Numero"];
            $stLField = "a08".$stRChapter."P0".$arrLQuestion["a03Numero"];
            $arrLQuestion["a03Input"] = $stLInput;
            $arrLQuestion["a03Field"] = $stLField;

            if ($arrLQuestion["a03Tipo"] == "C" || $arrLQuestion["a03Tipo"] == "M") {
                $this->db->where("a04Pregunta", $arrLQuestion["a03Codigo"]);
                $SQLResult = $this->db->get("t04web_pregunta_respuestas");
                $arrLQuestion["arrRAnswers"] = $SQLResult->result_array();
            }
            if (is_null($arrLQuestion["a03Posicion"])) {
                $arrLQuestions[$arrLQuestion["a03Numero"]] = $arrLQuestion;
            }
            else {
                $arrLQuestion["a03Input"] .= "O0".$arrLQuestion["a03Posicion"];
                $arrLQuestion["a03Field"] .= "O0".$arrLQuestion["a03Posicion"];
                $arrLQuestions[$arrLQuestion["a03Numero"]][$arrLQuestion["a03Posicion"]] = $arrLQuestion;
            }

        }

        return $arrLQuestions;
    }
    /**
     * Método get_uuid
     *
     * Método que Obtiene un UUID de MySQL
     *
     * @return string
     */
    private function _get_uuid() {
        $SQLResult = $this->db->query("SELECT UUID() as a07Codigo");
        $arrLCode = $SQLResult->row_array();

        return $arrLCode["a07Codigo"];
    }

    /**
     * Método get_uuid
     *
     * Método que Obtiene un UUID de MySQL
     *
     * @return string
     */
    public function get_files($codeForm) {
        $SQLResult = $this->db->query("SELECT a13Identificador, a13Tipo, a13Documento FROM t13web_usuario_docs WHERE a13Identificador = '$codeForm'");
        $dataArray = $SQLResult->result();

        return $dataArray;
    }

    /*Metodo get_chapterb
      metodo que obtiene las respuestas del capitulo B*/
      public function get_chapterb($codeform){
        $SQLResult = $this->db->query("SELECT dpto.a05Nombre AS departamento, mpo.a06Nombre AS municipio, ur.a08BP02 AS vereda, ur.a08BP03 AS direccion, ur.a08BP04O01 AS estadociv, ur.a08BP04O02 AS estadociv_cual, ur.a08bp05 AS perscargo, ur.a08BP06 AS trabajando, ur.a08BP07O01 AS actprinc, ur.a08BP07O02 AS actprinc_cual FROM t08web_usuario_respuestas ur INNER JOIN t05web_departamentos dpto ON ur.a08BP01O01 = dpto.a05Codigo INNER JOIN t06web_municipios mpo ON ur.a08BP01O02 = mpo.a06Codigo WHERE ur.a08Formulario = '$codeform'");
        $dataArray = $SQLResult->result();

        return $dataArray;
      }

      /*Metodo get_chapterc
        metodo que obtiene las respuestas del capitulo C*/
        public function get_chapterc($codeform){
          $SQLResult = $this->db->query("SELECT dpto.a05Nombre AS departamento, mpo.a06Nombre AS municipio, ur.a08CP02 AS vereda, ur.a08CP03 AS direccion, ur.a08CP04O01 AS estadociv, ur.a08CP04O02 AS estadociv_cual, ur.a08cp05 AS personas, ur.a08CP06 AS trabajando, ur.a08CP07O01 AS actividadprin, ur.a08CP07O02 AS actividadprin_cual, ur.a08CP09O01 AS pagos_ss, CONCAT(ur.a08CP09O03, ' - ' , ur.a08CP09O04, ' - ' , ur.a08CP09O05) AS entidad_ss, ur.a08cp011 AS nom_eps, ur.a08CP010O01 AS regimen, ur.a08CP010O02 AS otro_regimen, ur.a08CP012O01 AS sisben, ur.a08CP012O02 AS nivel_sisben, ur.a08CP013 AS pensionado, ur.a08CP014 AS entidad_pension, ur.a08cp016 AS impactos, ur.a08cp017 AS solicitudes FROM t08web_usuario_respuestas ur INNER JOIN t06web_municipios mpo ON ur.a08BP01O02 = mpo.a06Codigo INNER JOIN t05web_departamentos dpto ON mpo.a06Departamento = dpto.a05Codigo WHERE ur.a08Formulario ='$codeform'");
          $dataArray = $SQLResult->result();

          return $dataArray;
        }

      /*Metodo get_coordb
      metodo que obtiene las información de coordenadas para el capitulo C del formulario de impresion*/
      public function get_coordb($codeform){
        $SQLResult = $this->db->query("SET group_concat_max_len = 2048");
        $SQLResult = $this->db->query("SELECT rn.a09Pregunta, GROUP_CONCAT(rn.a09O01 SEPARATOR ' | ') AS coordenadas FROM t09web_usuario_respuestasn rn JOIN t08web_usuario_respuestas ur ON rn.a09Formulario = ur.a08Formulario WHERE rn.a09Pregunta = 'BP08' AND ur.a08CP07O01 IN(51,52) AND rn.a09Formulario = '$codeform' GROUP BY rn.a09Pregunta;");
        $dataArray = $SQLResult->result();

        return $dataArray;
      }

      /*Metodo get_coordc
      metodo que obtiene las información de coordenadas para el capitulo C del formulario de impresion*/
      public function get_coordc($codeform){
        $SQLResult = $this->db->query("SET group_concat_max_len = 2048");
        $SQLResult = $this->db->query("SELECT rn.a09Pregunta, GROUP_CONCAT(rn.a09O01 SEPARATOR ' | ') AS coordenadas FROM t09web_usuario_respuestasn rn JOIN t08web_usuario_respuestas ur ON rn.a09Formulario = ur.a08Formulario WHERE rn.a09Pregunta = 'CP08' AND ur.a08CP07O01 IN(51,52) AND rn.a09Formulario = '$codeform' GROUP BY rn.a09Pregunta;");
        $dataArray = $SQLResult->result();

        return $dataArray;
      }

      /*Metodo get_cat_info
      metodo que obtiene las categorias y las tipologias de una carta agrupadas*/
      public function get_cat_info($codeform){
        $SQLResult = $this->db->query("SELECT GROUP_CONCAT(DISTINCT id_tipologia ORDER BY CAST(id_tipologia AS DECIMAL) ASC SEPARATOR ' - ') AS tipologias, GROUP_CONCAT(DISTINCT id_categoria ORDER BY CAST(id_categoria AS DECIMAL) ASC SEPARATOR ' - ') AS categorias FROM t57web_formularios_categorias WHERE id_formulario = '$codeform'");
        $dataArray = $SQLResult->result();

        return $dataArray;
      }

      /*Metodo get_form_docs
      metodo que obtiene los archivos relacionados en el formulario de impresion*/
      public function get_form_docs($codeform){

        try {

        $SQLResult = $this->db->query("SELECT a09O01 AS documento, a09O02 AS folios FROM t09web_usuario_respuestasn rn WHERE rn.a09Pregunta = 'CP019' AND rn.a09Formulario = '$codeform';");
        $dataArray = $SQLResult->result();
        $html="";

        //Cuerpo tabla
        foreach ($dataArray as $actividad => $objActividad) {
          $html .= "<tr><td>$objActividad->documento</td><td>$objActividad->folios</td></tr>";
        }

        return $html;

        } catch (Exception $exc) {
          echo $exc->getTraceAsString();
        }

      }

    /*Metodo get_pqr
        metodo que obtiene los pqr por numero de cedula*/
    public function get_pqr($cedula){
    try {
        //Generamos el query
        $SQLResult = $this->db->query("SELECT año, tipo, path, radicado, caso FROM t21web_pqr WHERE cedula = '$cedula' AND tipo NOT IN ('Radicados Anexo Censo')");
        //$SQLResult = $this->db->query("SELECT numero_proceso, temas, path FROM t19web_tutelas WHERE cedula = '$cedula'");
        $dataArray = $SQLResult->result();

        return $dataArray;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /*Metodo get_radicanex
        metodo que obtiene los radicados anexos por cedula*/
    public function get_radicanex($cedula){

      try {
        $SQLResult = $this->db->query("SELECT tipo, cedula, path FROM t21web_pqr WHERE cedula = '$cedula' AND tipo IN ('Radicados Anexo Censo')");
        $dataArray = $SQLResult->result();

        return $dataArray;
      } catch (Exception $e) {
          echo $e->getTraceAsString();
      }

    }

    /*Metodo get entrev
        metodo que obtiene las entrevistas por numero de cedula*/
    public function get_entrev($cedula){
      try {
        //Generamos el query
        $SQLResult = $this->db->query("SELECT ACTIVIDAD, FECHA_ENTREVISTA, OBSERVACIONES, PATH FROM t64web_entrevistas WHERE CEDULA = '$cedula'");
        $dataArray = $SQLResult->result();

        return $dataArray;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Metodo get_n_act_b
      metodo que obtiene las N actividades del capitulo B*/
    public function get_n_act_b($codeform){

      try {

        $SQLResult = $this->db->query("SELECT m.a06Nombre AS municipio, rn.a09O03 AS corregimiento, rn.a09O04 AS vereda, a09O05 AS predio, a09O06 AS dueno FROM t09web_usuario_respuestasn rn JOIN t06web_municipios m ON rn.a09O02=m.a06Codigo WHERE rn.a09Formulario = '$codeform' AND a09Pregunta = 'BP08'");
        $dataArray = $SQLResult->result();
        $html="";

        //Cuerpo tabla
        foreach ($dataArray as $actividad => $objActividad){
          $html .= "<tr><th>Zona desarrollo de actividad</th><th>Municipio</th><td>$objActividad->municipio</td><th>Corregimiento</th><td colspan='2'>$objActividad->corregimiento</td><th>Vereda</th><td>$objActividad->vereda</td></tr>";
          $html .= "<tr><th>Predio</th><td>$objActividad->predio</td><th colspan='2'>Nombre del dueño</th><td colspan='4'>$objActividad->dueno</td></tr>";
        }

        return $html;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }

    }

    /*Metodo get_n_act_c
      metodo que obtiene las N actividades del capitulo C*/
    public function get_n_act_c($codeform){

      try {

        $SQLResult = $this->db->query("SELECT m.a06Nombre AS municipio, rn.a09O03 AS corregimiento, rn.a09O04 AS vereda, a09O05 AS predio, a09O06 AS dueno FROM t09web_usuario_respuestasn rn JOIN t06web_municipios m ON rn.a09O02=m.a06Codigo WHERE rn.a09Formulario = '$codeform' AND a09Pregunta = 'CP08'");
        $dataArray = $SQLResult->result();
        $html="";

        //Cuerpo tabla
        foreach ($dataArray as $actividad => $objActividad){
          $html .= "<tr><th>Zona desarrollo de actividad</th><th>Municipio</th><td>$objActividad->municipio</td><th>Corregimiento</th><td colspan='2'>$objActividad->corregimiento</td><th>Vereda</th><td>$objActividad->vereda</td></tr>";
          $html .= "<tr><th>Predio</th><td>$objActividad->predio</td><th colspan='2'>Nombre del dueño</th><td colspan='4'>$objActividad->dueno</td></tr>";
        }

        return $html;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }

    }

    /*Metodo get_programs
      metodo que obtiene los programas del formulario de impresion*/
      public function get_programs($codeform){

        try {

          $SQLResult = $this->db->query("SELECT a09O01, a09O02, a09O03, a09O04, a09O05, a09O06, a09O07, a09O08, a09O09, a09O010 FROM t09web_usuario_respuestasn rn WHERE rn.a09Pregunta = 'CP015' AND rn.a09Formulario = '$codeform';");
          $dataArray = $SQLResult->result();
          $html="";

          //Cuerpo tabla
          foreach ($dataArray as $programa => $objPrograma) {
            if($objPrograma->a09O01 != null || $objPrograma->a09O01 != '' ){ $html .= "<tr><td colspan='7' class='itemRespuesta'>$objPrograma->a09O01</td></tr>"; }
            if($objPrograma->a09O02 != null || $objPrograma->a09O02 != '' ){ $html .= "<tr><td colspan='7' class='itemRespuesta'>$objPrograma->a09O02</td></tr>"; }
            if($objPrograma->a09O03 != null || $objPrograma->a09O03 != '' ){ $html .= "<tr><td colspan='7' class='itemRespuesta'>$objPrograma->a09O03</td></tr>"; }
            if($objPrograma->a09O04 != null || $objPrograma->a09O04 != '' ){ $html .= "<tr><td colspan='7' class='itemRespuesta'>$objPrograma->a09O04</td></tr>"; }
            if($objPrograma->a09O05 != null || $objPrograma->a09O05 != '' ){ $html .= "<tr><td colspan='7' class='itemRespuesta'>$objPrograma->a09O05</td></tr>"; }
            if($objPrograma->a09O06 != null || $objPrograma->a09O06 != '' ){ $html .= "<tr><td colspan='7' class='itemRespuesta'>$objPrograma->a09O06</td></tr>"; }
            if($objPrograma->a09O07 != null || $objPrograma->a09O07 != '' ){ $html .= "<tr><td colspan='7' class='itemRespuesta'>$objPrograma->a09O07</td></tr>"; }
            if($objPrograma->a09O08 != null || $objPrograma->a09O08 != '' ){ $html .= "<tr><td colspan='7' class='itemRespuesta'>$objPrograma->a09O08</td></tr>"; }
            if($objPrograma->a09O09 != null || $objPrograma->a09O09 != '' ){ $html .= "<tr><td colspan='7' class='itemRespuesta'>$objPrograma->a09O09</td></tr>"; }
            if($objPrograma->a09O010 != null || $objPrograma->a09O010 != '' ){ $html .= "<tr><td colspan='7' class='itemRespuesta'>$objPrograma->a09O010</td></tr>"; }

          }

          return $html;
        } catch (Exception $exc) {
          echo $exc->getTraceAsString();
        }

      }

    /*Metodo get_familiar
    metodo que obtiene los familiares afectados en el formulario de impresion*/
    public function get_familiar($codeform){

      try {

        $SQLResult = $this->db->query("SELECT rn.a09O02 AS nombres, rn.a09O03 AS cedula, rn.a09O04 AS parentesco, rn.a09O05 AS medida FROM t09web_usuario_respuestasn rn WHERE rn.a09Pregunta = 'CP018' AND rn.a09O01='85' AND rn.a09Formulario='$codeform';");
        $dataArray = $SQLResult->result();
        $html="";

        $html .= "<tr><th>Nombres</th><th>Cédula</th><th>Parentesco</th><th>Medida</th></tr>";

        //Cuerpo tabla
        foreach ($dataArray as $familiar => $objFamiliar) {
          $html .= "<tr><td>$objFamiliar->nombres</td><td>$objFamiliar->cedula</td><td>$objFamiliar->parentesco</td><td class='itemRespuesta'>$objFamiliar->medida</td></tr>";
        }

        return $html;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }

    }

    /**Metodo get_electro
    metodo que obtiene la informacion de la vista electrohuila*/
    public function get_electro($cedula){
      try{
        //Generamos el query
        $SQLResult = $this->db->query("SELECT * FROM tmp_electrohuila WHERE CC = '$cedula'");
        $dataArray = $SQLResult->result();
        return $dataArray;
      }catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
    }
    
    /**Metodo get_salvoconducto
    metodo que obtiene la informacion de la vista t71*/
    public function get_salvoconducto($cedula){
      try{
        //Generamos el query
        $SQLResult = $this->db->query("SELECT * FROM t71web_salvoconductos_cam WHERE cc = '$cedula'");
        $dataArray = $SQLResult->result();
        return $dataArray;
      }catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
    }
    
    /**Metodo get_salvoconducto
    metodo que obtiene la informacion de la vista t72*/
    public function get_aprobforestal($cedula){
      try{
        //Generamos el query
        $SQLResult = $this->db->query("SELECT * FROM t72web_aproforestal WHERE cc = '$cedula'");
        $dataArray = $SQLResult->result();
        return $dataArray;
      }catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
    }

    /**Metodo get_bovinaica
    metodo que obtiene la informacion de la tabla 73*/
    public function get_bovinaica($cedula){
      try{
        //Generamos el query
        $SQLResult = $this->db->query("SELECT * FROM t73web_bovina_ica WHERE cc = '$cedula' or cedula = '$cedula' ");
        $dataArray = $SQLResult->result();
        return $dataArray;
      }catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
    }

    /**Metodo get_matadero_gte
    metodo que obtiene la informacion de la tabla 74*/
    public function get_matadero_gte($cedula){
      try{
        //Generamos el query
        $SQLResult = $this->db->query("SELECT * FROM t74web_matadero_gte WHERE cc = '$cedula'");
        $dataArray = $SQLResult->result();
        return $dataArray;
      }catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
    }

    /**Metodo get_expendedores_carne_gte
    metodo que obtiene la informacion de la tabla 74*/
    public function get_expendedores_carne_gte($cedula){
      try{
        //Generamos el query
        $SQLResult = $this->db->query("SELECT * FROM t75web_expen_carne_gte WHERE cc_nit = '$cedula'");
        $dataArray = $SQLResult->result();
        return $dataArray;
      }catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
    }

    /**Metodo get_sisben
    metodo que obtiene la informacion de la tabla 77*/
    public function get_sisben($cedula){
      try {
        $SQLResult = $this->db->query("SELECT wd.a05Nombre AS Departamento, wm.`a06Nombre` AS Municipio, ws.Fecha_de_encuesta, ws.No_Orden_del_Informante_calificado, ws.No_Orden_persona, ws.Fecha_nacimiento, ws.Parentesco_con_el_jefe_del_hogar, ws.Estado_civil, ws.Conyugue, ws.Trabaja_al_interior_de_este_hogar_como_servicio_do, ws.Discapacidad_permanente, ws.Percibe_ingresos, ws.Total_ingresos_mensuales, ws.Nivel, ws.Puntaje  FROM t77web_sisben ws JOIN t05web_departamentos wd ON ws.`Departamento` = wd.a05DANE JOIN t06web_municipios wm ON ws.`Mpo` = wm.`a06DANE` WHERE ws.`Numero_doc_identidad` =  '$cedula'");
        $dataArray = $SQLResult->result();
        return $dataArray;
      } catch (Exception $exc) {
        echo $exc->getTraceAsString();
      }
    }

    /*Metodo get_florh
    metodo que obtiene la informacion de la tabla 81*/
    public function get_florh($cedula){
      try {
        $SQLResult = $this->db->query("SELECT CC, NOMBRES, APELLIDOS, OBS FROM t81web_florhuila WHERE CC = $cedula");
        $dataArray = $SQLResult->result();
        return $dataArray;
      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
    }

    /*Metodo get_san_isidro
    metodo que obtiene la información de la tabla 84*/
    public function get_san_isidro($cedula){
      try {
        $SQLResult = $this->db->query("SELECT proveedor, cc, venta, kilos_vendidos FROM t84web_arroz_sanisidro WHERE cc = $cedula");
        $dataArray = $SQLResult->result();
        return $dataArray;
      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
    }

    /*Metodo get_tabacobat
    metodo que obtiene la informacion de la tabla 82*/
    public function get_tabacobat($cedula){
      try {
        $SQLResult = $this->db->query("SELECT COSECHA, CONTRATO, CC, NOMBRE, MUNICIPIO, VEREDA, FINCA, H_S FROM t82web_tabaco WHERE CC = $cedula");
        $dataArray = $SQLResult->result();
        return $dataArray;
      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
    }

    /*Metodo det_mineria
    metodo que obtiene la informacion de la tabla 83*/
    public function get_mineria($cedula){
      try {
        $SQLResult = $this->db->query("SELECT municipio, libro, nombres_apellidos, cc, direccion, registro, folio, fecha_inscripcion FROM t83web_mineros WHERE cc = $cedula");
        $dataArray = $SQLResult->result();
        return $dataArray;
      } catch (Exception $e) {
        echo $e->getTraceAsString();
      }
    }

    /*Metodo get_no_residentes
    metodo que obtiene la informacion de la tabla de no residentes*/
    public function get_no_residentes($cedula){
      try {
        $SQLResult = $this->db->query("SELECT nr.`Nombres_trabajadores`, nr.`Empleado_Contratista`, nr.`Municipio`, nr.`Vereda`, nr.`Nombre_Predio`, nr.`Propietarios`, nr.`Nombre_Encuestado` FROM `tmp_no_residentes` nr WHERE nr.`CC` = '$cedula'");
        $dataArray = $SQLResult->result();
        return $dataArray;
      } catch (Exception $exc){
        echo $exc->getTraceAsString();
      }
    }

    /**Metodo get_empleo
    metodo que obtiene la informacion de la vista electrohuila*/
    public function get_empleo($cedula){
      try{
        //Generamos el query
        $SQLResult = $this->db->query("SELECT FECHA, Cargo, N_Contrato, Tipo_Contrato, Fecha_Contratacion, Fecha_Terminacion_Contrato FROM tmp_empleo WHERE Cedula = '$cedula'");
        $dataArray = $SQLResult->result();
        return $dataArray;
      }catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
    }

    /**Metodo get_pesca
    metodo que obtiene la informacion de la vista electrohuila*/
    public function get_pesca($cedula){
      try{
        //Generamos el query
        $SQLResult = $this->db->query("SELECT * FROM tmp_pescadores WHERE CC = '$cedula'");
        $dataArray = $SQLResult->result();
        return $dataArray;
      }catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
    }

    /**Metodo get_transp
    metodo que obtiene la informacion de la vista electrohuila*/
    public function get_transp($cedula){
      try{
        //Generamos el query
        $SQLResult = $this->db->query("SELECT * FROM tmp_transporte WHERE CC = '$cedula'");
        $dataArray = $SQLResult->result();
        return $dataArray;
      }catch(Exception $exc){
        echo $exc->getTraceAsString();
      }
    }

    /*Metodo get_tutelas
      metodo que obtiene las tutelas por numero de cedula*/
      public function get_tutelas($cedula){
        $SQLResult = $this->db->query("SELECT tutela_id, numero_proceso, temas, path FROM t19web_tutelas WHERE cedula = '$cedula'");
        $dataArray = $SQLResult->result();

        return $dataArray;
      }

    /*Metodo get_cce
      metodo que obtiene los datos de comite de expertos*/
      public function get_cce(){
        $SQLResult = $this->db->query("SELECT * FROM t56web_concepto_comite_expertos");
        $dataArray = $SQLResult->result();

        return $dataArray;
      }

    /*Metodo get_pred
    metodo que obtiene la informacion predial*/
    public function get_pred($formulario){
      $SQLResult = $this->db->query("SELECT * FROM v19web_predios_cod_catastral_t09 v JOIN tmp_base b ON b.form =v.a09Formulario WHERE v.a09Formulario='$formulario'");
      $dataArray = $SQLResult->result();

      return $dataArray;
    }

    /*Metodo get_pred_font
    metodo que obtiene la informacion de fuente certificaciones*/
    public function get_pred_font($formulario){
      $SQLResult = $this->db->query("SELECT * FROM `v16web_certificadores_t17consolidado` WHERE `FORMULARIO` = '$formulario'");
      $dataArray = $SQLResult->result();

      return $dataArray;
    }

    /*Metodo get_geo_mpo
    metodo que obtiene la info geologica del municipio*/
    public function get_geo_mpo($municipio){
      $SQLResult = $this->db->query("SELECT * FROM `t67web_extent_veredas` WHERE VEREDA = '$municipio'");
      $dataArray = $SQLResult->result();

      return $dataArray;
    }

    /*Metodo get_map_pre1
    netodo que obtiene la tabla pre1 de vista veredal*/
    public function get_map_pre1($vereda, $municipio){
      $SQLResult = $this->db->query("SELECT * FROM `v30_web_uso_jornales_vereda_total` WHERE municipio = '" . urldecode($municipio) . "' AND `VEREDA` = '" . urldecode($vereda) . "'");
      $dataArray = $SQLResult->result();

      return $dataArray;
    }

    /*Metodo get_map_pre2
    metodo que obtiene la tabla pre2 de vista veredal*/
    public function get_map_pre2($vereda, $municipio){
      $SQLResult = $this->db->query("SELECT * FROM `v29_web_uso_jornales_vereda` WHERE municipio = '" . urldecode($municipio) . "' AND `VEREDA` = '" . urldecode($vereda) . "'");
      $dataArray = $SQLResult->result();

      return $dataArray;
    }

    /*Metodo get_map_record_1
    metodo que obtiene la primera tabla de vista municipal*/
    public function get_map_record_1($vereda, $municipio){
      $SQLResult = $this->db->query("SELECT * FROM v28web_reporte_jornales_vereda_t9 WHERE MUNICIPIO = '" . urldecode($municipio) . "' AND  `VEREDA` = '" . urldecode($vereda) . "'");
      $dataArray = $SQLResult->result();

      return $dataArray;
    }

    /*Metodo get_map_record_2
    metodo que obtiene la segunda tabla de vista municipal*/
    public function get_map_record_2($vereda, $municipio){
      $SQLResult = $this->db->query("SELECT * FROM `v24web_reporte_jornales_vereda_certificaciones` WHERE  MUNICIPIO = '" . urldecode($municipio) . "' AND  `VEREDA` = '" .urldecode($vereda) . "'");
      $dataArray = $SQLResult->result();

      return $dataArray;
    }

    /*Metodo get_veredas_table_6
    metodo que obtiene la informacion de predios para la tabla 6 de veredas*/
    public function get_veredas_table_6($vereda, $municipio){
      $SQLResult = $this->db->query("SELECT `Nombre_Predio`, `Area_ha`, `Area_Afectada`, `Porc_Afectacion_Predio` FROM `t25web_predioscenso` WHERE municipio = '" . urldecode($municipio) . "' AND vereda = '" . urldecode($vereda) . "' ORDER BY `Nombre_Predio` DESC");
      $dataArray = $SQLResult->result();

      return $dataArray;
    }

    /*Metodo get_predios_table6
    metodo que obtiene la informacion de predios para la tabla 6 de predios*/
    public function get_predios_table_6($municipio, $vereda, $predio){
      //$SQLResult = $this->db->query("SELECT municipio, vereda, `USO_SUELO`, AREA, `JORNALES_ANNIO`, `empleos_permanentes` FROM `t68web_uso_predios_jornales` WHERE municipio = '" . urldecode($municipio) . "' AND vereda = '" . urldecode($vereda) . "'");
      $SQLResult = $this->db->query("SELECT `Nombre_Predio`, USO_SUELO AS USO, AREA, `JORNALES_ANNIO` AS Jornales_anio, empleos_permanentes FROM `v31_web_predios_uso` WHERE municipio = '" . urldecode($municipio) . "' AND vereda = '" . urldecode($vereda) . "' AND COD_CATAS = '$predio'");
      $dataArray = $SQLResult->result();

      return $dataArray;
    }

    /**
     * Método do_search
     *
     * Método que Busca los Datos principales del formulario
     * y/o persona
     *
     * @param array $arrRFormData Datos del formulario
     * @return array
     */
    public function do_search($arrRFormData) {
        $arrLResponse = array("found" => false);
        $arrLResults = array();

        /*Busqueda general*/
        /*Busqueda por numero de form*/

        if (!empty($arrRFormData["TxtFormNo"])) {
            // if (strlen($arrRFormData["TxtFormNo"]) <= 7) {

            //     $this->db->where("a11Encuesta", $arrRFormData["TxtFormNo"]);
            //     $SQLResult = $this->db->get("t11web_busqueda");

            //                     if ($SQLResult->num_rows() > 0) {
            //         $arrLResults = array_merge($arrLResults, $SQLResult->result_array());
            //     }

            //     $this->db->where("a07Identificador", $arrRFormData["TxtFormNo"]);
            //     $SQLResult = $this->db->get("t07web_formularios");

            //     if ($SQLResult->num_rows() > 0) {
            //         $arrLResults = array_merge($arrLResults, $SQLResult->result_array());
            //     }

            // }
            // else {
            //     $this->db->where("a07Codigo", $arrRFormData["TxtFormNo"]);
            //     $this->db->join("t08web_usuario_respuestas", "a07Codigo = a08Formulario");
            //     $SQLResult = $this->db->get("t07web_formularios");

            //     if ($SQLResult->num_rows() > 0) {
            //         $arrLResults = array_merge($arrLResults, $SQLResult->result_array());
            //     }
            // }

            $SQLResult = $this->db->query("SELECT * FROM tmp_base where form = '$arrRFormData[TxtFormNo]' ");
            $SQLDT = $SQLResult->result();

            if (sizeof($SQLDT) > 0) {
                $arrLResults = array_merge($arrLResults, $SQLDT);
            }

        }

        /*Busqueda por documento de identificacion*/

        if (!empty($arrRFormData["TxtPersonIdentity"])) {
            // $this->db->select("t11web_busqueda.*");
            // $this->db->where("a11NoDoc", $arrRFormData["TxtPersonIdentity"]);
            // $this->db->join("t08web_usuario_respuestas", "a11NoDoc != a08AP08O02");
            // $this->db->group_by("a11Encuesta");
            // $SQLResult = $this->db->get("t11web_busqueda");

            // if ($SQLResult->num_rows() > 0) {
            //     $arrLResults = array_merge($arrLResults, $SQLResult->result_array());
            // }

            // $this->db->where("a08AP08O02", $arrRFormData["TxtPersonIdentity"]);
            // $this->db->join("t07web_formularios", "a07Codigo = a08Formulario");
            // $SQLResult = $this->db->get("t08web_usuario_respuestas");

            // if ($SQLResult->num_rows() > 0) {
            //     $arrLResults = array_merge($arrLResults, $SQLResult->result_array());
            // }

            $SQLResult = $this->db->query("SELECT * FROM tmp_base where cc = '$arrRFormData[TxtPersonIdentity]' ");
            $SQLDT = $SQLResult->result();

            if (sizeof($SQLDT) > 0) {
                $arrLResults = array_merge($arrLResults, $SQLDT);
            }

        }

        /*Busqueda por nombres/apellidos*/

        if (!empty($arrRFormData["TxtPersonName"])) {
            // $this->db->select("t11web_busqueda.*");
            // $this->db->join("t08web_usuario_respuestas", "a11NoDoc != a08AP08O02");
            // $this->db->like("a11Nombres", $arrRFormData["TxtPersonName"]);
            // $this->db->or_like("a11Apellidos", $arrRFormData["TxtPersonName"]);
            // $this->db->group_by("a11NoDoc");
            // $SQLResult = $this->db->get("t11web_busqueda");

            // if ($SQLResult->num_rows() > 0) {
            //     $arrLResults = array_merge($arrLResults, $SQLResult->result_array());
            // }

            // $this->db->like("a08AP01", $arrRFormData["TxtPersonName"]);
            // $this->db->or_like("a08AP02", $arrRFormData["TxtPersonName"]);
            // $this->db->join("t07web_formularios", "a07Codigo = a08Formulario");
            // $SQLResult = $this->db->get("t08web_usuario_respuestas");

            // if ($SQLResult->num_rows() > 0) {
            //     $arrLResults = array_merge($arrLResults, $SQLResult->result_array());
            // }

            //$SQLResult = $this->db->query("SELECT * FROM v01web_union_busqueda where nombresapellidos = '$arrRFormData[TxtPersonName]' ");
            $SQLResult = $this->db->query("SELECT * FROM tmp_base where nombresapellidos like('%".str_replace(" ", "%') OR nombresapellidos LIKE('%", $arrRFormData["TxtPersonName"])."%')");
            $SQLDT = $SQLResult->result();

            if (sizeof($SQLDT) > 0) {
                $arrLResults = array_merge($arrLResults, $SQLDT);
            }

        }

        if (count($arrLResults) > 0) {
            $arrLResponse["found"] = true;
            $arrLResponse["results"] = $arrLResults;
        }

        return $arrLResponse;
    }
    /**
     * Método do_form
     *
     * Método que Guarda los Datos principales del formulario
     *
     * @param array $arrRFormData Datos del formulario
     * @return array
     */
    public function do_form($arrRFormData) {
        $inRUserID = $this->session->userdata("inRUserID");
        $inLSearch = null;

        if ($this->session->userdata("inRSearch")) {
            $inLSearch = $this->session->userdata("inRSearch");
        }

        $stLCode = $this->_get_uuid();
        $this->session->set_userdata("inRFormID", $stLCode);

        $arrLForm = array(  "a07Codigo" => $stLCode,
                            "a07Usuario" => $inRUserID,
                            "a07Departamento" => $arrRFormData["TxtFormState"],
                            "a07Municipio" => $arrRFormData["TxtFormTown"],
                            "a07Busqueda" => $inLSearch,
                            "a07Aplica" => date("Y-m-d", strtotime($arrRFormData["TxtFormDate"])),
                            "a07Lugar" => $arrRFormData["TxtFormPlace"],
                            "a07Fecha" => date("Y-m-d H:i:s"),
                            "a07Estado" => "P");

        $this->db->trans_start();
        $this->db->insert("t07web_formularios", $arrLForm);
        $this->db->trans_complete();

        return $this->db->trans_status();
    }
    /**
     * Método do_chapter
     *
     * Método que Guarda los Datos del capitulo
     *
     * @param array $arrRFormData Datos del capitulo
     * @return array
     */
    public function do_chapter($arrRFormData) {
        $inRFormID = $this->session->userdata("inRFormID");
        $arrLChaptersN = array();
        $arrLChapterN = array();

        if ($this->session->userdata("inRSearch") &&
                !$this->session->userdata("bolRIsNewFormat")) {
            $arrLFormData = array(  "TxtFormNo" => $this->session->userdata("inRSearch"),
                                    "TxtFormState" => $arrRFormData["TxtFormAP03O01"],
                                    "TxtFormTown" => $arrRFormData["TxtFormAP03O02"],
                                    "TxtFormDate" => date("Y-m-d H:i:s"),
                                    "TxtFormPlace" => "N/A");
            $this->do_form($arrLFormData);
            $inRFormID = $this->session->userdata("inRFormID");
        }

        if ($arrRFormData["TxtChapter"] == "A") {
            if (!$this->session->userdata("bolRIsNewFormat")) {
                $stLCode = $this->_get_uuid();
                $bolLInsert = true;
                $arrLChapter = array(   "a08Codigo" => $stLCode,
                                        "a08Formulario" => $inRFormID,
                                        "a08Fecha" => date("Y-m-d H:i:s"),
                                        "a08Estado" => "P");
            }
            else {
                $bolLInsert = false;
            }
        }
        else {
            $arrLChapter = array();
            $bolLInsert = false;
        }

        foreach ($arrRFormData as $stRKey => $stLData) {
            if (strpos($stRKey, "TxtForm") !== false &&
                    strpos($stRKey, "BP08") === false && strpos($stRKey, "CP08") === false &&
                    strpos($stRKey, "CP018") === false && strpos($stRKey, "CP019") === false &&
                    strpos($stRKey, "CP09O02") === false && strpos($stRKey, "CP015O01") === false) {
                $stLKey = str_replace("TxtForm", "a08", $stRKey);
                $arrLChapter[$stLKey] = trim($stLData);
            }
            else if (strpos($stRKey, "BP08") !== false) {
                $arrLData = $stLData;

                foreach ($arrLData as $inLNKey => $stLNData) {
                    $stLBNKey = str_replace("TxtFormBP08", "a09", $stRKey);
                    $stLTrimData = trim($stLNData);

                    if (!empty($stLTrimData)) {
                        $arrLChapterN[$inLNKey][$stLBNKey] = trim($stLNData);
                        $arrLChapterN[$inLNKey]["a09Formulario"] = $inRFormID;
                        $arrLChapterN[$inLNKey]["a09Fecha"] = date("Y-m-d H:i:s");
                        $arrLChapterN[$inLNKey]["a09Estado"] = "P";
                        $arrLChapterN[$inLNKey]["a09Pregunta"] = "BP08";
                    }
                }

                if (isset($arrLChapterN)) {
                    $arrLChaptersN["BP08"] = $arrLChapterN;
                }
            }
            else if (strpos($stRKey, "CP08") !== false) {
                $arrLData = $stLData;

                foreach ($arrLData as $inLNKey => $stLNData) {
                    $stLBNKey = str_replace("TxtFormCP08", "a09", $stRKey);
                    $stLTrimData = trim($stLNData);

                    if (!empty($stLTrimData)) {
                        $arrLChapterN[$inLNKey][$stLBNKey] = trim($stLNData);
                        $arrLChapterN[$inLNKey]["a09Formulario"] = $inRFormID;
                        $arrLChapterN[$inLNKey]["a09Fecha"] = date("Y-m-d H:i:s");
                        $arrLChapterN[$inLNKey]["a09Estado"] = "P";
                        $arrLChapterN[$inLNKey]["a09Pregunta"] = "CP08";
                    }
                }

                if (isset($arrLChapterN)) {
                    $arrLChaptersN["CP08"] = $arrLChapterN;
                }
            }
            else if (strpos($stRKey, "CP018") !== false) {
                $arrLData = $stLData;

                foreach ($arrLData as $inLNKey => $stLNData) {
                    $stLBNKey = str_replace("TxtFormCP018", "a09", $stRKey);
                    $stLTrimData = trim($stLNData);

                    if (!empty($stLTrimData)) {
                        $arrLChapterN[$inLNKey][$stLBNKey] = trim($stLNData);
                        $arrLChapterN[$inLNKey]["a09Formulario"] = $inRFormID;
                        $arrLChapterN[$inLNKey]["a09Fecha"] = date("Y-m-d H:i:s");
                        $arrLChapterN[$inLNKey]["a09Estado"] = "P";
                        $arrLChapterN[$inLNKey]["a09Pregunta"] = "CP018";
                    }
                }

                if (isset($arrLChapterN)) {
                    $arrLChaptersN["CP018"] = $arrLChapterN;
                }
            }
            else if (strpos($stRKey, "CP019") !== false) {
                $arrLData = $stLData;
                foreach ($arrLData as $inLNKey => $stLNData) {
                    $stLBNKey = str_replace("TxtFormCP019", "a09", $stRKey);
                    $stLTrimData = trim($stLNData);

                    if (!empty($stLTrimData)) {
                        $arrLChapterN[$inLNKey][$stLBNKey] = trim($stLNData);
                        $arrLChapterN[$inLNKey]["a09Formulario"] = $inRFormID;
                        $arrLChapterN[$inLNKey]["a09Fecha"] = date("Y-m-d H:i:s");
                        $arrLChapterN[$inLNKey]["a09Estado"] = "P";
                        $arrLChapterN[$inLNKey]["a09Pregunta"] = "CP019";
                    }
                }

                if (isset($arrLChapterN)) {
                    $arrLChaptersN["CP019"] = $arrLChapterN;
                }
            }
            else if (strpos($stRKey, "CP09O02") !== false) {
                $arrLData = $stLData;

                foreach ($arrLData as $inLNKey => $stLNData) {
                    $stLBNKey = "a09O0".($inLNKey + 1);
                    $stLTrimData = trim($stLNData);

                    if (!empty($stLTrimData)) {
                        $arrLChapterN[0][$stLBNKey] = trim($stLNData);
                        $arrLChapterN[0]["a09Formulario"] = $inRFormID;
                        $arrLChapterN[0]["a09Fecha"] = date("Y-m-d H:i:s");
                        $arrLChapterN[0]["a09Estado"] = "P";
                        $arrLChapterN[0]["a09Pregunta"] = "CP09";
                    }
                }

                if (isset($arrLChapterN)) {
                    $arrLChaptersN["CP09"] = $arrLChapterN;
                }
            }
            else if (strpos($stRKey, "CP015O01") !== false) {
                $arrLData = $stLData;

                foreach ($arrLData as $inLNKey => $stLNData) {
                    $stLBNKey = "a09O0".($inLNKey + 1);
                    $stLTrimData = trim($stLNData);

                    if (!empty($stLTrimData)) {
                        $arrLChapterN[0][$stLBNKey] = trim($stLNData);
                        $arrLChapterN[0]["a09Formulario"] = $inRFormID;
                        $arrLChapterN[0]["a09Fecha"] = date("Y-m-d H:i:s");
                        $arrLChapterN[0]["a09Estado"] = "P";
                        $arrLChapterN[0]["a09Pregunta"] = "CP015";
                    }
                }

                if (isset($arrLChapterN)) {
                    $arrLChaptersN["CP015"] = $arrLChapterN;
                }
            }
        }

        $this->db->trans_start();

        if ($bolLInsert) {
            $this->db->insert("t08web_usuario_respuestas", $arrLChapter);
        }
        else {
            $arrLUpdate = array("a08Formulario" => $inRFormID);
            $this->db->update("t08web_usuario_respuestas", $arrLChapter, $arrLUpdate);
        }
        if (isset($arrLChaptersN)) {
            foreach ($arrLChaptersN as $arrLChapterN) {
                foreach ($arrLChapterN as $arrLChapter) {
                    $this->db->insert("t09web_usuario_respuestasn", $arrLChapter);
                }
            }
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }
    /**
     * Método do_finish
     *
     * Método que Guarda los Datos finales del formulario
     *
     * @param array $arrRFormData Datos del formulario
     * @return array
     */
    public function do_finish($arrRFormData) {
        $inRFormID = $this->session->userdata("inRFormID");
        $arrLForm = array(  "a07CodigoBarras" => $arrRFormData["TxtBarCode"]);

        if (!empty($arrRFormData["TxtFormVideo"])) {
            $arrLForm["a07Video"] = $arrRFormData["TxtFormVideo"];
        }
        if (!empty($arrRFormData["TxtFormImage"])) {
            $arrLForm["a07Imagen"] = $arrRFormData["TxtFormImage"];
        }

        $this->db->trans_start();
        $this->db->where("a07Codigo", $inRFormID);
        $this->db->update("t07web_formularios", $arrLForm);
        $this->db->trans_complete();

        //$this->do_sync();

        return $this->db->trans_status();
    }
    /**
     * Método do_finish
     *
     * Método que Guarda los Datos finales del formulario
     *
     * @param array $arrRFormData Datos del formulario
     * @return array
     */
    public function do_uploads($arrRFiles) {
        $this->db->trans_start();

        foreach ($arrRFiles as $arrLFile) {
            $this->db->where("a13Identificador", $arrLFile["a13Identificador"]);
            $this->db->where("a13Tipo", $arrLFile["a13Tipo"]);
            $this->db->from("t13web_usuario_docs");

            if ($this->db->count_all_results() >= 1) {
                $SQLWhere = array(  "a13Identificador" => $arrLFile["a13Identificador"],
                                    "a13Tipo" => $arrLFile["a13Tipo"]);

                $this->db->update("t13web_usuario_docs", $arrLFile, $SQLWhere);
            }
            else {
                $this->db->insert("t13web_usuario_docs", $arrLFile);
            }
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }
    /**
     * Método do_sync
     *
     * Método que Sincroniza los formularios
     *
     * @return array
     */
    public function do_sync($bolRFiles = false) {
        $objLSync = $this->load->database("sync", true);
        $bolLConnect = $objLSync->initialize();
        $arrLResponse = array();

        if ($bolLConnect) {
            $this->db->trans_start();
            $objLSync->trans_start();

            $this->db->where("a07Estado", "P");
            $SQLResult = $this->db->get("t07web_formularios");
            $inLForms = 0;
            $inLFiles = 0;

            if ($SQLResult->num_rows() > 0) {
                $arrLFormsToSync = $SQLResult->result_array();

                foreach ($arrLFormsToSync as $arrLFormToSync) {
                    $bolLSyncForm = $objLSync->insert("t07web_formularios", $arrLFormToSync);

                    if ($bolLSyncForm) {
                        $inLForms++;
                        $arrLUpdateForm = array("a07Estado" => "S");
                        $this->db->update("t07web_formularios", $arrLUpdateForm, $arrLFormToSync);
                        $objLSync->update("t07web_formularios", $arrLUpdateForm, $arrLFormToSync);
                    }
                    if ($bolRFiles) {
                        if ($this->do_upload($arrLFormToSync["a07Imagen"])) {
                            $inLFiles++;
                        }
                        if (!empty($arrLFormToSync["a07Video"]) && $this->do_upload($arrLFormToSync["a07Video"])) {
                            $inLFiles++;
                        }
                    }
                }
            }

            $this->db->where("a08Estado", "P");
            $SQLResult = $this->db->get("t08web_usuario_respuestas");
            $inLAnswers = 0;

            if ($SQLResult->num_rows() > 0) {
                $arrLAnswersToSync = $SQLResult->result_array();

                foreach ($arrLAnswersToSync as $arrLAnswerToSync) {
                    $bolLSyncAnswers = $objLSync->insert("t08web_usuario_respuestas", $arrLAnswerToSync);

                    if ($bolLSyncAnswers) {
                        $inLAnswers++;
                        $arrLUpdateAnswers = array("a08Estado" => "S");
                        $this->db->update("t08web_usuario_respuestas", $arrLUpdateAnswers, $arrLAnswerToSync);
                        $objLSync->update("t08web_usuario_respuestas", $arrLUpdateAnswers, $arrLAnswerToSync);
                    }
                }
            }

            $this->db->where("a09Estado", "P");
            $SQLResult = $this->db->get("t09web_usuario_respuestasn");
            $inLAnswersN = 0;

            if ($SQLResult->num_rows() > 0) {
                $arrLAnswersNToSync = $SQLResult->result_array();

                foreach ($arrLAnswersNToSync as $arrLAnswerNToSync) {
                    $bolLSyncAnswersN = $objLSync->insert("t09web_usuario_respuestasn", $arrLAnswerNToSync);

                    if ($bolLSyncAnswersN) {
                        $inLAnswersN++;
                        $arrLUpdateAnswersN = array("a09Estado" => "S");
                        $this->db->update("t09web_usuario_respuestasn", $arrLUpdateAnswersN, $arrLAnswerNToSync);
                        $objLSync->update("t09web_usuario_respuestasn", $arrLUpdateAnswersN, $arrLAnswerNToSync);
                    }
                }
            }

            $objLSync->where("a01Sincro", "P");
            $SQLResult = $objLSync->get("t01web_usuarios");
            $inLUsers = 0;

            if ($SQLResult->num_rows() > 0) {
                $arrLUsersToSync = $SQLResult->result_array();

                foreach ($arrLUsersToSync as $arrLUserToSync) {
                    $this->db->where("a01Codigo", $arrLUserToSync["a01Codigo"]);
                    $SQLResult = $this->db->get("t01web_usuarios");

                    if ($SQLResult->num_rows() == 0) {
                        $bolLSyncUsers = $this->db->insert("t01web_usuarios", $arrLUserToSync);

                        if ($bolLSyncUsers) {
                            $inLUsers++;
                            $arrLUpdateUsers = array("a01Sincro" => "S");
                            $this->db->update("t01web_usuarios", $arrLUpdateUsers, $arrLUserToSync);
                            $objLSync->update("t01web_usuarios", $arrLUpdateUsers, $arrLUserToSync);
                        }
                    }
                }
            }

            $arrLResponse["forms"] = $inLForms;
            $arrLResponse["answers"] = $inLAnswers;
            $arrLResponse["answers-n"] = $inLAnswersN;
            $arrLResponse["users"] = $inLUsers;
            $arrLResponse["ftp"] = $inLFiles;

            $this->db->trans_complete();
            $objLSync->trans_complete();

            return $arrLResponse;
        }

        return $bolLConnect;
    }
    /**
     * Método do_upload
     *
     * Método que Sincroniza los archivos
     *
     * @return array
     */
    public function do_upload($stRFile) {
        $this->load->library("ftp");
        $this->ftp->connect();

        if (!empty($stRFile) && file_exists("public/uploads/".$stRFile)) {
            $this->ftp->upload(FCPATH."public/uploads/".$stRFile, $stRFile);
        }

        $this->ftp->close();

        return true;
    }
    /**
     * Método do_save_interview_1
     *
     * Método guarda la información de la tabla t76_web_interview_1
     *
     * @return array
     */
    public function do_save_interview_1($IdFormInterview, $IsText, $Column, $Value, $IdFormT08) {
        try {
            if($IdFormInterview == "0"){
                $query = "insert into t76web_interview_1 (codigo_formulario, usuario_id) values ('$IdFormT08', '" . $this->session->userdata("inRUserID"). "' )";
                $this->db->query($query);
                $data = $this->db->query("select max(id) as id from t76web_interview_1")->result();
                $IdFormInterview = $data[0]->id;
            }
            
            $query = "update t76web_interview_1 set usuario_id = '" . $this->session->userdata("inRUserID")  . "', $Column = ";
            
            if ($IsText) {
                $query .= "'$Value' ";
            } else {
                $query .= "$Value ";
            }
            $query .= "where id = $IdFormInterview";
            $this->db->query($query);
            
            return $IdFormInterview;
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    /**
     * Método getInfoInterviewOne
     *
     * Método obtiene la información de la entrevista no. 1
     *
     * @return array
     */
    public function getInfoInterviewOne($IdFormT08) {
        try {
            $query = "select * from t76web_interview_1 where codigo_formulario = '$IdFormT08'";
            return  $this->db->query($query)->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}