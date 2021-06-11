<template>
    <tr>
        <td class="w-25">{{ gerecht.menunummer }} {{gerecht.menu_toevoeging}}.</td>
        <td class="w-25">{{ gerecht.naam }}</td>
        <td class="w-50">{{ gerecht.beschrijving }}</td>
        <td class="w-25">{{ gerecht.pittigheid }}</td>
        <td class="w-25">€{{ gerecht.prijs }}</td>
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
