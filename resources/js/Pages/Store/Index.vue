<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="grid grid-cols-2 gap-8">

                    <div>
                        <product-filter  />

                        <product-list :products="products" />
                    </div>

                    <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <cart :cart="cart" />
                    </div>
                </div>



            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import ProductList from '@/Pages/Store/ProductList'
import ProductFilter from "@/Pages/Store/ProductFilter";
import Cart from "@/Pages/Store/Cart";

export default {
    props: {
        cart: Object,
        products: Array
    },
    components: {
        AppLayout,
        ProductList,
        ProductFilter,
        Cart
    },
}
</script>
