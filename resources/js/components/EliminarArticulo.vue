<template>
    <input type="submit" 
    class="btn btn-danger btn-sm"
    value="Eliminar"
    @click="eliminarArticulo"
    >
</template>

<script>
    export default{
        props:['articuloId'],
        methods:{
            eliminarArticulo(){

                this.$swal({
                    title:'¿Deseas eliminar este artículo?',
                    text: 'Una vez eliminado, no se puede recuperar',
                    icon:'warning',
                    showCancelButton:true,
                    confirmButtonColor:'#3490dc',
                    cancelButtonColor:'#e3342f',
                    confirmButtonText:'Si',
                    cancelButtonText:'No'
                }).then((result)=>{
                    if(result.value){
                        const params = {
                            id: this.articuloId
                        }
                        
                        //enviar la petición al servidor
                        axios.post(`/almacen/articulos/${this.articuloId}`, {params, _method:'delete'})
                            .then(respuesta=>{
                                this.$swal({
                                    title:'Artículo Eliminado',
                                    text:'Se eliminó el artículo',
                                    icon:'success'
                                });
                                //document.location.reload(true);
                                //Eliminar receta del DOM
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                                
                                
                            })
                            .catch(error =>{
                                console.log(error);
                            })
                        
                    }
                    
                })
            }
        }
    }
</script>