<template>
   <div>
       <div v-for="soortGerecht in soortenGerecht" :key="soortGerecht.id">
            <h1 class="text-center mt-3 mb-2"><strong>{{soortGerecht.soort}}</strong></h1>
            <div class="row align-items-center border m-1 p-1 rounded" v-for="gerecht in soortGerecht.gerechten" :key="gerecht.id">
                <div class="col"> {{ gerecht.menunummer }}{{ gerecht.menu_toevoeging }}  </div>
                <div class="col-8" v-html="gerecht.naam"/>
                <div class="col"> &euro; {{ gerecht.prijs }} </div>
                <div class="col"> <button class="btn btn-outline-primary btn-small" @click="addGerecht(gerecht)"> toevoegen </button> </div>
            </div>
        </div>
   </div>
</template>

<script>
export default {
    async mounted() {
        const response = await axios.get('/api/soort-gerechten');
        if (response.status === 200) this.soortenGerecht = response.data; 
    },
    data() {
        return {
            soortenGerecht: []
        }
    },
    methods: {
        addGerecht: function (gerechtRef) {
            let gerecht = JSON.parse(JSON.stringify(gerechtRef));
            gerecht.amount = 1;
            this.$root.$emit('addGerecht', gerecht);
        }
    }
}
</script>