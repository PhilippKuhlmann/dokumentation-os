<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mailbox;
use App\Models\MailboxProvider;
use Illuminate\Http\Request;

class MailboxController extends Controller
{
    public function index(Customer $customer)
    {
        return view('mailbox.index', [
            'customer' => $customer,
        ]);
    }

    public function create(Customer $customer)
    {
        return view('mailbox.create', [
            'customer' => $customer,
            'mailboxProviders' => MailboxProvider::all(),
        ]);
    }

    public function store(Customer $customer, Request $request)
    {

        $validated = $request->validate([
            'name' => [],
            'mailAdress' => [],
            'username' => [],
            'password' => [],
            'mailbox_provider_id' => [],
        ]);


        $customer->mailboxes()->create($validated);

        return redirect(route('mailbox.index', $customer));
    }

    public function edit(Customer $customer, Mailbox $mailbox)
    {
        return view('mailbox.edit', [
            'customer' => $customer,
            'mailbox' => $mailbox,
            'mailboxProviders' => MailboxProvider::all(),
        ]);
    }

    public function update(Customer $customer, Mailbox $mailbox, Request $request)
    {

        $validated = $request->validate([
            'name' => [],
            'mailAdress' => [],
            'username' => [],
            'password' => [],
            'mailbox_provider_id' => [],
        ]);

        $mailbox->update($validated);

        return redirect(route('mailbox.index', $customer));
    }

    public function destroy(Customer $customer, Mailbox $mailbox)
    {
        $mailbox->delete();

        return redirect(route('mailbox.index', $customer));
    }

}
