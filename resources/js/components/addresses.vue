<template>
    <div>
        <div class="form-group">
            <label class="font-weight-bold" for="client_id">العميل</label>
            <select name="client_id" class="form-control" id="client_id" @change="updateAddress()" v-model="selectedId">
                <option v-for="client in clients" :value="client.id">{{ client.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label class="font-weight-bold" for="address_id">العنوان</label>
            <select name="address_id" class="form-control" id="address_id" v-model="selectedAddress">
                <option v-for="address in addresses" :value="address.id">{{ address.name }} => {{ address.city.name }} - {{ address.area.name }}</option>
            </select>
        </div>
    </div>
</template>

<script>
export default {
    name: "addresses",
    props: ['clients', 'selectedaddressid', 'selectedclientid'],
    data: function () {
        return {
            selectedId: '',
            selectedAddress: '',
            addresses: []
        }
    },
    methods: {
        updateAddress() {
            this.addresses = this.clients.filter((client) => {
                return this.selectedId == client.id;
            })[0].addresses;
            Event.$emit('user-selected', this.selectedId);
        }
    },
    mounted() {

        if (this.selectedclientid != '' && this.selectedclientid != undefined) {
            this.selectedId = this.clients.filter((client) => {
                return this.selectedclientid == client.id;
            })[0].id;
            this.addresses = this.clients.filter((client) => {
                return this.selectedId == client.id;
            })[0].addresses;
            this.selectedAddress = this.selectedaddressid;
        } else {
            this.selectedId = this.clients[0].id;
            this.addresses = this.clients.filter((client) => {
                return this.selectedId == client.id;
            })[0].addresses;
        }
        Event.$emit('user-selected', this.selectedId);
        console.log(this.selectedId)
    }
}
</script>

<style scoped>

</style>
