<template>
    <input type="submit" 
    class="btn btn-danger btn-sm"
    value="Eliminar"
    @click="eliminarProveedor"
    >
</template>

<script>
    export default{
        props:['proveedorId'],
        methods:{
            eliminarProveedor(){
                this.$swal({
                    title:'¿Deseas eliminar este proveedor?',
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
                            id: this.proveedorId
                        }
                        //enviar la petición al servidor
                        axios.post(`/compra/proveedores/${this.proveedorId}`, {params, _method:'delete'})
                            .then(respuesta=>{
                                this.$swal({
                                    title:'Proveedor Eliminado',
                                    text:'Se eliminó el proveedor',
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