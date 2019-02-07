$(function () {
   var jqxhr=$.ajax({
       url:'obtenerComunidades.php',
       method:'get',
       dataType:'json'
   });
   jqxhr.done(function (datos) {
       var comunidades = datos["comunidades"];
       for (comunidad of comunidades){
           var idcomunidad=comunidad["id_comunidad"];
           var nombre=comunidad["nombre"];
           $("#comunidades").append(
               "<option value='"+idcomunidad+"'>"+nombre+"</option>"
           )
       }
   });
   $("#comunidades").on("change",function () {
       $("#provincias").empty();
       var id_comunidad=$(this).val();
       var jqxhr2=$.ajax({
           url: 'obtenerProvincias.php',
            method: 'get',
           dataType:'json',
           data:{
               id_comunidad:id_comunidad
           }
       });
       jqxhr2.done(function (datos) {
           var provincias=datos["provincias"];
           for (provincia of provincias){
                var n_provincia=provincia["n_provincias"];
                var nombre=provincia["nombre"];
                $("#provincias").append(
                    "<option value='"+n_provincia+"'>"+nombre+"</option>"
                )
           }
       })
   })
});