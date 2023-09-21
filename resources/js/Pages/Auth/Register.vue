<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    first_name: '',
    middle_name: '',
    last_name: '',
    display_name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="first_name"
                            value="First Name" />

                <TextInput id="first_name"
                           type="text"
                           class="block w-full mt-1"
                           v-model="form.first_name"
                           required
                           autofocus
                           autocomplete="first_name" />

                <InputError class="mt-2"
                            :message="form.errors.first_name" />
            </div>

            <div>
                <InputLabel for="middle_name"
                            value="Middle Name" />

                <TextInput id="middle_name"
                           type="text"
                           class="block w-full mt-1"
                           v-model="form.middle_name"
                           autocomplete="middle_name" />

                <InputError class="mt-2"
                            :message="form.errors.middle_name" />
            </div>

            <div>
                <InputLabel for="last_name"
                            value="Last Name" />

                <TextInput id="last_name"
                           type="text"
                           class="block w-full mt-1"
                           required
                           v-model="form.last_name"
                           autocomplete="last_name" />

                <InputError class="mt-2"
                            :message="form.errors.last_name" />
            </div>

            <div>
                <InputLabel for="display_name"
                            value="Display Name" />

                <TextInput id="display_name"
                           type="text"
                           class="block w-full mt-1"
                           required
                           v-model="form.display_name"
                           autocomplete="display_name" />

                <InputError class="mt-2"
                            :message="form.errors.display_name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email"
                            value="Email" />

                <TextInput id="email"
                           type="email"
                           class="block w-full mt-1"
                           v-model="form.email"
                           required
                           autocomplete="username" />

                <InputError class="mt-2"
                            :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password"
                            value="Password" />

                <TextInput id="password"
                           type="password"
                           class="block w-full mt-1"
                           v-model="form.password"
                           required
                           autocomplete="new-password" />

                <InputError class="mt-2"
                            :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation"
                            value="Confirm Password" />

                <TextInput id="password_confirmation"
                           type="password"
                           class="block w-full mt-1"
                           v-model="form.password_confirmation"
                           required
                           autocomplete="new-password" />

                <InputError class="mt-2"
                            :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')"
                      class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                Already registered?
                </Link>

                <PrimaryButton class="ml-4"
                               :class="{ 'opacity-25': form.processing }"
                               :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
