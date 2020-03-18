<template>

<div class="fade-in-up">

    <page-header :mainTitle="'Task List'" :isButtonShow="true" :addItem="addTask"></page-header>

    <div class="page-content">
        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Responsive Table</div>
                    </div>
                    <div class="ibox-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="50px"></th>
                                        <th>Project</th>
                                        <th>Department</th>
                                        <th>Task</th>
                                        <th>Assing Date</th>
                                        <th>Assignee</th>
                                        <th>Executor</th>
                                        <th>Deadline</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="task in showTaskList" :key="task.id">
                                        <td>
                                            <label class="ui-checkbox">
                                                <input type="checkbox">
                                                <span class="input-span"></span>
                                            </label>
                                        </td>
                                        <td>iphone case</td>
                                        <td>iphone case</td>
                                        <td>iphone case</td>
                                        <td>$1200</td>
                                        <td>33%</td>
                                        <td>02/08/2017</td>
                                        <td>
                                            <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button>
                                            <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>

     <!-- Event Detail Dialog-->
                    <div class="modal fade" id="add-task">
                        <div class="modal-dialog" role="document">
                            <form class="modal-content form-horizontal" action="javascript:;">
                                <div class="modal-header bg-silver-100">
                                    <h4 class="modal-title">Edit Event</h4>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title:</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="event-title" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row" id="date_1">
                                        <label class="col-sm-2 col-form-label">Start:</label>
                                        <div class="col-sm-10">
                                            <div class="input-group datepicker date">
                                                <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                                <input class="form-control" id="event-start" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">End:</label>
                                        <div class="col-sm-10">
                                            <div class="input-group datepicker date">
                                                <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                                <input class="form-control" id="event-end" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Color:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="event-color">
                                                <option value="bg-blue">Blue</option>
                                                <option value="bg-red">Red</option>
                                                <option value="bg-green">Green</option>
                                                <option value="bg-orange">Orange</option>
                                                <option value="bg-silver">Silver</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <label class="ui-checkbox ui-checkbox-info">
                                                <input id="event-allDay" type="checkbox">
                                                <span class="input-span"></span>All Day</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-info" id="editEventButton" type="submit">Save</button>
                                    <button class="btn btn-danger" id="deleteEventButton" type="button" data-dismiss="modal">Delete</button>
                                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Event Detail Dialog-->


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
            $('#add-task').modal('show');
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
