<template>
    <div>
        <span>Name: {{ name }}</span>
        <span>{{ description }}</span>
    </div>
</template>

<script>
export default {
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
