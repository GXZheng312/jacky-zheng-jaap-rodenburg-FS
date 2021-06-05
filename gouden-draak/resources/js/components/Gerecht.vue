<template>
    <li>
        <span>Name: {{ gerecht.name }}</span>
        <span>{{ gerecht.description }}</span>
    </li>
</template>

<script>
export default {
    props: ['gerecht'],
    mounted() {
        console.log('Component mounted.')
    },
    data(){
        return {
            name: 'Mega Naam',
            description: 'Beschrijving',
        }
    }
}
</script>
