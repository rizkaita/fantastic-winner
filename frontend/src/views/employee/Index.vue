<template>
<div class="page-wrapper">
  <div class="container-xl">
    <div class="page-header d-print-none">
      <div class="row align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Management
          </div>
          <h2 class="page-title">
            HRD
          </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            <router-link :to="{name : 'employee.create'}" class="btn btn-primary d-none d-sm-inline-block">
            <!-- <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report"> -->
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
              Add new Employee
            </router-link>
            <router-link :to="{name : 'employee.create'}" class="btn btn-primary d-sm-none btn-icon">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
      <div class="col-12">
        <!-- <router-link :to="{
          name : 'employee.create'
        }" class="btn btn-outline-primary shadow ">Add
        </router-link> -->

        <div class="card shadow my-4">
          <div class="card-header">
            <h3>Employee List</h3>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
              <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Department Name</td>
                <td>Start Date</td>
                <td>End Date</td>
                <td>Action</td>
              </tr>
              </thead>
              <tbody>
              <tr v-if="employees.length==0">
                <td colspan="7" class="text-center">No data</td>
              </tr>
              <tr v-for="(employee , index) in employees" :key="index">
                <td>{{ employee.first_name + ' ' + employee.last_name }}</td>
                <td>{{ employee.email }}</td>
                <td>{{ employee.phone_number }}</td>
                <td>{{ employee.department_name }}</td>
                <td>{{ start_date(employee.start_date) }}</td>
                <td>{{ end_date(employee.end_date) }}</td>
                <td>
                  <div class="btn-group">
                    <router-link :to="{
                      name : 'employee.edit' ,
                      params : {id :employee.id}
                    }" class="btn btn-sm btn-outline-info shadow-sm m-1">Edit
                    </router-link>

                    <button type="button" class="btn btn-sm btn-outline-danger shadow-sm m-1" @click.prevent="onDelete(employee.id, index)">Delete</button>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  data(){
    return {
      employees : []
    }
  },

  methods :{
    start_date(start_date){
      return  moment(start_date ).format('DD-MMM-YYYY')
    },
    end_date(end_date){
      if (end_date == null) {
        return '-';
      }
      return  moment(end_date ).format('DD-MMM-YYYY');
    },
    async onDelete(id , index){
      let result = await this.showDeleteConfirmation();
      console.log("tes");
      console.log(result);
      if(!result.isConfirmed){
        return;
      }
      this.axios.delete(`api/employee/${id}`)
          .then((result) => {
            if (result.data.success) {
              this.$swal('Success', 'Success deleting data.' ,'success');
              this.employees.splice(index, 1);
            }else{
              this.$swal('Failed' , result.data.message , 'error')
            }
          }).catch((error) => {
        console.log(error);
      })
    },
    async showDeleteConfirmation(){
      return await this.$swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon : 'error',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#087cec',
        confirmButtonText: 'Delete'
      });
    },
    async getEmployees(){
      this.axios.get('api/employees')
          .then((result) => {
            if (result.data.success) {
              this.employees = result.data.data;
            }
          }).catch((error) => {
        console.log(error);
      })
    },
  },
  mounted(){
    this.getEmployees();
  }

}
</script>