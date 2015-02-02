<?php
ob_start();
?>
<style>
    p, li{
        text-align: justify;
    }
</style>
<page backtop="20mm" backbottom="30mm" style="font-size: 10pt;">
    <page_header> 
        <img alt="Emgesa" src="public/img/logoprint.gif" class="img-responsive" style="float: right;">
    </page_header> 
    <page_footer style="text-align: center;"> 
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
        </table>
        <br/>
    </page_footer>

    <div class="main-content">
        <div class="container">
            <div class="row">
                <table style='width:95%'>
                    <tr>
                        <td style='width:50%; text-align: left;'>[PQ-UGS-ECO-1548-56]</td>
<!--                        <td style='width:50%; text-align: right;'><img alt="Emgesa" src="public/img/logoprint.gif" class="img-responsive" style="float: right;"></td>-->
                    </tr>
                </table>
                <br/>
                <table style='width:95%'>
                    <tr>
                        <td></td>
                        <td style="text-align: right;">28/02/2015</td>
                    </tr>
                    <tr>
                        <td>Neiva,</td>
                        <td style="text-align: right;"><?php echo $arrPrintData[0]->formulario; ?></td>
                    </tr>
                </table>
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
                    <tr>
                        <td><?php echo $arrPrintData[0]->nombre; ?> <?php echo $arrPrintData[0]->apellido; ?></td>
                    </tr>
                    <tr>
                        <td>Dirección: <?php echo $arrPrintData[0]->direccion; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $arrPrintData[0]->barrio; ?></td>
                    </tr>
                    <tr>
                        <td>Teléfono: <?php echo $arrPrintData[0]->telefono; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $arrPrintData[0]->mpo; ?> - <?php echo $arrPrintData[0]->depto; ?></td>
                    </tr>
                </table>
                <br/>
                <table>
                    <tr>
                      <!-- <td>Asunto: T(<?php echo $arrTipol[0]->tipologias; ?>). Censo Quimbo T135/13</td> -->
                        <td>Asunto: Respuesta Censo sentencia T135/13</td>
                    </tr>
                </table>
                <br/>
                <table>
                    <tr>
                        <td><?php
                            if (strlen($arrPrintData[0]->genero) > 5) {
                                echo "Respetado Señor:";
                            } else {
                                echo "Respetada Señora:";
                            }
                            ?></td>
                    </tr>
                </table>
                <br/>
                <?php echo trim(str_replace("<p>&quot;</p>", "", $arrLetterContent[0]->cuerpo_mensaje), '"'); ?>
                <br/>
                <table>
                    <tr>
                        <?php echo '<img src="public/img/signature' . $arrLetterContent[0]->firma . '.jpg">' ?>
                    </tr>
                    <tr>
                        <td style = "display: inline-block; border-bottom: 1px solid #000; width: 250px;" ></td>
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
                <br/>
            </div>
        </div>
    </div>
</page>
<?php
    $content = ob_get_clean();
// convert to PDF
require_once(APPPATH . 'libraries/html2pdf/html2pdf.class.php');
try {

    $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(20, 30, 20, 30));
    ob_end_clean();
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('test.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>
