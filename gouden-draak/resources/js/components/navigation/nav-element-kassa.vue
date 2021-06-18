<template>
    <li class="nav-item mr-6">
        <a class="nav-link" :href="navElement.route">{{navElement.displayName}}</a>
    </li>
</template>

<script>
export default {
    props: ['navElement']
}
</script>

