<template>
    <div class="row">
        <div class="col">

            <div class="form-group">
                <label class="font-weight-bold" for="type">النوع</label>
                <select name="type" id="type" class="form-control" v-model="type" @change="changeView()">
                    <option value="قطعة">بالقطعة</option>
                    <option value="تاريخ">تاريخ محدد</option>
                    <option value="مبلغ">مبلغ</option>
                </select>
            </div>

            <div class="row">
                <div class="col">

                    <div class="form-group" v-if="type=='مبلغ'">
                        <label for="price" class="font-weight-bold">السعر الذي سوف يحسب للعميل</label>
                        <input type="number" step=".1" class="form-control" id="price" name="added_credit" v-model="added_credit">
                    </div>

                    <div class="form-group" v-if="type=='قطعة'">
                        <label for="pieces" class="font-weight-bold">عددالقطع المتاحة</label>
                        <input type="number" step=".1" name="pieces" class="form-control" id="pieces" v-model="pieces">
                    </div>

                    <div class="form-group" v-if="type=='تاريخ'">
                        <label for="days" class="font-weight-bold">عددالايام</label>
                        <input type="number" name="days" id="days" class="form-control" v-model="days">
                    </div>
                    <div class="form-group" v-if="type=='تاريخ'">
                        <label for="piece" class="font-weight-bold">ادخل عدد القطع بصفر ان كان عدد القطع غير محدود</label>
                        <input type="number" name="pieces" id="piece" class="form-control" v-model="pieces">
                    </div>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "suscription",
    props: ['oldtype', 'olddays', 'oldpieces', 'oldadded_credit'],
    data: () => {
        return {
            type: 'قطعة',
            days: '',
            pieces: '',
            added_credit: '',
        }
    },
    methods: {},
    mounted() {
        if (this.oldtype) {
            this.type = this.oldtype;
        }
        if (this.olddays) {
            this.days = this.olddays;
        }
        if (this.oldpieces) {
            this.pieces = this.oldpieces;
        }
        if (this.oldadded_credit) {
            this.added_credit = this.oldadded_credit;
        }
    }

}
</script>

<style scoped>

</style>
