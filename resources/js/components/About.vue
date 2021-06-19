 <template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-3xl my-3 text-center">Pagination</div>

                    <div class="container mx-auto">
                        <ul>
                            <li v-for="category in laravelData.data" :key="category.id" class="bg-red-100 p-3 mb-2">{{ category.name }}</li>
                        </ul>
                       <pagination :data="laravelData" @pagination-change-page="getResults" :limit="5" :align="center">
              <div class="container bg-black">
                                  <div class="flex flex-col items-center my-12">
    <div class="flex text-gray-700">
        <div class="h-12 w-12 mr-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer" slot="prev-nav">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-6 h-6">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </div>

        <div class="h-12 w-12 ml-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer" slot="next-nav">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-6 h-6">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </div>
    </div>
</div>
           </div>
                  </pagination>
                    </div>
                </div>
            </div>
        </div>

    </div>

     <!-- <div class="flex h-12 font-medium rounded-full bg-gray-200">
            <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">1</div>
            <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full bg-teal-600 text-white ">2</div>
            <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">3</div>
            <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">...</div>
            <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">13</div>
            <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">14</div>
            <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full  ">15</div>
            <div class="w-12 h-12 md:hidden flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-teal-600 text-white">2</div>
        </div>
        -->
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                laravelData: [],
            }
        },
        created() {
            this.getResults();
        },
        methods: {
            getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
            // axios.get('categories').then((res) => {
            //     console.log(res);
            // })

                axios.get('/categories?page=' + page)
                    .then((res) => {
                        console.log(res.data);
                        this.laravelData = res.data
                    })
            }
        }
    }
</script>
