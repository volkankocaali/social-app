// state

const state = {
    user : null,
    userStatus : null,
};

// getters dataları çektiğimiz yer.
// örnek : authUser.data.user_id

const getters = {
    authUser : state => {
        return state.user;
    }
};

// Gerçekleşecek işlemler actions'da yer alır.

const actions = {
    fetchAuthUser({commit,state}){
        axios.get('/api/auth-user')
            .then(res => {
                commit('setAuthUser',res.data);
            })
            .catch(error => {
                console.log('Unable to fetch auth user');
            });
    }
};
const mutations = {
    setAuthUser(state,user){
        state.user = user;
    }
};
export default {
    state,getters,actions,mutations
}
