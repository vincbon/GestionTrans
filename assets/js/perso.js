$(document).ready(function() {
    // DatePicker pour choisir une date
    $(".input-group.fr.date").datepicker({
    	language: "fr",
    	defaultViewDate: { year: 2014, month: 11 },
    	maxViewMode: "days",
    	startDate: "01/12/2014",
    	endDate: "31/12/2014",
    	autoclose: true,
    	clearBtn: true
	});

    // Version anglaise du datepicker
    $(".input-group.en.date").datepicker({
        defaultViewDate: { year: 2014, month: 11 },
        maxViewMode: "days",
        startDate: "12/01/2014",
        endDate: "12/31/2014",
        autoclose: true,
        clearBtn: true
    });
});
