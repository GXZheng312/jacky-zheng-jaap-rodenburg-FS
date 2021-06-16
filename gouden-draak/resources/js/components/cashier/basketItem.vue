<template>
<div class="column align-items-center border m-1 p-1 rounded">
    <div class="row align-items-center">
        <div class="col-1 text-center"> {{ gerecht.menunummer }}{{ gerecht.menu_toevoeging }}  </div>
        <div class="col-4" v-html="gerecht.naam"> </div>
        <div class="col-2 text-center"> &euro; {{ formattedSubtotal(gerecht) }} </div>
        <div class="col-3"> 
            <select v-model="gerecht.bijgerecht" class="form-select">
                <option selected>Geen bijgerecht</option>
                <option v-for="bijgerecht in bijgerechten" v-bind:key="bijgerecht.id" :value="bijgerecht.id">
                    {{bijgerecht.naam}}
                </option>
            </select>
        </div>
        <div class="col-2"> <input type="number" class="form-control" @change="amountChange()" v-model="gerecht.aantal" name="aantal" /> </div>
    </div>
    <div class="row mt-1"> 
        <div class="col">
            <input class="form-control" v-model="gerecht.opmerking" type="text" placeholder="Opmerking toevoegen">
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['gerecht'],
    data() {
        return { 
            bijgerechten: []
        }
    },
    async mounted() {
        this.$set(this.gerecht, 'bijgerecht', 'Geen bijgerecht');
        this.$set(this.gerecht, 'opmerking', null);

        const response = await axios.get('/api/bijgerechten');
        if (response.status === 200) this.bijgerechten = response.data;
    },
    methods: {
        formattedSubtotal(gerecht){
            return parseFloat(gerecht.prijs * gerecht.aantal).toFixed(2);
        },
        amountChange() {
            if(this.gerecht.aantal < 1){
                this.$root.$emit('removeGerecht', this.gerecht);
            }
        }
        
    },
    

}
</script>