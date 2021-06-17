<template>

    <div>
        <h1 class="h1 mb-3 mt-3">Cocktail zoekmachine</h1>
        <span class="input-group-text" for="searchText">Cocktail naam</span>
        <input type="text" id="searchText" placeholder="Berry Deadly" v-model="searchText" class="form-control" v-on:change="searchCocktail"/>

        <div class="row row-cols-1 row-cols-md-2 g-4 mt-5 mb-5">
            <cocktail-card v-for="cocktail in cocktails" v-bind:key="cocktail.idDrink" :cocktail="cocktail"></cocktail-card>
        </div>

    </div>

</template>

<script>
export default {
    async mounted() {
        const response = await axios.get(`/api/cocktails`);
        if (response.status === 200) {
            this.cocktails = response.data.drinks;
        }
    },
    data() {
        return {
            cocktails: [],
            searchText: ""
        }
    },
    methods: {
        searchCocktail: async function (event) {
            let url = searchText.value == "" ? `/api/cocktails` : `/api/cocktails/${searchText.value}`;
            const response = await axios.get(url);
            if (response.status === 200) {
                this.cocktails = response.data.drinks;
            }
        }
    }
}
</script>

