<!--
El siguiente código HTML son los input tipo texto para elegir la fecha de inicio, y fin para ver las
estadísticas de visitas al sitio web. Se utiliza el plugin de Jquery UI, que muestra en pop-up los
calendarios para elegir las fechas.
-->
    <div class="row">
        <form id="est-visitas">
        <div class='col-xs-6'>
            <h4>1.- Elige la fecha de inicio</h4><hr>
            <div class="form-group">
              <label for="fec-ini">Fecha inicial:</label>
              <input type="text" class="form-control input-login" id="fec-ini" name="fec-ini">
            </div>
        </div>
        
        <div class='col-xs-6'>
            <h4>2.- Elige la fecha de fin</h4><hr>
            <div class="form-group">
              <label for="fec-fin">Fecha final:</label>
              <input type="text" class="form-control input-login" id="fec-fin" name="fec-fin">
            </div>
        <button type="button" class="btn btn-c2" id="ver-vis">Total de visitas</button>
        <button type="button" class="btn btn-warning" id="gen-pdf">PDF</button>
        </div>
        </form>
        <script type="text/javascript">
		/*
		Código necesario para que los calendarios en pop-up estén traducidos al español.
		*/
           $(function() {
               $.datepicker.regional['es'] = {
                 closeText: 'Cerrar',
                 prevText: '<Ant',
                 nextText: 'Sig>',
                 currentText: 'Hoy',
                 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                 weekHeader: 'Sm',
                 dateFormat: 'dd/mm/yy',
                 firstDay: 1,
                 isRTL: false,
                 showMonthAfterYear: false,
                 yearSuffix: ''
                 };
                 $.datepicker.setDefaults($.datepicker.regional['es']);
                $( "#fec-ini" ).datepicker();
                $( "#fec-fin" ).datepicker();
              });
        </script>
    </div>
