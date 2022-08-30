<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import BreezeButton from '@/Components/Button.vue';
    import { Head, Link  } from '@inertiajs/inertia-vue3';
    const props = defineProps({
        products: Array
    })
</script>

<template>
    <Head title="Products" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex">
                    <input type="text" class="
                        mr-4
                        rounded-md
                        border-gray-300
                        shadow-sm
                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50                  
                    " placeholder="Search">

                    <select class="
                        rounded-md
                        border-gray-300
                        shadow-sm
                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                    "                        
                    >
                    <option value="" selected>All Categories</option>
                    <option v-for="product in products" :key="product.id" value="{{ product.category }}">
                        {{ product.category }}
                    </option>
                    </select>
                    <div class="grow"></div>
                    <Link href="/products/create" class="mt-1">
                        <BreezeButton type="button">
                            Create
                        </BreezeButton>
                    </Link>
                </div>
                <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- ======================= -->
                        <table class="table table-auto">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Description</th>       
                                    <th scope="col">Date and Time</th>                             
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in products" :key="product.id">
                                    <td>{{ product.id }}</td>
                                    <td>{{ product.name }}</td>
                                    <td>{{ product.category }}</td>
                                    <td>{{ product.description }}</td>
                                    <td>{{ product.datetime }}</td>
                                    <td><img src="{{product.image}}" class="h-12 w-12 rounded" /></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- ======================= -->
                    </div>
                </div>                
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
    