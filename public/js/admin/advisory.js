$(document).ready(function() { 
	$(".nndedit").click(function(){
		$("#dennid").val($(this).attr('editid')) ; 
		$('.nn-modal-delete-slide').modal('show');
	});
});