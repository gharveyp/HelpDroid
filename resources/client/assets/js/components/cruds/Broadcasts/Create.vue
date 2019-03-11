<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Broadcast Message</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Create</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="message"
                                            placeholder="Enter Message *"
                                            :value="item.message"
                                            @input="updateMessage"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="severity">Severity</label>
                                    <v-select
                                            name="severity"
                                            @input="updateSeverity"
                                            :value="item.severity"
                                            :options="severityEnum"
                                            />
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

export default {
    data() {
        return {
            // Code...
        }
    },
    computed: {
        ...mapGetters('BroadcastsSingle', ['item', 'loading', 'severityEnum'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('BroadcastsSingle', ['storeData', 'resetState', 'setMessage', 'setSeverity']),
        updateMessage(e) {
            this.setMessage(e.target.value)
        },
        updateSeverity(value) {
            this.setSeverity(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'broadcasts.index' })
                    this.$eventHub.$emit('create-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
