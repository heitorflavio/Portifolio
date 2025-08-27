<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Mail\NewMessageMail;
use Illuminate\Http\RedirectResponse;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use Throwable;

class MessageController extends Controller
{
    /**
     * Handle the incoming request.
     * @return RedirectResponse
     * @throws Throwable
     */
    public function __invoke(StoreMessageRequest $request)
    {
        try {
            $message = Message::create($request->validated());
            Mail::to(config('app.email'))->queue(new NewMessageMail($message));

            return back()->with('success', 'Mensagem enviada com sucesso!')->withFragment('contato');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return back()->with('error', 'Failed to send message. Please try again.');
        }
    }
}
