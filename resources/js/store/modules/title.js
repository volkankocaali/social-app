const state = {
    title: 'Welcome',
};

const getters = {
    pageTitle : state => {
        return state.title;
    }
};

const actions = {
    setPageTitle({commit,state},title){
        commit('setTitle',title);
    }
};

const mutations = {
    setTitle(state,title){
        state.title = title + '| SocialApp'
    }
};

export default {
    state,getters,actions,mutations,
}
