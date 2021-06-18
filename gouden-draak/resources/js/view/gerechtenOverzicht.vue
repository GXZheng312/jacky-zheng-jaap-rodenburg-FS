<template>
  <div class="overflow-auto">
    <b-pagination
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table"
    ></b-pagination>

    <p class="mt-3">Current Page: {{ currentPage }}</p>

    <b-table
      id="my-table"
      :items="gerechten"
      :per-page="perPage"
      :current-page="currentPage"
      small
    ></b-table>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        perPage: 10,
        currentPage: 1,
        gerechten: [],
      }
    },
    async mounted() {
        const response = await axios.get('/api/gerechten');
        if (response.status === 200) this.gerechten = response.data;
    },
    computed: {
      rows() {
        return this.items.length
      }
    }
  }
</script>