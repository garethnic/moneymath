<template>
    <div class="app">
        <income></income>
        <expense></expense>
        <div class="child overview">
            <div class="header header-title header-overview" v-on:click="toggleDisplay">Overview</div>
            <div>
                <span v-show="display">
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
                </span>
            </div>
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
                expenses: 0,
                display: true
            }
        },
        methods: {
            toggleDisplay: function () {
                if (this.display == true) {
                    this.display = false;
                } else {
                    this.display = true;
                }
            }
        },
        computed: {
          leftOver: function () {
              let summary = this.income - this.expenses;
              return summary.toFixed(2);
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
