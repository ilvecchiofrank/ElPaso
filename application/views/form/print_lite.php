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
          <table>
            <tr>
              <td><?php echo trim(str_replace("<p>&quot;</p>", "", $arrLetterContent[0]->cuerpo_mensaje), '"'); ?></td>
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