$(document).ready(function(){

	
	var checkboxes = $( ':checkbox' ); 
    checkboxes.prop( 'checked', false );
	$('.del-chkbox-lbl.label.label-info').click(function(){

		var id = $(this).attr('for');
		var is = "";
		var isChecked = $('#'+id).prop("checked");
		if (isChecked == false) 
		{
			 is = "Checked";
		}
		else
		{
			is ="unChecked";
		}
		console.log(is)
		if (is == 'Checked') 
		{
			$(this).addClass('delete-it');
		}
		if(is == 'unChecked')
		{
			$(this).removeClass('delete-it');

		}		
	});

	$('.bar-act-name').on('change', function() {
		

		var tokan = $('[name="_token"]').val();
		var baractId = $('.bar-act-name').val();
		// console.log(baractId)
	
   $.post("http://localhost/latestcaselaw/public/test",
    {	
        "_token": tokan,
        'baractId':baractId
    },
    function(data, status)
    {
    	console.log(data.res)
    	var res = data.res;
    	html ="";
    	html+="<div class='row'>"
    	$.each(res ,function(key,value) {
    		

    		html+="<div class='col-md-2'>"	
    		html+="<div class='label label-info'>Chapter no : " + value.chapter_number + " </div>"
    		html+="</div>"	
    		//console.log(key + ' ' + value + ' '+ value.title );
    	
    	});
    	html+="</div>"	

        
		$('#chapters-of-baract').html(html)
    });
	});
});