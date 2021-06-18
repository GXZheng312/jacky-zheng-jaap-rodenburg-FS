<template>
  	<div class="row overzicht-subtotal">
      	<div class="col d-flex justify-content-around align-items-center">
			<div>Omzet:</div>
			<div>&euro; {{ omzet }} </div>
		</div>
		<div class="col d-flex justify-content-around align-items-center">
			<div>BTW:</div>
			<div>&euro; {{ amountBTW }} </div>
		</div>
		<div class="col d-flex justify-content-around align-items-center">
			<div>excl. BTW:</div>
			<div>&euro; {{ omzetExclBTW }}  </div>
		</div>
  	</div>
</template>

<script>
export default {
	data() {
		return {
			btw: 0.06,
			decimals: 2,
		};
	},
	props: ['bestellingen'],
	computed: {
		omzet() {
			console.log('calculating');
			return this.calculateTotal().toFixed(this.decimals);
		},
		amountBTW() {
			return (this.calculateTotal() * this.btw).toFixed(this.decimals);
		},
		omzetExclBTW() {
			return (this.calculateTotal() * (1 - this.btw)).toFixed(this.decimals);
		}
	},
	methods: {
		calculateTotal(){
			let total = 0.00;

			this.bestellingen.forEach(bestelling => {
				bestelling.orders.forEach(order => {
					total += order.gerecht.prijs * order.aantal
				})
			});
			return total;
		}
	}
		
}
</script>
