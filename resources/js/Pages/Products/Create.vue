<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';    
    import BreezeProductForm from '@/Components/ProductForm.vue';
    import BreezeButton from '@/Components/Button.vue';
    import { Head, Link  } from '@inertiajs/inertia-vue3';
    const props = defineProps({
        products: Array
    })
</script>

<template>
    <Head title="Products Create" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Product
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
                        <BreezeProductForm></BreezeProductForm>              
                        <!-- ======================= -->
                    </div>
                </div>                
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
    