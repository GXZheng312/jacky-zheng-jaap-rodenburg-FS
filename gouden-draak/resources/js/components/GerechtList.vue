<template>
    <ul>
        <gerecht v-for="gerecht in gerechten" v-bind:key="gerecht.id" :gerecht="gerecht" :description="gerecht"></gerecht>
    </ul>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            gerechten: [
                {id: 1, name: 'Ketjap', description: 'Heerlijke ketjap manis'},
                {id: 2, name: 'Ketjap 2', description: 'Heerlijke ketjap manis 2'}
            ]
        }
    }
}
</script>
