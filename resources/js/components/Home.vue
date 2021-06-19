<template>
    <div>
        <nav class="mt-5" >
        <h1 class="text-3xl text-center mb-5">Vuejs Phonebook</h1>
        <hr>
        <div class="flex w-1/2 m-auto mt-3">
            <div class="flex-auto">
            <div>
                <input class="shadow p-2 border-success border" type="text" placeholder="Search" v-model="searchQuery">
                <span class="bg-pink-600 text-white p-3 rounded-sm">
                    <i class="fa fa-search"></i>
                </span>
            </div>
            </div>
            <div class="flex-auto">
                <button class="px-3 py-2 bg-purple-900 text-white rounded-sm" @click="openAddNewModal">
               <i class="fa fa-plus mr-1"></i> Add New
                </button>
            </div>
        </div>

        <table class="w-1/2 m-auto mt-5 border-t-2 border-red-900">
            <thead>
                <tr class="bg-green-200 p-5 text-center">
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="notFound">
                    <td colspan="2" class="w-full text-center border border-pink-800 py-3 shadow-sm"><span class="text-red-500">Data Not Found!</span></td>
                </tr>
                <tr class="border-2 w-1/4 h-12 p-2 mb-2" v-for="(item,i) in temp" :key="item.email" >
                    <td><span class="ml-2">{{ item.name }}</span></td>
                    <td class="mx-2 text-center mb-2">
                        <span class="bg-purple-800 p-3 rounded-sm w-12 h-10 text-white" @click="viewDataByModal(i)">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                        <span class="bg-green-800 p-3 rounded-sm w-12 h-10 text-white"  @click="editDataByModal(i)">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                        </span>
                        <span class="bg-red-800 p-3 rounded-sm w-12 h-10 text-white" @click="deleteRow(item.id,i)">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
	</nav>
    <Modal v-if="isModalOpen" @close-add-new-modal="openAddNewModal"></Modal>
    <ViewModal v-if="isViewModalOpen" @close-view-modal="openViewModal" :data='singleData'></ViewModal>
    <EditModal v-if="isEditModalOpen" @close-edit-modal="openEditModal" :data='singleData'></EditModal>
    </div>
</template>

<script>
import Modal from './Modal'
import ViewModal from './ViewModal'
import EditModal from './EditModal'
    export default {
        data (){
            return {
                isModalOpen : false,
                isViewModalOpen : false,
                isEditModalOpen : false,
                lists : [],
                temp : [],
                data : {
                    name : '',email : '',phone : ''
                    },
                singleData : '',
                searchQuery : '',
                notFound : false
            }
        },
        components : {
            Modal,ViewModal,EditModal

        },
        methods : {
            notFoundMethod(){
                this.notFound = !this.notFound
            },
            openAddNewModal(){
                this.isModalOpen = !this.isModalOpen
            },
            openViewModal(){
                this.isViewModalOpen = !this.isViewModalOpen
            },
            openEditModal(){
                this.isEditModalOpen = !this.isEditModalOpen
            },
            viewDataByModal(id){
                this.openViewModal()
                this.singleData = this.temp[id]
            },
            editDataByModal(id){
                this.openEditModal()

                this.singleData = this.temp[id]
            },
            deleteRow(id,key){
                const swalWithBootstrapButtons = this.$swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`phone/${id}`)
                    .then((res) => {
                        this.lists.splice(key,1)
                    })
                    swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === this.$swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                    )
                }
                })
            },
            setSwalAlert(icon,title,text){
                 this.$swal.fire({
                    icon: icon,
                    title: title,
                    text: text,
                 });
            }
        },
        mounted() {
            axios.get('get-all-phone')
            .then((response) => {
                this.lists = this.temp =  response.data

            })

            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },
		watch:{
			searchQuery(){
                if(this.temp.length === 0){
                        this.notFoundMethod()
                    }
				if (this.searchQuery.length > 0) {
					this.temp = this.lists.filter((item) => {
						return Object.keys(item).some((key)=>{
							let string = String(item[key])
							return string.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
							//console.log(string)
						})
					});
					// console.log(result)
                    if(this.temp.length === 0){
                        this.notFoundMethod()
                    }else{

                    }
				}
                else{
					this.temp = this.lists
				}
			}
		},
    }
</script>

<style lang="scss" scoped>

</style>
