<template>
    <tr>
        <td class="w-25">{{ gerecht.menunummer }}{{ gerecht.menu_toevoeging }}.
            <heart :id="gerecht.id" :checked="favorite"></heart>
        </td>
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
        this.$root.$on(consts.events.heartEvent, obj => {
            if (this.gerecht.id !== obj.id) return;
            updateFavoriteState(obj.id, obj.checked);
        });
    },
    methods: {
        addGerecht: function () {
            console.log('Addgerecht', this.gerecht)
            this.$root.$emit(consts.events.addGerecht, this.gerecht);
        }
    },
    data() {
        return {
            favorite: (getCookieValue(consts.cookies.favoriteGerechten) ?? []).indexOf(this.gerecht.id) !== -1
        }
    }
}
</script>
