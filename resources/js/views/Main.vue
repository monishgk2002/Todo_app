<template>
    <div class="container page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card px-3">
                        <div class="card-body">
                            <h4 class="card-title">My Todo list</h4>

                            <div class="add-items d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?" v-model="text">
                                <button @click="createTodo" class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
                            </div>

                            <div class="list-wrapper">
                                <ul class="d-flex flex-column todo-list">

                                    <li v-for="(todo, index) in todos" :key="index" :class="[todo.status ? 'completed' : '']">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input @change="updateCheck(todo.id, todo.status)" class="checkbox" type="checkbox" v-model="todo.status">
                                                {{ todo.text }} <i class="input-helper"></i>
                                            </label>
                                        </div>
                                        <i @click="deleteTodo(todo.id)" class="remove mdi mdi-close-circle-outline"></i>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            todos: [],
            text: null
        }
    },
    methods: {
        getTodos() {
            this.$axios.post('/todos')
                .then(res => {
                    this.todos = res.data;
                }).catch(error => console.log(error));
        },
        createTodo() {
            this.$axios.post('/todo', {text: this.text})
                .then(res => {
                    if(res.data.success) {
                        this.todo = null

                        this.getTodos();
                    }
                }).catch(error => console.log(error));
        },
        updateCheck(id, status) {
            this.$axios.post(`/todo/check/${id}`, {status: status})
                .then(res => {
                    if(res.data.success) {
                        this.getTodos();
                    }
                })
        },
        deleteTodo(id) {
            this.$axios.delete(`/todo/delete/${id}`)
                .then(res => {
                    if(res.data.success) {
                        this.getTodos();
                    }
                }).catch(error => console.log(error));
        }
    },
    created() {
        this.getTodos();
    }
}
</script>