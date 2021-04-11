<template>
    <div>
<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="closeAddNewModal"></div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-2xl leading-6 font-bold text-gray-900 text-center mb-2">
              Add New Phonebook
            </h3>
            <form @submit.prevent="addDataInDatabase()">
              <div class="mt-2">
                <div class="flex">
                    <div class="flex-auto">
                      <table>
                        <tr>
                          <td> <span>Name : </span></td>
                          <td>
                           <div>
                                <input type="text" class="border-2 border-gray-200 rounded-sm py-1 " placeholder="Enter Name" v-model="list.name" :class="{'border-red-500' : errors.name}">
                           </div>
                            <span class="text-red-500 d-block" v-if="errors.name">{{errors.name[0]}}</span>
                          </td>
                        </tr>
                      </table>
                    </div>
                </div>
                <div class="flex my-3">
                    <div class="flex-auto">
                        <table>
                            <tr>
                                <td>
                                  <span>Email : </span>
                                </td>
                                <td>
                                    <div>
                                        <input type="email" class="border-2 border-gray-200 rounded-sm py-1" placeholder="Enter Email" v-model="list.email" :class="{'border-red-500' : errors.email}">
                                    </div>
                                    <span class="text-red-500" v-if="errors.email">{{errors.email[0]}}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-auto">
                        <table>
                          <tr>
                            <td> <span>Phone : </span></td>
                            <td>
                              <div>
                                  <input type="text" class="border-2 border-gray-200 rounded-sm py-1" placeholder="Enter Phone" v-model="list.phone" :class="{'border-red-500' : errors.phone}">
                              </div>
                              <span class="text-red-500" v-if="errors.phone">{{errors.phone[0]}}</span>
                            </td>
                          </tr>
                      </table>
                    </div>
                </div>
                <button class="px-3 py-2 m-auto bg-purple-500 text-white rounded-sm mt-2"
              type="submit"
                >
                 <i class="fa fa-store mr-1"></i> Add New Data
                  </button>
              </div>
            </form>
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
      data(){
        return {
            list : {
              name : '',email : '',phone : ''
            },
            errors : {}
        }
      },
      methods : {
          closeAddNewModal(){
              this.$emit('close-add-new-modal')
          },
          addDataInDatabase(){
            axios.post('phone', this.list)
            .then((response) => {
                this.closeAddNewModal()
                this.$parent.setSwalAlert('success','Success','Data Save Successfully!')
                this.$parent.lists.push(response.data)
                this.$parent.lists.sort(function(a,b){
					if (a.name > b.name) {
						return 1;
					}else if(a.name < b.name){
						return -1;
					}
					})
               // console.log(response);
            })
            .catch((error) => this.errors = error.response.data.errors)
          }
      }
    }
</script>

<style lang="scss" scoped>

</style>
