<template>
    <div>
        <table>
            <h1 v-html="mensaje"></h1>
            <caption class="titulo">
                {{ tabla }}
            </caption>
            <tr>
                <th v-for="(campo,indice) in campos">
                    <input @keyup="filtra(campo, valor[indice])"
                           type="text"
                           v-model='valor[indice]'/>

                    <button @click="ordenar(campo)">{{ campo }}</button>
                </th>
                <th colspan="3">Opciones</th>
            </tr>
            <tr v-for="(fila) in filas.data">
                <td v-for="valor in fila">{{ valor }}</td>
                <td><button @click="editar(fila.id)">Editar</button></td>
                <td><button @click="borrar(fila.id)">Borrar</button></td>
                <td><button @click="consultar(fila.id)">Consultar</button></td>

            </tr>
            <!-- @foreach($empresas as $empresa)
                <tr>
                    <td>{{$empresa->id}}</td>
                    <td>{{$empresa->nombre}}</td>
                    <td>{{$empresa->direccion}}</td>
                </tr>
        @endforeach -->
        </table>
        <tailwind-pagination
            :data="filas"
            @pagination-change-page="getResults"
        />
<!--        <button @click="cargarMas">Cargar más</button>-->
    </div>
</template>

<script>
import axios from "axios";
import { TailwindPagination } from 'laravel-vue-pagination';

export default {
    name: "mitabla",
    components:{
        TailwindPagination,
    },
    props: ["filas_serializadas", "campos_serializados", "tabla"],
    data() {
        return {
            valor: Array,
            filas: Array,
            campos: Array,
            ascendente: true,
      /*      paginaActual: 1,*/
            len_campo:[],
            mensaje:String,
        }
    },
    created() {
        this.filas = JSON.parse(this.filas_serializadas);
        this.campos = JSON.parse(this.campos_serializados);
        this.mensaje="";
    /* /!*  /!* if (Array.isArray(this.campos)) {
            this.campos.forEach((campo,index) => {
                this.len_campo[index] = campo.length * 2;
            });*!/
        }*!/
        else {
            console.log("this.campos no es un array.");
        }*/


    },
    methods: {
       getResults(page = 1) {
            let url = window.location.href;
            let self = this;
            axios.get(
                url + "/paginate?page=" + page)
                .then(function (response) {
                    self.filas = response.data;
                    console.log("Respuesta " + response.data);
                })
                .catch(function (error) {
                    console.error("ERROR"+error);
                });
            },
        borrar: function(id){

            let url = window.location.href;
            if (url.endsWith('/')) {
                url = url.slice(0, -1);
            }
            url = url+"/" + id ;
            axios.delete(url)
                .then((response)=> {
                   this.filas= response.data;
                   this.mensaje = "Se ha borrado en la tabla"+this.tabla+"la fila de id"+id
                })
                .catch((e)=>{
                    this.mensaje="<span style='color:red'>Error borrando en la tabla " + this.tabla + " " + "en la fila de id "+ id+"</span>";
                });
        },
        editar:function(id){
            let url = window.location.href;
            if (url.endsWith('/')) {
                url = url.slice(0, -1);
            }
            url = url + '/' + id + '/edit';
            window.location.href=url;
},
        ordenar: function (campo) {
            this.filas.data = this.filas.data.sort((a, b) => {
                let retorno;
                if (a[campo] < b[campo]) {
                    retorno = this.ascendente ? 1 : -1;
                }
                 else {
                    retorno = this.ascendente  ? -1: 1;
                }
                return retorno;
            });
            this.ascendente = !this.ascendente;
    },
        /*filtra:function (campo, valor) {
            this.filas = JSON.parse(this.filas_serializadas);
                    this.filas.data = this.filas.data.filter((fila) => {
                    var texto = new String(fila[campo]);
                    if (texto.indexOf(valor) > -1)
                        return fila
                }
            );},*/
        filtra: function (campo, valor) {
            this.filas = JSON.parse(this.filas_serializadas);
            this.filas.data = this.filas.data.filter((fila) => {
                    var texto = new String(fila[campo]);
                    if (texto.indexOf(valor) > -1)
                        return fila
                }
            );},

       /* cargarMas() {
            axios
                .get("/api/empresas?page=" + (this.paginaActual + 1))
                .then((response) => {
                    this.filas = this.filas.concat(response.data.data);
                    this.paginaActual = response.data.current_page;
                });
        },*/
    },
};
</script>

<style scoped>
.titulo{
    @apply text-amber-500 text-6xl
}
</style>
