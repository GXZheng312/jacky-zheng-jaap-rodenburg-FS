<template>
    <div class="card col" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{sale.date}}</h5>
            <p>Download de verkoop samenvatting van {{sale.date}}</p>
            <a :href="sale.download" class="btn btn-primary mt-1">Download</a>
        </div>
    </div>

</template>

<script>
export default {
    props: ['sale'],
}
</script>

