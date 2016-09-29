<template>
    <div class="app">
        <income></income>
        <expense></expense>
        <div class="child overview">
            <table class="overview-table">
                <tr>
                    <th>Item</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>Income</td>
                    <td>{{ income }}</td>
                </tr>
                <tr>
                    <td>Expenses</td>
                    <td>{{ expenses }}</td>
                </tr>
                <tr>
                    <td>Net</td>
                    <td>{{ leftOver }}</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    import Income from './Income.vue';
    import Expense from './Expenses.vue';

    export default {
        data() {
            return {
                income: 0,
                expenses: 0
            }
        },
        methods: {

        },
        computed: {
          leftOver: function () {
              return this.income - this.expenses;
          }
        },
        components: {
            'income': Income,
            'expense': Expense
        },
        events: {
            'income-total': function (total) {
                this.income = total;
            },
            'expenses-total': function (total) {
                this.expenses = total;
            }
        }
    }
</script>
