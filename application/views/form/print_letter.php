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
        <img src="data:image/gif;base64,R0lGODlhigAmAOeKAAAyZgA2bhQxfgg4ahozdxY1gxo6exg5jRg6hSE5eRE/cCI3jw5Acx47ghk/fBg/hSU6nRs/lQpIiBtDjhlJkyBLeRtMjQdRniBNjhZRmh9QlhpWqSFXnC1XmzFZgytfqB9jrCFjqCFllR1otj9ljEBljCNxuyt0oy9zuyx3vSJ5yjV4pC96qFBzllFzljp3uTF8qyd8zBWE2DOArkB9vCOFzFl6mzeAxzaEsmB/nyuM0z2IzyWQ3y2T3SyT5UqOyyaa2W6KqHCMqRyf5iyb4leRzCOh23OPq1CY1Tuf3Tqh9iWp62Od1YCYsnuaujax9Iyiukey8Y2jujG69XKr4ZCmvJGmvZGnvVC183ir40u6+GC585C0zJ+xxYG64V3D84y35Hy78HS+7qa3yXrC5oW+9HPI+Ki9z2bM/6++z4nH+YbJ9ZPI8LTC0nnR9nrX+7jK2bjL2bnN28DM2brO3bvQ3rzR36XY+Zzb+6Pg+7fb+8/Y4rfj97nr/8vp+d/l68bs/OHv/8r2/9z09e7x9PDy9sz///D3+uf7//j+/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////yH5BAEKAP8ALAAAAACKACYAAAj+ABUJHEiwoMGDCBMqXMiw4UI5ECNGhKOIzwsBCBAY2Mhxo4OPHztutOGwpMmTKFMKlIOjpcuXVQDRENCgZgORBkCGFHlFpc+fQEuyfPmSRRVBP2jaxKnTAc6eQaNKjTp0xcEq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" style="float: right;"/>
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
