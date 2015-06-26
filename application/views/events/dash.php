<script type="text/javascript">
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
    
    #filter select, #filter label, #filter input{
        width: 20%;
        display: inline-table;
        margin-top: 1em;
        margin-left: 1em;
    }
</style>

<section class="main-content">
    <div class="container">
        <h3>Registro único de Personas - RUP</h3>
        <br/>
        <h1>Formulario de búsqueda de actividades</h1>
        <legend></legend>
        <div id="filter">
            <label>
                Departamento:
            </label>
            <select id="departamentos" class="form-control departamentos">
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
                Tipo Evento:
            </label>
            <select id="actividadTipos" class="form-control">
                <option>
                    Seleccione...
                </option>
            </select>
            
            <label>
                Nombre del sitio:
            </label>
            <input id="sitionombre" type="text" class="form-control" />
            
            <label>
                Fecha inicio:
            </label>
            <input id="fechaini" type="date" class="form-control" />
            
            <label>
                Fecha fin
            </label>
            <input id="fechafin" type="date" class="form-control" />
        </div>
        <legend></legend>
        <input style="margin-left: 5%;" type="button" onclick="loadData();" value="Buscar" class="btn btn-default" /> 
        <a href="index.php/events/form/0" class="btn btn-success" >Agregar Nueva Actividad</a>
        <br/>
        <br/>
        <legend>Resultados de Busqueda</legend>
        <input type="button" onclick="window.location.reload();" value="Quitar Filtro" class="btn btn-danger" />
        <br/>
        <br/>
        <div>
            <table id="tableContentEvents" class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>
                            Departamento
                        </th>
                        <th>
                            Municipio
                        </th>
                        <th>
                            Tipo Evento
                        </th>
                        <th>
                            Sitio Evento
                        </th>
                        <th>
                            Fecha Inicio
                        </th>
                        <th>
                            Fecha Fin
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>