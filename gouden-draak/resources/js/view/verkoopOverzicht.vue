<template>
  <div>
    <div class="row m-4 border border-primary">
      <div class="col-4 p-3 mr-4 border-end border-primary">
        <div class="row">
          <div class="col-8">
            <div class="mb-3 row">
              <label for="startDatum" class="col-sm-4 col-form-label">Start Datum</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="startDatum" v-model="startDatum" />
              </div>
            </div>
            <div class="row">
              <label for="eindDatum" class="col-sm-4 col-form-label">Eind Datum</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="eindDatum" v-model="eindDatum" />
              </div>
            </div>
          </div>
          <div class="col">
            <button class="btn btn-primary btn-lg h-100 rounded" @click="maakOverzicht()">Maak overzicht</button>
          </div>
        </div>
      </div>
      <subtotal class="col p-3 border-start border-primary" :bestellingen="bestellingen"/>
    </div>
    <overview-table class="border overflow-auto verkoop-overzicht-table border-primary p-3 m-4" :bestellingen="bestellingen"/>
  </div>
</template>

<script>
import overviewTable from '../components/verkoop/overviewTable.vue';
import Subtotal from '../components/verkoop/subtotal.vue';
export default {
  components: { overviewTable, Subtotal },
  data() {
    return {
      bestellingen: [],
      startDatum: null,
      eindDatum: null,
    };
  },
  mounted() {},
  methods: {
    maakOverzicht() {
      if(!this.startDatum && !this.eindDatum && this.startDatum > this.eindDatum) return;

      axios
        .post('/api/bestellingen/op-datum', {
          startDatum: this.startDatum,
          eindDatum: this.eindDatum,
        })
        .then(response => {
          this.bestellingen = response.data;
        })
        .catch(error => {
          console.log(error.response.data);
        });
    },
  },
};
</script>
