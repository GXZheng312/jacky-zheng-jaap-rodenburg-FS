<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nummer</th>
            <th scope="col">Gerecht</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Pittigheid</th>
            <th scope="col">Prijs</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <gerecht v-for="gerecht in gerechten" v-bind:key="gerecht.id" :gerecht="gerecht"
                 :description="gerecht"></gerecht>
        </tbody>
    </table>
</template>

<script>
export default {
    async mounted() {
        console.log('Component mounted.');
        this.$root.$on('addGerecht', obj => {
            console.log(obj)
            this.gerechten.push(obj);
        });
    },
    data() {
        return {
            gerechten: []
        }
    }
}
</script>
