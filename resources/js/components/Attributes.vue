<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row" v-for="(element, index) in elements">
                    <div class="col-4">
                        <div class="form-group">
                            <input name="keys[]" type="text" class="form-control" placeholder="ادخل الاسم ... " v-model="element.key">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input name="values[]" type="text" class="form-control" placeholder="ادخل القيمة ... " v-model="element.value">
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
    props: ['attributes'],
    data: function () {
        return {
            elements: [],
        }
    },
    methods: {
        removeRow: function (index) {
            this.elements.splice(index, 1)
        },
        addRow: function (event) {
            let newElement = {
                key: '',
                value: '',
            }
            this.elements.push(newElement);
        }
    },
    mounted() {
        this.elements = this.attributes;
    }
}
</script>
