<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Safezone</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <back-buttton></back-buttton> <h2 class="box-title">Create</h2>
                            </div>

                            <google-map />

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="lat">Latitude *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="lat"
                                            placeholder="Enter Latitude *"
                                            :value="item.lat"
                                            @input="updateLat"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="lng">Longitude *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="lng"
                                            placeholder="Enter Longitude *"
                                            :value="item.lng"
                                            @input="updateLng"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="address">Address *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="address"
                                            placeholder="Enter Address *"
                                            :value="item.address"
                                            @input="updateAddress"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="place_name">Place name *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="place_name"
                                            placeholder="Enter Place name *"
                                            :value="item.place_name"
                                            @input="updatePlace_name"
                                            >
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'
import GoogleMap from "../../GoogleMaps"

export default {
    components: {
        GoogleMap
    },
    data() {
        return {
            msg: "",
        }
    },
    computed: {
        ...mapGetters('SafezonesSingle', ['item', 'loading'])
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('SafezonesSingle', ['storeData', 'resetState', 'setLat', 'setLng', 'setAddress', 'setPlace_name']),
        updateLat(e) {
            this.setLat(e.target.value)
        },
        updateLng(e) {
            this.setLng(e.target.value)
        },
        updateAddress(e) {
            this.setAddress(e.target.value)
        },
        updatePlace_name(e) {
            this.setPlace_name(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({name: 'safezones.index'})
                    this.$eventHub.$emit('create-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    },
}
</script>


<style scoped>

</style>
