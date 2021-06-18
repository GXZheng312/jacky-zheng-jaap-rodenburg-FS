<template>
  <div>
    <table class="table table-striped vertical-align-middle">
      <thead>
        <tr class="table-primary">
          <th scope="col">Bestelnummer</th>
          <th scope="col">Datum</th>
          <th scope="col">Excl. BTW</th>
          <th scope="col">BTW</th>
          <th scope="col">Totaal</th>
          <th scope="col">Gerechten</th>
        </tr>
      </thead>
      <tbody name="slide" is="transition-group">
        <template v-for="bestelling in bestellingen">
          <tr v-bind:key="bestelling.id">
            <td scope="row">{{ bestelling.id }}</td>
            <td>{{ bestelling.datum }}</td>
            <td>&euro; {{ (totaal(bestelling) * (1 - btw)).toFixed(decimals) }}</td>
            <td>&euro; {{ (totaal(bestelling) * btw).toFixed(decimals) }}</td>
            <td>&euro; {{ totaal(bestelling).toFixed(decimals) }}</td>
            <td>
              <button class="btn btnic" @click="toggleSubinfo(bestelling.id)">
                <i v-if="activeSubInfo == bestelling.id" class="bi bi-arrow-up-circle-fill"></i>
                <i v-else class="bi bi-arrow-down-circle"></i>
              </button>
            </td>
          </tr>
          <tr v-bind:key="bestelling.id" v-if="activeSubInfo == bestelling.id" class="container-fluid">
            <td colspan="7"> 
              <sub-overview-table :orders="bestelling.orders"/>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
</template>

<script>
import subOverviewTable from './subOverviewTable.vue';
export default {
  components: { subOverviewTable },
  data() {
    return {
      activeSubInfo: 0,
      btw: 0.06,
      decimals: 2,
    };
  },
  props: ['bestellingen'],
  watch: {
    bestellingen: function (val) {},
  },
  methods: {
    totaal(bestelling) {
      let total = 0.0;
      bestelling.orders.forEach(order => {
        total += order.gerecht.prijs * order.aantal;
      });
      return total;
    },
    toggleSubinfo(bestellingnr){
      if(bestellingnr == this.activeSubInfo) {
        this.activeSubInfo = 0;
      } else {
        this.activeSubInfo = bestellingnr;
      }
    }
  },
};
</script>
