<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row" v-for="(element, index) in elements">
                    <div class="col-4">
                        <div class="form-group">
                            <select name="ids" id="ids" class="form-control">
                                <option v-for="piece in pieces" value="piece.id" v-text="piece.item"></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">

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
    props: ['pieces'],
    data: () => {
        return {
            elements: [],
        }
    },
    methods: {
        addRow() {
            this.elements.push({
                'piece_id': '',
                'type': '',
                'count': ''
            });
        },
        removeRow(index) {
            this.elements.splice(index, 1);
        }
    },
    mounted() {
    }
}
</script>

<style scoped>

</style>
