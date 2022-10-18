<template>
    <PostLayout>
        <div  class="mt-8 grid justify-items-center">
        <div v-if="post" class="w-1/2">
            <div>
                <div class="mb-4">Id: {{ post.id }}</div>
                <div class="mb-4 text-2xl">  {{ post.title }}</div>
                <div class="mb-4">{{ post.content }}</div>
                
                <div class="flex justify-between">
                    <Link :href="route('post.index')" class="hover:bg-blue-300 hover:border-blue-300 bg-blue-700 p-2 border border-blue-700 text-white rounded-2xl block w-44  text-center">Back to all posts</Link>
                    <Link :href="route('post.edit', post.id)" class="hover:bg-blue-300 hover:border-blue-300 bg-blue-700 p-2 border border-blue-700 text-white rounded-2xl block w-44  text-center">Edit</Link>
                </div>
                
            </div>
        </div>
    </div>
    </PostLayout>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
import PostLayout from '../../Layouts/PostLayout.vue';
export default {
    name: "Show",
    data() {
        return {
            
        }
    },
    props: [
        'post'
    ],
    components: {
        Link,
        PostLayout
    }
    
}
</script>