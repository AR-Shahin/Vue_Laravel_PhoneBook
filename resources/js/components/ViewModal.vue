<template>
    <div>
<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="$emit('close-view-modal')"></div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-2xl leading-6 font-bold text-gray-900 text-center mb-2">
             View <b class="text-pink-900">{{data.name}}'s</b> Data
            </h3>
            <form>
              <div class="mt-2">

                <div class="flex ">
                    <div class="flex-auto">
                      <table  class="m-auto mt-5 border-t-2 border-red-900 " style="width:300px">
                        <tr class="border-2 w-screen h-12 p-2 mb-2">
                          <td class="border-r-2 border-gray-300"> <span>Name </span></td>
                          <td class="pl-2">
                           {{ data.name }}
                          </td>
                        </tr>
                          <tr class="border-2 w-screen h-12 p-2 mb-2">
                          <td class="border-r-2 border-gray-300">  <span>Email  </span></td>
                          <td class="pl-2">
                           {{ data.email }}
                          </td>
                        </tr>
                          <tr class="border-2 w-screen h-12 p-2 mb-2">
                          <td class="border-r-2 border-gray-300"> <span>Phone  </span></td>
                          <td class="pl-2">
                           {{ data.phone }}
                          </td>
                        </tr>
                      </table>
                    </div>
                </div>

                <button class="px-3 py-2 bg-yellow-500 text-white rounded-sm mt-4"
              @click.prevent="$emit('close-view-modal')"
                >
                 <i class="fa fa-times mr-1"></i> Close Modal
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
        props : ['data'],
      data(){
        return {
            list : {},
            errors : {}
        }
      },
      methods : {
          closeAddNewModal(){
              this.$emit('close-add-new-modal')
          }
      },
      mounted(){

      }
    }
</script>

<style lang="scss" scoped>

</style>
