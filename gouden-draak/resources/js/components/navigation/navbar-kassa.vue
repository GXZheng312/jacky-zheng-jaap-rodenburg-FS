<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container" id="navbarSupportedContent">
            <ul class="navbar-nav fs-4">
                <nav-element-kassa v-for="menuItem in menuItems" v-bind:key="menuItem.route" :navElement="menuItem"></nav-element-kassa>
            </ul>

            <form method="POST" :action="logOut.route" accept-charset="UTF-8" class="d-flex">
                <input type="hidden" name="_token" :value="csrf">
                <button type="submit" class="btn btn-outline-secondary">{{logOut.displayName}}</button>
            </form>

        </div>
    </nav>
</template>

<script>
export default {
    async mounted() {
        let response = await axios.get(`/api/pages/${consts.pages.kassa}`);
        if (response.status === 200) {
            this.menuItems = response.data;
        }
        response = await axios.get(`/api/pages/${consts.pages.logout}`);
        if (response.status === 200) {
            this.logOut = response.data[0];
        }
    },
    data() {
        return {
            menuItems: [],
            logOut: {},
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
}
</script>

