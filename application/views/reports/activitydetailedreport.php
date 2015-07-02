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
            <table class="table" id="tblDescription"><tr><td></td></tr></table>
        </div>
        <br/>
        <div id="divDetails">
            <label>2. Cobertura</label>
            <table class="table table-striped" id="tblDetails"><tr><td></td></tr></table>
        </div>
        <br/>
        <div id="divSupport">
            <label>3. Soportes asociados a la actividad</label>
            <table class="table table-striped" id="tblSupport"><tr><td></td></tr></table>
        </div>
        <br/>
        <div id="divAssistantss">
            <label>4. Participantes</label>
            <table class="table table-striped" id="tblAssistants"><tr><td></td></tr></table>
        </div>
        <br/>
        <div id="divQuestions">
            <label>5. Inquietudes y respuestas</label>
            <table class="table table-striped" id="tblQuestions"><tr><td></td></tr></table>
        </div>
    </div>
</section>