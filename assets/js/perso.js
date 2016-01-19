$(document).ready(function() {
    // DatePicker pour choisir une date
    $(".input-group.date").datepicker({
    	language: "fr",
    	defaultViewDate: { year: 2015, month: 11 },
    	maxViewMode: "days",
    	startDate: "01/12/2015",
    	endDate: "31/12/2015",
    	autoclose: true,
    	clearBtn: true
	});
});
