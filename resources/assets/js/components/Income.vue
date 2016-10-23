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
                    <input type="text" name="incomeName" v-model="name" id="incomeItem" placeholder="Salary" v-validate:name="{required: true}" />
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
                        <td><input
                                type='name'
                                name='income-name-edit'
                                id='income-name-edit'
                                class='update-fields'
                                value='{{ item.name }}'
                                v-on:keyup.enter='editName($index, $event)'
                            /></td>
                        <td><input
                                type='number'
                                name='income-amount-edit'
                                id='income-amount-edit'
                                class='update-fields'
                                value='{{ parseInt(item.amount) }}'
                                v-on:keyup.enter='editAmount($index, $event)'
                        /></td>
                        <td><span class="glyphicon glyphicon-remove remove-button" aria-hidden="true" v-on:click="removeItem($index)"></span></td>
                    </tr>
                </table>
            </div>
        </span>
    </div>
</template>

<script>
    import request from 'superagent';

    export default {
        name: 'Income',

        data() {
            return {
                name: '',
                amount: '',
                identifier: '',
                items: [],
                display: true
            }
        },
        ready: function () {
            this.initialLoad();
        },
        methods: {
            add: function (e) {
                let holdItems = {};
                holdItems.name = this.name;
                holdItems.amount = this.amount;

                request
                        .post('/add-income')
                        .set('X-CSRF-TOKEN', Laravel.csrfToken)
                        .send({name: this.name, amount: this.amount})
                        .accept('json')
                        .end(function (err, response) {
                            if (err || !response.ok) {
                                this.$notice(error.body.error, 'error');
                            } else {
                                this.$notice(response.body.success, 'success');
                                holdItems.identifier = response.body.identifier;

                                this.items.push(holdItems);

                                this.name = '';
                                this.amount = '';
                                this.identifier = '';
                                this.updateTotal();
                            }
                        }.bind(this));
            },
            removeItem: function (item) {
                let itemId = this.items[item].identifier;

                request
                        .post('/remove-income')
                        .set('X-CSRF-TOKEN', Laravel.csrfToken)
                        .send({item: itemId})
                        .accept('json')
                        .end(function (err, response) {
                            if (err || !response.ok) {
                                this.$notice(err.body.error, 'error');
                            } else {
                                this.$notice(response.body.success, 'success');

                                this.items.splice(item, 1);
                                this.updateTotal();
                            }
                        }.bind(this));
            },
            updateTotal: function () {
                let total = 0;
                this.items.forEach(item => {
                   total += parseFloat(item.amount);
                });

                this.$dispatch('income-total', total);
            },
            toggleDisplay: function () {
                if (this.display == true) {
                    this.display = false;
                } else {
                    this.display = true;
                }
            },
            editAmount: function (index, e) {
                let amount = e.target.value;
                let item = this.items[index];
                item = Object.assign({}, item, {amount: amount});

                request
                        .post('/edit-income')
                        .set('X-CSRF-TOKEN', Laravel.csrfToken)
                        .send({id: item.identifier, name: item.name, amount: item.amount})
                        .accept('json')
                        .end(function (err, response) {
                            if (err || !response.ok) {
                                this.$notice(error.body.error, 'error');
                            } else {
                                this.$notice(response.body.success, 'success');
                                this.items = [];
                                this.initialLoad();
                            }
                        }.bind(this));

            },
            editName: function (index, e) {
                let name = e.target.value;
                let item = this.items[index];
                item = Object.assign({}, item, {name: name});

                request
                        .post('/edit-income-name')
                        .set('X-CSRF-TOKEN', Laravel.csrfToken)
                        .send({id: item.identifier, name: item.name, amount: item.amount})
                        .accept('json')
                        .end(function (err, response) {
                            if (err || !response.ok) {
                                this.$notice(error.body.error, 'error');
                            } else {
                                this.$notice(response.body.success, 'success');
                                this.items = [];
                                this.initialLoad();
                            }
                        }.bind(this));

            },
            initialLoad: function () {
                request
                        .get('/get-income')
                        .set('X-CSRF-TOKEN', Laravel.csrfToken)
                        .accept('json')
                        .end(function (err, response) {
                            if (response.body.income.length > 0) {
                                response.body.income.forEach((income) => {
                                    this.items = [];
                                    let holdItems = {};
                                    holdItems.name = income.name;
                                    holdItems.amount = income.amount;
                                    holdItems.identifier = income.id;
                                    this.items.push(holdItems);
                                    this.updateTotal();
                                });
                            }
                        }.bind(this));
            }
        }
    }
</script>
