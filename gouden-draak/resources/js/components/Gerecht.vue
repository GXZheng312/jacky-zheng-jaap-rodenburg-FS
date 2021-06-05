<template>
    <li>
        <span>Naam: {{ gerecht.naam }}</span>
        <span>Beschrijving: {{ gerecht.beschrijving }}</span>
        <span>Pittigheid: {{ gerecht.pittigheid }}</span>
        <span>Prijs: {{ gerecht.prijs }}</span>
    </li>
</template>

<script>
export default {
    props: ['gerecht'],
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
