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
                    <td>Departamento:</td>
                    <td><option id="selDpto"></option></td>
                    <td>Municipio</td>
                    <td><option id="selMpo"></option></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</section>