<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="quimbo, emgesa, endesa">
    <title><?php echo $stRPageTitle; ?> | Quimbo - Emgesa</title>
    <base href="<?php echo base_url(); ?>">
    <link href="public/css/bootstrap.min.css" rel="stylesheet" media="screen, print">
    <style type="text/css">
        body {
            font-size: 12px;
        }
        p, li {
            font-size: 11px;
        }
        .table {
            margin-bottom: 0px;
        }
        .panel-body {
            padding: 5px;
        }
        .huella {
            border: 1px solid #ccc;
            padding: 30px 20px 0px 20px;
            margin-top: -20px;
        }
    </style>
  </head>
  <body>
    <section class="main-content">
      <div class="container">
        <div class="row">
          <table style='width:95%'>
            <tr>
              <td style='width:50%; text-align: left;'>[PQ-UGS-ECO-1548-56]</td>
              <td style='width:50%; text-align: right;'><img alt="Emgesa" src="public/img/logoprint.gif" class="img-responsive" style="float: right";></td>
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
              <td><?php if (strlen($arrPrintData[0]->genero) > 5) {echo "Señor:";} else {echo "Señora:";}?></td>
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
              <td><?php if (strlen($arrPrintData[0]->genero) > 5) { echo "Respetado Señor:"; } else { echo "Respetada Señora:"; }?></td>
            </tr>
          </table>
          <br/>
          <table>
            <tr>
              <td><?php echo trim(str_replace("<p>&quot;</p>", "", $arrLetterContent[0]->cuerpo_mensaje), '"'); ?></td>
            </tr>
          </table>
          <br/>
          <table>
            <tr>
              <td style = "display: inline-block; border-bottom: 1px solid #000; width: 250px; height: 120px;" ></td>
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
              <td>Validó: <?php echo $usr_Jur[0]->a01Inicial; ?></td>
            </tr>
            <tr>
              <td>Revisó: <?php echo $usr_Con[0]->a01Inicial; ?></td>
            </tr>
            <tr>
              <td>Aprobó: MP</td>
            </tr>
          </table>
          <br/>
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
        </div>
      </div>
    </section>
  </body>

  <script>
    var matrizRespuestas = {1:"Cedula de Ciudadania",2:"Tarjeta de Identidad",3:"Pasaporte",4:"Cedula de Extranjeria",5:"Hombre",6:"Mujer",7:"Soltero",8:"Casado",9:"Union Libre",10:"Separado",11:"Viudo",12:"Otro",13:"SI",14:"NO",15:"SI",16:"NO",17:"Reasentamiento",18:"Reubicación",19:"Reactivación de la actividad económica",20:"Empleo temporal",21:"No sabe",22:"SI",23:"NO",24:"Soltero",25:"Casado",26:"Union Libre",27:"Separado",28:"Viudo",29:"Otro",30:"Si",31:"No",32:"Jornalero",33:"Pescador Artesanal",34:"Minero",35:"Palero - Arenero",36:"Transportador pasajeros",37:"Transportador Insumos",38:"Transportador de Arena",39:"Ganadero",40:"Mayordomo",41:"Otro",42:"Soltero",43:"Casado",44:"Union Libre",45:"Separado",46:"Viudo",47:"Otro",48:"Si",49:"No",50:"Jornalero",51:"Pescador Artesanal",52:"Minero",53:"Palero - Arenero",54:"Transportador pasajeros",55:"Transportador Insumos",56:"Transportador de Arena",57:"Ganadero",58:"Mayordomo",59:"Otro",60:"Si",61:"No",62:"Pension",63:"Salud",64:"ARL",65:"Contributivo",66:"Subsidiado",67:"Otro",68:"Ninguno",69:"Si",70:"No",71:"Si",72:"No",73:"Red Unidos (Juntos)",74:"Familias en Acción",75:"Familas Guardabosques",76:"Colombia Mayor",77:"De Cero a Siempre",78:"Jovénes en Acción ",79:"Mujer Rural ",80:"Porgramas del ICBF",81:"Otro",82:"Ninguno de los anteriores",83:"Si",84:"No",85:"Si",86:"No",87:"Reasentamiento",88:"Reubicación",89:"Reactivación de la actividad económica",90:"Empleo temporal",91:"No sabe",92:"Compra directa",94:"Compensación en dinero",95:"Compra directa",96:"Compensación en dinero",97:"No Sabe"};
    var matrizDOM = document.getElementsByClassName("itemRespuesta");
    for(var item in matrizDOM) { if(!isNaN(parseInt(matrizDOM[item].innerHTML))){ matrizDOM[item].innerHTML = matrizRespuestas[parseInt(matrizDOM[item].innerHTML)] }; } 

  </script>
</html>