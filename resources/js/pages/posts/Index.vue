<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Post, type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table'
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Files',
        href: '/posts',
    },
];

export type Post = {
    id: number;
    title: string;
    file: string;
    slug: string;
}

defineProps<{posts: Post[]}>();

</script>

<template>

    <Head title="Files" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <div class="flex justify-end">
                <Link href="/posts/create" class="text-indigo-500 hover:text-indigo-600">Add file</Link>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                <Table>
                    <TableCaption>A list of your recent files.</TableCaption>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-[100px]">
                                ID
                            </TableHead>
                            <TableHead>Title</TableHead>
                            <TableHead class="text-right">
                                Link
                            </TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="post in posts" :key="post.id">
                            <TableCell class="font-medium">
                                {{post.id}}
                            </TableCell>
                            <TableCell>{{post.title}}</TableCell>
                            <TableCell class="text-right">
                                <a :href="post.file" download>Download</a>
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
