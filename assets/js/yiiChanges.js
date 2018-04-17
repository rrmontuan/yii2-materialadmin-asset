yii.confirm = function(message, ok, cancel){
		
	swal(
		{
	  		title: "Tem certeza?",
	  		text: message,
	  		type: "warning",
	  		showCancelButton : true,
			confirmButtonText: 'Sim',
        	cancelButtonText: 'Não',
        	confirmButtonColor: "#DD6B55"
		}, 
		function(isConfirm) {
    		if (isConfirm) {
        		!ok || ok();
            } else {
                !cancel || cancel();
            }
		}
	);
}