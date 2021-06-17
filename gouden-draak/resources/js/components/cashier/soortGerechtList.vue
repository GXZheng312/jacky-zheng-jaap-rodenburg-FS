<template>
  <div>
    <div class="gerecht-search-container">
      <input type="text" class="form-control" placeholder="Zoeken" v-model="filterInput" @change="searchGerecht()" />
    </div>
    <div class="overflow-auto gerecht-list-container border-top border-primary mt-3">
      <div v-for="soortGerecht in filteredSoortenGerechten" :key="soortGerecht.id">
        <h1 class="text-center mt-3 mb-2">
          <strong>{{ soortGerecht.soort.toUpperCase() }}</strong>
        </h1>
        <div class="row align-items-center border m-1 p-1 rounded" v-for="gerecht in soortGerecht.gerechten" :key="gerecht.id">
          <div class="col">{{ gerecht.menunummer }}{{ gerecht.menu_toevoeging }}</div>
          <div class="col-8" v-html="gerecht.naam" />
          <div class="col">&euro; {{ gerecht.prijs }}</div>
          <div class="col"><button class="btn btn-outline-primary btn-small" @click="addGerecht(gerecht)">toevoegen</button></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      soortenGerecht: [],
      filterInput: '',
    };
  },
  async mounted() {
    const response = await axios.get('/api/soort-gerechten');
    if (response.status === 200) {
      this.soortenGerecht = response.data;
    }
  },
  computed: {
    filteredSoortenGerechten: function () {
      if (this.filterInput === null || this.filterInput === '') {
        return this.soortenGerecht;
      } else {
        let filteredData = null;

        this.filterBySoort(filteredData);
        this.filterByMenunummer(filteredData);
        this.filterByNaam(filteredData);

        return filteredData;
      }
    },
  },
  methods: {
    addGerecht: function (gerechtRef) {
      let gerecht = JSON.parse(JSON.stringify(gerechtRef));
      gerecht.aantal = 1;
      this.$root.$emit('addGerecht', gerecht);
    },
    filterBySoort(data) {
      return;
    },
    filterByMenunummer(data) {
      return;
    },
    filterByNaam(data) {
      return;
    },
  },
};
</script>