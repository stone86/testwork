
export default {
    namespaced: true,
    state: {
        tasks:{}
    },
    getters: {
        getTasks(state){
            return state.tasks;
        }
    },
    mutations:{
        setTasks(state, payload){
            state.tasks = payload
        }
    },
    actions:{
        async loadTasks({commit}){
            axios.get(route('api.v1.tasks')).then(responce=>{
                commit('setTasks', responce.data);
            });
        },
        async deleteTask({commit, dispatch}, id){
            axios.delete(route('api.v1.tasks.delete', {'id':id})).then(responce=>{
                dispatch('loadTasks')
            }).catch(e=>{
                console.log(e);
            });
        },
        async updateTask({commit, dispatch}, payload){
            axios.post(route('api.v1.tasks.update', {'id':payload.id}), payload).then(responce=>{
                dispatch('loadTasks')
            }).catch(e=>{
                console.log(e);
            });
        },
        async createTask({commit, dispatch}, payload){
            axios.post(route('api.v1.tasks.add'), payload).then(responce=>{
                dispatch('loadTasks')
            }).catch(e=>{
                console.log(e);
            });
        }
    }
}
