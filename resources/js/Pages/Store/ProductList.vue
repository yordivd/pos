<template>
    <h2>Products</h2>
    <product-list-item v-for="(product,productIndex) in products" :product="product" />
</template>

<script>
import ProductListItem from "@/Pages/Store/ProductListItem";
export default {
    name: "ProductList",
    components: {ProductListItem},
    props: {
        products: Array
    }
}
</script>

<style scoped>

</style>