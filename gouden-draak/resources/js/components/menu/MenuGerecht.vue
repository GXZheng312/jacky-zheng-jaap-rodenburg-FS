<template>
    <div class="card menu-item-card">
        <div class="card-header">
            <div class="container">
                <div class="row">{{ gerecht.menunummer }}{{ gerecht.menu_toevoeging }}. {{ gerecht.naam }}
                </div>
                <div class="row">
                    <heart :id="gerecht.id" :checked="favorite"></heart>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-subtitle text-muted">
                <span v-for="(allergene, key) in gerecht.allergenes" :key="allergene.id">
                    <span v-if="key !== 0">-</span>
                    {{ allergene.naam }}
                </span>
            </div>

            <p><strong>{{ gerecht.pittigheid.pittigheid }}</strong></p>

            <div class="card-text">
                {{ gerecht.beschrijving }}
            </div>
        </div>
        <div class="card-footer">
            Prijs: &#8364; {{ gerecht.prijs }}
        </div>
    </div>
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
    data() {
        return {
            favorite: (getCookieValue(consts.cookies.favoriteGerechten) ?? []).indexOf(this.gerecht.id) !== -1
        }
    }
}
</script>
