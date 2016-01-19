$(document).ready(function() {
    // DatePicker pour choisir une date
    $(".input-group.date").datepicker({
    	language: "fr",
    	defaultViewDate: { year: 2014, month: 11 },
    	maxViewMode: "days",
    	startDate: "01/12/2014",
    	endDate: "31/12/2014",
    	autoclose: true,
    	clearBtn: true
	});
});