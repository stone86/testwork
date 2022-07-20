<script>

import {mapActions, mapGetters} from 'vuex'

export default {
    props:{
        isOpen: false,
        task: false
    },
    data(){
        return {
            severity: ['normal', 'important', 'alarm']
        }
    },
    methods:{
        ...mapActions({createTask:'tasks/createTask', updateTask:'tasks/updateTask', loadUsers:'users/loadUsers'}),
        ...mapGetters({getUsers:'users/getUsers'}),
        updateOrCreate(){
            if(this.task.id > 0)
                this.update();
            else
                this.create();
        },
        create(){
            this.createTask(this.task);
        },
        update(){
            this.updateTask(this.task);
        }
    },
    computed:{
        users(){
            return this.getUsers();
        }
    },
    mounted() {
      this.loadUsers();
    },
    emits: ['close']
}

</script>

<template>
    <!-- Modal -->
    <div class="modal fade show"  v-if="isOpen" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: block">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{task.id > 0 ? 'Edit task '+task.id : 'New task'}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="$emit('close'); isOpen=false;"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Name</label>
                        <input type="name" class="form-control" id="nameInput" placeholder="name" v-model="task.name">
                    </div>
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Severity</label>
                        <select class="form-select" aria-label="Severity" v-model="task.severity">
                            <option v-for="item in severity" :value="item">{{item}}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">User</label>
                        <select class="form-select" aria-label="User" v-model="task.user_id">
                            <option v-for="item in users.result" :value="item.id">{{item.name}}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="descriptionInput" rows="5" v-model="task.description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="$emit('close'); isOpen=false;">Close</button>
                    <button type="button" class="btn btn-primary" @click="this.updateOrCreate()">Save</button>
                </div>
            </div>
        </div>
    </div>

</template>
