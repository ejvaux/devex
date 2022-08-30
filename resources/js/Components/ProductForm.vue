<script setup>
    import BreezeButton from '@/Components/Button.vue';
    import { Head, Link  } from '@inertiajs/inertia-vue3';
    const props = defineProps({
        products: Array
    })
</script>
<template>
    <div class="grid grid-cols-1 gap-6">
        <label class="block">
            <span class="text-gray-700">Name</span>
            <input type="text" class="
                mt-1
                block
                w-full
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
            " placeholder="">
        </label>
        <label class="block">
            <span class="text-gray-700">Category</span>
            <select class="
                mt-1
                block
                w-full
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
            "                        
            >
            <option value=""></option>
            <option v-for="product in products" :key="product.id" value="{{ product.category }}">
                {{ product.category }}
            </option>
            </select>
        </label>
        <label class="block">
            <span class="text-gray-700">Description</span>
            <textarea class="
                mt-1
                block
                w-full
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
            " rows="3"></textarea>
        </label>
        <label class="block">
            <span class="text-gray-700">Image</span>
            <input class="
                mt-1
                block
                w-full
                transition
                ease-in-out
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
            " rows="3" type="file">
        </label>
        <label class="block">
            <span class="text-gray-700">Date and Time</span>
            <input type="date" class="
                mt-1
                block
                w-full
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
            ">
        </label>
        <div class="flex justify-end">
            <BreezeButton>
                Save
            </BreezeButton>
        </div>
    </div>
</template>