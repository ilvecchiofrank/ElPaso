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
        <h5 style="text-align: center;">Ficha detallada de la actividad</h5>
        <br/>
        <div id="divDescription">
            <label>1. Descripción:</label>
            <table class="table table-striped" id="tblDescription">
                <tr>
                    <td>Actividad</td>
                    <td colspan="3"><label id="lblActivity"></label></td>
                </tr>
                <tr>
                    <td>Departamento:</td>
                    <td><label id="lblDepto"></label></td>
                    <td>Municipio:</td>
                    <td><label id="lblMpo"></label></td>
                </tr>
                <tr>
                    <td>Tipo actividad:</td>
                    <td><label id="lblTypeActivity"></label></td>
                    <td>Nombre del sitio:</td>
                    <td><label id="lblSiteName"></label></td>
                </tr>
                <tr>
                    <td>Fecha inicio:</td>
                    <td><label id="lblFIni"></label></td>
                    <td>Fecha fin:</td>
                    <td><label id="lblFFin"></label></td>
                </tr>
                <tr>
                    <td>Hora inicio:</td>
                    <td><label id="lblHIni"></label></td>
                    <td>Hora fin:</td>
                    <td><label id="lblHFin"></label></td>
                </tr>
            </table>
        </div>
        <br/>
        <div id="divDetails">
            <label>2. Cobertura</label>
            <table class="table table-striped" id="tblDetails">
                <tr><td>Departamento</td><td>Municipio</td></tr>
                <tr><td></td><td></td></tr>
            </table>
        </div>
        <br/>
        <div id="divSupport">
            <label>3. Soportes asociados a la actividad</label>
            <table class="table table-striped" id="tblSupport">
                <tr><td>Tipo Soporte</td><td>Nombre del Soporte</td><td>Descripción</td><td>Consultar Soporte</td></tr>
                <tr><td></td><td></td><td></td><td></td></tr>
            </table>
        </div>
        <br/>
        <div id="divAssistantss">
            <label>4. Participantes</label>
            <table class="table" id="tblTotalAssistants"><tr><td>Total Personas:</td><td><label id="lblTotalAssistants"></label></td></tr></table>
            <table class="table table-striped" id="tblAssistants">
                <tr><td>Nombres</td><td>Apellidos</td><td>Sexo</td><td>No. Documento</td><td>Dpto. Residencia</td><td>Mpo. Residencia</td><td>Teléfono</td><td>Celular</td></tr>
                <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            </table>
        </div>
        <br/>
        <div id="divQuestions">
            <label>5. Inquietudes y respuestas</label>
            <table class="table" id="tblTotalQuestions"><tr><td>Total Inquietudes:</td><td><label id="lblTotalQuestions"></label></td></tr></table>
            <table class="table table-striped" id="tblQuestions">
                <tr><td>No. Documento</td><td>Nombres y apellidos</td><td>Tipo</td><td>Inquietud</td><td>Respuesta dad</td><td>Categoria inquietud manifestada</td><td>Categoria respuesta dada</td></tr>
                <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            </table>
        </div>
        <br/>
        <div id="divFoot">
            <label id="lblGenerationDate"></label>
            <a id="btnExport" href='index.php/reports/detailed_report_toExcel/0' class="btn btn-success" >Exportar Informe</a>
        </div>
        <br/>
    </div>
</section>