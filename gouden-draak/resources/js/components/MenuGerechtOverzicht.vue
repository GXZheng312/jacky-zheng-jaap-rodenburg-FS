<template>
    <div class="mt-3 mb-5 overflow-auto">
        <div v-for="soortGerecht in soortenGerecht" :key="soortGerecht.id">
            <h3 class="text-center border-top mt-3 mb-2">{{soortGerecht.soort}}</h3>
            <div class="d-flex flex-wrap">
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
