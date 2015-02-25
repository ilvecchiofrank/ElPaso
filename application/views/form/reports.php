<link href="public/css/certifications/form.css" rel="stylesheet" />

<section class="main-content">
    <div class="container">
        <div id='controls'>
          <br/>

          <div id='caption' class='form-group' >
              <legend>Reportes</legend>
          </div>
          <br/>

          <div id='reports' class='form-group'>
            <table id='tableReports' class='table table-striped'>
              <thead>
                <tbody>
                  <tr>
                    <td><a id='btnReportGral' href='index.php/form/report_details?tId=1' target='_blank' class='btn btn-default btn-md'>General</a></td>
                    <td><a id='btnReportRedactor' href='index.php/form/report_details?tId=2' target='_blank' class='btn btn-success btn-md'>Redactor</a></td>
                  </tr>
                  <tr>
                    <td><a id='btnReportCoord' href='index.php/form/report_details?tId=3' target='_blank' class='btn btn-warning btn-md'>Coordinador</a></td>
                    <td><a id='btnReportValida' href='index.php/form/report_details?tId=4' target='_blank' class='btn btn-info btn-md'>Validador Jurídico</a></td>
                  </tr>
                  <tr>
                    <td><a id='btnReportGerente' href='index.php/form/report_details?tId=5' target='_blank' class='btn btn-danger btn-md'>Gerente</a></td>
                    <td></td>
                  </tr>
                </tbody>
              </thead>
            </table>
          </div>

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