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
    <div class="container">
        <h1>Formulario para la administración de Respuestas Categorizadas</h1>
        <legend></legend>
        <br/>
        <!--<h3>Actividad - Participante: </h3>
        <ol id="miga" class="breadcrumb">
            <?php //echo $htmlMiga; ?>
        </ol>-->
        <br/>
        <div>
            <legend>Formulario administración de Respuestas a inquietudes de participantes</legend>
            <label>Repuesta categorizada</label>
            <textarea style="max-width: 100%; min-height: 200px;" id="answer" class="form-control"></textarea>
            <br/>
            
            <button id="save" onclick='saveAnswerCategorised();' class="btn btn-success">Guardar</button>
        </div>
        <br/>
        <br/>
        <div id="contentTables">
            <legend>Listado de respuestas categorizadas</legend>
            <table id="tableAnswersCategorised" class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>
                            Consecutivo
                        </th>
                        <th>
                            Respuesta
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <br/>
            <br/>
            <legend>Listado de inquietudes categorizadas</legend>
            <table id="tableQuestionsCategorised" class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>
                            Consecutivo
                        </th>
                        <th>
                            Inquietud
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <br/>
            <br/>
            <input type="button" style="margin: 0 auto;" onclick="window.location = 'index.php/' + actividadid;" value="Volver" class="btn btn-success" />
            <br/>
            <br/>
        </div>
        
        
</section>