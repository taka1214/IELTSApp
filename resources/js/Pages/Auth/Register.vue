<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    building: '',
    gender: '',
    age: 0,
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <div class="h-12"></div>
        <h2 class="text-lg font-semibold text-center pb-8">NEW ACCOUNT</h2>

        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <div class="flex justify-between">
                    <InputLabel for="name" value="NAME" />
                    <p class="text-xs text-gray-400">※お名前は適当でOKです！</p>
                </div>
                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Nickname"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <div class="flex justify-between">
                    <InputLabel for="email" value="EMAIL" />
                    <p class="text-xs text-gray-400 w-11/12 text-right">※実際のメールアドレスじゃなくてもいいですが、ログイン前のパスワード変更メールが送れなくなります</p>
                </div>

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                    placeholder="Email"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="PASSWORD" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                    placeholder="Password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="CONFIRM PASSWORD" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm Password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="bg-gray-50 text-gray-600 text-sm">
                <p class="text-sm text-center py-4">※下記の登録情報はこの単語のサイトを無料で公開するため、
                    どんな人が使っているか気になったので
                    アンケートとしてご登録いただければ幸いです🙏<br>
                    任意の登録のためここはスキップして登録でもOKです
                </p>
                <div class="py-2">
                    <input type="radio" name="building" value="A" v-model="form.building"> A棟&nbsp; &nbsp;
                    <input type="radio" name="building" value="B" v-model="form.building"> B棟
                </div>

                <div class="py-2">
                    <input type="radio" name="gender" value="male" v-model="form.gender"> 男&nbsp; &nbsp;
                    <input type="radio" name="gender" value="female" v-model="form.gender"> 女&nbsp; &nbsp;
                    <input type="radio" name="gender" value="neither" v-model="form.gender"> 未回答
                </div>

                <div class="py-2">
                    <select name="gender" v-model="form.age" class="h-6 text-sm py-0 border-gray-600 focus:border-gray-900 focus:ring-gray-900 rounded shadow-myShadow">
                        <option value="0" disabled>年齢を選択</option>
                        <option value="1">~ 19歳</option>
                        <option value="2">20 ~ 29歳</option>
                        <option value="3">30 ~ 39歳</option>
                        <option value="4">40 ~ 49歳</option>
                        <option value="5">50歳 ~ </option>
                    </select>
                </div>

            </div>

            <div class="flex items-center flex-col mt-4">
                <PrimaryButton class="text-sm py-4 underline" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    REGISTER
                </PrimaryButton>
                <Link
                    :href="route('login')"
                    class="underline text-md py-5 underline text-gray-600 hover:text-gray-900 rounded-md"
                >
                    Already registered?
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
