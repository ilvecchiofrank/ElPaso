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

    #filter select, #filter label, #filter input/*, #filter textarea*/{
        width: 20%;
        display: inline-table;
        margin-top: 1em;
        margin-left: 1em;
        vertical-align: middle;
    }
    
    .form-modal select, .form-modal label, .form-modal input, .form-modal textarea{
        width: 20%;
        display: inline-table;
        margin-top: 1em;
        margin-left: 1em;
    }
</style>

<section class="main-content">
    <div class="container" style="min-height: 500px;">
        <h4 style="text-align: center;">PROYECTO HIDROELÉCRICO EL PASO</h4>
        <br/>
        <h5 style="text-align: center;">REPORTE DE ACTIVIDADES</h5>
        <br/>
        <div style="width: 100%; text-align: center;" >
        <table>
            <tbody>
                <tr>
                    <td><label>Departamento:</label></td>
                    <td><select id="departamentos" class="form-control departamentos">
                            <option>Seleccione...</option>
                        </select>
                    </td>
                    <td><label>Municipio:</label></td>
                    <td><select id="municipios" class="form-control municipios">
                            <option>Seleccione...</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <br/>
        <div id="divFilter"><button class="btn btn-default" id="btnFilter" >Filtrar</button><button class="btn btn-danger" id="btnRemoveFilter" >Quitar filtro</button></div>
        <br/>
        <div id="divResume">
            <label>1. Resumen</label>
            <table class="table" id="tblResume"><tr><td></td></tr></table>
        </div>
        <br/>
        <div id="divDetails">
            <label>2. Detalle</label>
            <table class="table table-striped" id="tblDetails"><tr><td></td></tr></table>
        </div>
        <div id="divExport">
            <a href='index.php/reports/report_toExcel' class="btn btn-success" >Exportar Informe</a>
        </div>
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