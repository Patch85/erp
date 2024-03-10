<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

let props = defineProps({
    address: {
        type: Object,
    },
    addressRoute: {
        type: String,
        required: true,
    },
    newAddress: {
        type: Boolean,
        required: true,
    },
});

let headerText = props.newAddress ? 'Add an address' : 'Update the address';

const form = useForm({
    description: props.address?.description || '',
    attention: props.address?.attention || '',
    street_1: props.address?.street_1 || '',
    street_2: props.address?.street_2 || '',
    city: props.address?.city || '',
    state: props.address?.state || '',
    postal_code: props.address?.postal_code || '',
    country_code: props.address?.country_code || '',
    route: props.addressRoute,
});

const handleSubmit = () => {
    if (props.newAddress) {
        form.post(props.addressRoute, {
            preserveScroll: true,
            onSuccess: () => {
                form.recentlySuccessful = true;
            },
        });
    } else {
        form.patch(props.addressRoute, {
            preserveScroll: true,
            onSuccess: () => {
                form.recentlySuccessful = true;
            },
        });
    }
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Address</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ headerText }}
            </p>
        </header>

        <form @submit.prevent="handleSubmit"
              class="mt-6 space-y-6">
            <div>
                <InputLabel for="description"
                            value="Description" />

                <TextInput id="description"
                           type="text"
                           class="block w-full mt-1"
                           v-model="form.description" />

                <InputError class="mt-2"
                            :message="form.errors.description" />
            </div>

            <div>
                <InputLabel for="attention"
                            value="Attention" />

                <TextInput id="attention"
                           type="text"
                           class="block w-full mt-1"
                           v-model="form.attention"
                           required />

                <InputError class="mt-2"
                            :message="form.errors.attention" />
            </div>

            <div>
                <InputLabel for="street_1"
                            value="Street Address" />

                <TextInput id="street_1"
                           type="text"
                           class="block w-full mt-1"
                           v-model="form.street_1"
                           required />

                <InputError class="mt-2"
                            :message="form.errors.street_1" />
            </div>

            <div>
                <InputLabel for="street_2"
                            value="Street Address: Line 2" />

                <TextInput id="street_2"
                           type="text"
                           class="block w-full mt-1"
                           v-model="form.street_2" />

                <InputError class="mt-2"
                            :message="form.errors.street_2" />
            </div>

            <div>
                <InputLabel for="city"
                            value="City" />

                <TextInput id="city"
                           type="text"
                           class="block w-full mt-1"
                           v-model="form.city"
                           required />

                <InputError class="mt-2"
                            :message="form.errors.city" />
            </div>

            <div>
                <InputLabel for="state"
                            value="State" />

                <TextInput id="state"
                           type="text"
                           class="block w-full mt-1"
                           v-model="form.state" />

                <InputError class="mt-2"
                            :message="form.errors.state" />
            </div>

            <div>
                <InputLabel for="postal_code"
                            value="Postal Code" />

                <TextInput id="postal_code"
                           type="text"
                           class="block w-full mt-1"
                           v-model="form.postal_code"
                           required />

                <InputError class="mt-2"
                            :message="form.errors.postal_code" />
            </div>

            <div>
                <InputLabel for="country_code"
                            value="Country Code" />

                <TextInput id="v"
                           type="text"
                           class="block w-full mt-1"
                           v-model="form.country_code"
                           required />

                <InputError class="mt-2"
                            :message="form.errors.country_code" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0">
                    <p v-if="form.recentlySuccessful"
                       class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
