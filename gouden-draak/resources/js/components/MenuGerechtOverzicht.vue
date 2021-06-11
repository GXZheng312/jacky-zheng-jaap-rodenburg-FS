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
            <menu-gerecht v-for="gerecht in gerechten" v-bind:key="gerecht.id" :gerecht="gerecht"
                     :description="gerecht"/>
            </tbody>
        </table>
</template>

<script>
export default {
    async mounted() {
        console.log('Component mounted.');
        const response = await axios.get('/api/gerecht');
        if (response.status === 200) {
            this.gerechten = response.data;
            console.log(response.data);
        }
    },
    data() {
        return {
            gerechten: []
        }
    }
}
</script>
