<template>
  <div>
        <div class="text-center fs-1 m-3 fw-bolder">Aanbieding van deze week</div>
        <div class="d-flex mb-3 flex-wrap">
            <div class="card w-25" v-for="aanbieding in aanbiedingen" v-bind:key="aanbieding.id">
                <div class="card-body">
                    <div class="card-title mb-2 fw-bold fs-4">{{aanbieding.titel}}</div>
                    <div class="card-text" v-html="aanbieding.aanpassing"> </div>
                </div>
                <div class="card-footer">Voor maar &euro; {{aanbieding.nieuwe_prijs}}</div>
            </div>
        </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
          aanbiedingen: [],
      }
    },
    async mounted() {
        const response = await axios.get('/api/aanbieding-week');
        if (response.status === 200) this.aanbiedingen = response.data;
    },
  }
</script>