<template>
    <input type="submit" 
    class="btn btn-danger btn-sm"
    value="Eliminar"
    @click="eliminarCategoria"
    >
</template>

<script>
    export default{
        props:['categoriaId'],
        methods:{
            eliminarCategoria(){
                this.$swal({
                    title:'¿Deseas eliminar esta categoria?',
                    text: 'Una vez eliminada, no se puede recuperar',
                    icon:'warning',
                    showCancelButton:true,
                    confirmButtonColor:'#3490dc',
                    cancelButtonColor:'#e3342f',
                    confirmButtonText:'Si',
                    cancelButtonText:'No'
                }).then((result)=>{
                    if(result.value){
                        const params = {
                            id: this.categoriaId
                        }
                        //enviar la petición al servidor
                        axios.post(`/almacen/categorias/${this.categoriaId}`, {params, _method:'delete'})
                            .then(respuesta=>{
                                this.$swal({
                                    title:'Categoría Eliminada',
                                    text:'Se eliminó la categoría',
                                    icon:'success'
                                });
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