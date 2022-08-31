<script setup>
    import BreezeButton from '@/Components/Button.vue';
    import { Head, Link  } from '@inertiajs/inertia-vue3';
    import { useForm } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        categories: Array,
        method: String,
        id: Number,
    });

    const form = useForm({
        name: null,
        avatar: null,
    })

    function submit() {
        if (method == 'insert') {
            form.post('/products')
        }
        else{
            form.put('/products'+id)
        }
    }

</script>
<template>
    <form @submit.prevent="submit">
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
                " placeholder="" v-model="form.name">
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
                " v-model="form.category_id"
                >
                    <option value=""></option>
                    <option v-for="category in categories" :key="category.id" value="{{ category.id }}">
                        {{ category.name }}
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
                " rows="3" v-model="form.description"></textarea>
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
                " rows="3" type="file" multiple @input="form.image = $event.target.files">
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
            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}%
            </progress>
            <div class="flex justify-end">
                <BreezeButton>
                    Submit
                </BreezeButton>
            </div>
        </div>
    </form>
</template>