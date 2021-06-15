<template>
    <div class="mt-3 mb-5 overflow-auto max-vh-75">
        <div v-for="soortGerecht in soortenGerecht" :key="soortGerecht.id">
            <h2 class="text-center border-top mt-3 mb-2">{{soortGerecht.soort}}</h2>
            <div class="d-flex flex-wrap justify-content-evenly">
                <menu-gerecht v-for="gerecht in soortGerecht.gerechten" v-bind:key="gerecht.id" :gerecht="gerecht"
                    :description="gerecht"/>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    async mounted() {
        console.log('Component mounted.');
        const response = await axios.get('/api/soort-gerechten');
        if (response.status === 200) {
            this.soortenGerecht = response.data;
            console.log(response.data);
        }
    },
    data() {
        return {
            soortenGerecht: []
        }
    }
}
</script>
