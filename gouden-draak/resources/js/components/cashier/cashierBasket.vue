<template>
   <div>
       <h1 class="text-center mt-3 mb-2"><strong> Bestelling </strong></h1>
       <div>
            <div class="row align-items-center border m-1 p-1 rounded" 
                v-for="gerecht in gerechten" v-bind:key="gerecht.id">
                <div class="col"> {{ gerecht.menunummer }}{{ gerecht.menu_toevoeging }}  </div>
                <div class="col"> {{ gerecht.naam }} </div>
                <div class="col"> &euro; {{ gerecht.prijs }} </div>
                <div class="col"> <input type="number" :value="gerecht.amount" name="aantal" /> </div>
            </div>
        </div>
   </div>
</template>

<script>
export default {
    mounted() {
        this.$root.$on('addGerecht', obj => {
            let gerecht = JSON.parse(JSON.stringify(obj));
            let index = this.gerechten.findIndex(data => data.id === gerecht.id);
            
            if(index < 0) { 
                this.gerechten.push(gerecht);
            } else {
                this.gerechten[index].amount + gerecht.amount;
            }
            
        });
    },
    data() {
        return {
            gerechten: []
        }
    }
}
</script>