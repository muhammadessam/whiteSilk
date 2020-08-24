<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row" v-for="(element, index) in elements">
                    <div class="col-4">
                        <div class="form-group">
                            <select name="ids[]" id="ids" class="form-control" v-model="element.piece_id">
                                <option v-for="piece in pieces" :value="piece.id" v-text="piece.item"></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="n-chk">
                                <label class="new-control new-radio radio-primary">
                                    <input type="radio" class="new-control-input" :name="'types[' + index+']'" checked value="washing" v-model="element.type">
                                    <span class="new-control-indicator"></span>
                                    غسيل جاف
                                </label>
                            </div>
                            <div class="n-chk">
                                <label class="new-control new-radio radio-primary">
                                    <input type="radio" class="new-control-input" :name="'types[' + index+']'" value="washingAndIron" v-model="element.type">
                                    <span class="new-control-indicator"></span>
                                    غسيل وكوي
                                </label>
                            </div>
                            <div class="n-chk">
                                <label class="new-control new-radio radio-primary">
                                    <input type="radio" class="new-control-input" :name="'types[' + index+']'" value="ironed" v-model="element.type">
                                    <span class="new-control-indicator"></span>
                                    كوي فقط
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <input type="number" step="any" name="counts[]" class="form-control" placeholder="ادخل عدد القطعة" v-model="element.count">
                        </div>
                    </div>
                    <div class="col-2">
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
    name: "OrderPieces",
    props: ['pieces', 'clients'],
    data: () => {
        return {
            elements: [],
        }
    },
    methods: {
        addRow() {
            this.elements.push({
                'piece_id': 1,
                'type': 'washing',
                'count': 1
            });
        },
        removeRow(index) {
            this.elements.splice(index, 1);
        }
    },
    mounted() {
        Event.$on('user-selected', (data) => {
            console.log(data)
        })
    }
}
</script>

<style scoped>

</style>
