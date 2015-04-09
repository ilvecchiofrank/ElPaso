<script type="text/javascript">
    var actividadid = <?php echo $actividadid; ?>;
    var get_csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var get_csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
<style>
    h1{
        width: 100%;
        text-align: center;
    }
    #filter{
        width: 95%;
        margin: 0 auto;
        padding: 1em 1em 1em 1em;
    }
    
    #filter select, #filter label, #filter input, #filter textarea{
        width: 20%;
        display: inline-table;
        margin-top: 1em;
        margin-left: 1em;
    }
</style>

<section class="main-content">
    <div class="container">
        <h1>Formulario de administración de actividades</h1>
        <legend>1. Datos basicos actividad</legend>
        <div id="filter">
            <label>
                Tipo Evento:
            </label>
            <select id="actividadTipos" class="form-control">
                <option>
                    Seleccione...
                </option>
            </select>
            
            <label>
                Departamento:
            </label>
            <select id="departamentos" class="form-control departamentos" >
                <option>
                    Seleccione...
                </option>
            </select>
            
            <label>
                Municipio:
            </label>
            <select id="municipios" class="form-control municipios">
                <option>
                    Seleccione...
                </option>
            </select>
            
            <label>
                Nombre del sitio:
            </label>
            <input id="sitionombre" type="text" class="form-control" />
            
            <label>
                Descripción de la actividad
            </label>
            <textarea id="actividaddescripcion" class="form-control"></textarea>
            
            <label>
                Fecha inicio:
            </label>
            <input id="fechaini" type="date" class="form-control" />
            
            <label>
                Fecha fin:
            </label>
            <input id="fechafin" type="date" class="form-control" />
            
            <label>
                Hora inicio:
            </label>
            <input id="horainicio" type="time" class="form-control" />
            
            <label>
                Hora fin:
            </label>
            <input id="horafin" type="time" class="form-control" />
            
            <label>
                Departamento de cobertura:
            </label>
            <select id="departamentosCobertura" class="form-control departamentos" >
                <option>
                    Seleccione...
                </option>
            </select>
            
            <label>
                Municipio de cobertura:
            </label>
            <select id="municipiosCobertura" class="form-control municipios">
                <option>
                    Seleccione...
                </option>
            </select>
            
            <label>Asignar Municipio de Cobertura</label>
            <input id="set" class="btn btn-warning" onclick="asignarMunicipiosCobertura();" value="Asignar" />
            <br/>
            <br/>
            <table id="tableMunicipiosCobertura" class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>
                            Departamentos de Cobertura
                        </th>
                        <th>
                            Municipios de Coberturas
                        </th>
                        <th>
                        
                        </th>
                    </tr>
                    <tbody>
                        
                    </tbody>
                </thead>
            </table>
            <br/>
            <br/>
            
             <?php echo form_open_multipart('events/uploadFilesToS3');?>
            <legend>Carga de archivos</legend>
            
            <label>Tipo de Soporte</label>
            <select name="soporteid" id="soporteid" class='form-control'>
                <option>Seleccione...</option>
            </select>
            
            <label>Soporte a Cargar</label>
            <input type="file" class="form-control" name="itemUpload" value="">
            <input type="hidden" class="form-control" name="actividadid" value="<?php echo $actividadid; ?>">
            
            <label>Etiqueta</label>
            <input type='text' name='nombre' class="form-control"/>
            
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
            
            <label>Cargar Soporte</label>
            <input type="submit" class="btn btn-success" value="Cargar" />
            <br/>
            <br/>
            <legend>Listado de soportes asociados a la actividad actual</legend>
            <table id="tableSoportes" class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Tipo de Soporte</th>
                        <th>Nombre de Soporte</th>
                        <th>Descripción</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <br/>
            <br/>
            </form>
        </div>
        <legend></legend>
        <input id="save" style="margin-left: 5%;" type="button" value="Guardar" onclick="save();" class="btn btn-success" />
        <br/>
        <br/>

        
    </div>
</div>