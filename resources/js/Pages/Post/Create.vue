<template>
    <PostLayout>
        <div class="mt-8 grid justify-items-center">
            <h2 class="mb-6 text-2xl"> Create a post</h2>
            <form @submit.prevent="store" class="w-1/2">
            <div class="mb-4">
                <input class="w-full rounded-2xl" v-model="post.title"  type="text"  id="text" placeholder="Post title">
                <div class="text-red-500" v-if="errors.title">{{ errors.title }}</div>
            </div>
            <div class="mb-4">
                <textarea name="content" id="content"  v-model="post.content" cols="30" rows="5" class="w-full rounded-2xl" placeholder="Content here"></textarea>
                <div class="text-red-500" v-if="errors.content">{{ errors.content }}</div>
            </div>
            <div>
                <button class="hover:bg-blue-300 hover:border-blue-300 bg-blue-700 p-2 border border-blue-700 text-white rounded-2xl block w-44 float-right" type="submit">Store</button>
            </div>
            </form>
        </div>
    </PostLayout>
</template>
<script>
import PostLayout from '../../Layouts/PostLayout.vue';
export default {
    name: "Create",
    props: [
        'errors'
    ],
    data() {
        return {
            
            post: {
                title: null,
                content: null
            }
            
        }
    },
   
    methods: {
        store() {
            this.$inertia.post('/posts', this.post)
        }
    },
    components: {
        PostLayout
    }

}
</script>