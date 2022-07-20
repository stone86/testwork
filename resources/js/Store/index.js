import { createStore } from 'vuex';
import tasks from './tasks'
import users from './users'


const store = createStore({
   modules: {tasks, users}
})

export default store
