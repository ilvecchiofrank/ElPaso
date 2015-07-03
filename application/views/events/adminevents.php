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
        <h1>Administración de actividades</h1>
        <br>
        <legend>Modulos disponibles para el administrador de actividades:</legend>
        <br/>
        <div style="width: 100%; text-align: center;" >
            <a href="index.php/events/questionsCategorised" class="btn btn-success">Inquietudes Categorizadas</a>
            <a href="index.php/events/answersCategorised" class="btn btn-default">Respuestas Categorizadas</a>
            <a href="index.php/reports/activityReport" class="btn btn-warning">Reportes</a>
        </div>
        <!-- <a href="#" class="btn btn-success"></a> -->
        
    </div>
</section>