<template>
    <h1>Hola desde un componente vue</h1>
    <h2>He recibido el valor de {{ nombre }}</h2>
    <h2>He creado el valor {{ nombre_interno }}</h2>
</template>

<script>
export default {
    name: "saludo",
    props: ["nombre"],
    data() {
        return {
            nombre_interno: "hola",
        };
    },
};
</script>

<style scoped></style>
