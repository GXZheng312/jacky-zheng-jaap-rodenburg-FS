<template>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nummer</th>
                <th scope="col">Gerecht</th>
                <th scope="col">Beschrijving</th>
                <th scope="col">Pittigheid</th>
                <th scope="col">Prijs</th>
                <th scope="col">Allergenes</th>
                <th scope="col">Acties</th>
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
        const response = await axios.get('/api/gerechten');
        if (response.status === 200) {
            for(let i = 0; i < response.data.length; i++){
                response.data[i].amount = 1;
            }
            this.gerechten = response.data;
        }
    },
    data() {
        return {
            gerechten: []
        }
    }
}
</script>
