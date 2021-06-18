<template>
  <div>
    <div>
      <div>date form</div>
      <subtotal />
    </div>
    <div>
      <overview-table />
    </div>
  </div>
</template>

<script>
import overviewTable from '../components/verkoop/overviewTable.vue';
import Subtotal from '../components/verkoop/subtotal.vue';
export default {
  components: { overviewTable, Subtotal },
};
</script>
