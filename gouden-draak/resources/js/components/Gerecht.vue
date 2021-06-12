<template>
    <tr>
        <td>{{ gerecht.menunummer }}{{gerecht.menu_toevoeging}}.</td>
        <td>{{ gerecht.naam }}</td>
        <td>{{ gerecht.beschrijving }}</td>
        <td>{{ gerecht.pittigheid.pittigheid }}</td>
        <td> &#8364;{{ gerecht.prijs }}</td>
        <td>
            <span v-for="(allergene, key) in gerecht.allergenes" :key="allergene.id">
                <span v-if="key !== 0">-</span>
                {{ allergene.naam }} 
            </span>
        </td>
        <td>
            <button class="btn btn-primary">Toevoegen</button>
        </td>
    </tr>
</template>

<script>
export default {
    props: ['gerecht'],
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
