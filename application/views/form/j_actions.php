<link href="public/css/certifications/form.css" rel="stylesheet" />
<style type="text/css">

  input[type=checkbox] {
  margin-left: 1em;
  margin-right: 0.5em;
  transform: scale(1.2);
  -webkit-transform: scale(1.2);
  }

</style>
<script type='text/javascript'>
    var tutId = '<?php echo $_GET["tutId"]; ?>';
    var code = '<?php
if (isset($_GET["code"])) {
    echo $_GET["code"];
} else {
    echo "0";
}
?>';
    var get_csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var get_csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';

</script>
    <section class="main-content">
      <div class="container">
          <div id='controls'>
          <br/>
          <div id='identification' class='form-group'>
            <legend>Análisis de acciones judiciales</legend>
            <br/>
            <div id='divTutelaDetail' style="text-align: right;">
                <a id='btnTutelaDetail' href="#" class="btn btn-warning btn-md">Ver detalle de tutela</a>
              <br/>
            </div>
            <legend>A. Identificación</legend>

            <table class='table'>
              <tr>
                <th>
                  Cédula de Ciudadanía:
                </th>
                <td colspan="2">
                  <input type="text" name="cedula" id="cedula" class='form-control' readonly>
                </td>
                <th>
                  Demandante:
                </th>
                <td colspan="4">
                  <input type="text" name="demandante" id="demandante" class='form-control' readonly>
                </td>
              </tr>
              <tr>
                <th>
                  No. Proceso:
                </th>
                <td colspan="2">
                  <input type="text" name="no_proceso" id="no_proceso" class='form-control' readonly>
                </td>
                <th>
                  Juzgado:
                </th>
                <td colspan="4">
                  <input type="text" name="juzgado" id="juzgado" class='form-control' readonly>
                </td>
              </tr>
              <tr>
                <th>
                  Abogado asignado:
                </th>
                <td>
                  <input type="text" name="abog_asignado" id="abog_asignado" class='form-control' readonly>
                </td>
                <th>
                  Departamento:
                </th>
                <td>
                  <input type="text" name="depto" id="depto" class='form-control' readonly>
                </td>
                <th>
                  Municipio:
                </th>
                <td>
                  <input type="text" name="mpo" id="mpo" class='form-control' readonly>
                </td>
                <th>
                  Término:
                </th>
                <td>
                  <input type="text" name="termino" id="termino" class='form-control' readonly>
                </td>
              </tr>
              <tr>
                <th>
                  Fecha auto-admisorio:
                </th>
                <td>
                  <input type="text" name="fecha_auto_adm" id="fecha_auto_adm" class='form-control' readonly>
                </td>
                <th>
                  Temas:
                </th>
                <td>
                  <input type="text" name="temas" id="temas" class='form-control' readonly>
                </td>
                <th>
                  Sentencia:
                </th>
                <td>
                  <input type="text" name="sentencia" id="sentencia" class='form-control' readonly>
                </td>
                <th>
                  Impugnación:
                </th>
                <td>
                  <input type="text" name="impugnacion" id="impugnacion" class='form-control' readonly>
                </td>
              </tr>
            </table>
          </div>

          <div>
            <legend>B. Caracterización</legend>

            <table id='caracterizacion' class='table'>
              <tr>
                <th>
                  Dirección de contacto:
                </th>
                <td>
                  <input type="text" name="dir_contacto" id="dir_contacto" class='form-control'>
                </td>
                <th>
                  Departamento:
                </th>
                <td>
                   <select class='form-control' id='departamento' name='departamento'>
                      <option value="">Seleccione...</option>
                    </select>
                </td>
                <th>
                  Municipio:
                </th>
                <td>
                   <select class='form-control' id='municipio' name='municipio'>
                      <option value="">Seleccione...</option>
                    </select>
                </td>
              </tr>
              <tr>
                <th>
                  Estado civil:
                </th>
                <td>
                   <select class='form-control' id="estado_civ" name="estado_civ">
                      <option value="">Seleccione...</option>
                      <option value="Soltero">Soltero</option>
                      <option value="Casado">Casado</option>
                      <option value="UnionLibre">Unión Libre</option>
                      <option value="Separado">Separado</option>
                      <option value="Viudo">Viudo</option>
                      <option value="Otro">Otro</option>
                    </select>
                </td>
                <th>
                  Sexo:
                </th>
                <td>
                   <select class='form-control' id="sexo" name="sexo">
                      <option value="">Seleccione...</option>
                      <option value="H">Hombre</option>
                      <option value="M">Mujer</option>
                    </select>
                </td>
                <th>
                  Fecha de nacimiento:
                </th>
                <td>
                  <input type="date" name="fec_nacimiento" id="fec_nacimiento" class='form-control'>
                </td>
              </tr>
              <tr>
                <th>
                  Actividad económica principal:
                </th>
                <td colspan='5'>
                   <select class='form-control' id="act_principal" name="act_principal">
                      <option value="">Seleccione...</option>
                    </select>
                </td>
              </tr>
            </table>

          </div>

          <div>
            <legend>C. Revisión</legend>
            <table id='revision' class='table'>
              <tr>
                <th>
                  1. Tipo de proceso:
                </th>
                <td>
                   <select class='form-control' id='processtype' name='processtype'>
                      <option value="">Seleccione...</option>
                      <option value="1">Tutela</option>
                      <option value="2">Acción de grupo</option>
                    </select>
                </td>
              </tr>
              <tr>
                <th>
                  2. Derecho demandado:
                </th>
                <td>
                  <input type="checkbox" name="trabajo" id="trabajo" value="Trabajo">Trabajo</input>
                  <input type="checkbox" name="minimo_vital" id="minimo_vital" value="Minimo">Mínimo vital</input>
                  <input type="checkbox" name="igualdad" id="igualdad" value="Igualdad">Igualdad</input>
                  <input type="checkbox" name="medio_ambiente" id="medio_ambiente" value="MedioAmbiente">Medio ambiente</input>
                  <input type="checkbox" name="debido_proceso" id="debido_proceso" value="DebidoProceso">Debido proceso</input>
                  <input type="checkbox" name="integridad_fisica" id="integridad_fisica" value="IntegridadFisica">Integridad física</input>
                  <input type="checkbox" name="participacionA" id="participacionA" value="Participacion">Participación</input>
                  <input type="checkbox" name="otro" id="otro" value="Otro">Otro</input>
                </td>
              </tr>
              <tr>
                <th>
                  3. Primera instancia:
                </th>
                <td>
                   <select class='form-control' id="prim_instancia" name="prim_instancia">
                      <option value="">Seleccione...</option>
                      <option value="1">Favorable</option>
                      <option value="2">Desfavorable</option>
                      <option value="3">Improcedente</option>
                    </select>
                </td>
              </tr>
              <tr>
                <th>
                  Órdenes
                </th>
                <td>
                  <textarea name="ordenes_pi" id="ordenes_pi" class='form-control' cols="30" rows="7"></textarea>
                </td>
              </tr>
              <tr>
                <th>
                  Argumento
                </th>
                <td>
                  <textarea name="argumento_pi" id="argumento_pi" class='form-control' cols="30" rows="7"></textarea>
                </td>
              </tr>
              <tr>
                <th>
                  4. Segunda instancia:
                </th>
                <td>
                   <select class='form-control' id="seg_instancia" name="seg_instancia">
                      <option value="">Seleccione...</option>
                      <option value="1">Favorable</option>
                      <option value="2">Desfavorable</option>
                      <option value="3">Improcedente</option>
                    </select>
                </td>
              </tr>
              <tr>
                <th>
                  Órdenes
                </th>
                <td>
                  <textarea name="ordenes_si" id="ordenes_si" class='form-control' cols="30" rows="7"></textarea>
                </td>
              </tr>
              <tr>
                <th>
                  Argumento
                </th>
                <td>
                  <textarea name="argumento_si" id="argumento_si" class='form-control' cols="30" rows="7"></textarea>
                </td>
              </tr>
              <tr>
                <th>
                  5. Último recurso:
                </th>
                <td>
                  <input type="checkbox" name="participacion" id="participacion" value="participacion" style="display: none;"></input>
                  <label id="lblParticipacion" for="participacion" style="display: none;">Participación</label>
                  <input type="checkbox" name="casacion" id="casacion" value="casacion" style="display: none;"></input>
                  <label id="lblCasacion" for="casacion" style="display: none;">Casación</label>
                  <input type="checkbox" name="desacato" id="desacato" value="desacato" style="display: none;"></input>
                  <label id="lblDesacato" for="desacato" style="display: none;">Desacato</label>
                  <input type="checkbox" name="selecRevision" id="selecRevision" value="selecRevision" style="display: none;"></input>
                  <label id="lblSelecRevision" for="selecRevision" style="display: none;">Selecc. revisión</label>
                </td>
              </tr>
            </table>
            <input type="hidden" name="hfMunicipio" id="hfMunicipio">
          </div>
            <legend style='clear: both;'></legend>
            <button id='saveInformation' class='btn btn-success btn-md'>Guardar Información</button>
        </div>
        </br>
      </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Información:</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" style='text-align: center;' role="alert">
                    <img src='public/img/ajax-loader.gif' alt='loading...'/>
                    Cargando por favor espere...
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div id="divUpdate" style="z-index:1000; position:fixed; bottom:0; right:0; width:25%; display: none;" class="alert alert-success" role="alert" ><b>Guardado automatico. </b>Última modificación: 01/01/2001 01:01</div>
<div id="divError" style="z-index:1000; position:fixed; bottom:0; right:0; width:25%; display: none;" class="alert alert-danger" role="alert" ><b>Falló el guardado. </b>Ha ocurrido un error al guardar.</div>