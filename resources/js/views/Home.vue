<template>
    <div>
        <v-container class="ma-0 pa-0" grid-list-sm>
            <div class="text-right">
                <v-btn small text to="/campaigns" class="blue--text">
                    all Campaigns <v-icon>mdi-chevron-right</v-icon>
                </v-btn>
            </div>
            <v-layout wrap>
                <v-flex v-for="(campaign, index) in campaigns" :key="`category-`+campaign.id" xs6>
                    <v-card :to="'/campaigns/'+campaign.id">
                        <v-img :src="campaign.campaign_photo" class="black--text">

                            <v-card-title class="fill-height align-end" v-text="campaign.title"></v-card-title>
                        </v-img>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
        <v-container class="ma-0 pa-0" grid-list-sm>
            <div class="text-right">
                <v-btn small text to="/blogs" class="blue--text">
                    All Blog <v-icon>mdi-chevron-right</v-icon>
                </v-btn>
            </div>

            <v-layout wrap>
                <v-carousel hide-delimiters height="250px">
                    <v-carousel-item v-for="(blog, i) in blogs" :key="`blog-`+blog.id" xs6>
                        <v-img :src="blog.blog_photo" class="fill--height">
                            <v-container fill-height align-end>
                                <v-layout fill-height align-end>
                                    <v-flex xs12 mx-2>

                                        <span class="headline white--text" v-text="blog.blog_title"></span>

                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-img>
                    </v-carousel-item>
                </v-carousel>
            </v-layout>
        </v-container>
    </div>
</template>

<script>
    export default {
        data: () => ({
            jobs: [],
            blogs: [],
        }),
        created() {
            axios.get('api/campaign/random/2')
                .then((response) => {
                    let {
                        data
                    } = response.data
                    this.campaigns = data.campaigns
                })
                .catch((error) => {
                    let {
                        response
                    } = error
                    console.log(response)
                })
            axios.get('api/blog/random/1')
                .then((response) => {
                    let {
                        data
                    } = response.data
                    this.blogs = data.blogs
                })
                .catch((error) => {
                    let {
                        response
                    } = error
                    console.log(response)

                })
        }
    }

</script>
