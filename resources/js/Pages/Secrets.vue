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
                    <div v-for="secret in secrets.data" :key="secret.id" @click="
                        modalOpen = true;
                        selectedSecret = secret
                        showSecret(secret.id)

                    "
                        class="flex items-center w-1/4 m-4 p-3 bg-blue-700 rounded-lg h-24 hover:scale-105 transition cursor-default">
                        <h1 class="text-xl text-white w-full text-center font-bold">{{ secret.title }}</h1>
                    </div>
                    <pagination class="mt-6" :data="secrets" />
                </div>
            </div>
        </div>
        <dialog-modal :show="modalOpen">
            <template #title>{{ selectedSecret.title }}</template>
            <template #content>
                {{ secretText }}
            </template>
            <template #footer>
                <primaryButton @click="modalOpen = false">cerrar</primaryButton>
            </template>
        </dialog-modal>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from '@/Components/Pagination.vue'
import DialogModal from '@/Components/DialogModal.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { Inertia } from '@inertiajs/inertia'

export default {
    props: {
        secrets: Object,

    },
    data() {
        return {
            modalOpen: false,
            selectedSecret: Object,
            secretText: String,
        }
    },
    components: {
        AppLayout,
        Pagination,
        DialogModal,
        PrimaryButton,
    },
    methods: {
        showSecret: function (id) {

            let url = route('secret.show', id)

            axios.get(url)
                .then(response => {
                    console.log(response.data[0].secret_text);
                    this.secretText = response.data[0].secret_text
                })
                .catch(error => {
                    console.log(error);
                });

            //TODO:lo ideal seria hacerlo desde el back-end pero me falta tiempo para averiguarlo
            setTimeout(() => this.modalOpen = false, 5000);

        }
    }
}
</script>
