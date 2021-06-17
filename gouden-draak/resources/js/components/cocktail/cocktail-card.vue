<template>

    <div class="col"  style="width: 18rem;">
        <div class="card">
            <img :src="cocktail.strDrinkThumb" class="card-img-top img-fluid" :alt="cocktail.strDrink">
            <div class="card-body">
                <h5 class="card-title">{{cocktail.strDrink}} - {{cocktail.strCategory}}</h5>
                <p class="card-text">{{cocktail.strInstructions}}</p>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    props: ['cocktail'],
}
</script>

