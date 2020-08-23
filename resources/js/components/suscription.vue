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

                    <div class="form-group" v-if="price">
                        <label for="price" class="font-weight-bold">السعر الذي سوف يحسب للعميل</label>
                        <input type="number" step=".1" class="form-control" id="price" name="added_credit">
                    </div>

                    <div class="form-group" v-if="piece">
                        <label for="pieces" class="font-weight-bold">عددالقطع المتاحة</label>
                        <input type="number" step=".1" name="pieces" class="form-control" id="pieces">
                    </div>

                    <div class="form-group" v-if="date">
                        <label for="days" class="font-weight-bold">عددالايام</label>
                        <input type="number" name="days" id="days" class="form-control">
                    </div>
                    <div class="form-group" v-if="date">
                        <label for="piece" class="font-weight-bold">ادخل عدد القطع بصفر ان كان عدد القطع غير محدود</label>
                        <input type="number" name="pieces" id="piece" class="form-control">
                    </div>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "suscription",
    data: () => {
        return {
            type: 'قطعة',
            piece: true,
            date: false,
            price: false,
        }
    },
    methods: {
        changeView() {
            if (this.type == 'قطعة') {
                this.piece = true;
                this.date = false;
                this.price = false;
            } else if (this.type == 'تاريخ') {
                this.piece = false;
                this.date = true;
                this.price = false;
            } else {
                this.piece = false;
                this.date = false;
                this.price = true;
            }
        }
    }

}
</script>

<style scoped>

</style>
