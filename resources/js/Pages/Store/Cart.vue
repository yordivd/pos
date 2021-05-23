<template>
    <h2>Cart</h2>

    <table class="table-fixed mt-4 w-full">
        <thead>
            <tr>
                <th class="border text-left px-4 py-2 w-3/4">Product</th>
                <th class="border text-left px-4 py-2 w-1/4">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(product, productIndex) in cart.products">
                <td class="border px-4 py-2 ">{{ product.name }}</td>
                <td class="border px-4 py-2 ">{{ product.price }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "Cart",
    props: {
        cart: Object
    }
}
</script>

<style scoped>

</style>