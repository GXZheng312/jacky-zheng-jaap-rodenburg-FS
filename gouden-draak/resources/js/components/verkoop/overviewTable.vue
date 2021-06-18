<template>
  <div>
    <table>
      <thead>
        <tr>
          <th>Bestelnummer</th>
          <th>Datum</th>
          <th>Excl. BTW</th>
          <th>BTW</th>
          <th>Totaal</th>
          <th>Gerechten</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="bestelling in bestellingen" v-bind:key="bestelling.id">
          <td>{{ bestelling.id }}</td>
          <td>{{ bestelling.datum }}</td>
          <td>&euro; {{ (totaal(bestelling) * (1 - btw)).toFixed(decimals) }}</td>
          <td>&euro; {{ (totaal(bestelling) * btw).toFixed(decimals) }}</td>
          <td>&euro; {{ totaal(bestelling).toFixed(decimals) }}</td>
          <td>
            <i v-if="activeSubInfo == bestelling.id" class="bi bi-arrow-down-circle"></i>
            <i v-else class="bi bi-arrow-up-circle-fill"></i>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
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
  },
};
</script>
