<template>
    <div class="child expenses">
        <div class="header-title header-negative">Expenses</div>

        <div class="form-holder">
            <input type="text" name="incomeName" v-model="name" id="incomeItem" placeholder="Add Item" />
            <input type="text" name="incomeAmount" v-model="amount" id=incomeAmount" placeholder="Add Amount" />
            <button v-on:click="add">Add</button>
        </div>

        <div v-if="items.length > 0">
            <table class="items-table">
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                </tr>
                <tr v-for="item in items">
                    <td>{{ item.name }}</td>
                    <td>{{ item.amount }}</td>
                    <td><button v-on:click="removeItem($index)" class="remove-button">X</button></td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'Expense',

        data() {
            return{
                name: '',
                amount: '',
                items: []
            }
        },
        methods: {
            add: function (e) {
                let holdItems = {};
                holdItems.name = this.name;
                holdItems.amount = this.amount;

                this.items.push(holdItems);
                this.name = '';
                this.amount = '';
                this.updateTotal();
            },
            removeItem: function (item) {
                this.items.splice(item, 1);
                this.updateTotal();
            },
            updateTotal: function () {
                let total = 0;
                this.items.forEach(item => {
                    total += parseInt(item.amount);
                });

                this.$dispatch('expenses-total', total);
            }
        }
    }
</script>
