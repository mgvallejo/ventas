<template>
    <input type="submit" 
    class="btn btn-danger btn-sm"
    value="Eliminar"
    @click="eliminarCliente"
    >
</template>

<script>
    export default{
        props:['clienteId'],
        methods:{
            eliminarCliente(){
                this.$swal({
                    title:'¿Deseas eliminar este cliente?',
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
                            id: this.clienteId
                        }
                        //enviar la petición al servidor
                        axios.post(`/venta/clientes/${this.clienteId}`, {params, _method:'delete'})
                            .then(respuesta=>{
                                this.$swal({
                                    title:'Cliente Eliminado',
                                    text:'Se eliminó el cliente',
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