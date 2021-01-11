<template>
    <div class="flex flex-col items-center">
       <div class="relative mb-8">
           <div class="w-100 h-64 overflow-hidden z-10">
               <img class="object-cover w-full" src="https://ketomamas.com/wp-content/uploads/2018/05/simon-migaj-421505-unsplash_1200x500.jpg" alt="User Background Image">
           </div>

           <div class="absolute flex items-center bottom-0 left-0 -mb-8 ml-12 z-20">
              <div class="w-32">
                  <img class="object-cover w-32 h-32 border-4 border-gray-200 rounded-full shadow-lg" src="https://user-images.githubusercontent.com/11250/39013954-f5091c3a-43e6-11e8-9cac-37cf8e8c8e4e.jpg" alt="user profile image">
              </div>

               <p class="text-2xl text-gray-100 ml-4">{{ user ? user.data.attributes.name : ''  }}</p>

           </div>
       </div>

        <p v-if="postsLoading"> Loading posts...</p>
        <Post v-else v-for="post in posts.data" :key="post.data.post_id" :post="post" />

        <p v-if="! postsLoading">No post found . Get started...</p>
    </div>
</template>

<script>
import Post from '../../components/Post';

export default {
    name: "Show",
    components : {
        Post
    },
    data : () => {
        return {
            user : null,
            posts : null,
            userLoading : true,
            postsLoading : true,
        }
    },
    mounted() {
        axios.get(`/api/users/${this.$route.params.userId}`)
            .then(res => {
                this.user = res.data;
            })
            .catch(error => {
                console.log('Unable to fetch the user from the server.');
            })
            .finally(() => {
                this.userLoading = false;
            });

        axios.get(`/api/users/${this.$route.params.userId}/posts`)
            .then(res => {
                this.posts = res.data;
            })
            .catch(error => {
                console.log('Unable to fetch posts');
            })
            .finally(() => {
                this.postsLoading = false;
            });
    }
}
</script>

<style scoped>

</style>
