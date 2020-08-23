<template>
    <div>
        <div class="form-group">
            <label class="font-weight-bold" for="user_id">العميل</label>
            <select name="user_id" class="form-control" id="user_id" @change="updateAddress()" v-model="selectedId">
                <option v-for="client in clients" :value="client.id">{{ client.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label class="font-weight-bold" for="address_id">العنوان</label>
            <select name="address_id" class="form-control" id="address_id">
                <option v-for="address in addresses" :value="address.id">{{ address.name }} => {{address.city.name}} - {{address.area.name}}</option>
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
            addresses: []
        }
    },
    methods: {
        updateAddress() {
            this.addresses = this.clients.filter((client)=>{
               return this.selectedId  == client.id;
            })[0].addresses;
        }
    },
    mounted() {
        if (this.selectedclientid != '' && this.selectedclientid != undefined){

            this.selectedId = this.clients.filter((client)=>{
                return this.selectedclientid  == client.id;
            })[0].id;
            this.addresses = this.clients.filter((client)=>{
                return this.selectedId  == client.id;
            })[0].addresses;
        }else{
            this.selectedId = this.clients[0].id;
            this.addresses = this.clients.filter((client)=>{
                return this.selectedId  == client.id;
            })[0].addresses;
        }
    }
}
</script>

<style scoped>

</style>
