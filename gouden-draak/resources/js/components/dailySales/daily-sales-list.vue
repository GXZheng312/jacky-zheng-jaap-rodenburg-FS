<template>
    <div class="container">
        <div class="card-deck  mt-3 row row-cols-1 row-cols-md-2 g-4 mt-5 mb-5">
            <daily-sales-item v-for="sale in sales" v-bind:key="sale.date" :sale="sale"></daily-sales-item>
        </div>
    </div>

</template>

<script>
export default {
    async mounted() {
        const response = await axios.get(`/api/daily-sales`);
        if (response.status === 200) {
            this.sales = response.data;
        }
    },
    data() {
        return {
            sales: [],
        }
    },
}
</script>

