<script>

import EditTask from '@/Components/EditTask.vue';
import {mapActions, mapGetters} from 'vuex'

export default {
    components:{EditTask: EditTask},
    data(){
        return {
            updateVisible: false,
            showVisible: false,
            updateItem: 0,
            showId: 0
        }
    },
    methods:{
        ...mapActions({loadTasks:'tasks/loadTasks', deleteTask:'tasks/deleteTask'}),
        ...mapGetters({getTasks: 'tasks/getTasks'}),
    },
    computed:{
        tasks(){
            return this.getTasks();
        }
    },
    created() {
        this.loadTasks();
    }
}
</script>

<template>
    <div class="container text-center">
        <div class="float-end">
            <br><button type="button" class="btn btn-success" @click="updateVisible=true; updateItem={};">New Task</button>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Severity</th>
                <th scope="col">User</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <tr v-for="(item) in tasks.result">
                <th scope="row">{{item.id}}</th>
                <td>{{ item.name }}</td>
                <td>{{item.severity}}</td>
                <td>{{item.user.name}}</td>
                <td>{{item.description}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-danger" @click="deleteTask(item.id)">Delete</button>
                        <button type="button" class="btn btn-success" @click="updateItem=item; updateVisible=true">Edit</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <EditTask v-if="updateVisible" :is-open="updateVisible" :task="updateItem" @close="updateVisible=false; updateItem={};" ></EditTask>

</template>
