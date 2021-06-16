<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto" v-if="order.length != 0">
                <h1 class="h1 mb-3 mt-3">Bedankt {{order.naam}} voor uw order bij de Goudendraak</h1>
                <h1 class="h2 mb-3 mt-3">Uw ordernummer: {{order.id}}</h1>
                <h1 class="h2 mb-3 mt-3">Afhalen om: {{order.afhaaltijdstip}}</h1>
                <h1 class="h2 mb-3 mt-3">Opmerkingen: {{order.opmerking}}</h1>
                <span v-html="qrCode"></span>
                <button class="btn btn-primary mt-3" onclick="window.print();return false;">Printen</button>
            </div>
            <div v-if="order.length === 0">
                <h1 class="h1 mb-3 mt-3">Er is helaas geen order gevonden met ID: {{id}}</h1>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['id'],
    async mounted() {
        console.log('Component mounted.');
        try {
            let response = await axios.get(`/api/afhaal-order/details/${this.id}`);
            if (response.status === 200) {
                this.order = response.data;
            }
            response = await axios.get(`/api/afhaal-order/qr-code/${this.id}`);
            if (response.status === 200) {
                this.qrCode = response.data;
            }
        } catch(e){

        }
    },
    data() {
        return {
            order: [],
            qrCode: ""
        }
    }
}
</script>
