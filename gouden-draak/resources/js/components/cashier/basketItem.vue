<template>
<div class="column align-items-center border m-1 p-1 rounded">
    <div class="row align-items-center">
        <div class="col-1 text-center"> {{ gerecht.menunummer }}{{ gerecht.menu_toevoeging }}  </div>
        <div class="col-4" v-html="gerecht.naam"> </div>
        <div class="col-2 text-center"> &euro; {{ formattedSubtotal(gerecht) }} </div>
        <div class="col-3"> 
            <select v-model="bijgerechtSelector" class="form-select" @change="addBijgerecht()">
                <option selected disabled>{{bijgerechtSelectorText}}</option>
                <option v-for="bijgerecht in bijgerechten" v-bind:key="bijgerecht.id" :value="bijgerecht.id">
                    {{bijgerecht.naam}}
                </option>
            </select>
        </div>
        <div class="col-2"> <input type="number" class="form-control text-center" @change="amountChange()" v-model="gerecht.aantal" name="aantal" /> </div>
    </div>
    <div>
        <bijgerecht-item v-for="bijgerecht in gerecht.bijgerechten" v-bind:key="bijgerecht.id" :bijgerecht="bijgerecht"/>
    </div>
    <div class="row mt-1"> 
        <div class="col">
            <input class="form-control" v-model="gerecht.opmerking" type="text" placeholder="Opmerking toevoegen">
        </div>
    </div>
</div>
</template>

<script>
import bijgerechtItem from './bijgerechtItem.vue';
export default {
  components: { bijgerechtItem },
    props: ['gerecht'],
    data() {
        return {
            bijgerechten: [],
            bijgerechtSelector: "bijgerecht",
            bijgerechtSelectorText: "bijgerecht"
        }
    },
    async mounted() {
        this.$set(this.gerecht, 'bijgerechten', []);
        this.$set(this.gerecht, 'opmerking', null);

        const response = await axios.get('/api/bijgerechten');
        if (response.status === 200) this.bijgerechten = response.data;

        this.$root.$on('removeBijgerecht', bijgerecht => {
            this.gerecht.bijgerechten = this.gerecht.bijgerechten.filter(data => data.id != bijgerecht.id);
        });
    },
    methods: {
        formattedSubtotal(gerecht){
            return parseFloat(gerecht.prijs * gerecht.aantal).toFixed(2);
        },
        amountChange() {
            if(this.gerecht.aantal < 1){
                this.$root.$emit('removeGerecht', this.gerecht);
            }
        },
        addBijgerecht(){
            if(this.bijgerechtSelector != this.bijgerechtSelectorText){
                let bijgerechtRef = this.bijgerechten.filter(data => data.id == this.bijgerechtSelector);
                if(bijgerechtRef.length == 1){
                    let bijgerechtCopy = JSON.parse(JSON.stringify(bijgerechtRef[0]));
                    let index = this.gerecht.bijgerechten.findIndex(data => data.id == bijgerechtCopy.id);

                    if(index < 0) this.gerecht.bijgerechten.push(bijgerechtCopy);
                    if(index >= 0) this.gerecht.bijgerechten[index].aantal++;

                    
                }
            }

            this.bijgerechtSelector = this.bijgerechtSelectorText;
        }
        
    },
    

}
</script>