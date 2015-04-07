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
        <h1>Formulario de búsqueda de actividades</h1>
        <legend></legend>
        <div id="filter">
            <label>
                Departamento:
            </label>
            <select class="form-control">
                <option>
                    Seleccione...
                </option>
            </select>
            
            <label>
                Municipio:
            </label>
            <select class="form-control">
                <option>
                    Seleccione...
                </option>
            </select>
            
            <label>
                Tipo Evento:
            </label>
            <select class="form-control">
                <option>
                    Seleccione...
                </option>
            </select>
            
            <label>
                Nombre del sitio:
            </label>
            <input type="text" class="form-control" />
            
            <label>
                Fecha inicio:
            </label>
            <input type="date" class="form-control" />
            
            <label>
                Fecha fin
            </label>
            <input type="date" class="form-control" />
        </div>
        <legend></legend>
        <input style="margin-left: 5%;" type="button" value="Buscar" class="btn btn-default" /> 
        <a href="index.php/events/form" class="btn btn-success" >Agregar Nueva Actividad</a>
        <br/>
        <br/>
        <legend>Resultados de Busqueda</legend>
        <input type="button" value="Quitar Filtro" class="btn btn-danger" />
        <br/>
        <br/>
        <div>
            <table class="table table-bordered table-responsive">
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
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>