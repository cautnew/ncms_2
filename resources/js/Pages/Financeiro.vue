<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/Inputs/InputError.vue';
import InputLabel from '@/Components/Inputs/InputLabel.vue';
import TextInput from '@/Components/Inputs/TextInput.vue';
import DangerButton from '@/Components/Buttons/DangerButton.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import { Head, useForm } from '@inertiajs/vue3';
import BodySimpleCard from '@/Components/BodySimpleCard.vue';

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const submitForm = () => {
    form.post(route('ncms.password.update'));
};
</script>

<template>

  <Head title="Financeiro" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Financeiro Pessoal</h2>
    </template>

    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <BodySimpleCard>
          <form @submit.prevent="submitForm" class="space-y-6">
            <div>
              <InputLabel for="what_doing" value="Valor novo" />
              <TextInput id="what_doing" name="what_doing" modelValue="0,00"></TextInput>
            </div>
            <div>
              <InputLabel for="store_id" value="Valor novo" />
              <select
                id="store_id"
                name="store_id"
                class="block mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
              <option value="compostagem">Compostagem</option>
              <option value="eletricidade">Eletricidade</option>
              <option value="tool">Ferrramenta</option>
              </select>
            </div>
            <div class="flex justify-end">
              <DangerButton :disabled="form.processing" class="me-2">Cancel</DangerButton>
              <PrimaryButton :disabled="form.processing">Add</PrimaryButton>
            </div>
          </form>
        </BodySimpleCard>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
