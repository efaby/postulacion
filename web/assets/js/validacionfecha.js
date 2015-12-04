var bindDateRangeValidation = function (f, s, e) {
    if(!(f instanceof jQuery)){
			console.log("Not passing a jQuery object");
    }
  
    var jqForm = f,
        startDateId = s,
        endDateId = e;
  
    var checkDateRange = function (startDate, endDate) {
    	var dt1 = new Date(startDate);
    	var dt2 = new Date(endDate);
    	
        var isValid = (startDate != "" && endDate != "") ? dt1 <= dt2 : true;
        return isValid;
    }

    var bindValidator = function () {
        var bstpValidate = jqForm.data('bootstrapValidator');
        var validateFields = {
            startDate: {
                validators: {
                    notEmpty: { message: 'Este campo no puede ser vacío.' },
                    callback: {
                    	message: 'La fecha inicial debe ser menor o igual a la fecha final.',
                        callback: function (startDate, validator, $field) {
                            return checkDateRange(startDate, $('#' + endDateId).val())
                        }
                    }
                }
            },
            endDate: {
                validators: {
                    notEmpty: { message: 'Este campo no puede ser vacío.' },
                    callback: {
                        message: 'La fecha final debe ser mayor o igual a la fecha inicial',
                        callback: function (endDate, validator, $field) {
                            return checkDateRange($('#' + startDateId).val(), endDate);
                        }
                    }
                }
            },
          	customize: {
                validators: {
                    customize: { message: 'customize.' }
                }
            }
        }
        if (!bstpValidate) {
            jqForm.bootstrapValidator({
                excluded: [':disabled'], 
            })
        }
      
        jqForm.bootstrapValidator('addField', startDateId, validateFields.startDate);
        jqForm.bootstrapValidator('addField', endDateId, validateFields.endDate);
      
    };

    var hookValidatorEvt = function () {
        var dateBlur = function (e, bundleDateId, action) {
            jqForm.bootstrapValidator('revalidateField', e.target.id);
        }

        $('#' + startDateId).on("dp.change dp.update blur", function (e) {
            $('#' + endDateId).data("DateTimePicker").setMinDate(e.date);
            dateBlur(e, endDateId);
        });

        $('#' + endDateId).on("dp.change dp.update blur", function (e) {
            $('#' + startDateId).data("DateTimePicker").setMaxDate(e.date);
            dateBlur(e, startDateId);
        });
    }

    bindValidator();
    hookValidatorEvt();
};

//Fecha Concurso
$(function () {
    var sd = new Date(), ed = new Date();
  
    $('#fecha_inicio').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: sd, 
      maxDate: ed 
    });
  
    $('#fecha_fin').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: ed, 
      minDate: sd 
    });

    //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
    bindDateRangeValidation($("#frmVacante"), 'fecha_inicio', 'fecha_fin');
});


var bindDateRangeValidationPostulacion = function (f, s, e, sc,ec) {
    if(!(f instanceof jQuery)){
			console.log("Not passing a jQuery object");
    }
  
    var jqForm = f,
        startDateId = s,
        endDateId = e;
    	startDateConcursoId = sc,
    	endDateConcursoId = ec;
  
    var checkDateRange = function (startDate, endDate, startDateConcurso, endDateConcurso) {
    	var dt1 = new Date(startDate);
    	var dt2 = new Date(endDate);
    	
    	var dt11 = new Date(startDateConcurso);    	
      	var dt22 = new Date(endDateConcurso);   
    	
    	
        var isValid = (startDate != "" && endDate != "" && startDateConcurso!="" && endDateConcurso!="") ? ((dt1 <= dt2)  && (dt11 <= dt1 && dt1 <= dt22) && dt2 <= dt22 ): true;
        return isValid;
    }

    var bindValidator = function () {
        var bstpValidate = jqForm.data('bootstrapValidator');
        var validateFields = {
            startDate: {
                validators: {
                    notEmpty: { message: 'Este campo no puede ser vacío.' },
                    callback: {
                        message: 'La fecha inicio de postulación debe ser menor o igual a la fecha finalde postulación.',
                        callback: function (startDate, validator, $field) {
                            return checkDateRange($('#' + startDateId).val(), $('#' + endDateId).val(), $('#' + startDateConcursoId).val(), $('#' + endDateConcursoId).val())
                        }
                    }
                }
            },
            endDate: {
                validators: {
                    notEmpty: { message: 'Este campo no puede ser vacío.' },
                    callback: {
                        message: 'La fecha final debe ser mayor o igual a la fecha inicial',
                        callback: function (endDate, validator, $field) {
                        	return checkDateRange($('#' + startDateId).val(), $('#' + endDateId).val(), $('#' + startDateConcursoId).val(), $('#' + endDateConcursoId).val());
                        }
                    }
                }
            },            
            
          	customize: {
                validators: {
                    customize: { message: 'customize.' }
                }
            }
        }
        if (!bstpValidate) {
            jqForm.bootstrapValidator({
                excluded: [':disabled'], 
            })
        }
      
        jqForm.bootstrapValidator('addField', startDateId, validateFields.startDate);
        jqForm.bootstrapValidator('addField', endDateId, validateFields.endDate);
      
        jqForm.bootstrapValidator('addField', startDateConcursoId, validateFields.startDateConcurso);
        jqForm.bootstrapValidator('addField', endDateConcursoId, validateFields.endDateConcurso);
    };

    var hookValidatorEvt = function () {
        var dateBlur = function (e, bundleDateId, action) {
            jqForm.bootstrapValidator('revalidateField', e.target.id);
        }

        $('#' + startDateId).on("dp.change dp.update blur", function (e) {
            $('#' + endDateId).data("DateTimePicker").setMinDate(e.date);
            dateBlur(e, endDateId);
        });

        $('#' + endDateId).on("dp.change dp.update blur", function (e) {
            $('#' + startDateId).data("DateTimePicker").setMaxDate(e.date);
            dateBlur(e, startDateId);
        });     
        
    }

    bindValidator();
    hookValidatorEvt();
};

//Fecha Postulación
$(function () {
    var sd = new Date(), ed = new Date();
  
    $('#fecha_inicio_postulacion').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: sd, 
      maxDate: ed 
    });
  
    $('#fecha_fin_postulacion').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: ed, 
      minDate: sd 
    });

    //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
    bindDateRangeValidationPostulacion($("#frmVacante"), 'fecha_inicio_postulacion', 'fecha_fin_postulacion', 'fecha_inicio', 'fecha_fin');       
});


var bindDateRangeValidationCalificacion = function (f, s, e, sc, ec, sp, ep) {
    if(!(f instanceof jQuery)){
			console.log("Not passing a jQuery object");
    }
  
    var jqForm = f,
        startDateId = s,
        endDateId = e;
    	startDateConcursoId = sc,
    	endDateConcursoId = ec;
  
    var checkDateRange = function (startDate, endDate, startDateConcurso, endDateConcurso, startDatePostulacion, endDatePostulacion) {
    	var dt1 = new Date(startDate);
    	var dt2 = new Date(endDate);
    	
    	var dt11 = new Date(startDatePostulacion);    	
      	var dt22 = new Date(endDatePostulacion);
      	
      	var dt111 = new Date(startDateConcurso);    	
      	var dt222 = new Date(endDateConcurso);   
    	
    	
        var isValid = (startDate != "" && endDate != "" && startDateConcurso!="" && endDateConcurso!="" && startDatePostulacion!="" && endDatePostulacion!="") ? ((dt1 <= dt2)  && (dt111 <= dt1 && dt1 <= dt222)  && (dt11 <= dt1 && dt1 <= dt22) && dt2 <= dt222 ): true;
        return isValid;
    }

    var bindValidator = function () {
        var bstpValidate = jqForm.data('bootstrapValidator');
        var validateFields = {
            startDate: {
                validators: {
                    notEmpty: { message: 'Este campo no puede ser vacío.' },
                    callback: {
                        message: 'La fecha inicio de postulación debe ser menor o igual a la fecha finalde postulación.',
                        callback: function (startDate, validator, $field) {
                            return checkDateRange($('#' + startDateId).val(), $('#' + endDateId).val(), $('#' + startDateConcursoId).val(), $('#' + endDateConcursoId).val(), $('#' + startDatePostulacionId).val(), $('#' + endDatePostulacionId).val())
                        }
                    }
                }
            },
            endDate: {
                validators: {
                    notEmpty: { message: 'Este campo no puede ser vacío.' },
                    callback: {
                        message: 'La fecha final debe ser mayor o igual a la fecha inicial',
                        callback: function (endDate, validator, $field) {
                        	return checkDateRange($('#' + startDateId).val(), $('#' + endDateId).val(), $('#' + startDateConcursoId).val(), $('#' + endDateConcursoId).val(), $('#' + startDatePostulacionId).val(), $('#' + endDatePostulacionId).val());
                        }
                    }
                }
            },            
            
          	customize: {
                validators: {
                    customize: { message: 'customize.' }
                }
            }
        }
        if (!bstpValidate) {
            jqForm.bootstrapValidator({
                excluded: [':disabled'], 
            })
        }
      
        jqForm.bootstrapValidator('addField', startDateId, validateFields.startDate);
        jqForm.bootstrapValidator('addField', endDateId, validateFields.endDate);
      
        jqForm.bootstrapValidator('addField', startDateConcursoId, validateFields.startDateConcurso);
        jqForm.bootstrapValidator('addField', endDateConcursoId, validateFields.endDateConcurso);
        
        jqForm.bootstrapValidator('addField', startDatePostulacionId, validateFields.startDatePostulacion);
        jqForm.bootstrapValidator('addField', endDatePostulacionId, validateFields.endDatePostulacion);
    };

    var hookValidatorEvt = function () {
        var dateBlur = function (e, bundleDateId, action) {
            jqForm.bootstrapValidator('revalidateField', e.target.id);
        }

        $('#' + startDateId).on("dp.change dp.update blur", function (e) {
            $('#' + endDateId).data("DateTimePicker").setMinDate(e.date);
            dateBlur(e, endDateId);
        });

        $('#' + endDateId).on("dp.change dp.update blur", function (e) {
            $('#' + startDateId).data("DateTimePicker").setMaxDate(e.date);
            dateBlur(e, startDateId);
        });     
        
    }

    bindValidator();
    hookValidatorEvt();
};


//Fecha Calificación
$(function () {
    var sd = new Date(), ed = new Date();
  
    $('#fecha_inicio_calificacion').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: sd, 
      maxDate: ed 
    });
  
    $('#fecha_fin_calificacion').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: ed, 
      minDate: sd 
    });

    //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
    bindDateRangeValidation($("#frmVacante"), 'fecha_inicio_calificacion', 'fecha_fin_calificacion','fecha_inicio_postulacion', 'fecha_fin_postulacion', 'fecha_inicio', 'fecha_fin');
});

//Fecha Test
$(function () {
    var sd = new Date(), ed = new Date();
  
    $('#fecha_inicio_test').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: sd, 
      maxDate: ed 
    });
  
    $('#fecha_fin_test').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: ed, 
      minDate: sd 
    });

    //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
    bindDateRangeValidation($("#frmVacante"), 'fecha_inicio_test', 'fecha_fin_test');
});

//Fecha Clase Demostrativa
$(function () {
    var sd = new Date(), ed = new Date();
  
    $('#fecha_inicio_clase').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: sd, 
      maxDate: ed 
    });
  
    $('#fecha_fin_clase').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: ed, 
      minDate: sd 
    });

    //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
    bindDateRangeValidation($("#frmVacante"), 'fecha_inicio_clase', 'fecha_fin_clase');
});

//Fecha Entrevista
$(function () {
    var sd = new Date(), ed = new Date();
  
    $('#fecha_inicio_entrevista').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: sd, 
      maxDate: ed 
    });
  
    $('#fecha_fin_entrevista').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      defaultDate: ed, 
      minDate: sd 
    });

    //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
    bindDateRangeValidation($("#frmVacante"), 'fecha_inicio_entrevista', 'fecha_fin_entrevista');
});

