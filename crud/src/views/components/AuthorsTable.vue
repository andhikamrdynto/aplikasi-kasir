<template>
  <router-link :to="{name: 'kategori.create'}" class="btn btn-md btn-success">Tambah Kategori</router-link>
  <div class="card mb-4">
    <div class="card-header pb-0">
      <h6>Kategori tables</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th
                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
              >
                Daftar Menu Id
              </th>
              <th
                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
              >
                Kategori
              </th>
              <th
                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
              >
                Action
              </th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(kategoris, index) in kategoris" :key="index">
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center ps-2">
                    <p class="text-xs text-secondary mb-0">
                      {{ kategoris.daftar_menu_id }}
                    </p>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-xs text-secondary mb-0">{{ kategoris.kategori }}</p>
              </td>
              <td class="align-middle text-center text-sm">
                <router-link
                  :to="{name: 'kategori.edit', params:{id: kategoris.id }}"
                  class="text-secondary font-weight-bold text-xs"
                  data-toggle="tooltip"
                  data-original-title="Edit user"
                  >Edit</router-link
                >
                <button @click.prevent="kategoriDelete(kategoris.id)" class="text-secondary font-weight-bold text-xs">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<style scoped>
  button{
    border: none;
    background: none;
  }
</style>

<script>
  import axios from 'axios'
  import { onMounted, ref } from 'vue'
  
  export default {
    name: "authors-table",
      setup() {
  
          //reactive state
          let kategoris = ref([])
  
          
          //mounted
          onMounted(() => {
  
              //get API from Laravel Backend
              axios.get('http://localhost:8000/api/kategoris')
              .then(response => {
                  
                //assign state posts with response data
                  kategoris.value = response.data.data
  
              }).catch(error => {
                  console.log(error.response.data)
              })
  
          })
  
          function kategoriDelete(id) {
              
              //delete data post by ID
              axios.delete(`http://localhost:8000/api/kategoris/${id}`)
              .then(() => {
                          
                  const index = this.kategoris.findIndex(kategoris => kategoris.id === id) // find the post index
                  if (~index) {
                      // if the post exists in array
                      this.kategoris.splice(index, 1)
                  }
  
              }).catch(error => {
                  console.log(error.response.data)
              })
  
          }
  
          //return
          return {
              kategoris,
              kategoriDelete
          } 
  
    }
      
  
  }
</script>
