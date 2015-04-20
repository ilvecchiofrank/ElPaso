<script type="text/javascript">
    var actividadid = <?php echo $actividadid; ?>;
    var personaid = <?php echo $personaid; ?>;
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
        <h1>Formulario para la administración de Inquietudes</h1>
        <legend></legend>
        <br/>
        <h3>Actividad - Participante: </h3>
        <ol id="miga" class="breadcrumb">
            <?php echo $htmlMiga; ?>
        </ol>
        <br/>
        <div>
            <legend>Formulario de registro de inquietudes de participantes</legend>
            <label>Tipo de inquietud</label>
            <br/>
            <select id='preguntasCategorias' class="form-control">
                <option>Seleccione...</option>
            </select>
            <br/>
            <label>Inquietud</label>
            <textarea style="max-width: 100%; min-height: 200px;" id="inquietud" class="form-control"></textarea>
            <br/>
            <label>Agregar Inquietud</label>
            <button id="save" onclick='saveParticipantePregunta();' class="btn btn-success">Guardar</button>
        </div>
        <br/>
        <br/>
        <div id="contentTables">
            <legend>Listado de inquietudes</legend>
            <table id="tableQuestions" class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>
                            Tipo de Inquietud
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
            <input type="button" style="margin: 0 auto;" onclick="window.location = 'index.php/events/people/' + actividadid;" value="Retornar a participantes" class="btn btn-success" />
            <br/>
            <br/>
        </div>
        
        
</section>