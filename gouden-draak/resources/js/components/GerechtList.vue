<template>
    <ul>
        <gerecht v-for="gerecht in gerechten" v-bind:key="gerecht.id" :gerecht="gerecht" :description="gerecht"></gerecht>
    </ul>
</template>

<script>
export default {
    async mounted() {
        console.log('Component mounted.');
        const response = await axios.get('/api/gerecht');
        if(response.status === 200) {
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
