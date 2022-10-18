<template>
    <PostLayout>
        <div  class="mt-8 grid justify-items-center">
       
       <Link :href="route('post.create')" class="hover:bg-blue-300 hover:border-blue-300 bg-blue-700 p-2 border border-blue-700 text-white rounded-2xl block w-44  text-center">Create Post</Link>
        <div v-if="posts" class="w-1/2">
            <div v-for="post in posts">
                <div class="border-b-2 border-black mb-6 pb-4">
                    <div class="mb-4">Id: {{ post.id }}</div>
                <h3 class="mb-4 text-2xl">  {{ post.title }}</h3>
                <div class="mb-4">{{ post.content }}</div>
                <div  class="mb-8 italic flex justify-end">
                    <p>{{ post.date}}</p>
                </div>
                
                <div class="flex justify-between">
                    <div>
                        <Link :href="route('post.show', post.id)" class="hover:bg-blue-300 hover:border-blue-300 bg-blue-700 p-2 border border-blue-700 text-white rounded-2xl block w-44  text-center">show post</Link>
                    </div>
                    
                    <div>
                        <p @click="deletePost(post.id)" class="hover:bg-red-300 hover:border-red-300 cursor-pointer bg-red-500 p-2 border border-red-500 text-white rounded-2xl block w-44  text-center">Delete</p>
                </div>
                    </div>
                    
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
    name: "Index",
    data() {
        return {
            
        }
    },
    props: [
        'posts'
    ],
    methods: {
        deletePost(id) {
            this.$inertia.delete(`posts/${id}`)
        }
    },
    components: {
        Link,
        PostLayout
    }
    
}
</script>