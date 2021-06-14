<template>
    <tr>
        <td class="w-25">{{ gerecht.menunummer }}{{gerecht.menu_toevoeging}}.</td>
        <td class="w-25">{{ gerecht.naam }}</td>
        <td class="w-50">{{ gerecht.beschrijving }}</td>
        <td class="w-25">{{ gerecht.pittigheid.pittigheid }}</td>
        <td class="w-25">€{{ gerecht.prijs }}</td>
        <td class="w-25">
            <button class="btn btn-primary" @click="addGerecht()">Toevoegen</button>
        </td>
    </tr>
</template>

<script>
export default {
    props: ['gerecht'],
    mounted() {
        console.log('Component mounted.')
    },
    methods: {
        addGerecht: function () {
            console.log('Addgerecht', this.gerecht)
            this.$root.$emit('addGerecht', this.gerecht);
        }
    }
}
</script>
