<template>
   <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Secretos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-wrap justify-center">
                    <div v-for="secret in secrets.data" :key="secret.id"
                        class="flex items-center w-1/4 m-4 p-3 bg-blue-700 rounded-lg h-24 hover:scale-105 transition cursor-default">
                        <h1 class="text-xl text-white w-full text-center font-bold">{{ secret.title }}</h1>
                    </div>
                    <pagination class="mt-6" :data="secrets" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Pagination from '@/Components/Pagination.vue'

    export default {

        components: {
            AppLayout,
            Pagination,
        },
        props: {
            secrets: Object,
        }
    }
</script>
