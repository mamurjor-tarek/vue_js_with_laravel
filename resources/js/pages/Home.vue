<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home Component</div>

                    <div class="card-body">
                        <carousel :items-to-show="1.5">
                            <slide v-for="slide in 10" :key="slide">
                            {{ slide }}
                            </slide>

                            <template #addons>
                            <navigation />
                            <pagination />
                            </template>
                        </carousel>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
    export default {
        name: 'App',
        components: {
            Carousel,
            Slide,
            Pagination,
            Navigation,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
