<template>
    <div>
        <span>Name: {{ name }}</span>
        <span>{{ description }}</span>
    </div>
</template>

<script>
export default {
    props: ['name', 'description'],
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
