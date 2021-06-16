<template lang="html">
  <div>
    <b-tabs justified
      active-nav-item-class="text-danger"
      nav-class="font-weight-bold text-uppercase">
      <b-tab title="Menu kaarten" active>
        <img class="img-fluid" src="images/restaurant-menukaart-1-2.jpg">
        <img class="img-fluid" src="images/restaurant-menukaart-1.jpg">
      </b-tab>
      <b-tab title="Gerechten lijst">
        <menu-gerecht-overzicht ></menu-gerecht-overzicht>
      </b-tab>
    </b-tabs>
  </div>
</template>

<script>

export default {

}
</script>
