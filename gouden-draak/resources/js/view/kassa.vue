<template>
   <div class="container-fluid">
	   <div class="row">   
	   		<soort-gerecht-list class="gerecht-list-container col-7 m-3 p-3 overflow-auto border border-primary"/>
			<cashier-basket class="col border border-primary m-3 p-3"> check out </cashier-basket>
	   </div>
   </div>
</template>

<script>
import CashierBasket from '../components/cashier/cashierBasket.vue'
import soortGerechtList from '../components/cashier/soortGerechtList.vue'

export default {
  components: { soortGerechtList, CashierBasket },
}
</script>