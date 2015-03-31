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
        <legend></legend>
        <div id="filter">
            <label>
                Tipo Evento:
            </label>
            <select class="form-control">
                <option>
                    Seleccione...
                </option>
            </select>
            
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
                Municipios de cobertura actividad:
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
                Descripción de la actividad
            </label>
            <textarea class="form-control"></textarea>
            
            <label>
                Fecha inicio:
            </label>
            <input type="date" class="form-control" />
            
            <label>
                Fecha fin:
            </label>
            <input type="date" class="form-control" />
            
            <label>
                Hora inicio:
            </label>
            <input type="time" class="form-control" />
            
            <label>
                Hora fin:
            </label>
            <input type="time" class="form-control" />
        </div>
        <legend></legend>
        <input style="margin-left: 5%;" type="button" value="Guardar" class="btn btn-success" />
        <br/>
        <br/>

        
    </div>
</div>