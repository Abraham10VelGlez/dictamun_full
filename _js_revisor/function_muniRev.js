
function filesavg(f,c){
      //var  data = "datos" ;
      var comm = "";
      var data = new FormData();
      data.append('acceess',"449949");
      data.append('folio',f);
      data.append('cllv',c);
  $.ajax({
    url: "../../../../../acceso",
    type: "POST",
    data: data,
    contentType: false,
    cache: false,
    processData:false,
    success: function(datar)
    {
      $("#files_studioa").html('');
      //var urlavg = "https://dictamunigecem.edomex.gob.mx/files/documentos/01135/0472300513000000/Avaluos.val";
      var urlavg = "https://dictamunigecem.edomex.gob.mx/files/documentos/";
      $("#files_studioa").append('<tr>');
      $.each( datar, function( key, value ) {
        if( value.comentariorevi != null){
           comm = value.comentariorevi;
        }else{
          comm = '';
        }
        $("#files_studioa").append(
        '<tr>'+
        '<td style="text-align: center;width: 300px;">' + value.nombrearchivo + '</td>'+
         '<td style="text-align: center;"><center>' + value.comentario + '</center></td>'+
        '<td  style="text-align: center;">'+
        '<a target="_blank"  href=" '+ urlavg + value.flo + '/' + value.clavecastatral + '/' + value.nombredoc + '" download=""' + value.nombredoc +'""><i class="fa fa-download fa-2x"></i></a>'+
        '</td>'
      );
                });
                $("#files_studioa").append('</tr>');

    }
  });


}





function files_tipologias(f,c){
  var data = new FormData();
  data.append('acceess',"4499411");
  data.append('folio',f);
  data.append('cllv',c);
  var time_count = 0;
  $.ajax({
    url: "../../../../../acceso",
    type: "POST",
    data: data,
    contentType: false,
    cache: false,
    processData:false,
    success: function(datar)
    {
      $("#tip_no_studioa").html('');
      //var urlavg = "https://dictamunigecem.edomex.gob.mx/files/documentos/01135/0472300513000000/Avaluos.val";
      var urlavg = "https://dictamunigecem.edomex.gob.mx/files/documentos/";
      $("#tip_no_studioa").append('<tr>');
      $.each( datar, function( key, value ) {
        time_count = time_count + 1 ;
        if( value.comentariorevi != null){
           comm = value.comentariorevi;
        }else{
          comm = '';
        }

        $("#tip_no_studioa").append(
        '<tr>'+
        '<td style="text-align: center;width: 300px;">' + value.nombredoc + '</td>'+
         '<td style="text-align: center;"><center>' + value.comentario + '</center></td>'+
        '<td  style="text-align: center;">'+
        '<a target="_blank"  href=" '+ urlavg + value.flo + '/' + value.clavecastatral + '/' + value.nombredoc + '" download=""' + value.nombredoc +'""><i class="fa fa-download fa-2x"></i></a>'+
        '</td>');
                });

                $("#totalTipologiasx").html(time_count);
                $("#tip_no_studioa").append('</tr>');

    }
  });

}
