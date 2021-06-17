<template>
  <div>
    <div class="gerecht-search-container">
      <input type="text" class="form-control" placeholder="Zoeken" v-model="filterInput" />
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
      filteredData: [],
      excludedData: [],
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
        this.filteredData = JSON.parse(JSON.stringify(this.soortenGerecht));
        this.filterGerechten();
        this.cleanFiltered();

        return this.filteredData;
      }
    },
  },
  methods: {
    filterGerechten: function () {
      for (let x = 0; this.filteredData.length > x; x++) {
        if (!this.filteredData[x].soort.includes(this.filterInput.toLowerCase())) {
          this.filteredData[x].gerechten = this.filteredData[x].gerechten.filter(data =>
            (data.menunummer + '' + data.menu_toevoeging).includes(this.filterInput) ||
            data.naam.includes(this.filterInput)
          );
        }
      }
    },
    cleanFiltered: function () {
      let i = this.filteredData.length;
      while (i--) {
        if(this.filteredData[i].gerechten.length < 1) {
          this.filteredData.splice(i, 1);
        }
      }
    }

  },
};
</script>