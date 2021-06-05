<template>
    <li>
        <span>Naam: {{ gerecht.naam }}</span>
        <span>Beschrijving: {{ gerecht.beschrijving }}</span>
    </li>
</template>

<script>
export default {
    props: ['gerecht'],
    mounted() {
        console.log('Component mounted.')
    },
    data(){
        return gerecht;
    }
}
</script>
