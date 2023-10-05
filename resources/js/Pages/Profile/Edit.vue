<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from "@inertiajs/vue3";

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});
</script>

<template>
    <Head title="Profile" />

    <!-- <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
        </template> -->
    <div class="flex justify-center">
        <Link href="/dashboard">
        <h1 class="text-gray-700 text-4xl italic font-black pt-10">
            <p>Vocabulary</p>
            <p>For</p>
            <p>IELTS</p>
        </h1>
        </Link>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white">
                <UpdateProfileInformationForm
                    :must-verify-email="mustVerifyEmail"
                    :status="status"
                    class="max-w-xl mx-auto"
                />
            </div>

            <div class="p-4 sm:p-8 bg-white">
                <UpdatePasswordForm class="max-w-xl  mx-auto" />
            </div>

            <div class="sm:p-8 bg-white text-center">
                <DeleteUserForm class="" />
            </div>
        </div>
    </div>
    <!-- </AuthenticatedLayout> -->
</template>
