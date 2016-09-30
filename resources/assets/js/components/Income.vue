<template>
    <div class="child income">
        <div class="header header-title header-positive" v-on:click="toggleDisplay">Income</div>

        <span v-show="display">
            <validator name="validation1">
                <div class="errors">
                    <p v-if="$validation1.name.required && $validation1.name.modified">A name is required.</p>
                    <p v-if="$validation1.amount.required && $validation1.amount.modified">An amount is required.</p>
                    <p v-if="$validation1.amount.pattern && $validation1.amount.modified">Amount needs to be a number.</p>
                </div>
                <div class="form-holder">
                    <input type="text" name="incomeName" v-model="name" id="incomeItem" placeholder="Add Item" v-validate:name="{required: true}" />
                    <input type="number" name="incomeAmount" v-model="amount" id=incomeAmount" placeholder="Add Amount" v-validate:amount="{required: true, pattern:'/(0|[1-9][0-9]*)$/'}" />
                    <button v-on:click="add" v-if="$validation1.valid">Add</button>
                </div>
            </validator>

            <div v-if="items.length > 0">
                <table class="items-table">
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                    </tr>
                    <tr v-for="item in items">
                        <td>{{ item.name }}</td>
                        <td>{{ item.amount }}</td>
                        <td><span class="glyphicon glyphicon-remove remove-button" aria-hidden="true" v-on:click="removeItem($index)"></span></td>
                    </tr>
                </table>
            </div>
        </span>
    </div>
</template>

<script>
    export default {
        name: 'Income',

        data() {
            return {
                name: '',
                amount: '',
                items: [],
                display: true
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

                this.$dispatch('income-total', total);
            },
            toggleDisplay: function () {
                if (this.display == true) {
                    this.display = false;
                } else {
                    this.display = true;
                }
            }
        }
    }
</script>
