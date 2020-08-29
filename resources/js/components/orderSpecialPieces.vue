<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row" v-for="(element, index) in elements">
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" name="newNames[]" id="newNames" class="form-control" placeholder="ادخل صنف جديد" v-model="element.name">
                        </div>
                        <div class="form-group">
                            <input type="number" step="any" name="newPrices[]" id="newPrices" class="form-control" placeholder="ادخل السعر" v-model="element.price">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <div class="n-chk">
                                <label class="new-control new-radio radio-primary">
                                    <input type="radio" class="new-control-input" :name="'newTypes[' + index+']'" checked value="washing" v-model="element.type">
                                    <span class="new-control-indicator"></span>
                                    غسيل جاف
                                </label>
                            </div>
                            <div class="n-chk">
                                <label class="new-control new-radio radio-primary">
                                    <input type="radio" class="new-control-input" :name="'newTypes[' + index+']'" value="washingAndIron" v-model="element.type">
                                    <span class="new-control-indicator"></span>
                                    غسيل وكوي
                                </label>
                            </div>
                            <div class="n-chk">
                                <label class="new-control new-radio radio-primary">
                                    <input type="radio" class="new-control-input" :name="'newTypes[' + index+']'" value="ironed" v-model="element.type">
                                    <span class="new-control-indicator"></span>
                                    كوي فقط
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <input type="number" step="any" name="newCounts[]" min="0" class="form-control" placeholder="ادخل عدد القطعة" v-model="element.count">
                        </div>
                    </div>
                    <div class="col-1">
                        <a @click="removeRow(index)" class="btn btn-success"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="row">
                    <a class="btn btn-success" @click="addRow"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "orderSpecialPieces",
    props: ['pieces', 'old'],
    data: () => {
        return {
            elements: [],
        }
    },
    methods: {
        addRow() {
            this.elements.push({
                'piece_id': null,
                'name': '',
                'price': '',
                'type': 'washing',
                'count': 1
            });
        },
        removeRow(index) {
            this.elements.splice(index, 1);
        }
    },
    mounted() {
        if (this.old) {
            this.old.forEach((e) => {
                console.log(e)
                this.elements.push({
                    'name': e.name,
                    'price': e.price,
                    'piece_id': null,
                    'type': e.type,
                    'count': e.count
                });
            })
        }
        console.log(this.old)
    }
}
</script>

<style scoped>

</style>
