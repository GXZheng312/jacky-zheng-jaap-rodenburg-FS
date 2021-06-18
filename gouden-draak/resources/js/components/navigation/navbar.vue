<template>
    <nav>
        <ul>
            <nav-element v-for="menuItem in menuItems" v-bind:key="menuItem.route" :navElement="menuItem"></nav-element>
        </ul>
    </nav>
</template>

<script>
export default {
    async mounted() {
        const response = await axios.get(`/api/pages/${consts.pages.guest}`);
        if (response.status === 200) {
            this.menuItems = response.data;
        }
    },
    data() {
        return {
            menuItems: []
        }
    },
}
</script>

