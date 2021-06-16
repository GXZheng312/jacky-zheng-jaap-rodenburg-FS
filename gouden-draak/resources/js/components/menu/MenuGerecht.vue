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
            this.updateFavouriteState(obj.id, obj.checked);
        });
    },
    methods: {
        updateFavouriteState(id, state) {
            console.log(id, 'clicked', this.gerecht.id);
            let cookie = getCookieValue(consts.cookies.favoriteGerechten) ?? [];
            try {
                cookie = JSON.parse(cookie);
            } catch (e) {
                cookie = [];
            }

            cookie = cookie.filter(function (value) {
                return value !== id;
            });
            if (state) {
                cookie.push(id);
            }
            setCookie(consts.cookies.favoriteGerechten, JSON.stringify(cookie), 7);
        }
    },
    data() {
        return {
            favorite: (getCookieValue(consts.cookies.favoriteGerechten) ?? []).indexOf(this.gerecht.id) !== -1
        }
    }
}
</script>
