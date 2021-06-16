<template>
    <div>
        <div class="cashier-basket-container mb-3 overflow-auto">
            <h1 class="text-center mt-3 mb-2"><strong> Bestelling </strong></h1>
            <div>
                <basket-item v-for="gerecht in gerechten" :gerecht="gerecht" v-bind:key="gerecht.id"/>
            </div>
        </div>
        <div class="border-top pt-3 d-flex subtotal">
            <div class="d-flex justify-content-between subtotal-text">
                <div>Totaal: </div>
                <div> &euro; {{ formattedTotal }}</div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button @click="removeAll()" class="btn btn-outline-danger"> Verwijderen </button>
                <button @click="sendGerechten()" class="btn btn-primary text-white"> Afrekenen </button>
            </div>
        </div>
    </div>
</template>

<script>
import basketItem from './basketItem.vue';
export default {
  components: { basketItem },
    mounted() {
        this.$root.$on('addGerecht', gerecht => {     
            let index = this.gerechten.findIndex(data => data.id === gerecht.id);
            if(index < 0) this.gerechten.push(gerecht);
            if(index >= 0) this.gerechten[index].aantal++;
        });

        this.$root.$on('removeGerecht', gerecht => {
            this.gerechten = this.gerechten.filter(data => data.id != gerecht.id);
        });
    },
    computed: {
        formattedTotal: function(){
            let totalAmount = this.gerechten.reduce((sum, { prijs, aantal }) => sum + prijs * aantal, 0)
            return parseFloat(totalAmount).toFixed(2);
        }
    },
    methods: {
        removeAll(){
            this.gerechten = [];
        },
        sendGerechten(){
            console.log(this.gerechten);
            axios.post('/api/bestelling', {
                gerechten: this.gerechten
            }).then((response)=>{
                if(response.status = 200){ this.removeAll() }
                console.log(response);
            }).catch((error)=>{
                console.log(error.response.data)
            })
        }    
    },
    data() {
        return {
            gerechten: []
        }
    },
}
</script>