$(document).ready(function() {
    $("input[name=typemembre]").change(function(){
    	if($(this).val() == "Entreprise"){
    		$("#membre_entreprise").slideDown();
    		$("#membre_candidat").slideUp();
    	}else if ($(this).val() == "Candidat") {
    		$("#membre_entreprise").slideUp();
    		$("#membre_candidat").slideDown();
    	};
    })


    $('.hiddenbutton').click(function(){
    	var id = $(this).attr('title');
		$(".afficher"+id).css("display", "block");
		$(this).css("display", "none");
	})

    $('.hidden_contacter_candidat').click(function(){
        var id = $(this).attr('title');
        $(".afficher"+id).css("display", "block");
        $(this).css("display", "none");
    })
});