<template>
    <table class="table table-striped mt-3">
        <thead>
        <th>#</th>
        <th>Menunummer</th>
        <th>Menu toevoeging</th>
        <th>Naam</th>
        <th>Prijs</th>
        <th>Soort</th>
        <th>Pittigheid</th>
        <th>Beschrijving</th>
        <th>Acties</th>
        </thead>
        <tbody>
        <gerechten-table-item v-for="gerecht in gerechten" v-bind:key="gerecht.id"
                              :gerecht="gerecht"></gerechten-table-item>
        </tbody>
    </table>

</template>

<script>
export default {
    async mounted() {
        const response = await axios.get(`/api/gerechten`);
        if (response.status === 200) {
            this.gerechten = response.data;
        }
    },
    data() {
        return {
            gerechten: [],
        }
    },
}
</script>

