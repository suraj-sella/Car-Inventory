$(function(){
	
	//preloader
	var Body = $('body');	
    Body.addClass('preloader-site');
    
    //manufacturer adding

	var feedback = $('.feedback');
	var man_form = $('.form-manufacturer');
	var man_input = $('#manufacturer');
	var man_submit = $('.form-manufacturer').find("button");
	var skipbtn = $('.skipbtn');
	
	man_submit.on('click',function(e){
		var value = man_input.val();
		if((value)&&(jQuery.trim(value).length!=0)){
			$.ajax({
	           	type: "POST",
	           	url: 'ajax.php',
	           	data: {manufacturer: value, operation:1 },
	           	success: function(data){
	            	if(data==1){
	            	    feedback.find('p').html("<i class='fas fa-check white faa-tada animated'></i>Already Exists! Try Another?");		
	            	}else if(data==0){
	            		feedback.find('p').html("<i class='fas fa-check white faa-tada animated'></i>Manufacturer Added Successfully!");	
	            	}
		            feedback.css("display", "flex").hide().fadeIn(200);
		            setTimeout(function(){
	            		feedback.hide();
		            }, 3000);   
		        	skipbtn.html('<i class="fas fa-forward white faa-horizontal"></i>Add Model');
	           	}
         	});
		}else if((value)&&(jQuery.trim(value).length==0)){
			setTimeout(function(){
				feedback.hide();
				feedback.find('p').html("<i class='fas fa-check white faa-tada animated'></i>Manufacturer Added Successfully!");
			}, 3000, feedback.css("display", "flex").hide().fadeIn(200).find('p').html("<i class='fas fa-times white faa-flash faa-fast animated'></i>Only Blank Spaces Entered! Please Enter Valid Name!"));
		}else if(!value){
			setTimeout(function(){
				feedback.hide();
				feedback.find('p').html("<i class='fas fa-check white faa-tada animated'></i>Manufacturer Added Successfully!");	
			}, 2000, feedback.css("display", "flex").hide().fadeIn(200).find('p').html("<i class='fas fa-times white faa-flash faa-fast animated'></i>Blank Input Detected! Please Enter Valid Name!"));
		}
		e.preventDefault();
	});

	//fetching manufacturers
	var select = $('#select_manufacturer');
	$.ajax({
		type: "POST",
		url: '../ajax.php',
		data: {operation: 6},
		success: function(data){
			var result = JSON.parse(data);
			for(var i = result.length - 1; i >= 0; i--){
				var option = result[i].name;
				select.append('<option>' + option + '</option>');
			}
		}
	});

	//adding model
	var feedbackk = $('.feedbackk');
	var mod_form = $('.form-model');
	var mod_input = $('#model');
	var manu_input = $('#select_manufacturer');
	var mod_submit = $('.form-model').find("button");

	mod_submit.on('click',function(e){
		var value_mod = mod_input.val();
		var value_man = manu_input.val();
		if((value_mod)&&(value_man)&&(jQuery.trim(value_mod).length!=0)){
			$.ajax({
	           	type: "POST",
	           	url: '../ajax.php',
	           	data: {select_manufacturer: value_man, model: value_mod,operation: 2},
	           	success: function(data){
	           		feedbackk.css("display", "flex").hide().fadeIn(200);
	            	setTimeout(function(){
		            	feedbackk.hide();
		            }, 3000);
	           	}
         	});
		}else if((value_mod)&&(jQuery.trim(value_mod).length==0)){
			setTimeout(function(){
				feedbackk.hide();
				feedbackk.find('p').html("<i class='fas fa-check white faa-tada animated'></i>Car Added To Inventory Successfully!");	
			}, 3000, feedbackk.css("display", "flex").hide().fadeIn(200).find('p').html("<i class='fas fa-times white faa-flash faa-fast animated'></i>Only Blank Spaces Entered! Please Enter Valid Name!"));
		}else if((!value_mod)||(!value_man)){
			setTimeout(function(){
				feedbackk.hide();
				feedbackk.find('p').html("<i class='fas fa-check white faa-tada animated'></i>Car Added To Inventory Successfully!");	
			}, 3000, feedbackk.css("display", "flex").hide().fadeIn(200).find('p').html("<i class='fas fa-times white faa-flash faa-fast animated'></i>Blank Input Detected! Please Enter Valid Name!"));
		}
		e.preventDefault();
	});

	//inventory management
	var feedbackkk = $('.feedbackkk');
	var addbtn = $('.add');
	addbtn.on('click', function(){
		var row = $(this).parents('tr');
		var countval = row.find('.count').text();
		var num = parseInt(countval)+1;
		var modelval = row.find('.name').text();
		var manval = row.find('.manufacturer').text();
		$.ajax({
			type: "POST",
			url: '../ajax.php',
			data: {model: modelval, manufacturer: manval,operation: 3},
			success: function(data){
				row.find('.count').html(num);
				$('body,html').animate({
            		scrollTop: 0
        		}, 400);
				feedbackkk.find('p').html("<i class='fas fa-check white faa-tada animated'></i>Car Added To Inventory Successfully!");
				feedbackkk.css("display", "flex").hide().fadeIn(200);
	            setTimeout(function(){
		           	feedbackkk.hide();
		        }, 3000);
			}	
		});
	});

	var soldbtn = $('.sell');
	soldbtn.on('click', function(){
		var row = $(this).parents('tr');
		var countval = row.find('.count').text();
		var modelval = row.find('.name').text();
		var manval = row.find('.manufacturer').text();
		if(countval==1){
			row.nextAll().each(function(){
				var idd = $(this).find('.idd').text();
				var iddnum = parseInt(idd)-1;
				$(this).find('.idd').html(iddnum);
			});
			$.ajax({
				type: "POST",
				url: '../ajax.php',
				data: {model: modelval, manufacturer: manval, operation: 4},
				success: function(data){
					row.hide();
					$('body,html').animate({
            			scrollTop: 0
        			}, 400);
					feedbackkk.find('p').html("<i class='fas fa-check white faa-tada animated'></i>Car Removed From Inventory Successfully!");
					feedbackkk.css("display", "flex").hide().fadeIn(200);
	            	setTimeout(function(){
		            	feedbackkk.hide();
		            }, 3000);
				}	
			});
		}else{
			var num = countval-1;
			$.ajax({
				type: "POST",
				url: '../ajax.php',
				data: {model: modelval, manufacturer: manval, operation: 5},
				success: function(data){
					row.find('.count').html(num);		
					$('body,html').animate({
            			scrollTop: 0
        			}, 400);
					feedbackkk.find('p').html("<i class='fas fa-check white faa-tada animated'></i>Car Count Reduced From Inventory Successfully!");
					feedbackkk.css("display", "flex").hide().fadeIn(200);
	            	setTimeout(function(){
		            	feedbackkk.hide();
		            }, 3000);
				}	
			});
		}
	});
	
});

//preloader
$(window).on('load',function(){
	$('.preloader-wrapper').fadeOut();
    $('body').removeClass('preloader-site');
    $('body').css('overflow', 'visible');
});