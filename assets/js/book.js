toastr.options={closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!1,onclick:null,showDuration:"300",hideDuration:"1000",timeOut:"85000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut"};

$(window).load(function() {
	$(".input-daterange").daterangepicker({
	    locale: {
	      	format: 'DD-MM-YYYY',
	      	daysOfWeek : days,
	      	monthNames : months,
			applyLabel: applyText,
	      	cancelLabel: cancelText
	    },
	    autoUpdateInput : false,
	    isInvalidDate: function(date){
	    	if (_invalidDate.length) {
	    		for (var i = 0; i < _invalidDate.length; i++) {
	    			var days = _invalidDate[i].split(" - "),
	    			start = days[0].split("-"), end = days[1].split("-");
	    			if (date.isBetween(start[2]+'-'+start[1]+'-'+start[0], end[2]+'-'+end[1]+'-'+end[0])) return true;
	    		}
	    		return false;
	    	}
	    	return true;
	    },
	    minDate : new Date()
	});
	$(".datetimepicker").daterangepicker({
		singleDatePicker: true,
		timePicker: true,
	    locale: {
	      	format: 'DD-MM-YYYY h:mm A',
	      	daysOfWeek : days,
	      	monthNames : months,
			applyLabel: applyText,
	      	cancelLabel: cancelText
	    },
	    autoUpdateInput : false,
	    isInvalidDate: function(date){
	    	if (_invalidDate.length) {
	    		for (var i = 0; i < _invalidDate.length; i++) {
	    			var days = _invalidDate[i].split(" - "),
	    			start = days[0].split("-"), end = days[1].split("-");
	    			if (date.isBetween(start[2]+'-'+start[1]+'-'+start[0], end[2]+'-'+end[1]+'-'+end[0])) return true;
	    		}
	    		return false;
	    	}
	    	return true;
	    },
	    minDate : new Date()
	}, function(date) {
	  	this.element.context.value = date.format('DD-MM-YYYY h:mm A');
	});
	$(".datepicker").daterangepicker({
		singleDatePicker: true,
	    locale: {
	      	format: 'DD-MM-YYYY',
	      	daysOfWeek : days,
	      	monthNames : months,
			applyLabel: applyText,
	      	cancelLabel: cancelText
	    },
	    autoUpdateInput : false,
	    isInvalidDate: function(date){
	    	if (_invalidDate.length) {
	    		for (var i = 0; i < _invalidDate.length; i++) {
	    			var days = _invalidDate[i].split(" - "),
	    			start = days[0].split("-"), end = days[1].split("-");
	    			if (date.isBetween(start[2]+'-'+start[1]+'-'+start[0], end[2]+'-'+end[1]+'-'+end[0])) return true;
	    		}
	    		return false;
	    	}
	    	return true;
	    },
	    minDate : new Date()
	});

	$('[data-toggle="tooltip"], [rel="tooltip"]').tooltip();
	$('[data-toggle="popover"]').popover();

	$('input[name=book_date_range]').on('apply.daterangepicker', function(ev, picker) {
		$('input[name=book_date_range]').val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
	  	var days = picker.endDate.diff(picker.startDate, "days"),
	  	months = parseInt(days/30),
	  	days = days%30,
	  	weeks = parseInt(days/7),
	  	days = days%7,
	  	url = window.location.toString().split('/');
	  	$.post(
	  		$('base').attr('href')+'book/get_total_fee_template', 
	  		{
	  			days: days,
	  			weeks: weeks,
	  			months: months,
	  			room_no: url[url.length-1] == '' ? url[url.length-2] : url[url.length-1],
	  			accessToken: $('input[name=accessToken]').val()
	  		}, 
	  		function(data) {
	  			data = JSON.parse(data);
	  			if (data.type == 'success') {
	  				$("#rent_info").attr('data-content', data.html_content);
	  				$("#rent_fee").text(data.total_fee);
	  				$("#total_fee").text(data.total_fee);
	  			}
		  	}
		);

	});

	$("#book-form").submit(function(e){
		// e.preventDefault();
		var daterange = $('input[name=book_date_range]').val().split(' - ');
		if (daterange[0] == daterange[1]) {
			$('input[name=book_date_range]').focus();
			return false;
		}else{
			return true;
		}
		
	});

	$("div.md-checkbox input[type=checkbox]").on('change',function(){
		var content = $(this).parents('.md-checkbox').siblings('.collapse');
        content.collapse('toggle');
        $('html,body').animate({scrollTop: content.offset().top}, 'slow');
    });

    // Toogle enable between late and soon check
    $("div.md-checkbox input[name=wanna_check_in_late]").on('change',function(){
        if ($(this).prop('checked')) {
            $("div.md-checkbox input[name=wanna_check_in_soon").attr('disabled', '');
        }else{
            $("div.md-checkbox input[name=wanna_check_in_soon").removeAttr('disabled');
        }
    });

    $("div.md-checkbox input[name=wanna_check_in_soon]").on('change',function(){
        if ($(this).prop('checked')) {
            $("div.md-checkbox input[name=wanna_check_in_late").attr('disabled', '');
        }else{
            $("div.md-checkbox input[name=wanna_check_in_late").removeAttr('disabled');
        }
    });
    $(".scroll-to-top").click(function(){
    	$('html,body').animate({scrollTop: 0}, 'slow');
    });
});