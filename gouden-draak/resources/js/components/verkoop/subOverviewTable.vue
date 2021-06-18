<template>
<table class="table table-info table-striped vertical-align-middle">
    <thead>
        <tr>
            <th scope="col">menunummer</th>
            <th scope="col">Naam</th>
            <th scope="col">Prijs</th>
            <th scope="col">Aantal</th>
            <th scope="col">Subtotaal</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="order in orders" v-bind:key="order.id"> 
            <td> {{ order.gerecht.menunummer }}{{ order.gerecht.menu_toevoeging }}</td>
            <td> {{ order.gerecht.naam }}</td>
            <td> &euro; {{ (order.gerecht.prijs * 1).toFixed(decimals) }}</td>
            <td> {{ order.aantal }}</td>
            <td> &euro; {{ (order.gerecht.prijs * order.aantal).toFixed(decimals) }}</td>
        </tr>
    </tbody>
</table>
</template>

<script>
export default {
  data() {
    return {
      decimals: 2,
    };
  },
  props: ['orders'],
};
</script>
