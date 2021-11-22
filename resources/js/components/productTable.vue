<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <h3>Products List</h3>
                <table class="table table-striped">
                    <thead>
                        <tr class="line">
                            <td><strong>Id</strong></td>
                            <td class="text-center">
                                <strong>Description</strong>
                            </td>
                            <td class="text-center"><strong>Price</strong></td>
                            <td class="text-right"><strong>Qty</strong></td>
                            <td class="text-right"><strong>Amount</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in products" :key="index">
                            <td>1</td>
                            <td>
                                <strong>{{ item.title }}</strong
                                ><br />
                                <span>{{ item.description }}</span>
                            </td>
                            <td class="text-center">${{ item.price }}</td>
                            <td class="text-center">
                                <input
                                    type="number"
                                    min="1"
                                    v-model="item.cach"
                                    @click="
                                        jqueryScripts(
                                            item.id,
                                            item.cach,
                                            item.price
                                        )
                                    "
                                    @keydown="
                                        jqueryScripts(
                                            item.id,
                                            item.cach,
                                            item.price
                                        )
                                    "
                                    @keyup="
                                        jqueryScripts(
                                            item.id,
                                            item.cach,
                                            item.price
                                        )
                                    "
                                />
                            </td>
                            <td class="text-right">
                                <input
                                    type="text"
                                    :id="'productNumber' + item.id"
                                    :value="item.price"
                                    readonly
                                />
                            </td>
                            <td>
                                <button
                                    class="btn btn-success"
                                    @click.prevent="
                                        addProduct(item.id, item.cach)
                                    "
                                >
                                    Add
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br />
                <div class="pull-right" style="width=25%">
                    <table class="table col-sm-3">
                        <thead>
                            <tr>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Tax(5%)</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>${{this.amountData['Subtotal']}}</td>
                                <td>${{this.amountData['Tax']}}</td>
                                <td>${{this.amountData['Total']}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
export default {
    props: ["products"],

    name: "productTable",
    data() {
        return {
            qty: 1,
            amountData:[],
        };
    },
    methods: {
        addProduct(proId, numbers) {
            axios
                .post("addProductForUser", {
                    productId: proId,
                    qty: numbers,
                })
                .then((response) => {
                    console.log(response);
                    if (response.data == "ok!") {
                        Swal.fire({
                            icon: "success",
                            title: "<strong>" + "OK!" + "</strong>",
                            text: "product added successfully!",
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    } else {
                        Swal.fire({
                            icon: "warning",
                            title:
                                "<strong>" + "product updated!" + "</strong>",
                            text: "product updated successfully!",
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                })
                .catch((error) => console.error(error.data));
                this.getAmountData();
        },
        jqueryScripts(prodId, number, price) {
            $(document).ready(() => {
                $("#productNumber" + prodId).val(number * price);
            });
        },
        getAmountData(){
            axios.get("getUserAmountData").then(response=>{
                console.log(response);
                this.amountData=response.data;
                }).catch(error=>console.error(error));
        }
    },
    computed: {
        amountPrice(number, price) {
            return price * number;
        },
    },
    mounted() {
        this.getAmountData();
    },
};
</script>

<style scoped></style>
