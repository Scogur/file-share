<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { PostForm, type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { Textarea } from '@/components/ui/textarea'
import PlaceholderPattern from '../../components/PlaceholderPattern.vue';
import { FileInput } from 'lucide-vue-next';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create Post',
        href: '/posts',
    },
];

const form = useForm<PostForm>({
    title: 'title',
    file: null,
});

const submit = () => {
    form.post(route('posts.store'));
};

const handleFileInput = (e: Event) => {
    const target = e.target as HTMLInputElement;
    const file = target.files?.[0];
    if (file) {
        form.title = file.name;
        form.file = file;
    }
}

</script>

<template>

    <Head title="Create Post" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <form @submit.prevent="submit" class="flex flex-col gap-6">
                <div class="grid gap-6">
                    <div class="grid gap-2">
                        <Label for="file">File</Label>
                        <Input id="file" type="file" required :tabindex="2" @change="handleFileInput"/>
                        <InputError :message="form.errors.file" />
                    </div>

                    <Button type="submit" class="mt-4 w-full" :tabindex="4" :disabled="form.processing">
                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                        Create
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
