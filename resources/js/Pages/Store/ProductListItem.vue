<template>
    <div class="p-4 mt-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h3>{{ product.name }}</h3>
        <small>lorem ipsum</small>
    </div>
</template>

<script>
export default {
    name: "ProductListItem",
    props: {
        product: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>