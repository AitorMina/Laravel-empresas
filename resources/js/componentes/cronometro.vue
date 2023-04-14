<template>
    {{ minutos }}:{{ segundos }}:{{ decimas }}
    <button @click="cambia_estado">{{ parar_arrancar }}</button>
</template>
<script>
export default {
    name: "cronometro",
    data() {
        return {
            minutos: 0,
            segundos: 0,
            decimas: 0,
            parar_arrancar: "Start",
            funcionando: false,
        };
    },
    mounted() {
        setInterval(() => {
            if (this.funcionando) {
                this.decimas++;
                if (this.decimas == 10) {
                    this.decimas = 0;
                    this.segundos++;
                    if (this.segundos == 60) {
                        this.segundos = 0;
                        this.minutos++;
                    }
                }
            }
        }, 100);
    },
    methods: {
        cambia_estado: function () {
            this.funcionando = !this.funcionando;
            this.parar_arrancar = this.funcionando == true ? "Stop" : "Start";
        },
    },
};
</script>
<style scoped></style>
