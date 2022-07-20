
export default {
    namespaced: true,
    state: {
        users:{}
    },
    getters: {
        getUsers(state){
            return state.users;
        }
    },
    mutations:{
        setUsers(state, payload){
            state.users = payload
        }
    },
    actions:{
        async loadUsers({commit}){
            axios.get(route('api.v1.userList')).then(responce=>{
                commit('setUsers', responce.data);
            });
        },
    }
}
