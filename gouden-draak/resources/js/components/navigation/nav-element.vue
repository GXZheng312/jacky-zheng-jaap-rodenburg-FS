<template>
    <li>
        <a :href="navElement.route">{{navElement.displayName}}</a>
    </li>
</template>

<script>
export default {
    props: ['navElement']
}
</script>

