/// cargar archivos de dictamen
	$("#acuseG").click(function(){
		 var ky = $("#idG").val();
		var t = $("#idP").val();

		if( t  == "1"){
      //
     
			
	
			var com1ac = $("#descpAc").val();
			
			
			var com1av = $("#commentav").val();
			var com2co = $("#commentcx").val();
			
			
			var com1 = $("#1commenta").val();
			var com2 = $("#1commentb").val();
			var com3 = $("#1commentc").val();
			var com4 = $("#1commentd").val();
			var com5 = $("#1commente").val();
			var com6 = $("#1commentf").val();
			
			//var com7 = $("#commentrep").val();
      
/*
	  $.post("../../acceso",{acceess:55,idG:ky,form:pahtv.vector,comment:pahtv_w.vector_write},function(yz){
        console.log(yz);
        if( yz == "50" ){
					console.log("datos guardados");
					document.getElementById('id05').style.display='block';

				}else{
					
					console.log("error");	
					document.getElementById('id06').style.display='block';			
				}			
    });*/
    
    //traer todas las tipologias
    //para seleccionar una opcion
  
    $('#G tbody tr').each(function() {
      var a = $(this).find('td').eq(0).text();
      var idinmu = $("#idG").val();
	  var iddoc = 12;
	  var comentario = $(this).find('textarea').val();
	  
	//var a = key + 1;
   pahtv_t.vector_t.push({
			id_inmu : idinmu,
			id_doc: iddoc,
			tipolg_n : a,
			comentario : comentario 
	});
  
         
    });
    console.log(pahtv_t.vector_t);
    
			
			$.post("../../acceso",{acceess:55,idG:ky ,
				 descpAc:com1ac,
				 commentav:com1av,
				 commentcx:com2co,
				 commenta:com1,
				 commentb:com2,
				 commentc:com3,
				 commentd:com4,
				 commente:com5,
				 commentf:com6,
         commentrep:com7,
        tipologg:pahtv_t.vector_t},function(z){
					 console.log(z);
				if( z == "50" ){
					console.log("datos guardados");
					document.getElementById('id05').style.display='block';

				}else{
					
					console.log("error");	
					document.getElementById('id06').style.display='block';			
				}			
			});
			
		}else{
			var ky = $("#idG").val();
			var com1ac = $("#descpAc").val();
			
			var com1av = $("#commentav").val();
			var com2co = $("#commentcx").val();
			
			
			var com1 = $("#commenta").val();
			var com2 = $("#commentb").val();
			var com3 = $("#commentc").val();
			var com4 = $("#commentd").val();
			var com5 = $("#commente").val();
			var com6 = $("#commentf").val();
			var com7 = $("#commentg").val();
			
      //var com8 = $("#commentrep").val();
          //traer todas las tipologias
    //para seleccionar una opcion
  
    $('#G tbody tr').each(function() {
      var a = $(this).find('td').eq(0).text();
      var idinmu = $("#idG").val();
	  var iddoc = 12;
	  var comentario = $(this).find('textarea').val();
	  
	//var a = key + 1;
   pahtv_t.vector_t.push({
			id_inmu : idinmu,
			id_doc: iddoc,
			tipolg_n : a,
			comentario : comentario 
	});
  
         
    });
    console.log(pahtv_t.vector_t);
    
			
			
			$.post("../../acceso",{acceess:56,idG:ky ,
				 descpAc:com1ac,
				 commentav:com1av,
				 commentcx:com2co,
				 commenta:com1,
				 commentb:com2,
				 commentc:com3,
				 commentd:com4,
				 commente:com5,
				 commentf:com6,
         commentg:com7,
         tipologg:pahtv_t.vector_t
         },function(z){
					 console.log(z);
				if( z == "50" ){
					console.log("datos guardados");
					document.getElementById('id05').style.display='block';
				}else{
					
					console.log("error");		
					document.getElementById('id06').style.display='block';		
				}			
      });
      
			  /*$.post("../../acceso",{acceess:55,idG:ky,form:pahtv.vector,comment:pahtv_w.vector_write},function(yz){
        console.log(yz);
        if( yz == "50" ){
					console.log("datos guardados");
					document.getElementById('id05').style.display='block';

				}else{
					
					console.log("error");	
					document.getElementById('id06').style.display='block';			
				}			
	  });*/
			
		}

		
		
		/*
		var abc = $("#idGRec").val();		
		var a = {acceess:52,abc:abc};		
		$.ajax({
			url: "../../acceso",
			type: "POST",             
			data: a, 			  
			//contentType: false,       
			//cache: false,             
			//processData:false,        
			success: function(e)   
			{				
				if( e == "10" ){
					console.log(e);		
				}else{
					console.log(e);
				}
			
			} 
		});var b = {acceess:53,abc:abc};
		$.ajax({
			url: "../../acceso",
			type: "POST",             
			data: b, 			  			       
			success: function(ee)   
			{				
				if( ee == "10" ){
					console.log(ee);		
				}else{
					console.log(ee);
				}
			
			} 
		});var c = {acceess:54,abc:abc};
		$.ajax({
			url: "../../acceso",
			type: "POST",             
			data: c, 			  			       
			success: function(i)   
			{				
				if( i == "10" ){
					console.log(i);		
				}else{
					console.log(i);
				}
			
			} 
		});
		*/
	});