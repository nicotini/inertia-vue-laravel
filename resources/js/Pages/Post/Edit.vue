<template>
    <PostLayout>
        <div class="mt-8 grid justify-items-center">
            <h2 class="mb-6 text-2xl"> Edit  post</h2>
            <form @submit.prevent="update()" class="w-1/2">
                <div class="mb-4">
                    <input class="w-full rounded-2xl" v-model="post.title"  type="text"  id="text" placeholder="Post title">
                </div>
                <div class="mb-4">
                    <textarea name="content" id="content"  v-model="post.content" cols="30" rows="5" class="w-full rounded-2xl" placeholder="Content here"></textarea>
                </div>
                <div>
                    <button class="hover:bg-blue-300 hover:border-blue-300 bg-blue-700 p-2 border border-blue-700 text-white rounded-2xl block w-44 float-right" type="submit">Update</button>
                </div>
            </form>
        </div>
    </PostLayout>
</template>
<script>
import PostLayout from '../../Layouts/PostLayout.vue';
export default {
    name: "Edit",
    data() {
        return {
          
            
        }
    },
    methods: {
        update() {
            this.$inertia.patch(`/posts/${this.post.id}`,{title: this.post.title, content: this.post.content})
        }
    },
    props:[
        'post'
    ],
    components: {
        PostLayout
    }

}
</script>