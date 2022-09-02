<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>Tambah Kategori</h4>
                        <hr>

                        <form @submit.prevent="store">
                            <div class="form-group">
                                <label for="title" class="font-weight-bold">Daftar menu id</label>
                                <input type="number" class="form-control" v-model="kategoris.daftar_menu_id" placeholder="Masukkan Daftar Menu">
                                <!-- validation -->
                                <div v-if="validation.daftar_menu_id" class="mt-2 alert alert-danger">
                                    {{ validation.daftar_menu_id[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="font-weight-bold">Kategori</label>
                                <input type="text" class="form-control" v-model="kategoris.kategori" placeholder="Masukkan Kategori">
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
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
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

        //method store
        function store() {

            let daftar_menu_id   = kategoris.daftar_menu_id
            let kategori = kategoris.kategori

            axios.post('http://localhost:8000/api/kategoris', {
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
            store
        }

    }

}
</script>

<style>
    body{
        background: lightgray;
    }
</style>