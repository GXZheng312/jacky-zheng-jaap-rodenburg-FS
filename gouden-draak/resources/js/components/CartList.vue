<template>
    <form action="./afhalen" method="post">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nummer</th>
                <th scope="col">Gerecht</th>
                <th scope="col">Beschrijving</th>
                <th scope="col">Pittigheid</th>
                <th scope="col">Aantal</th>
                <th scope="col">Prijs</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <cart-item v-for="gerecht in gerechten" v-bind:key="gerecht.id" :gerecht="gerecht"
                       :description="gerecht"></cart-item>
            </tbody>
        </table>
        <input type="hidden" name="_token" :value="csrf">
        <div class="row mb-3 mt-3">
            <div class="col-sm">
                <label for="afhaaltime" class="form-label">Afhaal tijd: *</label>
                <input type="datetime-local" id="afhaaltime" name="afhaaltime" class="form-control" required>
            </div>
            <div class="col-sm">
                <label for="name" class="form-label">Naam: *</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
        </div>
        <input type="submit" class="btn btn-primary form-control" value="Bestellen">
    </form>
</template>

<script>
export default {
    async mounted() {
        console.log('Component mounted.');
        this.$root.$on('addGerecht', obj => {
            let currentGerecht = this.gerechten.filter(data => data.id === obj.id)[0];
            if (currentGerecht) {
                currentGerecht.amount++;
            } else {
                console.log(obj)
                this.gerechten.push(obj);
            }
        });
        this.$root.$on('removeGerecht', obj => {
            this.gerechten = this.gerechten.filter(data => data.id != obj.id);
        });
    },
    data() {
        return {
            gerechten: [],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
}
</script>
