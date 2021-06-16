<template>

<fieldset>
    <input type="checkbox" class="checkbox" :id="id"
           style="visibility: hidden; width: 0; height: 0"/>


    <label :for="id">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-heart-fill"
             viewBox="0 0 16 16" id="heart">
            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
        </svg>
    </label>
</fieldset>

</template>

<script>
export default {
    props: ['id'],
    mounted() {
        console.log('Component mounted.')
    },
}
</script>

