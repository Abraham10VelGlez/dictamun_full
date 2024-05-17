var pahtv1 = { vector1 : [] } ;
  var vector1 = { id_t : '', comel: ''};
$(document).ready(function () {	
  
 	  	 
	/*$("#killer").click(function(){		
		$.post("../../acceso",{acceess:102},function(z){
			//alert(z);
			if( z == "23000" ){
				alert(" usuario activo ");
			}else{
				
				location.href=z;				
			}			
		});		
  });*/
  
     // var idI = $("#idInmu").val(); 
     // var anioxc = $("#anioDic").val(); 

    //Total de inmuebles a revisar
     $.post("acceso",{acceess:7070},
    	function(n){

    	 console.log(n); 
       var hh = '';
       var cont = 0 ;
          $(n).each(function(key,valuee){
            cont = cont + 1; 
            
            
            if( valuee.etapa == "1"){
            	var vv = "<b style='color: red;'>" + valuee.etapa_de_dict + "</b>" ;
            }
            
            if( valuee.etapa == "3"){
            	var vv = "<b style='color: green;'>" + valuee.etapa_de_dict + "</b>" ;
            }
            
            hh += '<tr><td>'+cont+'</td><td>'+valuee.folio+'</td><td><a href="../dictamun/filessx/'+valuee.folio+'/'+valuee.cve_catastral +'/'+valuee.aniodictamen+'/'+valuee.tipod+'">'+valuee.cve_catastral+'</a></td><td>'+valuee.aniodictamen+'</td><td>'+valuee.nombredenominacion+'</td><td>'+ vv +'</td></tr>';
      

          });
    //  hh += '</tr>';
      $("#sub").html(hh);


});


});
function folioIn(){
	   
	   console.log('fol'); 
	}

