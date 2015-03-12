<?php
ob_start();
?>
<style>
    p, ol li{
        line-height: 100%;
        text-align: justify;
    }
    hr{
        border: 1px solid #000;
    }
</style>
<page backtop="25mm" backbottom="25mm" style="font-size: 10pt;">
    <page_header>
        <img src="data:image/png;base64,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" style="float: left;"/>
    </page_header>
    <page_footer style="text-align: center; color: #878787; font-weight: bold; font-size: 9.5pt;"> 
        <table>
            <tr>
                <td>Oficina Bogotá: Cra 11 # 82 – 76 Piso 4 – Bogotá, Colombia –  (571) 219 0330</td>
            </tr>
            <tr>
                <td>Oficina Garzón: Cra 10  # 4-32 – Huila, Colombia –  (578) 8334484 / Oficina Gigante: Calle 2 # 3-57 – Huila, Colombia – (578) 8325290</td>
            </tr>
            <tr>
                <td>www.emgesa.com.co</td>
            </tr>
            <tr>
                <td style="text-align: right;">
                    [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>
<!--    <div class="main-content">
        <div class="container">-->
<!--            <div class="row">-->
                <table style='width:95%'>
                    <tr>
                        <td style='width:50%; text-align: left;'><?php echo $arrLetterContent[0]->rad_emgesa; ?></td>
<!--                        <td style='width:50%; text-align: right;'><img alt="Emgesa" src="public/img/logoprint.gif" class="img-responsive" style="float: right;"></td>-->
                    </tr>
                </table>
                <br/>
                <br/>
                <table style='width:95%'>
                    <tr>
                        <!--<td>Neiva  ,  </td> -->
                        <td>El Quimbo</td>
                        <td style="text-align: right;"><?php //echo $arrPrintData[0]->formulario; ?></td>
                    </tr>
                </table>
                <br/>
                <br/>
                <table>
                    <tr>
                        <td><?php
                            if (strlen($arrPrintData[0]->genero) > 5) {
                                echo "Señor:";
                            } else {
                                echo "Señora:";
                            }

                            ?></td>
                    </tr>
                    <tr style="font-weight: bold;">
                        <td><?php echo $arrPrintData[0]->nombre; ?> <?php echo $arrPrintData[0]->apellido; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $arrPrintData[0]->direccion; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $arrPrintData[0]->barrio; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                $telefono = $arrPrintData[0]->telefono;
                                if(strlen(trim($telefono)) > 0){
                                    $telefono .= " - " . $arrPrintData[0]->telefono2;
                                }

                                echo $telefono;
                            ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $arrPrintData[0]->mpo; ?> - <?php echo $arrPrintData[0]->depto; ?></td>
                    </tr>
                </table>
                <br/>
                <br/>
                <br/>
                <table>
                    <tr>
                      <!-- <td>Asunto: T(<?php echo $arrTipol[0]->tipologias; ?>). Censo Quimbo T135/13</td> -->
                        <td>Asunto: Respuesta Censo sentencia T135/13</td>
                    </tr>
                </table>
                <br/>
                <br/>
                <br/>
                <table>
                    <tr>
                        <td><?php
                            if (strlen($arrPrintData[0]->genero) > 5) {
                                echo "Respetado Señor";
                            } else {
                                echo "Respetada Señora";
                            }

                            echo " " . $arrPrintData[0]->apellido . ": ";

                            ?></td>
                    </tr>
                </table>
                <p>
                    Es para nosotros grato informar a Usted que en el proceso censal ordenado por la Corte Constitucional en el marco de la sentencia T-135/13, le correspondió el No. <?php echo $arrPrintData[0]->formulario; ?>
                    . Le rogamos que para todos los efectos a que haya lugar utilice en el futuro dicho número.
                </p>
<!--                <br/>-->
                <?php
                    $arrLetterContent[0]->cuerpo_mensaje = str_replace("<p>&quot;</p>", "", $arrLetterContent[0]->cuerpo_mensaje);
                    $arrLetterContent[0]->cuerpo_mensaje = str_replace("<p>&nbsp;</p>", "", $arrLetterContent[0]->cuerpo_mensaje);
                    $arrLetterContent[0]->cuerpo_mensaje = str_replace("&nbsp;", "", $arrLetterContent[0]->cuerpo_mensaje);
                    $arrLetterContent[0]->cuerpo_mensaje = str_replace('\n', "", $arrLetterContent[0]->cuerpo_mensaje);
                    $arrLetterContent[0]->cuerpo_mensaje = str_replace('\t', "", $arrLetterContent[0]->cuerpo_mensaje);
                    echo trim($arrLetterContent[0]->cuerpo_mensaje, '"');
                ?>
<!--                <br/>-->
                <br/>
                <p>
                    Cordialmente,
                </p>
                <table>
                    <tr >
                        <td style="text-align: left !important;">
                            <?php
                            echo '<br/><br/><img src="public/img/signature' . $arrLetterContent[0]->firma . '.jpg">';
                         ?>
                        </td>
                    </tr>
                </table>
                <br/>
                <table>
                    <tr>
                        <td><?php echo $usr_Firma[0]->firma; ?></td>
                    </tr>
                </table>
                <br/>
                <table>
                    <tr>
                        <td>Elaboró: <?php echo $usr_Red[0]->a01Inicial; ?></td>
                    </tr>
                    <tr>
                        <td>Revisó: <?php echo $usr_Con[0]->a01Inicial; ?></td>
                    </tr>
                    <tr>
                        <td>Validó: <?php echo $usr_Jur[0]->a01Inicial; ?></td>
                    </tr>
                    <tr>
                        <td>Aprobó: MP</td>
                    </tr>
                </table>
</page>
<?php
    $content = ob_get_clean();
    // convert to PDF
require_once(APPPATH . 'libraries/html2pdf/html2pdf.class.php');
try {

    $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(20, 30, 20, 17));
    ob_end_clean();
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('test.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>
