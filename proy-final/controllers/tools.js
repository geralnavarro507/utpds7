function f_borrar(){
    //location.reload();
    window.location = window.location.href.split("?")[0];
}

function f_buscar(){
    var pathArray = window.location.pathname.split('/');
    var pantalla = pathArray[4];
    if(pantalla=="departamentos.php"){
        var codigo = document.getElementById("id_codigo").value;
        var descripcion = document.getElementById("id_descripcion").value;
        if(codigo){
            window.location = window.location.href.split("?")[0]+'?codigo='+codigo;
        }
        if(descripcion){
            window.location = window.location.href.split("?")[0]+'?descripcion='+descripcion;
        }
    }
}

function f_delete(pantalla,id){
    if(pantalla='departamento'){
        fetch('http://localhost/utpds7/proy-final/api/departamento.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ "crud": "D","codigo": id, "descripcion": '' })
    })
   .then(response => response.json())
   .then(response => console.log(JSON.stringify(response)))
    }
    //var pathArray = window.location.pathname.split('/');
    //alert('entro'+pantalla+id);
    window.location = window.location.href.split("?")[0];
}