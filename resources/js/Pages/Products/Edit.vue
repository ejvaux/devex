<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import BreezeButton from '@/Components/Button.vue';
    import BreezeInput from '@/Components/Input.vue';
    import BreezeInputError from '@/Components/InputError.vue';
    import BreezeLabel from '@/Components/Label.vue';
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';   
    import { Inertia } from '@inertiajs/inertia'

    const props = defineProps({
        product: Object,
        categories: Array
    })
    const form = useForm({
        name: props.product.name,
        category_id: props.product.category_id,
        description: props.product.description,
        image: null,
        datetime: props.product.datetime,
    });
    const submit = () => {
        Inertia.post('/products/'+props.product.id, {
            _method: 'put',
            name: form.name,
            category_id: form.category_id,
            description: form.description,
            image: form.image,
            datetime: form.datetime,
        })
        //form.post('/products/'+props.product.id);
    };
</script>

<template>
    <Head title="Product Edit" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Product
            </h2>
        </template>
        <div class="py-3">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <Link href="/products" class="mt-1">
                        <BreezeButton type="button">
                            Back
                        </BreezeButton>
                    </Link>
                </div>
                <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- ======================= -->
                        <form @submit.prevent="submit">
                            <div>
                                <BreezeLabel for="name" value="Name" />
                                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autocomplete="product-name" />
                                <BreezeInputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="category_id" value="Category" />
                                <select id="category_id" class="
                                    mt-1
                                    block
                                    w-full
                                    rounded-md
                                    border-gray-300
                                    shadow-sm
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                                " v-model="form.category_id" required autocomplete="product-category_id"
                                >
                                    <option value=""></option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                                <BreezeInputError class="mt-2" :message="form.errors.category_id" />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="description" value="Description" />
                                <textarea class="
                                    mt-1
                                    block
                                    w-full
                                    rounded-md
                                    border-gray-300
                                    shadow-sm
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                                " rows="3" v-model="form.description" required autocomplete="product-description"></textarea>
                                <BreezeInputError class="mt-2" :message="form.errors.description" />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="image" value="Image" />
                                <input id="image" class="
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
                                <BreezeInputError class="mt-2" :message="form.errors.image" />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="datetime" value="Date and time" />
                                <BreezeInput id="datetime" type="datetime-local" class="mt-1 block w-full" v-model="form.datetime" required autocomplete="product-datetime" />
                                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                    {{ form.progress.percentage }}%
                                </progress>
                                <BreezeInputError class="mt-2" :message="form.errors.datetime" />
                            </div>                            
                            <div class="flex items-center justify-end mt-4">
                                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Submit
                                </BreezeButton>
                            </div>
                        </form>
                        <!-- ======================= -->
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
