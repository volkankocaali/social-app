<template>
    <div class="flex flex-col items-center py-4">
        <NewPost/>
        <p v-if="loading"> Loading posts...</p>
        <Post v-else v-for="post in posts.data" :key="post.data.post_id" :post="post" />
    </div>
</template>

<script>
import NewPost from "../components/NewPost";
import Post from '../components/Post';

export default {
    name: "NewsFeed",

    components : {
        NewPost,
        Post
    },

    data : () => {
     return {
         posts : [],
         loading : true,
     }
    },

    mounted() {
        axios.get("/api/posts")
        .then(res => {
            this.loading = false;
            this.posts = res.data;
        })
        .catch(error => {
            this.loading = false;
            console.log('Unable to fetch posts');
        });
    }
}
</script>

<style scoped>

</style>
