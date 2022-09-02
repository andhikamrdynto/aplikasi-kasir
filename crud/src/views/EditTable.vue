 <template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>Edit Kategori</h4>
                        <hr>

                        <form @submit.prevent="update">
                            <div class="form-group">
                                <label for="title" class="font-weight-bold">Daftar Menu Id</label>
                                <input type="number" class="form-control" v-model="kategoris.daftar_menu_id" placeholder="Masukkan Daftar menu id">
                                <!-- validation -->
                                <div v-if="validation.daftar_menu_id" class="mt-2 alert alert-danger">
                                    {{ validation.daftar_menu_id[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="font-weight-bold">Kategori</label>
                                <input type="text" class="form-control" v-model="kategoris.kategori">
                                <!-- validation -->
                                <div v-if="validation.kategori" class="mt-2 alert alert-danger">
                                    {{ validation.kategori[0] }}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios from 'axios'

export default {

    setup() {

        //state posts
        const kategoris = reactive({
            daftar_menu_id: '',
            kategori: ''
        })

        //state validation
        const validation = ref([])

        //vue router
        const router = useRouter()

        //vue router
        const route = useRoute()

        //mounted
        onMounted(() => {

            //get API from Laravel Backend
            axios.get(`http://localhost:8000/api/kategoris/${route.params.id}`)
            .then(response => {
                
              //assign state posts with response data
                kategoris.daftar_menu_id = response.data.data.daftar_menu_id  
                kategoris.kategori = response.data.data.kategori

            }).catch(error => {
                console.log(error.response.data)
            })

        })

        //method update
        function update() {

            let daftar_menu_id = kategoris.daftar_menu_id
            let kategori = kategoris.kategori

            axios.put(`http://localhost:8000/api/kategoris/${route.params.id}`, {
                daftar_menu_id: daftar_menu_id,
                kategori: kategori
            }).then(() => {

                //redirect ke post index
                router.push({
                    name: 'Tables'
                })

            }).catch(error => {
                //assign state validation with error 
                validation.value = error.response.data
            })

        }

        //return
        return {
            kategoris,
            validation,
            router,
            update
        }

    }

}
</script>

<style>
    body{
        background: lightgray;
    }
</style>