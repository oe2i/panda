<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification as BaseNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

it('sends an email using the configured env mail address', function (): void {
    Mail::fake();

    $recipient = (string) config('mail.from.address');

    $mailable = new class extends Mailable
    {
        use Queueable;

        public function envelope(): Envelope
        {
            return new Envelope(subject: 'Panda Test Email');
        }

        public function content(): Content
        {
            return new Content(htmlString: '<p>Hello from Panda</p>');
        }
    };

    Mail::to($recipient)->send($mailable);

    Mail::assertSent($mailable::class, function (Mailable $mail) use ($recipient): bool {
        return $mail->hasTo($recipient);
    });
});

it('sends a notification to a user with the configured env mail address', function (): void {
    Notification::fake();

    $user = User::factory()->make([
        'email' => (string) config('mail.from.address'),
    ]);

    $notification = new class extends BaseNotification
    {
        /**
         * @return array<int, string>
         */
        public function via(object $notifiable): array
        {
            return ['mail'];
        }

        public function toMail(object $notifiable): MailMessage
        {
            return (new MailMessage)
                ->subject('Panda Test Notification')
                ->line('Notification body from Panda.');
        }
    };

    $user->notify($notification);

    Notification::assertSentTo($user, $notification::class);
});
