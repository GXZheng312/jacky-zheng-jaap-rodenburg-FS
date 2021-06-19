<template>
    <tr>
        <td class="w-25">{{ gerecht.menunummer }}{{ gerecht.menu_toevoeging }}.</td>
        <td class="w-25">{{ gerecht.naam }}</td>
        <td class="w-50">{{ gerecht.beschrijving }}</td>
        <td class="w-25">{{ gerecht.pittigheid.pittigheid }}</td>
        <td class="w-25">{{ gerecht.amount }}</td>
        <td class="w-25">€{{ gerecht.prijs }}</td>
        <td class="w-25">
            <a class="btn btn-primary" @click="deleteGerecht()">Verwijderen</a>
        </td>
        <input hidden :value="gerecht.id" name="gerecht[]" required>
        <input hidden :value="gerecht.amount" name="amount[]" required>
        <input class="w-96 form-control mt-1" name="note[]" type="text" placeholder="Opmerking toevoegen">

    </tr>
</template>

<script>
export default {
    props: ['gerecht'],
    methods: {
        deleteGerecht: function () {
            if (this.gerecht.amount > 1) {
                this.gerecht.amount--;
            } else {
                this.$root.$emit(consts.events.removeGerecht, this.gerecht);
            }
        }
    },
}
</script>
