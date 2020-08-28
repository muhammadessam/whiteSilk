<template>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label class="font-weight-bold" for="type">نوع الفاتورة</label>
                <select name="type" id="type" class="form-control" v-model="type">
                    <option value="اشتراك">اشتراك</option>
                    <option value="فاتورة">فاتورة</option>
                    <option value="فاتورة خاصة">فاتورة خاصة</option>
                </select>
            </div>
            <div class="row" v-if="type == 'اشتراك'">
                <div class="col">
                    <div class="form-group">
                        <label class="font-weight-bold" for="type">حدد الاشتراك</label>
                        <select name="subscription_id" id="subscription_id" class="form-control" v-model="subscription">
                            <option v-for="subscription in selectedUser.subscriptions" :value="subscription.pivot.id" v-text="subscription.name"></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" v-if="type =='فاتورة'">
                <div class="col">
                    <div class="form-group">
                        <label class="font-weight-bold" for="payment_method_id">وسيلة الدفع</label>
                        <select name="payment_method_id" id="payment_method_id" class="form-control" v-model="payment">
                            <option v-for="payment in payments" :value="payment.id" v-text="payment.name"></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" v-if="type =='فاتورة خاصة'">
                <div class="col">
                    <div class="form-group">
                        <label class="font-weight-bold" for="one_time_product">ادخل نوع جديد من القطع وضع السعر في مجموع الفاتورة</label>
                        <input type="text" name="one_time_product" id="one_time_product" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "orderType",
    props: ['clients', 'payments', 'oldtype', 'oldpayment', 'oldsubscription'],

    data: function () {
        return {
            type: 'اشتراك',
            selectedUser: '',
            payment: 0,
            subscription: 0,
        }
    },

    methods: {},
    mounted() {
        if (this.oldtype)
            this.type = this.oldtype;
        if (this.oldpayment)
            this.payment = this.oldpayment;
        if (this.oldsubscription)
            this.subscription = this.oldsubscription;
    },
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
