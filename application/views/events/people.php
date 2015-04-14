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
    
    .form-modal select, .form-modal label, .form-modal input, .form-modal textarea{
        width: 20%;
        display: inline-table;
        margin-top: 1em;
        margin-left: 1em;
    }
</style>

<section class="main-content">
    <div class="container">
        <h1>Formulario para la administración de participantes</h1>
        <legend></legend>
        <br/>
        <h3>Actividad: </h3>
        <ol id="miga" class="breadcrumb">
            <?php echo $htmlMiga; ?>
        </ol>
        <br/>
        <div id="filter">
            <label>Nombres</label>
            <input type="text" id="nombresSearch" value="" class="form-control">

            <label>Apellidos</label>
            <input type="text" id="apellidosSearch" value="" class="form-control">

            <label>Nro. Documento</label>
            <input type="text" id="documentoSearch" value="" class="form-control">

            <label>Buscar Participantes</label>
            <button id="search" onclick='loadData();' class="btn btn-success">Buscar</button>
        </div>

        <div id="contentTables">
            <br/>
            <legend>Listado de coincidencia</legend>
            <input type="button" onclick="window.location.reload();" value="Quitar Filtro" class="btn btn-danger" />
            <input type="button" onclick="personaid = 0; clearControls(); $('#modalPeopleAdmin').modal();" value="Crear Nuevo Participante" class="btn btn-primary" />
            <br/>
            <br/>
            <table id="searchResult" class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Sexo</th>
                        <th>No. Documento</th>
                        <th>Dpto Residencia</th>
                        <th>Mpo Residencia</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        
        <div>
            <legend>Participantes registrados: <span id="contadorParticipantesRegistrados">0</span></legend>
            
            <table id="tableParticipantesActividad" class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Sexo</th>
                        <th>No. Documento</th>
                        <th>Dpto Residencia</th>
                        <th>Mpo Residencia</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <br/>
            <br/>
            <input type="button" style="margin: 0 auto;" onclick="window.location = 'index.php/events/form/' + actividadid;" value="Retornar a actividad" class="btn btn-success" />
            <br/>
            <br/>
        </div>
        
        <div class="form-modal">
            <div class="modal fade" id="modalPeopleAdmin" tabindex="-1" role="dialog" aria-labelledby="modalPeopleAdmin" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Administración de participantes</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                
                                <label class="control-label">Nombres:</label>
                                <input type="text" class="form-control" id="nombres">
                                
                                <label class="control-label">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos">
                                
                                <label class="control-label">Sexo:</label>
                                <select id="sexo" class="form-control">
                                    <option>Seleccione...</option>
                                </select>
                                
                                <label class="control-label">Departamento:</label>
                                <select id="departamentos" class="form-control">
                                    <option>Seleccione...</option>
                                </select>
                                
                                <label class="control-label">Municipio:</label>
                                <select id="municipios" class="form-control">
                                    <option>Seleccione...</option>
                                </select>
                                
                                <label class="control-label">Tipo Documento:</label>
                                <select id="tipoDocumento" class="form-control">
                                    <option>Seleccione...</option>
                                </select>
                                
                                <label class="control-label">Documento:</label>
                                <input type="text" class="form-control" id="documento">
                                
                                <label class="control-label">Dirección:</label>
                                <input type="text" class="form-control" id="direccion">
                                
                                <label class="control-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono">
                                
                                <label class="control-label">Celular:</label>
                                <input type="text" class="form-control" id="celular">
                                
                                <label class="control-label">Cargo:</label>
                                <input type="text" class="form-control" id="cargo">
                                
                                <label class="control-label">Entidad:</label>
                                <input type="text" class="form-control" id="entidad">
                                
                                <label class="control-label">Fecha Nacimiento:</label>
                                <input type="date" class="form-control" id="fechanac">
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="savePersona();" class="btn btn-success">Guardar</button>
                            <button type="button" onclick="$('#modalPeopleAdmin').modal('hide'); loadData();" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>