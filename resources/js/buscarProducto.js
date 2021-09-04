
  export default {
        data (){
            return {
                producto_id: 0,
                tipo_id : 0,
                tipos_name : '',
                arrayProducto : [],
                
                errorProducto : 0,
                errorMostrarMsjProducto : [],//arrays donde almaceno los posibles errores que tenga
                
                offset : 3,
                criterio : 'nombre',// para indicar el campo de busqueda
                buscar : '',//y buscar para indicar cual es el texto de busqueda para realizar el filtro de toda la lista
                arrayCategoria :[]
            }
        },
                 methods : {
            listarProducto (page,buscar,criterio){
                let me=this;//la cadena de texto la concateno con la siguiente cadena, con el parametro buscar que mediante get a nuestro controlador es igual a la varibale buscar 
                //de igual manera concatenamos con el oarametro criterio para enviarlo a travez del metodo get y este parametro va ser igual a lo que tenemos en nuestro criterio
                var url= '/catalogo/buscarProducto?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                //axios.get('/categoria'.then(function (response) { recibimos los parametros desde la ruta categorias
                axios.get(url).then(function (response) {//mediante el metodo de axios obtengo todos los registros de la tabla categorias
                    var respuesta= response.data;
                    me.arrayProducto = respuesta.productos.data;// almacene todos el contenido del objeto response
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },          
        },
        mounted() {
            this.listarProducto(1,this.buscar,this.criterio);
        }
    }
