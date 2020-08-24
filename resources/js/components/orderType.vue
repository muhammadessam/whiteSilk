<template>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label class="font-weight-bold" for="type">نوع الفاتورة</label>
                <select name="type" id="type" class="form-control" v-model="type">
                    <option value="اشتراك">اشتراك</option>
                    <option value="منفصلة">منفصلة</option>
                </select>
            </div>
            <div class="row" v-if="type=='اشتراك'">
                <div class="col">
                    <div class="form-group">
                        <label class="font-weight-bold" for="type">حدد الاشتراك</label>
                        <select name="subscription_id" id="subscription_id" class="form-control">
                            <option v-for="subscription in selectedUser.subscriptions" :value="subscription.pivot.id" v-text="subscription.name"></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" v-if="type=='منفصلة'">
                <div class="col">
                    <div class="form-group">
                        <label class="font-weight-bold" for="payment_method_id">حدد الاشتراك</label>
                        <select name="payment_method_id" id="payment_method_id" class="form-control">
                            <option v-for="payment in payments" :value="payment.id" v-text="payment.name"></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "orderType",
    props: ['clients', 'payments'],

    data: function () {
        return {
            type: 'اشتراك',
            selectedUser: '',
        }
    },

    methods: {},
    created() {
        Event.$on('user-selected', (data) => {
            this.selectedUser = this.clients.filter((client) => {
                return client.id == data;
            })[0];
        });
    }
}
</script>

<style scoped>

</style>
