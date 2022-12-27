<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailboxRequest;
use App\Models\Customer;
use App\Models\Mailbox;
use App\Models\MailboxProvider;

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

    public function store(Customer $customer, MailboxRequest $request)
    {
        $customer->mailboxes()->create($request->validated());

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

    public function update(Customer $customer, Mailbox $mailbox, MailboxRequest $request)
    {
        $mailbox->update($request->validated());

        return redirect(route('mailbox.index', $customer));
    }

    public function destroy(Customer $customer, Mailbox $mailbox)
    {
        $mailbox->delete();

        return redirect(route('mailbox.index', $customer));
    }

}
