<!--
<template>
    <div>
        <v-container class="ma-0 pa-0" grid-list-sm>
            <div class="text-right">
                <v-btn small text to="/findjobs" class="blue--text">
                    All Job <v-icon>mdi-chevron-right</v-icon>
                </v-btn>
            </div>
            <v-layout wrap>
                <v-flex v-for="(job, index) in jobs" :key="`category-`+jobs.id" xs6>
                    <v-flex v-for="(company, index) in companies" :key="`category-`+company.id" xs6>
                        <div v-if="jobs.company_id === company.company_id ">

                            <v-card :to="'/jobs/'+jobs.id">
                                <v-img :src="job.title" class="black--text">

                                    <v-card-title class="fill-height align-end" v-text="jobs.fee"></v-card-title>
                                </v-img>
                            </v-card>
                        </div>
                    </v-flex>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>

<script>
    export default {
        data: () => ({
            jobs: [],
            companies: [],
        }),
        created() {
            axios.get('api/jobs/all')
                .then((response) => {
                    let {
                        data
                    } = response.data
                    this.jobs = data.jobs
                })
                .catch((error) => {
                    let {
                        response
                    } = error
                    console.log(response)
                })
            // axios.get('api/blog/random/1')
            //     .then((response) => {
            //         let {
            //             data
            //         } = response.data
            //         this.blogs = data.blogs
            //     })
            //     .catch((error) => {
            //         let {
            //             response
            //         } = error
            //         console.log(response)

            //     })
        }
    }

</script>
-->

<template>
    <v-container fluid>
        <v-row dense>
            test
            <v-col v-for="(job, i) in jobs" :key="job.id" :cols="6">
                <v-card>
                    <v-card-title v-text="job.title"></v-card-title>
                    <h1 v-text="job.companies.companyname">
                        @{{ job.companies.companyname }}
                    </h1>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            jobs: [],
            jobtotags: []
        };
    },

    created() {
        axios.get("api/jobs/all").then(response => {
            console.log(response.data.job);
            this.jobs = response.data.job;
            this.jobtotags = response.data.jobtotag;
        });
    }
};
</script>
