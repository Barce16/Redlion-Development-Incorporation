<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    public function index(Request $request): View
    {
        // Build base query and apply search/status filters
        $baseQuery = Message::query();

        if ($q = $request->input('q')) {
            $baseQuery->where(function ($qBuilder) use ($q) {
                $qBuilder->where('subject', 'like', "%{$q}%")
                    ->orWhere('body', 'like', "%{$q}%");
            });
        }

        if ($status = $request->input('status')) {
            $baseQuery->where('status', $status);
        }

        // Statistics are computed from the filtered query so cards reflect current view
        $totalMessages = (clone $baseQuery)->count();
        $unreadMessages = (clone $baseQuery)->where('status', 'unread')->count();

        // Calculate average response time in hours (work around sqlite lacking TIMESTAMPDIFF)
        $timeQuery = (clone $baseQuery)->whereNotNull('replied_at');
        if (config('database.default') === 'sqlite') {
            $avgResponseTime = $timeQuery
                ->selectRaw("AVG((julianday(replied_at) - julianday(created_at)) * 24) as avg_hours")
                ->first()
                ->avg_hours ?? 0;
        } else {
            $avgResponseTime = $timeQuery
                ->selectRaw('AVG(TIMESTAMPDIFF(HOUR, created_at, replied_at)) as avg_hours')
                ->first()
                ->avg_hours ?? 0;
        }

        // Calculate satisfaction rate (answered messages / total messages)
        $answeredMessages = (clone $baseQuery)->where('status', 'answered')->count();
        $satisfactionRate = $totalMessages > 0 ? round(($answeredMessages / $totalMessages) * 100) : 0;

        // Get messages with relationships and pagination (preserve query params)
        $messages = (clone $baseQuery)
            ->with(['customer', 'user'])
            ->latest()
            ->paginate(6)
            ->appends($request->only('q', 'status'));

        return view('message', [
            'messages' => $messages,
            'totalMessages' => $totalMessages,
            'unreadMessages' => $unreadMessages,
            'avgResponseTime' => round($avgResponseTime, 1),
            'satisfactionRate' => $satisfactionRate,
            'q' => $request->input('q'),
            'status' => $request->input('status'),
        ]);
    }

    public function create(): View
    {
        $customers = Customer::all();
        $users = User::all();
        return view('messages.create', [
            'customers' => $customers,
            'users' => $users,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'user_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'status' => 'required|in:unread,read,answered,archived',
        ]);

        Message::create($validated);

        return redirect()->route('messages.index')->with('success', 'Message created successfully.');
    }

    public function show(Message $message): View
    {
        if ($message->status === 'unread') {
            $message->update([
                'status' => 'read',
                'read_at' => now(),
            ]);
        }
        $message->load(['customer', 'user']);
        return view('messages.show', ['message' => $message]);
    }

    public function edit(Message $message): View
    {
        $customers = Customer::all();
        $users = User::all();
        return view('messages.edit', [
            'message' => $message,
            'customers' => $customers,
            'users' => $users,
        ]);
    }

    public function update(Request $request, Message $message): RedirectResponse
    {
        $validated = $request->validate([
            'reply' => 'nullable|string',
            'status' => 'in:unread,read,answered,archived',
        ]);

        $updateData = $validated;
        if (!empty($validated['reply']) && $message->status !== 'answered') {
            $updateData['status'] = 'answered';
            $updateData['replied_at'] = now();
        }

        $message->update($updateData);

        return redirect()->route('messages.show', $message)->with('success', 'Message updated successfully.');
    }

    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    }
}
