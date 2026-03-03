<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('transactions.update', $transaction) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Customer</label>
                                <select name="customer_id" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}"
                                            {{ (old('customer_id', $transaction->customer_id) == $customer->id) ? 'selected' : '' }}>
                                            {{ $customer->name }} ({{ $customer->email }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('customer_id')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Invoice</label>
                                <select id="invoice_id" name="invoice_id" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">-- none --</option>
                                    @foreach($invoices as $invoice)
                                        <option value="{{ $invoice->id }}"
                                            data-property-id="{{ $invoice->property_id }}"
                                            data-property-title="{{ $invoice->property->title }}"
                                            data-amount="{{ $invoice->amount_due }}"
                                            {{ (old('invoice_id', $transaction->invoice_id) == $invoice->id) ? 'selected' : '' }}>
                                            {{ $invoice->code }} - ₱{{ number_format($invoice->amount_due,2) }}
                                            @if($invoice->due_date) - due {{ $invoice->due_date->format('M d') }}@endif
                                        </option>
                                    @endforeach
                                </select>
                                @error('invoice_id')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div id="property_section">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Property</label>
                                <select id="property_id" name="property_id" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Property</option>
                                    @foreach($properties as $property)
                                        <option value="{{ $property->id }}" {{ (old('property_id', $transaction->property_id) == $property->id) ? 'selected' : '' }}>
                                            {{ Str::limit($property->title, 40) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('property_id')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Amount Due</label>
                                <input id="amount_due" type="number" name="amount_due" value="{{ old('amount_due', $transaction->amount_due) }}" step="0.01" readonly
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Amount Paid</label>
                                <input id="amount_paid" type="number" name="amount_paid" value="{{ old('amount_paid', $transaction->amount_paid) }}" step="0.01"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('amount_paid')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Remaining Balance</label>
                                <input id="remaining_balance" type="number" name="remaining_balance" value="{{ old('remaining_balance', $transaction->remaining_balance) }}" step="0.01" readonly
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">OR / Receipt #</label>
                                <input type="text" name="or_number" value="{{ old('or_number', $transaction->or_number) }}"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Receipt / Screenshot</label>
                                <input type="file" name="attachment_path" accept="image/*,application/pdf" class="block w-full text-sm text-gray-700">
                                @if($transaction->attachment_path)
                                    <p class="text-xs mt-1">Current: <a href="{{ asset($transaction->attachment_path) }}" target="_blank" class="underline">View</a></p>
                                @endif
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Recorded By</label>
                                <select name="recorded_by" class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">-- select staff --</option>
                                    @foreach(App\Models\User::all() as $user)
                                        <option value="{{ $user->id }}" {{ (old('recorded_by', $transaction->recorded_by) == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Amount</label>
                                <input type="number" name="amount" value="{{ old('amount', $transaction->amount) }}" step="0.01"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('amount')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Payment Type</label>
                                <select id="payment_type" name="payment_type" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="cash" {{ old('payment_type', $transaction->payment_type) == 'cash' ? 'selected' : '' }}>Cash</option>
                                    <option value="gcash" {{ old('payment_type', $transaction->payment_type) == 'gcash' ? 'selected' : '' }}>GCash</option>
                                    <option value="card" {{ old('payment_type', $transaction->payment_type) == 'card' ? 'selected' : '' }}>Card (Debit/Credit)</option>
                                </select>
                                @error('payment_type')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <!-- Cash specific fields -->
                            <div id="cash_fields" class="space-y-4">
                                <!-- no extra fields for cash besides amount/date which are above -->
                            </div>

                            <!-- GCash fields -->
                            <div id="gcash_fields" class="space-y-4 hidden">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">GCash Reference No.</label>
                                    <input type="text" name="gcash_reference" value="{{ old('gcash_reference', $transaction->gcash_reference) }}"
                                        class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                        dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Sender Name / Mobile #</label>
                                    <input type="text" name="sender_name" value="{{ old('sender_name', $transaction->sender_name) }}"
                                        class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                        dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Screenshot</label>
                                    <input type="file" name="attachment_path" accept="image/*" class="block w-full text-sm text-gray-700">
                                </div>
                            </div>

                            <!-- Card fields -->
                            <div id="card_fields" class="space-y-4 hidden">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Card Type</label>
                                    <input type="text" name="card_type" value="{{ old('card_type', $transaction->card_type) }}" placeholder="Visa, Mastercard, etc."
                                        class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                        dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Last 4 digits</label>
                                    <input type="text" name="card_last4" value="{{ old('card_last4', $transaction->card_last4) }}" maxlength="4"
                                        class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                        dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Approval / Auth Code</label>
                                    <input type="text" name="auth_code" value="{{ old('auth_code', $transaction->auth_code) }}"
                                        class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                        dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Terminal / Bank</label>
                                    <input type="text" name="terminal_info" value="{{ old('terminal_info', $transaction->terminal_info) }}" placeholder="e.g. BDO, Maya"
                                        class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                        dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Transaction Date</label>
                                <input type="date" name="transaction_date" value="{{ old('transaction_date', $transaction->transaction_date->format('Y-m-d')) }}"
                                    class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                    dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('transaction_date')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                                <select name="status" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="pending" {{ old('status', $transaction->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ old('status', $transaction->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="paid" {{ old('status', $transaction->status) == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="cancelled" {{ old('status', $transaction->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                @error('status')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Notes</label>
                            <textarea name="notes" rows="4"
                                class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('notes', $transaction->notes) }}</textarea>
                        </div>

                        <div class="flex gap-4 justify-end">
                            <a href="{{ route('transactions.show', $transaction) }}" class="px-6 py-2 border border-gray-300 dark:border-gray-600
                                text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg font-medium
                                hover:bg-blue-600 transition">
                                Update Transaction
                            </button>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const invoiceSelect = document.getElementById('invoice_id');
                                const propertySelect = document.getElementById('property_id');
                                const amountDue = document.getElementById('amount_due');
                                const amountPaid = document.getElementById('amount_paid');
                                const remaining = document.getElementById('remaining_balance');
                                const paymentType = document.getElementById('payment_type');
                                const cashFields = document.getElementById('cash_fields');
                                const gcashFields = document.getElementById('gcash_fields');
                                const cardFields = document.getElementById('card_fields');

                                function updateRemaining() {
                                    const due = parseFloat(amountDue.value) || 0;
                                    const paid = parseFloat(amountPaid.value) || 0;
                                    remaining.value = (due - paid).toFixed(2);
                                }

                                invoiceSelect?.addEventListener('change', function () {
                                    const opt = this.selectedOptions[0];
                                    if (opt && opt.dataset) {
                                        const propId = opt.dataset.propertyId;
                                        const amt = opt.dataset.amount;
                                        if (propId) {
                                            propertySelect.value = propId;
                                        }
                                        if (amt !== undefined) {
                                            amountDue.value = amt;
                                        }
                                        updateRemaining();
                                    }
                                });

                                amountPaid?.addEventListener('input', updateRemaining);

                                function togglePaymentFields() {
                                    const val = paymentType.value;
                                    cashFields.classList.toggle('hidden', val !== 'cash');
                                    gcashFields.classList.toggle('hidden', val !== 'gcash');
                                    cardFields.classList.toggle('hidden', val !== 'card');
                                }
                                paymentType?.addEventListener('change', togglePaymentFields);
                                togglePaymentFields();
                                updateRemaining();
                            });
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
