<template>
    <div>
        <div class="cashier-basket-container mb-3 overflow-auto">
            <h1 class="text-center mt-3 mb-2"><strong> Bestelling </strong></h1>
            <div>
                <div class="row align-items-center border m-1 p-1 rounded" 
                    v-for="gerecht in gerechten" v-bind:key="gerecht.id">
                    <div class="col"> {{ gerecht.menunummer }}{{ gerecht.menu_toevoeging }}  </div>
                    <div class="col"> {{ gerecht.naam }} </div>
                    <div class="col"> &euro; {{ formattedSubtotal(gerecht) }} </div>
                    <div class="col"> <input type="number" @change="amountChange(gerecht)" v-model="gerecht.amount" name="aantal" /> </div>
                </div>
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
export default {
    mounted() {
        this.$root.$on('addGerecht', gerechtRef => {
            let gerecht = JSON.parse(JSON.stringify(gerechtRef));
            let index = this.gerechten.findIndex(data => data.id === gerecht.id);
            
            if(index < 0) { 
                gerecht.amount = 1;
                this.gerechten.push(gerecht);
            } else {
                this.gerechten[index].amount++;
            }
            
        });
    },
    computed: {
        formattedTotal: function(){
            this.totalAmount = this.gerechten.reduce((sum, { prijs, amount }) => sum + prijs * amount, 0)
            return parseFloat(this.totalAmount).toFixed(2);
        }
    },
    methods: {
        amountChange(gerecht) {
            if(gerecht.amount < 1){
                this.gerechten = this.gerechten.filter(data => data.id != gerecht.id);
            }
        },
        formattedSubtotal(gerecht){
            return parseFloat(gerecht.prijs * gerecht.amount).toFixed(2);
        },
        removeAll(){
            this.gerechten = [];
        },
        sendGerechten(){
            axios.post('/api/bestellings', this.gerechten)
            .then((response)=>{
                console.log(response)
            }).catch((error)=>{
                console.log(error.response.data)
            })
        }    
    },
    data() {
        return {
            gerechten: [],
            totalAmount: 0
        }
    },
}
</script>