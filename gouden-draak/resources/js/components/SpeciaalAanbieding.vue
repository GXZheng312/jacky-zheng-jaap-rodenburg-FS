<template>
<div class="ad-card"> 
    <div class="title">
        {{ aanbieding.titel }}
    </div>
    <div class="body table-card-body" v-html="aanbieding.aanpassing">

    </div>
    <div class="price">
        Prijs: € {{ aanbieding.nieuwe_prijs }}
    </div>
</div>
</template>

<script>
export default {
    async mounted() {
        const response = await axios.get('/api/speciaal-aanbieding');
        if (response.status === 200) {
            this.aanbieding = response.data;
            console.log(response.data);
        }
    },
    data() {
        return {
            aanbieding: []
        }
    }
}
</script>
