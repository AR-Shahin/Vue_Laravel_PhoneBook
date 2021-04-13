 <template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel vue pagination - codechief.org</div>

                    <div class="card-body">
                        {{ laravelData.data }}
                        <ul>
                            <li v-for="tag in laravelData.data" :key="tag.id">{{ tag.name }}</li>
                        </ul>

 <pagination :data="laravelData" @pagination-change-page="getResults()"></pagination>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import pagination from 'laravel-vue-pagination'
    export default {
        components : {
        pagination
        },
        data() {
            return {
                laravelData: {},
            }
        },
        created() {
            this.getResults();
            console.log(this.getResults());
        },
        methods: {
            getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }

               this.$http.get('/categories?page=' + page)
                    .then(response => {
                        return response.json();
                    }).then(data => {
                        this.laravelData = data;
                    });
            }
        }
    }
</script>
