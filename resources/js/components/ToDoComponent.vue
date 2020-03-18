<template>
    <div>
        <input type="text" class="form-control mb-2" name="todo" v-model="newTask" @keyup.enter="addTask()" placeholder="What needs to be done ?">
        <ul v-if="showTaskList.length > 0" name="" class="list-group" id="">
            <li  v-for="task in showTaskList" :key="task.id" class="list-group-item d-flex justify-content-between align-items-center">

                    <span v-if="!task.isEdit">
                        <input type="checkbox" :checked="task.isComplete" class="mr-2" @click="markTaskComplete(task)" >
                        <span v-if="!task.isComplete" @click="editTaskName(task)">{{ task.taskName }}</span>
                         <del v-if="task.isComplete" > {{ task.taskName }}</del>
                    </span>
                    <span v-if="task.isEdit" class="d-flex">
                         <input type="checkbox" :checked="task.isComplete" class="mr-2" style="margin-top: 12px;" @click="markTaskComplete(task)" >
                         <input type="text" class="form-control" :value="task.taskName" @keyup.enter="updateTaskName(task,$event)" >
                    </span>

                    <span class="badge badge-primary badge-pill" @click="deleteTask(task.id)">X</span>
            </li>
        </ul>
        <div v-if="taskList.length > 0" class="row mt-2">
            <div class="col-md-3"><label class="float-left">{{ taskList.length }} items left</label></div>
                <div class="col-md-5">
                    <Button class="btn btn-sm" :class="allListButton ? 'btn-info' : ''" @click="changeTaskListByStatus(1)">All</Button>
                    <Button class="btn btn-sm" :class="activeListButton ? 'btn-info' : ''" @click="changeTaskListByStatus(2)">Active</Button>
                    <Button class="btn btn-sm" :class="completedListButton ? 'btn-info' : ''" @click="changeTaskListByStatus(3)">Completed</Button>
                </div>
                <div class="col-md-4"><button class="btn btn-sm float-right" v-show="totalCompletedTask() > 0" @click="clearAllTask()">Clear Completed</button></div>
        </div>

    </div>
</template>

<script>

export default {

    data () {
        return {
            id: 1,
            newTask: '',
            taskList: [],
            showTaskList:[],
            allListButton:true,
            activeListButton:false,
            completedListButton:false,

        }
    },

    created(){
            Fire.$on('changedTaskList',() =>{
                this.taskListReload();
            });
    },

    methods: {

        addTask(){

            if(this.newTask == ''){
                alert('Input filed is empty!');
            }else{
                let task = {id: this.id++,taskName: this.newTask, isComplete: false }
                this.taskList.push(task);
                this.newTask = '';
                Fire.$emit('changedTaskList');
            }
        },

        editTaskName(updateTask) {
            this.showTaskList = this.taskList.map(task => {
                return task.isEdit = false;
            });
            updateTask.isEdit = true;
            this.updateTaskObject(updateTask);
        },

        updateTaskName(updateTask,event){
            updateTask.taskName = event.target.value;
            updateTask.isEdit = false;
            this.updateTaskObject(updateTask);
        },

        totalCompletedTask()
        {
            let completedTaskList = this.taskList.filter(task => task.isComplete == true);
            return completedTaskList.length;
        },

        taskListReload(){
              this.showTaskList = this.taskList;
        },

        changeTaskListByStatus(status){

            if(status == 2){
                this.showTaskList =  this.taskList.filter(task => task.isComplete == false);
                this.allListButton = false;
                this.activeListButton = true;
                this.completedListButton = false;
            }else if(status == 3){
                this.showTaskList = this.taskList.filter(task => task.isComplete == true);
                this.allListButton = false;
                this.activeListButton = false;
                this.completedListButton = true;
            }else{
                 this.showTaskList = this.taskList;
                  this.allListButton = true;
                this.activeListButton = false;
                this.completedListButton = false;
            }

        },

        deleteTask(id){
            this.taskList = this.taskList.filter(task => task.id !== id);
            Fire.$emit('changedTaskList');
        },

        markTaskComplete(updateTask){
            updateTask.isComplete = updateTask.isComplete ? false : true;
            this.updateTaskObject(updateTask);
        },

        clearAllTask(){
             this.taskList  = this.taskList.filter(task => task.isComplete !== true);
             Fire.$emit('changedTaskList');
        },

        updateTaskObject(updateTask){
            const index = this.taskList.findIndex(task => task.id === updateTask.id);

            if (index !== -1) {
                this.taskList.splice(index, 1, updateTask);
            }
            Fire.$emit('changedTaskList');
        }
    }
}
</script>
