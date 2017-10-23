$(document).ready(function()
{
	$('#select_all').click(function(event) 
	{ 
		if(this.checked) 
		{
			$(':checkbox').each(function() 
			{
				this.checked = true;
				$('#apply_action').prop('disabled',false);
				$('#activate_selected_usrs').prop('disabled',false);
				$('#deactivate_selected_usrs').prop('disabled',false);
				$('#bulk_action').prop('disabled',false);
				$('.btn-act-dact').addClass('btn-act-dact-disabled');
				$('.btn-act-dact').removeClass('btn-act-dact');

				$('.user-action-btn').addClass('user-action-btn-disabled');
				$('.user-action-btn').removeClass('user-action-btn');

				
			});			
		}
		else
		{
			$(':checkbox').each(function() 
			{
				this.checked = false;                        
			});
			$('#apply_action').prop('disabled',true);
			$('#activate_selected_usrs').prop('disabled',true);
			$('#deactivate_selected_usrs').prop('disabled',true);
			$('#bulk_action').prop('disabled',true);

			$('.btn-act-dact-disabled').addClass('btn-act-dact');
			$('.btn-act-dact-disabled').removeClass('btn-act-dact-disabled');

			$('.user-action-btn-disabled').addClass('user-action-btn');
			$('.user-action-btn-disabled').removeClass('user-action-btn-disabled');

			
		}
	});

	$('.check-user').click(function(event) 
	{
		$('#select_all').prop('checked', false);
		if($('input:checkbox:checked').length == 0)
		{
			$('#apply_action').prop('disabled',true);
			$('#activate_selected_usrs').prop('disabled',true);
			$('#deactivate_selected_usrs').prop('disabled',true);
			$('#bulk_action').prop('disabled',true);



			$('.btn-act-dact-disabled').addClass('btn-act-dact');
			$('.btn-act-dact').removeClass('btn-act-dact-disabled');

			$('.user-action-btn-disabled').addClass('user-action-btn');
			$('.user-action-btn').removeClass('user-action-btn-disabled');	
			


		}
		else
		{
			$('#apply_action').prop('disabled',false);
			$('#activate_selected_usrs').prop('disabled',false);
			$('#deactivate_selected_usrs').prop('disabled',false);
			$('#bulk_action').prop('disabled',false);	

			$('.btn-act-dact').addClass('btn-act-dact-disabled');
			$('.btn-act-dact').removeClass('btn-act-dact');	

			$('.user-action-btn').addClass('user-action-btn-disabled');
			$('.user-action-btn').removeClass('user-action-btn');		
		}
	});


	$('.btn-act-dact').click(function()
	{
		action = $(this).text();
		
		if($('input:checkbox:checked').length == 0)
		{
			
			$(".overlay").show();
		}
		else
		{
			return false;
		}
	});
	
	
	$('.user-action-btn.del').click(function()
	{
		// action = $(this).text();
		
		if($('input:checkbox:checked').length == 0)
		{
			if (confirm('Are you sure you want to delete this user?')) 
			{
				$(".overlay").show();
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	});
	

	$('#apply_action').click(function()
	{
		var action = $('select[id=bulk_action]').val()
		
		if (action=='se') {alert("Please select action."); return false;}

		if (confirm('Are you sure you want to ' + action + ' selected user(s)?')) 
		{
			$(".overlay").show();

			return true;
		}
		else
		{
			return false;
		}
	});

 	var curruntYear = (new Date()).getFullYear();
 	// /alert(curruntYear)
    $( "#datepicker" ).datepicker({

      changeMonth: true,
      changeYear: true,
      dateFormat:"yy-mm-dd",
	  yearRange: '1917:' + curruntYear
    });
    $(".input-group-addon.datepicker-icon").click(function(){
    	$("#datepicker").focus();
    });

	function readIMG(input) {
	if (input.files && input.files[0]) {
	var reader = new FileReader();

	reader.onload = function (e) {
	$('#preview').attr('src', e.target.result);
	}

	reader.readAsDataURL(input.files[0]);
	}
	}

	$("#fileUploader").change(function(){
	readIMG(this);
	});  


	$('#phone').keypress(function(event)
	{   
	   var code = event.keyCode || event.which;

       if(isNaN(String.fromCharCode(code)) && 
       	  code != 9 && 
       	  code != 8 && 
       	  code != 37 && 
       	  code != 39 && 
       	  code != 46)
       {
           event.preventDefault(); //stop character from entering input
       }
    });


    $('#pincode').keypress(function(event)
	{
		if(isNaN(String.fromCharCode(code)) && 
       	  code != 9 && 
       	  code != 8 && 
       	  code != 37 && 
       	  code != 39 && 
       	  code != 46)
       {
           event.preventDefault(); //stop character from entering input
       }
    });


	$('.create-permission-submit').click(function(){

	    $('#select-to option').prop('selected', true);
	});


	
 
	$('#btn-add').click(function(){
		$('#select-from option:selected').each( function() {
		        $('#select-to').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
		    $(this).remove();
		});
	});
	$('#btn-remove').click(function(){
		$('#select-to option:selected').each( function() {
		    $('#select-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
		    $(this).remove();
		});
	});
 


	$('.change-image').click(function(){
		
	$('#preview').show();
	$('#fileUploader').show();
	});


	$('#fileUploader').change(function(){
		// alert('kjdfhksjd')
	$('.old-user-img-perview').hide();

	});

	
	$('#create-permission-submit').click(function() 
	{
      checked = $(".route-name-input:checked").length;


      if(!checked) {
        alert("You must allow at least one Route to create a permission.");
        return false;
      }

    });

    $('#update-permission-submit').click(function() 
	{
      checked = $(".route-name-input:checked").length;


      if(!checked) {
        alert("You must allow at least one Route to create a permission.");
        return false;
      }

    });


    // $("$selectAllRouts")

    $('#selectallroutscheckbox').click(function(event) 
	{ 
		if(this.checked) 
		{
			$(':checkbox').each(function() 
			{
				this.checked = true;
			});			
		}
		else
		{
			$(':checkbox').each(function() 
			{
				this.checked = false;                        
			});
		}
	});










	$(".alert-success").delay(3000).slideUp(300);

});