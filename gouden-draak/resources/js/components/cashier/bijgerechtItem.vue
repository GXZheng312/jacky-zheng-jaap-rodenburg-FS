<template>
<div class="row align-items-center"> 
    <div class="col-10 text-end"> {{ bijgerecht.naam }} </div>
    <div class="col"> <input type="number" class="form-control form-control-sm text-center" @change="amountChange()" v-model="bijgerecht.aantal" name="aantal" /> </div>
</div>

</template>

<script>
export default {
    props: ['bijgerecht'],
    data() {
        return {

        }
    },
    async mounted() {
        this.$set(this.bijgerecht, 'aantal', 1);
    },
    methods: {
        amountChange() {
            if(this.bijgerecht.aantal < 1){
                this.$root.$emit('removeBijgerecht', this.bijgerecht);
            }
        },
    },
    

}
</script>